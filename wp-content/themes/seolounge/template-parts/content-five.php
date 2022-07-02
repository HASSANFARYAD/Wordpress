<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package seolounge
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'style-five' ); ?>>
	<div class="holder">
		<div class="category-list">
			<?php
			$category_detail = get_the_category( get_the_id() );
			$result          = '';
			foreach ( $category_detail as $item ) :
				$category_link = get_category_link( $item->cat_ID );
				$result       .= '<span>' . $item->name . '</span>';
			endforeach;
			echo wp_kses_post( $result );
			?>
		</div><!-- .category-list -->
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
				<img src="<?php echo esc_url( get_parent_theme_file_uri( '/images/blank/Blank-Image-100x65.png' ) ); ?>" alt="<?php echo esc_attr__( 'Blank Image', 'seolounge' ); ?>" width="100" height="65">
				<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
					<a class="placeholder" href="<?php the_permalink(); ?>" style="background-image:url('<?php the_post_thumbnail_url( 'full' ); ?>')"></a>
				<?php endif; ?>
			</div><!-- .post-thumbnail -->
		<?php } ?>
		<header class="entry-header">
			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php echo wp_kses_post( get_the_excerpt() . '...' ); ?>
			<?php // echo wp_kses_post( substr( strip_tags( get_the_excerpt() ), 0, 300 ) . '...' ); ?>
		</div><!-- .entry-content -->
	</div><!-- .holder -->
	<div class="entry-meta">
		<?php seolounge_posted_on(); ?>
	</div><!-- .entry-meta -->
</article><!-- #post-## -->
