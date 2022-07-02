<?php
/**
 * Header Style Nine Template
 *
 * @package seolounge
 */

?>

<!-- wraper_fullwidth_menu_sidepanel -->
<div class="wraper_fullwidth_menu_sidepanel"></div>
<!-- wraper_fullwidth_menu_sidepanel -->

<!-- wraper_header -->
<?php if ( true == seolounge_global_var( 'header_nine_floating', '', false ) ) { ?>
	<header class="wraper_header style-nine floating-header">
<?php } else { ?>
	<header class="wraper_header style-nine static-header">
<?php } ?>
	<!-- wraper_header_main -->
	<div class="wraper_header_main">
		<div class="container-fluid">
			<!-- row -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- header_main -->
					<div class="header_main">
						<!-- header_main_item -->
						<div class="header_main_item pull-left text-left">
							<!-- header_main_action -->
							<div class="header_main_action hidden">
								<ul>
									<li class="header-fullwidth-menu-launcher">
									   <i class="fa fa-bars"></i>
									</li>
								</ul>
							</div>
							<!-- header_main_action -->
							<!-- nav-icon -->
							<div class="nav-icon">
								<span></span>
								<span></span>
								<span></span>
							</div>
							<!-- nav-icon -->
							<?php if ( seolounge_global_var( 'header_nine_logo', 'url', true ) ) { ?>
                				<!-- brand-logo -->
    							<div class="brand-logo">
    							    <div class="brand-logo-table">
                				        <div class="brand-logo-table-cell">
                				            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( seolounge_global_var( 'header_nine_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( seolounge_global_var( 'header_nine_logo', 'alt', true ) ); ?>"></a>
                				        </div>
                				    </div>
    							</div>
    							<!-- brand-logo -->
            				<?php } ?>
						</div>
						<!-- header_main_item -->
						<!-- header_main_item -->
						<div class="header_main_item pull-right text-right">
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
									<?php if ( true == seolounge_global_var( 'header_nine_search_display', '', false ) ) : ?>
										<?php if ( 'floating-search' == seolounge_global_var( 'header_nine_search_style', '', false ) ) { ?>
											<li class="floating-searchbar">
												<i class="fa fa-search"></i>
												<i class="fa fa-times"></i>
												<!-- floating-search-bar -->
												<div class="floating-search-bar">
													<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
													<div class="form-row">
														<input type="search" placeholder="<?php echo esc_attr__( 'Search...', 'seolounge' ); ?>" value="" name="s" required>
														<button type="submit"><i class="fa fa-search"></i></button>
													</div>
													</form>
												</div>
												<!-- floating-search-bar -->
											</li>
										<?php } elseif ( 'flyout-search' == seolounge_global_var( 'header_nine_search_style', '', false ) ) { ?>
											<li class="flyout-searchbar-toggle">
												<i class="fa fa-search"></i>
												<i class="fa fa-times"></i>
											</li>
										<?php } ?>
									<?php endif; ?>
								</ul>
							</div>
							<!-- header_main_action -->
						</div>
						<!-- header_main_item -->
					</div>
					<!-- header_main -->
				</div>
			</div>
			<!-- row -->
		</div>
	</div>
	<!-- wraper_header_main -->
	<!-- wraper_fullwidth_menu -->
	<div class="wraper_fullwidth_menu">
		<div class="full-inner row">
			<!-- nav -->
			<nav class="col-md-8 nav">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'full-width-menu',
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>
			<!-- nav -->
			<!-- full-contact -->
			<div class="col-md-4 full-contact">
				<ul>
					<li class="title"><?php echo esc_html__( 'Get in Touch', 'seolounge' ); ?></li>
					<?php if ( ! empty( seolounge_global_var( 'header_nine_header_main_contact_email', '', false ) ) ) : ?>
						<li class="email"><?php echo esc_html( seolounge_global_var( 'header_nine_header_main_contact_email', '', false ) ); ?></li>
					<?php endif; ?>
					<li>
						<div class="social">
							<?php
							if ( true == seolounge_global_var( 'social-icon-target', '', false ) ) {
								$social_target = 'target=_blank';
							} else {
								$social_target = '';
							}
							?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-googleplus', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-googleplus', '', false ) ); ?>" rel="publisher" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-google-plus"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-facebook', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-facebook', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-facebook"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-twitter', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-twitter', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-twitter"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-vimeo', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-vimeo', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-vimeo"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-youtube', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-youtube', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-youtube-play"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-flickr', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-flickr', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-flickr"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-linkedin', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-linkedin', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-linkedin"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-pinterest', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-pinterest', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-pinterest-p"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-xing', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-xing', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-xing"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-viadeo', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-viadeo', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-viadeo"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-vkontakte', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-vkontakte', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-vk"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-tripadvisor', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-tripadvisor', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-tripadvisor"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-tumblr', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-tumblr', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-tumblr"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-behance', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-behance', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-behance"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-instagram', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-instagram', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-instagram"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-dribbble', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-dribbble', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-dribbble"></i></a>
							<?php endif; ?>
							<?php if ( ! empty( seolounge_global_var( 'social-icon-skype', '', false ) ) ) : ?>
								<a href="<?php echo esc_url( seolounge_global_var( 'social-icon-skype', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-skype"></i></a>
							<?php endif; ?>
						</div>
					</li>
				</ul>
			</div>
			<!-- full-contact -->
		</div>
	</div>
	<!-- wraper_fullwidth_menu -->
</header>
<!-- wraper_header -->

<?php if ( true == seolounge_global_var( 'header_nine_search_display', '', false ) ) : ?>
	<?php if ( 'flyout-search' == seolounge_global_var( 'header_nine_search_style', '', false ) ) : ?>
		<!-- wraper_flyout_search -->
		<div class="wraper_flyout_search header-style-one">
			<div class="table">
				<div class="table-cell">
					<!-- flyout-search-close -->
					<div class="flyout-search-close">
						<i class="fa fa-times"></i>
					</div>
					<!-- flyout-search-close -->
					<!-- flyout_search -->
					<div class="flyout_search">
						<!-- search-form -->
						<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="form-row">
							<input type="search" placeholder="<?php echo esc_attr__( 'Search...', 'seolounge' ); ?>" value="" name="s" required>
							<button type="submit"><i class="fa fa-search"></i></button>
						</div>
						</form>
						<!-- search-form -->
					</div>
					<!-- flyout_search -->
				</div>
			</div>
		</div>
		<!-- wraper_flyout_search -->
	<?php endif; ?>
<?php endif; ?>
