<?php
// Prevent direct access

use Mediavine\MCP\Ads_Txt;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This plugin requires WordPress' );
}

/**
 * MVAdtext Template
 *
 * @category Template
 * @package  Mediavine Control Panel
 * @author   Mediavine
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.mediavine.com
 */

$ads_txt = Ads_Txt::get_instance();
?>
<div class="mv-mcp-adstxt">
	<div id="mv_adstxt_notifications" style="margin-bottom: 20px;">
	</div>

	<div id="mv_manual_update_ads_txt">
		<div class="notice notice-alt">
			<p>We support the <a href="https://help.mediavine.com/advanced/setting-up-your-adstxt-file">Ads.txt</a> feature, protecting your site against ad fraud.</p>
			<?php if ( $ads_txt->is_ads_txt_writeable_enabled() ) { ?>
				<p>Your site is using the following method: <a href="/ads.txt" target="_blank">Ads.txt file added to your site</a>
				<p>By default we'll keep this up to date for you, but sometimes settings on your host's server prevent this update from happening automatically, and you'll need to push the button below.</p>
			<?php } else { ?>
				<p>Your site is using the following method: <a href="/ads.txt" target="_blank">Redirecting ads.txt to Mediavine's servers</a>
			<?php } ?>
		</div>
		<?php if ( $ads_txt->is_ads_txt_writeable_enabled() ) { ?>
			<div class="option" style="width: 100%; max-width: 100%; margin-top: 10px;">
				<div id="mv_adstxt_div" style="width: 100%; text-align: center">
					<a class="button button-secondary" id="mv_adstxt_sync">Update Ads.txt</a>
				</div>
			</div>
		<?php } ?>
	</div>

	<?php $style_display = ( $ads_txt->is_ads_txt_enabled() ) ? 'none' : 'block'; ?>
	<div id="mv_enable_adstxt_parent" style="display: <?php echo esc_attr( $style_display ); ?>";">
		<div class="notice notice-alt" style="margin-top: 20px;">
			<h4>Enable ads.txt support</h4>
			<p>This option will enable ads.txt support for your site, if you previously disabled this feature.</p>
		</div>
		<div class="option" style="width: 100%; max-width: 100%; margin-top: 10px;">
			<div id="mv_enable_adstxt_div" style="width: 100%; text-align: center">
				<a class="button button-secondary" id="mv_enable_adstxt">Enable Ads.txt</a>
			</div>
		</div>
	</div>


	<?php $style_display = ( $ads_txt->is_ads_txt_enabled() ) ? 'block' : 'none'; ?>
	<div id="mv_disable_adstxt_parent"
		style="border: 1px solid red; padding: 0 10px 15px; margin-top: 50px; display: <?php echo esc_attr( $style_display ); ?>";
	>
		<div class="" style="margin-top: 20px;">
			<h4 style="color: red; font-size: .7rem;">DANGER: Disable ads.txt support</h4>
			<p style="font-size: .7rem;">This option will disable ads.txt support for your site and will remove the ads.txt file.</p>
			<h4 style="color: red; font-size: .7rem;">Do Not Use this unless instructed by Mediavine Support</h4>
		</div>
		<div class="option" style="width: 100%; max-width: 100%; margin-top: 10px;">
			<div id="mv_disable_adstxt_div" style="width: 100%; text-align: center">
				<a class="button button-secondary" id="mv_disable_adstxt">Disable Ads.txt</a>
			</div>
		</div>
	</div>
</div>

<?php
// Hide this setting behind an appended `&mcp_hidden_settings` URL param flag
if ( isset( $_GET['mcp_hidden_settings'] ) ) { // phpcs:ignore WordPress.CSRF.NonceVerification.NoNonceVerification
	?>
</section>
<section class="mvoption">
	<div class="option">
		<input
			id="<?php echo esc_attr( $this->get_key( 'ads_txt_write_forced' ) ); ?>"
			name="<?php echo esc_attr( $this->get_key( 'ads_txt_write_forced' ) ); ?>"
			<?php checked( true === $ads_txt->is_ads_txt_write_forced() ); ?>
			value="true"
			type="checkbox"
		/>
		&nbsp;<label for="<?php echo esc_attr( $this->get_key( 'ads_txt_write_forced' ) ); ?>"><?php esc_html_e( 'Force Ads.txt Write Method', 'mediavine' ); ?></label>
	</div>
	<div class="description">
	<p style="color: red;"><strong>Do Not Use this unless instructed by Mediavine Support</strong></p>
		<p>Forces the old method where a physical Ads.txt file is created and updated twice a day. This method doesn't keep the ads.txt file as up-to-date, but should be used if there's a conflict preventing the Ads.txt redirect from working properly.</p>
	</div>
<?php } ?>

<script type="text/javascript">
		jQuery(document).ready(function(){

				var mvAdsTxt = {
					messageBox: jQuery('#mv_adstxt_notifications'),
					notices: [],
					render: function() {
						MessageBox = this.messageBox
						MessageBox.empty()
						MessageBox.hide()
						var notices = this.notices


						jQuery.each(notices, function(i) {
								MessageBox.append('<div class="notice notice-alt notice-' + this.type +'"><p>' + this.message + '</p></div>')
						})

						MessageBox.animate({
								height: 'toggle',
								display: 'block'
						}, 1000)
					},
					setNotices: function(data) {
						this.notices = data
						this.render();
					}
				}


			function manualUpdate() {
				var btn = jQuery('#mv_adstxt_sync')
				var isFetching = false

				function addUpdatedMessage(data){

					var message = [{
							type: 'success',
							message: 'Updated!'
					}]

					if (data.error) {
						message = [{
							type: 'error',
							message: 'Failed to Update: ' + data.error
						}]
					}

					mvAdsTxt.setNotices(message)
					window.setTimeout( function() {
						jQuery('#mv_adstxt_sync').prop('disabled', false).removeClass('disabled')
					}, 3000)
					jQuery('#mv_adstxt_sync').prop('disabled', true).addClass('disabled')
				}

				btn.click(function(){
					if (isFetching ) {
						return
					}

					isFetching = true
					jQuery(this).prop('disabled', true).addClass('disabled')

					jQuery.post(ajaxurl, {
						action: 'mv_adtext'
					}, function(data){
						isFetching = false
						addUpdatedMessage(data)
					})
				})
			}

			function enableAdsTxt() {
				var yayBtn = jQuery('#mv_enable_adstxt')
				var isFetching = false
				var didEnable = false

				function enabledMessage(data) {
					var message = [{
						type: 'success',
						message: 'You have successfully enabled ads.txt.'
					}]

					if (!data.success) {
						message = [{
							type: 'error',
							message: 'Your ads.txt was not enabled, please contact support.'
						}]
					}
					mvAdsTxt.setNotices(message)
					if (data.success) {
						jQuery('#mv_manual_update_ads_txt').show()
						jQuery('#mv_enable_adstxt_parent').hide()
					}
				}

				yayBtn.click(function(){
					if (isFetching || didEnable) {
						return
					}
					isFetching = true
					jQuery.post(ajaxurl, {
						action: 'mv_enable_adtext'
					}, function(data) {
						isFetching = false
						enabledMessage(data)
					})
				})
			}


			function disableAdsTxt() {
				var dangerBtn = jQuery('#mv_disable_adstxt')
				var isFetching = false
				var didDisable = false

				function disabledMessage(data) {
					var message = [{
						type: 'warning',
						message: 'You have successfully disabled ads.txt, please advise Mediavine Support'
					}]

					if (!data.success) {
						message = [{
							type: 'error',
							message: 'Your ads.txt was not disabled, please advice Mediavine Support.'
						}]
					}

					mvAdsTxt.setNotices(message)
				}

				dangerBtn.click(function(){
					if (isFetching || didDisable) {
						return
					}

					var confirmed = window.confirm('Are you sure? This will negatively impact ad revenue.')

					if (confirmed) {
						isFetching = true
						jQuery.post(ajaxurl, {
							action: 'mv_disable_adtext'
						}, function(data) {
							isFetching = false
							disabledMessage(data)
							if ( data.success ) {
								jQuery('#mv_enable_adstxt_parent').show()
								jQuery('#mv_manual_update_ads_txt').hide()
								jQuery('#mv_disable_adstxt_parent').hide()
							}
						})
					}
				})

			}

			manualUpdate();
			enableAdsTxt();
			disableAdsTxt();

		})
</script>
