<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seolounge
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- wraper_blog_main -->
		<section class="wraper_blog_main">
			<div class="container">
				<!-- row -->
				<div class="row">
					<?php if ( 'nosidebar' === seolounge_global_var( 'blog-layout', '', false ) ) { ?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php } else { ?>
						<?php if ( 'leftsidebar' === seolounge_global_var( 'blog-layout', '', false ) ) { ?>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-right">
						<?php } elseif ( 'rightsidebar' === seolounge_global_var( 'blog-layout', '', false ) ) { ?>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left">
						<?php } else { ?>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php } ?>
					<?php } ?>
						<!-- blog_single -->
						<div class="blog_single">
							<?php
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content-single', get_post_format() );
								endwhile; // End of the loop.
							?>
							<?php if ( true == seolounge_global_var( 'display_tags', '', false ) ) : ?>
								<?php
								$tags = get_the_tags( $post->ID );
								if ( ! empty( $tags ) ) {
									?>
								<!-- post-tags -->
								<div class="post-tags">
									<?php
									/* translators: used between list items, there is a space after the comma */
									$tags_list = get_the_tag_list( '', ' ' );
									if ( $tags_list ) {
										printf(
											wp_kses_post( '<strong class="tags-title">Tags:</strong> ' ) .
											/* translators: used between list items, there is a space after the comma */
											esc_html( '%1$s' ) .
											wp_kses_post( '' ),
											wp_kses_post( $tags_list )
										); // WPCS: XSS OK.
									}
									?>
								</div>
								<!-- post-tags -->
								<?php } ?>
							<?php endif; ?>
							<?php if ( true == seolounge_global_var( 'display_navigation', '', false ) ) : ?>
							<!-- post-navigation -->
							<div class="navigation post-navigation">
								<div class="nav-links">
									<?php
									$prev_post = get_previous_post();
									if ( is_a( $prev_post, 'WP_Post' ) ) {
										?>
										<div class="nav-previous">
											<a rel="prev" href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo get_the_title( $prev_post->ID ); ?>"><?php echo esc_html__( 'Previous Post', 'seolounge' ); ?> <strong><?php echo get_the_title( $prev_post->ID ); ?></strong></a>
										</div>
									<?php } ?>
									<?php
									$next_post = get_next_post();
									if ( is_a( $next_post, 'WP_Post' ) ) {
										?>
										<div class="nav-next">
											<a rel="next" href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo get_the_title( $next_post->ID ); ?>"><?php echo esc_html__( 'Next Post', 'seolounge' ); ?> <strong><?php echo get_the_title( $next_post->ID ); ?></strong></a>
										</div>
									<?php } ?>
								</div>
							</div>
							<!-- post-navigation -->
							<?php endif; ?>
							<?php if ( true == seolounge_global_var( 'display_author_information', '', false ) ) : ?>
								<?php if ( get_the_author_meta( 'description' ) ) : ?>
									<!-- author-bio -->
									<div class="author-bio">
										<div class="holder">
											<div class="pic">
												<?php echo get_avatar( get_the_author_meta( 'email' ), '150' ); ?>
											</div><!-- .pic -->
											<div class="data">
												<p class="designation">
													<?php echo esc_html__( 'Author', 'seolounge' ); ?>
												</p>
												<p class="title"><?php the_author_link(); ?></p>
												<?php the_author_meta( 'description' ); ?>
											</div><!-- .data -->
										</div>
									</div>
									<!-- author-bio -->
								<?php endif; ?>
							<?php endif; ?>
							<!-- comments-area -->
							<?php if ( seolounge_global_var( 'blog-layout', '', false ) ) : ?>
								<?php if ( seolounge_global_var( 'blog_comment_display', '', false ) ) : ?>
									<?php if ( comments_open() || get_comments_number() ) : ?>
										<?php comments_template(); ?>
								<?php endif; ?>
							<?php endif; ?>
							<?php else : ?>
							<?php if ( comments_open() || get_comments_number() ) : ?>
									<?php comments_template(); ?>
								<?php endif; ?>
							<?php endif; ?>
							<!-- comments-area -->
						</div>
						<!-- blog_single -->
					</div>
					<?php if ( 'nosidebar' === seolounge_global_var( 'blog-layout', '', false ) ) { ?>
					<?php } else { ?>
						<?php if ( 'leftsidebar' === seolounge_global_var( 'blog-layout', '', false ) ) { ?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left">
						<?php } elseif ( 'rightsidebar' === seolounge_global_var( 'blog-layout', '', false ) ) { ?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
						<?php } else { ?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<?php } ?>
							<?php get_sidebar(); ?>
						</div>
					<?php } ?>
				</div>
				<!-- row -->
			</div>
		</section>
		<!-- wraper_blog_main -->
		<?php if ( true == seolounge_global_var( 'display_related_article', '', false ) ) : ?>
			<!-- wraper_blog_related_article -->
			<div class="wraper_blog_related_article">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- blog_related_article_title -->
							<div class="blog_related_article_title">
								<h5 class="title"><?php echo esc_html__( 'Related Articles', 'seolounge' ); ?></h5>
							</div>
							<!-- blog_related_article_title -->
						</div>
					</div>
					<!-- row -->
					<!-- blog_related_article_box -->
					<div class="row blog_related_article_box">
						<?php
						$related = get_posts(
							array(
								'category__in' => wp_get_post_categories( $post->ID ),
								'numberposts'  => 3,
								'post__not_in' => array( $post->ID ),
							)
						);
						if ( $related ) {
							foreach ( $related as $post ) {
								setup_postdata( $post );
								?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<!-- blog_related_article_box_item -->
							<div class="blog_related_article_box_item">
								<div class="holder matchHeight">
									<div class="pic">
										<img src="<?php echo esc_url( get_parent_theme_file_uri( '/images/blank/Blank-Image-100x60.png' ) ); ?>" alt="<?php echo esc_attr__( 'Blank Image', 'seolounge' ); ?>" width="100" height="60">
										<?php if ( '' !== get_the_post_thumbnail() ) { ?>
											<a class="placeholder" href="<?php the_permalink(); ?>" style="background-image:url('<?php the_post_thumbnail_url( 'full' ); ?>')"></a>
										<?php } else { ?>
											<a class="placeholder" href="<?php the_permalink(); ?>" style="background-image:url('<?php echo esc_url( get_parent_theme_file_uri( '/images/no-image/No-Image-Found.png' ) ); ?>')"></a>
										<?php } ?>
									</div><!-- .pic -->
									<div class="title">
										<h6 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h6>
										<p class="date"><i class="fa fa-clock-o"></i> <?php echo esc_attr( get_the_date() ); ?></p>
									</div><!-- .title -->
								</div>
							</div>
							<!-- blog_related_article_box_item -->
						</div>
								<?php
							}
						}
						wp_reset_postdata();
						?>
					</div>
					<!-- blog_related_article_box -->
				</div>
			</div>
		<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
