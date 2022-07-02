<?php
/**
 * Shop Details Box Style One Template
 *
 * @package seolounge
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} ?>


					<?php while ( have_posts() ) : the_post(); ?>
						<!-- shop_single -->
						<div id="product-<?php the_ID(); ?>" <?php post_class('shop_single'); ?>>
							<?php
							do_action( 'woocommerce_before_single_product' );
							?>
							<!-- START OF PRODUCT IMAGE / GALLERY -->
							<?php do_action( 'woocommerce_before_single_product_summary' );?>
							<!-- END OF PRODUCT IMAGE / GALLERY -->
							<!-- START OF PRODUCT SUMMARY -->
							<div class="summary entry-summary">
								<?php do_action( 'woocommerce_single_product_summary' ); ?>
							</div>
							<!-- END OF PRODUCT SUMMARY -->
							<div class="clearfix"></div>
							<?php
							$tabs = apply_filters( 'woocommerce_product_tabs', array() );
							if ( ! empty( $tabs ) ) : ?>
								<div class="row">
									<div class="col-lg-1 col-md-1"></div>
									<!-- shop_single_tabs -->
									<div class="shop_single_tabs col-lg-10 col-md-10 col-sm-12 col-xs-12">
										<ul class="nav-tabs">
											<?php
											$i = 0;
											foreach ( $tabs as $key => $tab ) :
											$i++;
											?>
												<li class="<?php if ( $i == 1 ) { echo esc_html ( "active" ); } ?>">
													<a href="#tab-<?php echo esc_attr( $key ); ?>" data-toggle="tab"><?php echo apply_filters( 'woocommerce_product_' . esc_html( $key ) . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
												</li>
											<?php endforeach; ?>
										</ul>
										<div class="tab-content">
											<?php
											$i = 0;
											foreach ( $tabs as $key => $tab ) :
											$i++;
											?>
												<div class="tab-pane fade <?php if ( $i == 1 ) { echo esc_attr ( "in active" ); } ?>" id="tab-<?php echo esc_attr( $key ); ?>">
													<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
												</div>
											<?php endforeach; ?>
										</div>
									 </div>
									<!-- shop_single_tabs -->
									<div class="col-lg-1 col-md-1"></div>
								</div>
							<?php endif; ?>
						</div>
						<!-- shop_single -->
						<!-- shop_related -->
						<div class="shop_related">
							<?php woocommerce_output_related_products(); ?>
						</div>
						<!-- shop_related -->
					<?php endwhile; ?>
