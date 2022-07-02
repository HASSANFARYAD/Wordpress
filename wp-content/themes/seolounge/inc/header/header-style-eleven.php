<?php
/**
 * Header Style Eleven Template
 *
 * @package seolounge
 */

?>

<!-- wraper_header -->
<?php if ( true == seolounge_global_var( 'header_eleven_floating', '', false ) ) { ?>
	<header class="wraper_header style-eleven floating-header">
<?php } else { ?>
	<header class="wraper_header style-eleven static-header">
<?php } ?>
	<!-- wraper_header_main -->
	<?php if ( true == seolounge_global_var( 'header_eleven_sticky', '', false ) ) { ?>
		<div class="wraper_header_main i-am-sticky">
	<?php } else { ?>
		<div class="wraper_header_main">
	<?php } ?>
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
			    <?php if ( seolounge_global_var( 'header_eleven_logo', 'url', true ) ) { ?>
    				<!-- brand-logo -->
    				<div class="brand-logo">
    				    <div class="brand-logo-table">
    				        <div class="brand-logo-table-cell">
    				            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( seolounge_global_var( 'header_eleven_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( seolounge_global_var( 'header_eleven_logo', 'alt', true ) ); ?>"></a>
    				        </div>
    				    </div>
    				</div>
    				<!-- brand-logo -->
				<?php } ?>
				<!-- header_main_action_buttons -->
				<div class="header_main_action_buttons visible-lg visible-md visible-sm hidden-xs">
				    <?php if ( true == seolounge_global_var( 'header_eleven_action_button_one_display', '', false ) ) : ?>
					    <a class="btn btn-one" href="<?php echo esc_attr( seolounge_global_var( 'header_eleven_action_button_one_link', '', false ) ); ?>"><?php echo esc_attr( seolounge_global_var( 'header_eleven_action_button_one_text', '', false ) ); ?></a>
					<?php endif; ?>
					<?php if ( true == seolounge_global_var( 'header_eleven_action_button_two_display', '', false ) ) : ?>
					    <a class="btn btn-two" href="<?php echo esc_attr( seolounge_global_var( 'header_eleven_action_button_two_link', '', false ) ); ?>"><?php echo esc_attr( seolounge_global_var( 'header_eleven_action_button_two_text', '', false ) ); ?></a>
					<?php endif; ?>
				</div>
				<!-- header_main_action_buttons -->
				<?php if ( true == seolounge_global_var( 'header_eleven_mobile_menu_display', '', false ) ) : ?>
    				<!-- responsive-nav -->
    				<div class="responsive-nav hidden-lg hidden-md visible-sm visible-xs">
    					<i class="fa fa-bars"></i>
    				</div>
    				<!-- responsive-nav -->
				<?php endif; ?>
				<!-- nav -->
				<nav class="nav visible-lg visible-md hidden-sm hidden-xs">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'top',
							'fallback_cb'    => false,
						)
					);
					?>
				</nav>
				<!-- nav -->
				<div class="clearfix"></div>
			</div>
			<!-- header_main -->
		</div>
	</div>
	<!-- wraper_header_main -->
</header>
<!-- wraper_header -->

<?php if ( true == seolounge_global_var( 'header_eleven_mobile_menu_display', '', false ) ) : ?>
    <!-- mobile-menu -->
    <div class="mobile-menu hidden">
        <!-- mobile-menu-main -->
        <div class="mobile-menu-main">
            <!-- mobile-menu-close -->
            <div class="mobile-menu-close">
                <i class="fa fa-times"></i>
            </div>
            <!-- mobile-menu-close -->
            <!-- mobile-menu-nav -->
            <nav class="mobile-menu-nav">
            	<?php
            	wp_nav_menu(
            		array(
            			'theme_location' => 'top',
            			'fallback_cb'    => false,
            		)
            	);
            	?>
            </nav>
            <!-- mobile-menu-nav -->
        </div>
        <!-- mobile-menu-main -->
    </div>
    <!-- mobile-menu -->
<?php endif; ?>
