<?php
// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This plugin requires WordPress' );
}

?>

<div class="option">
	<input
		id="<?php echo esc_attr( $this->get_key( 'video_sitemap_enabled' ) ); ?>"
		name="<?php echo esc_attr( $this->get_key( 'video_sitemap_enabled' ) ); ?>"
		<?php checked( true === \Mediavine\MCP\Video_Sitemap::is_video_sitemap_enabled() ); ?>
		value="true"
		type="checkbox"
	/>
	&nbsp;<label for="<?php echo esc_attr( $this->get_key( 'video_sitemap_enabled' ) ); ?>"><?php esc_html_e( 'Enable Video Sitemap', 'mediavine' ); ?></label>
</div>
<div class="description">
	<p>Adds a redirect for a <a href="https://help.mediavine.com/en/articles/3287036-mediavine-video-sitemaps" target="_blank">Google Video Sitemap</a> at <a href="<?php echo esc_attr( home_url( '/mv-video-sitemap' ) ); ?>" target="_blank"><?php echo esc_html( home_url( '/mv-video-sitemap' ) ); ?></a>. Disabling this setting will remove the redirect. Any browsers that have previously visited the url will need to clear their browser cache to remove the saved redirect.</p>
</div>
