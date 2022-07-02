<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package seolounge
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( seolounge_global_var( '404_error_style', '', false ) ) { ?>

			<!-- wraper_error_main -->
			<div class="wraper_error_main style-<?php echo esc_attr( seolounge_global_var( '404_error_style', '', false ) ); ?>">
				<?php if ( 'one' === seolounge_global_var( '404_error_style', '', false ) ) : ?>
					<!-- START OF 404 STYLE ONE CONTENT -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- error_main -->
								<div class="error_main">
									<img src="<?php echo esc_url( seolounge_global_var( '404_error_one_image', 'url', true ) ); ?>" alt="<?php echo esc_attr( seolounge_global_var( '404_error_one_image', 'alt', true ) ); ?>" width="<?php echo esc_attr( seolounge_global_var( '404_error_one_image', 'width', true ) ); ?>" height="<?php echo esc_attr( seolounge_global_var( '404_error_one_image', 'height', true ) ); ?>">
									<?php echo wp_kses_post( seolounge_global_var( '404_error_one_content', '', false ) ); ?>
									<a class="btn" href="<?php echo esc_url( seolounge_global_var( '404_error_one_button_link', '', false ) ); ?>"><?php echo esc_html( seolounge_global_var( '404_error_one_button_text', '', false ) ); ?></a>
								</div>
								<!-- error_main -->
							</div>
						</div>
						<!-- row -->
					</div>
					<!-- END OF 404 STYLE ONE CONTENT -->
				<?php elseif ( 'two' === seolounge_global_var( '404_error_style', '', false ) ) : ?>
					<!-- START OF 404 STYLE TWO CONTENT -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- error_main -->
								<div class="error_main">
									<img src="<?php echo esc_url( seolounge_global_var( '404_error_two_image', 'url', true ) ); ?>" alt="<?php echo esc_attr( seolounge_global_var( '404_error_two_image', 'alt', true ) ); ?>" width="<?php echo esc_attr( seolounge_global_var( '404_error_two_image', 'width', true ) ); ?>" height="<?php echo esc_attr( seolounge_global_var( '404_error_two_image', 'height', true ) ); ?>">
									<?php echo wp_kses_post( seolounge_global_var( '404_error_two_content', '', false ) ); ?>
									<a class="btn" href="<?php echo esc_url( seolounge_global_var( '404_error_two_button_link', '', false ) ); ?>"><?php echo esc_html( seolounge_global_var( '404_error_two_button_text', '', false ) ); ?></a>
								</div>
								<!-- error_main -->
							</div>
						</div>
						<!-- row -->
					</div>
					<!-- END OF 404 STYLE TWO CONTENT -->
				<?php elseif ( 'three' === seolounge_global_var( '404_error_style', '', false ) ) : ?>
					<!-- START OF 404 STYLE THREE CONTENT -->
					<div class="container">
						<!-- error_main -->
						<div class="row error_main">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right text-center">
								<!-- error_main_item -->
								<div class="error_main_item">
									<img src="<?php echo esc_url( seolounge_global_var( '404_error_three_image', 'url', true ) ); ?>" alt="<?php echo esc_attr( seolounge_global_var( '404_error_three_image', 'alt', true ) ); ?>" width="<?php echo esc_attr( seolounge_global_var( '404_error_three_image', 'width', true ) ); ?>" height="<?php echo esc_attr( seolounge_global_var( '404_error_three_image', 'height', true ) ); ?>">
								</div>
								<!-- error_main_item -->
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left text-left">
								<!-- error_main_item -->
								<div class="error_main_item">
									<?php echo wp_kses_post( seolounge_global_var( '404_error_three_content', '', false ) ); ?>
									<a class="btn" href="<?php echo esc_url( seolounge_global_var( '404_error_three_button_link', '', false ) ); ?>"><?php echo esc_html( seolounge_global_var( '404_error_three_button_text', '', false ) ); ?></a>
								</div>
								<!-- error_main_item -->
							</div>
						</div>
						<!-- error_main -->
					</div>
					<!-- END OF 404 STYLE THREE CONTENT -->
				<?php elseif ( 'four' === seolounge_global_var( '404_error_style', '', false ) ) : ?>
					<!-- START OF 404 STYLE FOUR CONTENT -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- error_main -->
								<div class="error_main">
									<img src="<?php echo esc_url( seolounge_global_var( '404_error_four_image', 'url', true ) ); ?>" alt="<?php echo esc_attr( seolounge_global_var( '404_error_four_image', 'alt', true ) ); ?>" width="<?php echo esc_attr( seolounge_global_var( '404_error_four_image', 'width', true ) ); ?>" height="<?php echo esc_attr( seolounge_global_var( '404_error_four_image', 'height', true ) ); ?>">
									<?php echo wp_kses_post( seolounge_global_var( '404_error_four_content', '', false ) ); ?>
									<a class="btn" href="<?php echo esc_url( seolounge_global_var( '404_error_four_button_link', '', false ) ); ?>"><?php echo esc_html( seolounge_global_var( '404_error_four_button_text', '', false ) ); ?></a>
								</div>
								<!-- error_main -->
							</div>
						</div>
						<!-- row -->
					</div>
					<!-- END OF 404 STYLE FOUR CONTENT -->
				<?php endif; ?>
			</div>
			<!-- wraper_error_main -->

		<?php } else { ?>

			<!-- wraper_error_main -->
			<div class="wraper_error_main style-three">
				<!-- START OF 404 STYLE FOUR CONTENT -->
				<div class="container">
					<!-- error_main -->
					<div class="row error_main">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
							<!-- error_main_item -->
							<div class="error_main_item">
								<h1><?php echo esc_html__( 'Error 404', 'seolounge' ); ?></h1>
								<h2><?php echo esc_html__( 'This page could not be found!', 'seolounge' ); ?></h2>
								<a class="btn" href="<?php echo esc_url(home_url( '/' )); ?>"><?php echo esc_html__( 'BACK TO HOME PAGE', 'seolounge' ); ?></a>
							</div>
							<!-- error_main_item -->
						</div>
					</div>
					<!-- error_main -->
				</div>
				<!-- END OF 404 STYLE FOUR CONTENT -->
			</div>
			<!-- wraper_error_main -->

		<?php } ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
