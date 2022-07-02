<?php
/**
 * Header Style Four Template
 *
 * @package seolounge
 */

?>

<!-- wraper_header -->
<?php if ( true == seolounge_global_var( 'header_four_floating', '', false ) ) { ?>
	<header class="wraper_header style-four floating-header">
<?php } else { ?>
	<header class="wraper_header style-four static-header">
<?php } ?>
	<!-- wraper_header_main -->
	<?php if ( true == seolounge_global_var( 'header_four_sticky', '', false ) ) { ?>
		<div class="wraper_header_main i-am-sticky">
	<?php } else { ?>
		<div class="wraper_header_main">
	<?php } ?>
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
			    <?php if ( seolounge_global_var( 'header_four_logo', 'url', true ) ) { ?>
    				<!-- brand-logo -->
    				<div class="brand-logo">
    				    <div class="brand-logo-table">
    				        <div class="brand-logo-table-cell">
    				            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( seolounge_global_var( 'header_four_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( seolounge_global_var( 'header_four_logo', 'alt', true ) ); ?>"></a>
    				        </div>
    				    </div>
    				</div>
    				<!-- brand-logo -->
				<?php } ?>
				<?php if ( true == seolounge_global_var( 'header_four_mobile_menu_display', '', false ) ) : ?>
    				<!-- responsive-nav -->
    				<div class="responsive-nav hidden-lg hidden-md visible-sm visible-xs">
    					<i class="fa fa-bars"></i>
    				</div>
    				<!-- responsive-nav -->
				<?php endif; ?>
				<!-- header_main_action -->
				<div class="header_main_action">
					<ul>
						<?php if ( ( class_exists( 'WooCommerce' ) ) && ( true == seolounge_global_var( 'header_cart_display', '', false ) ) ) : ?>
							<li class="header-cart-bar">
								<a class="header-cart-bar-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
									<i class="fa fa-shopping-cart"></i>
									<span class="cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
								</a>
							</li>
						<?php endif; ?>
						<?php if ( true == seolounge_global_var( 'header_four_hamburger_display', '', false ) ) : ?>
							<?php if ( true == seolounge_global_var( 'header_four_hamburger_mobile', '', false ) ) { ?>
                                <li class="header-hamburger">
                            <?php } else { ?>
                                <li class="header-hamburger hidden-sm hidden-xs">
                            <?php } ?>
								<?php if ( 'ellipsis' == seolounge_global_var( 'header_four_hamburger_iconstyle', '', false ) ) { ?>
								    <i class="fa fa-ellipsis-v"></i>
								<?php } elseif ( 'three-bars' == seolounge_global_var( 'header_four_hamburger_iconstyle', '', false ) ) { ?>
								    <i class="fa fa-bars"></i>
								<?php } elseif ( 'four-bars' == seolounge_global_var( 'header_four_hamburger_iconstyle', '', false ) ) { ?>
								    <i class="fa fa-align-justify"></i>
								<?php } elseif ( 'four-bars-left' == seolounge_global_var( 'header_four_hamburger_iconstyle', '', false ) ) { ?>
								    <i class="fa fa-align-left"></i>
								<?php } elseif ( 'four-bars-right' == seolounge_global_var( 'header_four_hamburger_iconstyle', '', false ) ) { ?>
								    <i class="fa fa-align-right"></i>
								<?php } ?>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<!-- header_main_action -->
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

<?php if ( true == seolounge_global_var( 'header_four_mobile_menu_display', '', false ) ) : ?>
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
