<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package seolounge
 */

if ( ! function_exists( 'seolounge_global_var' ) ) {
	/**
	 * [seolounge_global_var description]
	 *
	 * @param  [type] $seolounge_opt_one   description.
	 * @param  [type] $seolounge_opt_two   description.
	 * @param  [type] $seolounge_opt_check description.
	 * @return [type]                          description
	 */
	function seolounge_global_var(
		$seolounge_opt_one,
		$seolounge_opt_two,
		$seolounge_opt_check
	) {
		global $seolounge_theme_option;
		if ( $seolounge_opt_check ) {
			if ( isset( $seolounge_theme_option[ $seolounge_opt_one ][ $seolounge_opt_two ] ) ) {
				return $seolounge_theme_option[ $seolounge_opt_one ][ $seolounge_opt_two ];
			}
		} else {
			if ( isset( $seolounge_theme_option[ $seolounge_opt_one ] ) ) {
				return $seolounge_theme_option[ $seolounge_opt_one ];
			}
		}
	}
}



if ( ! function_exists( 'seolounge_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function seolounge_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string          = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$author_image = sprintf(
			get_avatar( get_the_author_meta('email'), '150' )
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'seolounge' ),
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		$published_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Published On - %s', 'post date', 'seolounge' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

				printf(
					wp_kses_post(
						'<div class="holder">
									<div class="author-image">' . $author_image . '</div>
									  <div class="data">
										<p class="published-on">' . $published_on . '</p>
										<div class="meta">
										<span class="byline"><i class="fa fa-user-o"></i> ' . $byline . '</span>'
					)
				);

					// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			if ( true == seolounge_global_var( 'display_categries', '', false ) ) :
			$categories_list = get_the_category_list( esc_html__( ', ', 'seolounge' ) );
			if ( $categories_list && seolounge_categorized_blog() ) {
				printf(
					wp_kses_post( '<span class="category"><i class="fa fa-th-large"></i>' ) .
					/* translators: used between list items, there is a space after the comma */
					esc_html( ' %1$s' ) .
					wp_kses_post( '</span>' ),
					wp_kses_post( $categories_list )
				);
			}
		   endif;
		}
		if ( ! is_single() ) {
			/* translators: used between list items, there is a space after the comma */
			if ( true == seolounge_global_var( 'display_tags', '', false ) ) :
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'seolounge' ) );
			if ( $tags_list ) {
				printf(
					wp_kses_post( '<span class="tags-links"><i class="fa fa-tags"></i>' ) .
					/* translators: used between list items, there is a space after the comma */
					esc_html__( 'Tags: %1$s', 'seolounge' ) .
					wp_kses_post( '</span>' ),
					wp_kses_post( $tags_list )
				); // WPCS: XSS OK.
			}
		    endif;
		}
					// <li class="category"><i class="fa fa-th-large"></i> ' . $fromcategory . '</li>
				echo ' </div>
			</div>
		</div>';

	}
endif;
function seolounge_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'seolounge_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'seolounge_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so seolounge_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so seolounge_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in seolounge_categorized_blog.
 */
function seolounge_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'seolounge_categories' );
}
add_action( 'edit_category', 'seolounge_category_transient_flusher' );
add_action( 'save_post', 'seolounge_category_transient_flusher' );
