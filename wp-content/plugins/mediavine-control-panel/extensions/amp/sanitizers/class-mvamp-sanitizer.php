<?php

if ( ! class_exists( 'MVAMP_Sanitizer' ) ) {
	class MVAMP_Sanitizer extends AMP_Base_Sanitizer {

		/** @var int|null */
		private $site_id;

		/** @var bool  */
		private static $amp_geo_script_loaded = false;

		/** @var bool  */
		private static $amp_geo_tag_loaded = false;

		/** @var bool  */
		private static $amp_consent_script_loaded = false;

		/** @var bool  */
		private static $amp_consent_tag_loaded = false;

		/** @var bool  */
		private static $amp_sticky_tag_loaded = false;

		/** @var bool  */
		private static $disable_amp_consent = false;

		/**
		 *
		 *
		 * @return bool
		 */
		public function hasAMPOfficial() {
			return is_plugin_active( 'amp/amp.php' );
		}

		/**
		 *
		 *
		 * @return bool
		 */
		public function hasAMPForWP() {
			return is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php' );
		}

		/**
		 *
		 *
		 * @return mixed
		 */
		public function AMPOfficialVersion() {
			$plugin_data    = get_plugins();
			$amp            = $plugin_data['amp/amp.php'];
			$plugin_version = $amp['Version'];
			return $plugin_version;
		}

		/**
		 *
		 *
		 * @param $after_node
		 */
		public function appendAdNodeBefore( $after_node ) {
			$ad_wrapper = AMP_DOM_Utils::create_node(
				$this->dom, 'div', array(
					'class' => 'mv-ad-wrapper',
				)
			);

			$ad_node_attributes = array(
				'width'     => 300,
				'height'    => 250,
				'type'      => 'mediavine',
				'data-site' => $this->site_id,
			);

			if ( ! $this->hasAMPForWP() ) {
				$ad_node_attributes['data-block-on-consent'] = null;
			}

			$ad_node = AMP_DOM_Utils::create_node(
				$this->dom, 'amp-ad', $ad_node_attributes
			);

			$ad_wrapper->appendChild( $ad_node );

			$after_node->parentNode->insertBefore( $ad_wrapper, $after_node );
		}

		/**
		 * Adds the <amp-consent> form to the page.
		 *
		 * Adds the form correctly depending on what AMP plugin and what version is installed.
		 *
		 * @param $body Body param coming from AMP plugin
		 * @return void
		 */
		public function add_consent_form( $body ) {
			$consent_template = $this->consent_template();

			// We only want to add consent form if form actually exists
			if ( $consent_template && ! self::$disable_amp_consent ) {
				if ( $this->hasAMPOfficial() && ! self::$amp_consent_tag_loaded ) {
					$this->inject_consent_tag( $body, $consent_template );

					self::$amp_consent_tag_loaded = true;
				}

				if ( $this->hasAMPForWP() ) {
					$this->inject_consent_tag( $body, $consent_template );
					add_action( 'amp_post_template_head', array( $this, 'inject_consent_script' ) );
				}
			}
		}

		/**
		 * Adds the <amp-geo> tag to the page.
		 *
		 * Adds the tag correctly depending on what AMP plugin and what version is installed.
		 *
		 * @param $body Body param coming from AMP plugin
		 * @return void
		 */
		public function add_geo_template( $body ) {
			if (
				$this->hasAMPOfficial() &&
				version_compare( $this->AMPOfficialVersion(), '1.0.0', '>=' )
			) {
				self::$amp_geo_script_loaded = true;
				$geo_template                = $this->geo_template();
				$this->inject_geo_tag_official( $body, $geo_template );
			} else {
				add_action( 'amp_post_template_head', array( $this, 'inject_geo_script' ) );
				add_action( 'amp_post_template_footer', array( $this, 'inject_geo_tag' ) );
			}
		}

		/**
		 * Retrieves the correct way of pulling in the body node.
		 *
		 * The official AMP plugin deprecated get_body_node(), but that's the required way for the
		 * unofficial AMP plugin. Gracefully fallback with false in the event the unofficial plugin
		 * changes something in the future.
		 *
		 * @return DOMDocument|null Body node
		 */
		public function get_correct_body_node() {
			if ( isset( $this->dom->body ) ) {
				return $this->dom->body;
			}

			if ( method_exists( $this, 'get_body_node' ) ) {
				return $this->get_body_node();
			}

			return null;
		}

		/**
		 *
		 */
		public function sanitize() {
			$site_id             = $this->args['site_id'];
			$this->site_id       = $site_id;
			$ad_frequency        = $this->args['ad_frequency'];
			$ad_offset           = $this->args['ad_offset'];
			$disable_in_content  = $this->args['disable_in_content'];
			$disable_sticky      = $this->args['disable_sticky'];
			$disable_consent     = $this->args['disable_amp_consent'];
			$did_append_adhesion = $this->args['did_append_adhesion'];

			if ( ! isset( $ad_frequency ) ) {
				$ad_frequency = 6;
			}

			if ( ! isset( $ad_offset ) ) {
				$ad_offset = 6;
			}

			if ( ! isset( $disable_in_content ) ) {
				$disable_in_content = false;
			}

			if ( ! isset( $disable_sticky ) ) {
				$disable_sticky = false;
			}

			if ( isset( $disable_consent ) ) {
				self::$disable_amp_consent = $disable_consent;
			}

			if ( ! $this->args['site_id'] ) {
				return;
			}

			$body = $this->get_correct_body_node();
			if ( is_null( $body ) ) {
				return;
			}

			// If we are in a web story, then we have already run the story head filter
			// and can know if we are using a different consent and geo templates.
			if ( ! did_action( 'web_stories_story_head' ) ) {
				$this->add_consent_form( $body );
				$this->add_geo_template( $body );

				// Add amp-sticky, but only if not on Web Stories
				if (
					true !== $disable_sticky &&
					true !== $did_append_adhesion &&
					false === $this::$amp_sticky_tag_loaded
				) {
					$sticky_node = AMP_DOM_Utils::create_node(
						$this->dom, 'amp-sticky-ad', array(
							'layout' => 'nodisplay',
						)
					);

					$stickey_inner_attributes = array(
						'data-site' => $site_id,
						'type'      => 'mediavine',
						'width'     => 320,
						'height'    => 50,

					);

					if ( ! self::$disable_amp_consent ) {
						$stickey_inner_attributes['data-block-on-consent'] = null;
					}

					$sticky_inner = AMP_DOM_Utils::create_node(
						$this->dom, 'amp-ad', $stickey_inner_attributes
					);
					$sticky_node->appendChild( $sticky_inner );
					$body->insertBefore( $sticky_node, $body->firstChild );
					$did_append_adhesion          = true;
					$this::$amp_sticky_tag_loaded = true;
				}
			}

			if ( true !== $disable_in_content ) {
				$p_nodes   = $body->getElementsByTagName( 'p' );
				$ad_offset = intval( $ad_offset );
				if ( $p_nodes->length > $ad_offset ) {
					for ( $i = 0; $i < $p_nodes->length - 1; $i++ ) {
						$offset = $i - $ad_offset;
						if ( 0 <= $offset && $ad_frequency > 0 && 0 === $offset % $ad_frequency ) {
							$this->appendAdNodeBefore( $p_nodes->item( $i ) );
						}
					}
				} elseif ( $p_nodes->length > 0 ) {
					$this->appendAdNodeBefore( $p_nodes->item( $p_nodes->length - 1 ) );
				}
			}

			$this->replace_videos( $body );
		}

		/**
		 *
		 *
		 * @param $body
		 */
		public function replace_videos( $body ) {
			$findpath = '//*[@id][@data-volume|@data-ratio]';
			$find     = new DOMXPath( $this->dom );

			$videos = $find->query( $findpath );

			foreach ( $videos as $index => $video_node ) {
				$id   = $video_node->getAttribute( 'id' );
				$opts = $this->replace_video_options( $id, $video_node->getAttribute( 'data-volume' ), $video_node->getAttribute( 'data-ratio' ) );

				$placeholder_opts                = $opts;
				$placeholder_opts['src']         = "https://scripts.mediavine.com/videos/{$id}/poster/{$opts['width']}/{$opts['height']}";
				$placeholder_opts['placeholder'] = 1;
				unset( $placeholder_opts['sandbox'] );
				unset( $placeholder_opts['allowfullscreen'] );
				unset( $placeholder_opts['frameborder'] );

				$replacement = AMP_DOM_Utils::create_node( $this->dom, 'amp-iframe', $opts );
				$placeholder = AMP_DOM_Utils::create_node( $this->dom, 'amp-img', $placeholder_opts );

				// Script is auto sanitized by the AMP plugin
				$replacement->appendChild( $placeholder );
				$video_node->parentNode->replaceChild( $replacement, $video_node );
			}
		}

		/**
		 *
		 *
		 * @param $id
		 * @param $volume
		 * @param string $ratio
		 * @return array
		 */
		public function replace_video_options( $id, $volume, $ratio = '16:9' ) {
			$ratio_parts = explode( ':', $ratio );
			$width       = ceil( intval( $ratio_parts[0] ) * 100 / 2 );
			$height      = ceil( intval( $ratio_parts[1] ) * 100 / 2 );

			if ( $width < 400 ) {
				$width = 400;
			}

			if ( $height < 300 ) {
				$height = 300;
			}

			return array(
				'width'           => $width,
				'height'          => $height,
				'sandbox'         => 'allow-scripts allow-same-origin',
				'layout'          => 'responsive',
				'frameborder'     => '0',
				'src'             => "https://scripts.mediavine.com/videos/{$id}/iframe",
				'allowfullscreen' => null,
			);
		}

		/**
		 *
		 *
		 * @return bool|DOMDocument
		 */
		function consent_template() {
			$consents_json   = array(
				'consents'     => array(
					'eu' => array(
						'promptIfUnknownForGeoGroup' => 'eu',
						'promptUI'                   => 'myConsentFlow',
					),
				),
				'postPromptUI' => 'post-consent-ui',
			);
			$post_consent_ui = '
				<div id="post-consent-ui">
					<button on="tap:mv-consent.prompt" role="button"class="ampstart-btn caps m1">Data Collection Settings</button>
				</div>
			';

			// If we are in a web story, then we have already run the story head
			// filter and can know if we are using a different consent template.
			if ( did_action( 'web_stories_story_head' ) ) {
				return false;
			}

			/* Because default AMP postPromptUI style covers ads and
			 * the official AMP plugin parses out our CSS, we need to
			 * disable it on those pages when in native or pared mode */
			if (
				$this->hasAMPOfficial() &&
				version_compare( $this->AMPOfficialVersion(), '1.0.0', '>=' ) &&
				(
					amp_is_canonical() ||
					AMP_Theme_Support::is_paired_available()
				)
			) {
				unset( $consents_json['postPromptUI'] );
				$post_consent_ui = null;
			}

			$consents_json = wp_json_encode( $consents_json );
			$markup        = '
				<body>
					<script type="application/json">
						' . $consents_json . '
					</script>
					<div id="myConsentFlow" class="popupOverlay">
						<div class="consentPopup">
							<div class="consent-header">
								<div class="dismiss-button" role="button" tabindex="0" on="tap:mv-consent.dismiss">X</div>
								<div class="h2 m1">We need your help!</div>
							</div>
							<div class="consent-body">
								<p class="m1">This site and certain third parties would like to set cookies and access and collect data to provide you with personalized content and advertisements.</p>
								<p class="m1">If you would like this personalized experience, simply click accept. If you would like to opt-out of this data collection, please click "decline" to continue without personalization.</p>
							</div>
							<div class="consent-footer">
								<button on="tap:mv-consent.accept" class="btn-primary caps">Accept &amp; continue</button>
								<button on="tap:mv-consent.reject" class="btn-secondary caps">Decline, continue without personalization</button>
							</div>
						</div>
					</div>' . $post_consent_ui . '
				</body>';
			$dom           = new DOMDocument;
			$result        = $dom->loadHTML( $markup );

			if ( ! $result ) {
				return false;
			}

			return $dom;
		}

		/**
		 *
		 */
		function inject_consent_script() {
			if ( ! self::$amp_consent_script_loaded && ! self::$disable_amp_consent ) {
				echo '<script async custom-element="amp-consent" src="https://cdn.ampproject.org/v0/amp-consent-0.1.js"></script>';
				self::$amp_consent_script_loaded = true;
			}
		}

		/**
		 *
		 *
		 * @param $body
		 * @param $consent_template
		 */
		function inject_consent_tag( $body, $consent_template ) {
			if ( self::$disable_amp_consent ) {
				return;
			}
			$consent_node = AMP_DOM_Utils::create_node(
				$this->dom, 'amp-consent', array(
					'id'     => 'mv-consent',
					'layout' => 'nodisplay',
				)
			);

			foreach ( $consent_template->getElementsByTagName( 'body' )->item( 0 )->childNodes as $node ) {
				$node = $this->dom->importNode( $node, true );
				$consent_node->appendChild( $node );
			}

			return $body->insertBefore( $consent_node, $body->firstChild );
		}

		/**
		 *
		 *
		 * @return bool|DOMDocument
		 */
		function geo_template() {
			$markup = '<body>' . \Mediavine\MCP\get_geo_json() . '</body>';
			$dom    = new DOMDocument;
			$result = $dom->loadHTML( $markup );
		if ( ! $result ) {
				return false;
		}
			return $dom;
		}

		/**
		 *
		 */
		function inject_geo_script() {
			if ( ! self::$amp_geo_script_loaded && ! self::$disable_amp_consent ) {
				echo '<script async src="https://cdn.ampproject.org/v0/amp-geo-0.1.js" custom-element="amp-geo"></script>';
				self::$amp_geo_script_loaded = true;
			}
		}

		/**
		 *
		 *
		 * @param $body
		 * @param $geo_template
		 * @return mixed
		 */
		function inject_geo_tag_official( $body, $geo_template ) {
			if ( ! self::$amp_geo_tag_loaded && ! self::$disable_amp_consent ) {
				$geo_node = AMP_DOM_Utils::create_node(
					$this->dom, 'amp-geo', array(
						'layout' => 'nodisplay',
					)
				);

				foreach ( $geo_template->getElementsByTagName( 'body' )->item( 0 )->childNodes as $node ) {
					$node = $this->dom->importNode( $node, true );
					$geo_node->appendChild( $node );
				}

				self::$amp_geo_tag_loaded = true;

				return $body->insertBefore( $geo_node, $body->firstChild );
			}
		}

		/**
		 *
		 */
		function inject_geo_tag() {
			if ( ! self::$amp_geo_tag_loaded && ! self::$disable_amp_consent ) {
				$allowed_tags = array(
					'amp-geo' => array(
						'layout' => true,
					),
					'script'  => array(
						'type' => true,
					),
				);
				echo wp_kses( \Mediavine\MCP\get_amp_geo_markup(), $allowed_tags );
				self::$amp_geo_tag_loaded = true;
			}
		}
	}
}
