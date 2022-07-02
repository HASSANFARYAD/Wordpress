<?php
namespace Mediavine\MCP;

class AMP_Web_Stories {

	const MV_AD_CODE = '1030006';

	/** @var self|null */
	public static $instance;

	/**
	 * Makes sure class is only instantiated once.
	 *
	 * @return self Instantiated class
	 */
	static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Hooks to be run on class instantiation.
	 */
	function init() {
		add_action( 'web_stories_print_analytics', array( $this, 'output_mv_web_stories_ads' ) );
	}

	/**
	 * Gets the <amp-story-auto-ads> markup for Web Stories.
	 *
	 * @param string $slot Slot path for ads, including Mediavine ID and site adunit
	 * @return string
	 */
	public function get_amp_story_auto_ads_markup( $slot ) {
		$slug = \MV_Control_Panel::$mvcp->option( 'site_id' );

		$amp_story_auto_ads_markup = '
		<amp-story-auto-ads>
			<script type="application/json">
				{
					"ad-attributes": {
						"type": "doubleclick",
						"data-slot": "' . $slot . '",
						"json": {
							"targeting": {
								"slot": "web_story",
								"google": "1",
								"amp": "1",
								"site": "' . $slug . '"
							}
						}
					}
				}
			</script>
		</amp-story-auto-ads>';

		return $amp_story_auto_ads_markup;
	}

	/**
	 * Gets the <amp-consent> markup for Web Stories.
	 *
	 * @return string
	 */
	public function get_amp_consent_markup() {
		$amp_consent_markup = '
		<amp-consent id="myConsent" layout="nodisplay">
			<script type="application/json">
			{
				"consents": {
					"myConsent": {
						"consentInstanceId": "mv-amp-story-consent",
						"promptIfUnknownForGeoGroup": "eu",
						"promptUI": "consentUI"
					}
				},
				"consentRequired": true
			}
			</script>
			<amp-story-consent id="consentUI" layout="nodisplay">
				<script type="application/json">
					{
						"title": "We need your help!",
						"message": "This site and certain third parties would like to set cookies and access and collect data to provide you with personalized content and advertisements. If you would like this personalized experience, simply click \"accept\". If you would like to opt-out of this data collection, please click \"decline\" to continue without personalization.",
						"vendors": ["Mediavine"]
					}
				</script>
			</amp-story-consent>
		</amp-consent>';

		return $amp_consent_markup;
	}

	/**
	 * Build ad slot tag.
	 *
	 * Format without MCM: /1030006/$adunit/amp
	 * Format with MCM:  /1030006,$mcmCode/$adunit/amp
	 *
	 * @param $adunit_name
	 * @return string
	 */
	public function get_ad_slot( $adunit_name ) {
		// Decide whether to include the MCM insert.
		$mcm_insert = '';
		if ( Upstream::is_mcm_enabled() ) {
			$mcm_insert = ',' . Upstream::mcm_code();
		}

		return '/' . self::MV_AD_CODE . $mcm_insert . '/' . $adunit_name . '/amp';
	}

	/**
	 * Special HTML tags to allow in the output.
	 *
	 * @return array
	 */
	public function get_allowed_tags() {
		return array(
			'amp-consent'        => array(
				'id'     => true,
				'layout' => true,
			),
			'amp-geo'            => array(
				'layout' => true,
			),
			'amp-story-auto-ads' => true,
			'amp-story-consent'  => array(
				'id'     => true,
				'layout' => true,
			),
			'script'             => array(
				'type' => true,
			),
		);
	}

	/**
	 * Assemble the HTML components for Amp Web Stories ads.
	 *
	 * @param string $slot
	 * @return string HTML output.
	 */
	public function get_final_markup( $slot ) {
		return $this->get_amp_story_auto_ads_markup( $slot ) .
			get_amp_geo_markup() . $this->get_amp_consent_markup();
	}

	/**
	 * Outputs markup for AMP Web Stories Ads.
	 */
	public function output_mv_web_stories_ads() {
		// Only move forward if Web Stories ads are enabled
		if ( empty( get_option( 'MVCP_enable_web_story_ads', 'true' ) ) ) {
			return;
		}

		if ( Upstream::is_launch_mode_enabled() ) {
			return;
		}

		if ( ! Upstream::is_google_enabled() ) {
			return;
		}

		// Make sure we have an adunit name
		// @todo Refactor this function into this class & use Upstream inheritance.
		$adunit_name = get_adunit_name();
		if ( empty( $adunit_name ) ) {
			return;
		}

		$slot = $this->get_ad_slot( $adunit_name );

		echo wp_kses( $this->get_final_markup( $slot ), $this->get_allowed_tags() );
	}
}
