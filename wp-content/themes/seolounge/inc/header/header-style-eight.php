<?php
/**
 * Header Style Eight Template
 *
 * @package seolounge
 */

?>

<!-- wraper_header -->
<?php if ( true == seolounge_global_var( 'header_eight_floating', '', false ) ) { ?>
	<header class="wraper_header style-eight floating-header">
<?php } else { ?>
	<header class="wraper_header style-eight static-header">
<?php } ?>
	<!-- wraper_header_main -->
	<?php if ( true == seolounge_global_var( 'header_eight_sticky', '', false ) ) { ?>
		<div class="wraper_header_main i-am-sticky">
	<?php } else { ?>
		<div class="wraper_header_main">
	<?php } ?>
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- header_main -->
					<div class="header_main">
						<!-- header_main_item -->
						<div class="header_main_item pull-left text-left">
							<!-- header_main_action -->
							<div class="header_main_action">
								<ul>
									<?php if ( true == seolounge_global_var( 'header_eight_search_display', '', false ) ) : ?>
										<?php if ( 'floating-search' == seolounge_global_var( 'header_eight_search_style', '', false ) ) { ?>
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
										<?php } elseif ( 'flyout-search' == seolounge_global_var( 'header_eight_search_style', '', false ) ) { ?>
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
						<!-- header_main_item -->
						<div class="header_main_item">
						    <?php if ( seolounge_global_var( 'header_eight_logo', 'url', true ) ) { ?>
                				<!-- brand-logo -->
    							<div class="brand-logo">
    							    <div class="brand-logo-table">
                				        <div class="brand-logo-table-cell">
                				            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( seolounge_global_var( 'header_eight_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( seolounge_global_var( 'header_eight_logo', 'alt', true ) ); ?>"></a>
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
									<?php if ( true == seolounge_global_var( 'header_eight_hamburger_display', '', false ) ) : ?>
										<?php if ( true == seolounge_global_var( 'header_eight_hamburger_mobile', '', false ) ) { ?>
                                            <li class="header-hamburger">
                                        <?php } else { ?>
                                            <li class="header-hamburger hidden-sm hidden-xs">
                                        <?php } ?>
										    <?php if ( 'ellipsis' == seolounge_global_var( 'header_eight_hamburger_iconstyle', '', false ) ) { ?>
            								    <i class="fa fa-ellipsis-v"></i>
            								<?php } elseif ( 'three-bars' == seolounge_global_var( 'header_eight_hamburger_iconstyle', '', false ) ) { ?>
            								    <i class="fa fa-bars"></i>
            								<?php } elseif ( 'four-bars' == seolounge_global_var( 'header_eight_hamburger_iconstyle', '', false ) ) { ?>
            								    <i class="fa fa-align-justify"></i>
            								<?php } elseif ( 'four-bars-left' == seolounge_global_var( 'header_eight_hamburger_iconstyle', '', false ) ) { ?>
            								    <i class="fa fa-align-left"></i>
            								<?php } elseif ( 'four-bars-right' == seolounge_global_var( 'header_eight_hamburger_iconstyle', '', false ) ) { ?>
            								    <i class="fa fa-align-right"></i>
            								<?php } ?>
										</li>
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
</header>
<!-- wraper_header -->

<?php if ( true == seolounge_global_var( 'header_eight_search_display', '', false ) ) : ?>
	<?php if ( 'flyout-search' == seolounge_global_var( 'header_eight_search_style', '', false ) ) : ?>
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
