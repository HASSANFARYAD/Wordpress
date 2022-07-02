<?php
/**
 * Dynamic CSS Propoerty Based on Theme Options
 *
 * @package SEOLounge
 */

$color_solid = '';
$color_rgba  = '';
if ( 'custom-color' === $radiantthemes_theme_options['color_scheme_type'] ) {
	$color_solid = $radiantthemes_theme_options['color_scheme_type_custom']['color'];
	$color_rgba  = $radiantthemes_theme_options['color_scheme_type_custom']['rgba'];
} elseif ( 'predefined-color' === $radiantthemes_theme_options['color_scheme_type'] ) {
	$color_solid = $radiantthemes_theme_options['color_scheme_type_predefined'];
	$color_rgba  = $radiantthemes_theme_options['color_scheme_type_predefined'];
}
?>

<?php

/*
--------------------------------------------------------------
>>> THEME COLOR SCHEME CSS || DO NOT CHANGE THIS WITHOUT PROPER KNOWLEDGE
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
// RadiantThemes Website Layout
// RadiantThemes Custom
// RadiantThemes Header Style
	// RadiantThemes Header Style Default
	// RadiantThemes Header Style One
	// RadiantThemes Header Style Two
	// RadiantThemes Header Style Three
	// RadiantThemes Header Style Four
	// RadiantThemes Header Style Five
	// RadiantThemes Header Style Six
	// RadiantThemes Header Style Seven
	// RadiantThemes Header Style Eight
	// RadiantThemes Header Style Nine
	// RadiantThemes Header Style Ten
	// RadiantThemes Header Style Eleven
	// RadiantThemes Header Style Twelve
	// RadiantThemes Header Style Thirteen
	// RadiantThemes Header Style Fourteen
// RadiantThemes Inner Banner Style
// RadiantThemes Footer Style
	// RadiantThemes Footer Style Eleven
// RadiantThemes Elements
	// RadiantThemes Elements Theme Button
	// RadiantThemes Elements Dropcap
	// RadiantThemes Elements Blockquote
	// RadiantThemes Elements Accordion
	// RadiantThemes Elements Pricing Table
	// RadiantThemes Elements List Style
	// RadiantThemes Elements Testimonial
	// RadiantThemes Elements Accordion
	// RadiantThemes Elements Tab
	// RadiantThemes Elements Iconbox
	// RadiantThemes Elements Progress Bar
	// RadiantThemes Elements Theme Button
	// RadiantThemes Elements Portfolio
	// RadiantThemes Elements Fancy Text Box
	// RadiantThemes Elements Custom Menu
	// RadiantThemes Elements Blog
	// RadiantThemes Elements Animated Link
	// RadiantThemes Elements Timeline
	// RadiantThemes Elements Team
	// RadiantThemes Elements Currency Converter
	// RadiantThemes Elements Contact Box
	// RadiantThemes Elements Case Studies Slider
--------------------------------------------------------------
*/

/*
--------------------------------------------------------------
// RadiantThemes Website Layout
--------------------------------------------------------------
*/
?>

.radiantthemes-website-layout.boxed{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['layout_type_boxed_width'] ); ?>px ;
}

@media (min-width: 1200px){

	.radiantthemes-website-layout.boxed .container{
	    width: calc( <?php echo esc_attr( $radiantthemes_theme_options['layout_type_boxed_width'] ); ?>px - 30px) ;
	}

	.radiantthemes-website-layout.boxed .container.page-container{
	    width: <?php echo esc_attr( $radiantthemes_theme_options['layout_type_boxed_width'] ); ?>px ;
	}

}

.radiantthemes-website-layout.boxed .container-fluid{
	max-width: calc( <?php echo esc_attr( $radiantthemes_theme_options['layout_type_boxed_width'] ); ?>px - 30px) ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Custom
--------------------------------------------------------------
*/
?>

a,
a:hover,
a:focus,
.sidr-close,
.widget-area > .widget.widget_rss ul li .rss-date:before,
.widget-area > .widget.widget_archive ul li a:hover,
.widget-area > .widget.widget_categories ul li a:hover,
.widget-area > .widget.widget_meta ul li a:hover,
.widget-area > .widget.widget_pages ul li a:hover,
.widget-area > .widget.widget_nav_menu ul li a:hover,
.widget-area > .widget.widget_bizcorp_business_contact_box_widget ul.contact li:before,
.post.style-one .post-meta > span i,
.post.style-two .entry-main .post-meta > span i,
.post.style-three .entry-main .post-meta > span i,
.post.style-default .entry-main .entry-meta > .holder > .data .meta > span i,
.post.single-post .entry-header .entry-meta > .holder > .data .meta > span i,
.radiantthemes-shop-box.style-five > .holder:hover > .data > .action-buttons > .button,
.radiantthemes-shop-box.style-five > .holder:hover > .data > .action-buttons > .added_to_cart,
.wraper_maintenance_main.style-one .maintenance_main_item h2,
.wraper_maintenance_main.style-three .maintenance_main_item h1 strong,
.default-page ul:not(.contact) > li:before,
.comment-content ul:not(.contact) > li:before,
.comments-area ol.comment-list li .reply{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.nicescroll-cursors,
.preloader,
body > .scrollup,
.hamburger-menu-main .widget-title:before,
.pagination > *.current,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce div.product form.cart .button,
.woocommerce div.product form.cart .button:hover,
.woocommerce #respond input#submit,
.woocommerce #respond input#submit:hover,
.woocommerce button.button[name="apply_coupon"],
.woocommerce button.button[name="update_cart"],
.woocommerce button.button[name="update_cart"]:disabled,
.woocommerce button.button[name="update_cart"]:hover,
.woocommerce input.button:disabled:hover,
.woocommerce input.button:disabled[disabled]:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
.woocommerce form .form-row input.button,
.woocommerce form .form-row input.button:hover,
.woocommerce form.checkout_coupon .form-row .button,
.woocommerce #payment #place_order,
.widget-area > .widget .tagcloud > [class*='tag-link-']:hover,
.widget-area > .widget.widget_price_filter .ui-slider .ui-slider-range,
.widget-area > .widget.widget_price_filter .ui-slider .ui-slider-handle,
.post.style-default .entry-main .post-read-more .btn,
.page.style-default .entry-main .post-read-more .btn,
.tribe_events.style-default .entry-main .post-read-more .btn,
.testimonial.style-default .entry-main .post-read-more .btn,
.team.style-default .entry-main .post-read-more .btn,
.portfolio.style-default .entry-main .post-read-more .btn,
.case-studies.style-default .entry-main .post-read-more .btn,
.client.style-default .entry-main .post-read-more .btn,
.product.style-default .entry-main .post-read-more .btn
.radiantthemes-search-form .form-row button[type=submit],
.nav > [class*='menu-'] > ul.menu > li:before,
.footer_main_item ul.social li a:hover,
.footer_main_item .widget-title:before,
.post.style-two .entry-main .post-read-more .btn,
.post.style-three .entry-main .post-read-more .btn,
.post.style-five > .holder .category-list span,
.post-tags a[rel='tag']:hover,
.comments-area .comment-form > p button[type=submit],
.comments-area .comment-form > p button[type=reset],
.error_main .btn:before,
.radiantthemes-shop-box.style-one > .holder > .onsale,
.radiantthemes-shop-box.style-two > .holder > .onsale,
.maintenance_main .maintenance-progress > .maintenance-progress-bar,
.maintenance_main .maintenance-progress > .maintenance-progress-bar > .maintenance-progress-percentage > span,
.radiantthemes-search-form .form-row button[type=submit],
.shop_single > .product > .woocommerce-tabs > ul.tabs > li > a:before,
.wraper_error_main.style-one .error_main .btn,
.wraper_error_main.style-two .error_main .btn,
.wraper_error_main.style-three .error_main_item .btn,
.wraper_error_main.style-four .error_main .btn{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.shop_single > .onsale{
	background-color: <?php echo esc_attr( $color_solid ); ?> !important;
}

.edit-link{
	background-color: <?php echo esc_attr( $color_rgba ); ?> ;
}

.footer_main_item ul.social li a:hover,
.pagination > *.current,
.woocommerce nav.woocommerce-pagination ul li span.current,
.widget-area > .widget select:focus,
.widget-area > .widget .tagcloud > [class*='tag-link-']:hover,
.comments-area .comment-form > p input[type=text]:focus,
.comments-area .comment-form > p input[type=email]:focus,
.comments-area .comment-form > p input[type=tel]:focus,
.comments-area .comment-form > p input[type=url]:focus,
.comments-area .comment-form > p input[type=password]:focus,
.comments-area .comment-form > p input[type=date]:focus,
.comments-area .comment-form > p input[type=time]:focus,
.comments-area .comment-form > p select:focus,
.comments-area .comment-form > p textarea:focus,
.rt-shop-box.style-two > .holder > .pic > .data,
.woocommerce #review_form #respond textarea:focus,
.woocommerce form .form-row input.input-text:focus,
.woocommerce form .form-row textarea:focus,
.post-tags a[rel='tag']:hover{
	border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.maintenance_main .maintenance-progress > .maintenance-progress-bar > .maintenance-progress-percentage > span:before{
	border-top-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiant-contact-form.element-two .form-row .wpcf7-form-control-wrap:before{
	border-bottom-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.default-page blockquote,
.comment-content blockquote{
	border-left-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style
--------------------------------------------------------------
*/

/*
--------------------------------------------------------------
// RadiantThemes Header Style One
--------------------------------------------------------------
*/
?>

.wraper_header.style-one .header_main .brand-logo{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_one_logo_width'] ); ?>px ;
}

.wraper_header.style-one .header_main_action ul > li i,
.wraper_header.style-one .header_main .responsive-nav i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_one_action_button_size'] ); ?>px ;
}

.wraper_header.style-one .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

body[data-header-style='header-style-one'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_one_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-one'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_one_hamburger_width'] ); ?>px ;
}

.wraper_header.style-one .rt-megamenu-widget ul.menu > li > a:hover{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Two
--------------------------------------------------------------
*/
?>

.wraper_header.style-two .header_main .brand-logo{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_two_logo_width'] ); ?>px ;
}

.wraper_header.style-two .header_main_action ul > li i,
.wraper_header.style-two .header_main .responsive-nav i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_two_action_button_size'] ); ?>px ;
}

.wraper_header.style-two .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

body[data-header-style='header-style-two'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_two_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-two'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_two_hamburger_width'] ); ?>px ;
}

.wraper_header.style-two .rt-megamenu-widget ul.menu > li > a:hover{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Three
--------------------------------------------------------------
*/
?>

.wraper_header.style-three .header_main .brand-logo{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_three_logo_width'] ); ?>px ;
}

.wraper_header.style-three .header_main_action ul > li i,
.wraper_header.style-three .header_main .responsive-nav i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_three_action_button_size'] ); ?>px ;
}

.wraper_header.style-three .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count,
.wraper_header.style-three .nav > [class*='menu-'] > ul.menu > li > a:before{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

body[data-header-style='header-style-three'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_three_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-three'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_three_hamburger_width'] ); ?>px ;
}

.wraper_header.style-three .rt-megamenu-widget ul.menu > li > a:hover{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Four
--------------------------------------------------------------
*/
?>

.wraper_header.style-four .header_main .brand-logo{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_four_logo_width'] ); ?>px ;
}

.wraper_header.style-four .header_main_action ul > li i,
.wraper_header.style-four .header_main .responsive-nav i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_four_action_button_size'] ); ?>px ;
}

.wraper_header.style-four .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count,
.wraper_header.style-four .nav > [class*='menu-'] > ul.menu > li > a:before{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

body[data-header-style='header-style-four'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_four_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-four'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_four_hamburger_width'] ); ?>px ;
}

.wraper_header.style-four .rt-megamenu-widget ul.menu > li > a:hover{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Five
--------------------------------------------------------------
*/
?>

.wraper_header.style-five .header_main .brand-logo{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_five_logo_width'] ); ?>px ;
}

.wraper_header.style-five .header_main_action ul > li i,
.wraper_header.style-five .header_main .responsive-nav i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_five_action_button_size'] ); ?>px ;
}

.wraper_header.style-five .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count,
.wraper_header.style-five .nav > [class*='menu-'] > ul.menu > li > a:before{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

body[data-header-style='header-style-five'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_five_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-five'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_five_hamburger_width'] ); ?>px ;
}

.wraper_header.style-five .rt-megamenu-widget ul.menu > li > a:hover{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Six
--------------------------------------------------------------
*/
?>

.wraper_header.style-six .header_main_action ul > li i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_six_action_button_size'] ); ?>px ;
}

.wraper_header.style-six .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Seven
--------------------------------------------------------------
*/
?>

.wraper_header.style-seven .header_main_action ul > li i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_seven_action_button_size'] ); ?>px ;
}

.wraper_header.style-seven .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

body[data-header-style='header-style-seven'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_seven_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-seven'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_seven_hamburger_width'] ); ?>px ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Eight
--------------------------------------------------------------
*/
?>

.wraper_header.style-eight .header_main_action ul > li i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_eight_action_button_size'] ); ?>px ;
}

.wraper_header.style-eight .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

body[data-header-style='header-style-eight'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_eight_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-eight'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_eight_hamburger_width'] ); ?>px ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Nine
--------------------------------------------------------------
*/
?>

.wraper_header.style-nine .header_main_action ul > li i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_nine_action_button_size'] ); ?>px ;
}

.wraper_header.style-nine .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.wraper_fullwidth_menu .full-inner nav ul li a:hover,
.wraper_fullwidth_menu .full-inner nav ul li.current-menu-item > a,
.wraper_fullwidth_menu .full-inner nav ul li.current-menu-parent > a,
.wraper_fullwidth_menu .full-inner nav ul li.current-menu-ancestor > a,
.wraper_fullwidth_menu .full-inner .full-contact ul li.title{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Ten
--------------------------------------------------------------
*/
?>

.wraper_header.style-ten .header_main_action ul > li i,
.wraper_header.style-ten .header_main .responsive-nav i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_ten_action_button_size'] ); ?>px ;
}

body[data-header-style='header-style-ten'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_ten_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-ten'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_ten_hamburger_width'] ); ?>px ;
}

.wraper_header.style-ten .rt-megamenu-widget ul.menu > li > a:hover{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Eleven
--------------------------------------------------------------
*/
?>

.wraper_header.style-eleven .header_main .brand-logo{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_eleven_logo_width'] ); ?>px ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Twelve
--------------------------------------------------------------
*/
?>

.wraper_header.style-twelve .header_main .brand-logo{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_twelve_logo_width'] ); ?>px ;
}

.wraper_header.style-twelve .header_main_action ul > li i,
.wraper_header.style-twelve .header_main .responsive-nav i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_twelve_action_button_size'] ); ?>px ;
}


.wraper_header.style-twelve .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count,
.wraper_header.style-twelve .nav > [class*='menu-'] > ul.menu > li > a:before{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

body[data-header-style='header-style-twelve'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_twelve_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-twelve'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_twelve_hamburger_width'] ); ?>px ;
}

.wraper_header.style-twelve .rt-megamenu-widget ul.menu > li > a:hover{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Thirteen
--------------------------------------------------------------
*/
?>

.wraper_header.style-thirteen .header_main .brand-logo{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_thirteen_logo_width'] ); ?>px ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Fourteen
--------------------------------------------------------------
*/
?>

.wraper_header.style-fourteen .header_main .brand-logo{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_fourteen_logo_width'] ); ?>px ;
}

.wraper_header.style-fourteen .header_main_action ul > li i,
.wraper_header.style-fourteen .header_main .responsive-nav i{
	font-size: <?php echo esc_attr( $radiantthemes_theme_options['header_fourteen_action_button_size'] ); ?>px ;
}

.wraper_header.style-fourteen .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

body[data-header-style='header-style-fourteen'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_fourteen_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-fourteen'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_fourteen_hamburger_width'] ); ?>px ;
}

.wraper_header.style-fourteen .rt-megamenu-widget ul.menu > li > a:hover{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Inner Banner Style
--------------------------------------------------------------
*/
?>

.wraper_inner_banner_main .inner_banner_main{
	text-align: <?php echo esc_attr( $radiantthemes_theme_options['inner_page_banner_alignment'] ); ?> ;
}

.wraper_inner_banner_breadcrumb .inner_banner_breadcrumb{
	text-align: <?php echo esc_attr( $radiantthemes_theme_options['breadcrumb_alignment'] ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Footer Style
--------------------------------------------------------------
*/

/*
--------------------------------------------------------------
// RadiantThemes Footer Style Eleven
--------------------------------------------------------------
*/
?>

.wraper_footer.style-eleven .footer_main_item input[type="submit"],
.wraper_footer.style-eleven .footer_main_item input[type="button"],
.wraper_footer.style-eleven .footer_main_item button[type="submit"],
.wraper_footer.style-eleven .footer_main_item button[type="button"]{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements
--------------------------------------------------------------
*/

/*
--------------------------------------------------------------
// RadiantThemes Elements Theme Button
--------------------------------------------------------------
*/
?>

.radiantthemes-button > .radiantthemes-button-main, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce form .form-row input.button, .woocommerce .return-to-shop .button, .widget-area > .widget.widget_price_filter .button, .rt-fancy-text-box.element-one > .holder > .more > a, .rt-fancy-text-box.element-two > .holder > .more > a, .rt-fancy-text-box.element-three > .holder > .more > a, .rt-fancy-text-box.element-four > .holder > .more > a, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn, .rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Dropcap
--------------------------------------------------------------
*/
?>

.radiantthemes-dropcaps.element-two > .holder > .radiantthemes-dropcap-letter{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiantthemes-dropcaps.element-two > .holder > .radiantthemes-dropcap-letter{
	border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiantthemes-dropcaps.element-three > .holder > .radiantthemes-dropcap-letter,
.radiantthemes-dropcaps.element-seven > .holder > .radiantthemes-dropcap-letter,
.radiantthemes-dropcaps.element-eight > .holder > .radiantthemes-dropcap-letter{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Blockquote
--------------------------------------------------------------
*/
?>

.rt-blockquote.element-one > blockquote > i.fa{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Accordion
--------------------------------------------------------------
*/
?>

.radiantthemes-accordion.element-one .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon i,
.radiantthemes-accordion.element-two .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon i,
.radiantthemes-accordion.element-three .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon i,
.radiantthemes-accordion.element-four .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .panel-title > .panel-title-counter{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Pricing Table
--------------------------------------------------------------
*/
?>

.rt-pricing-table.element-one > .holder > .more .btn,
.rt-pricing-table.element-two > .holder > .more .btn,
.rt-pricing-table.element-three.spotlight > .holder > .heading,
.rt-pricing-table.element-three:hover > .holder > .heading,
.rt-pricing-table.element-three > .holder > .list .btn,
.rt-pricing-table.element-four > .holder > .more .btn,
.rt-pricing-table.element-five > .holder > .more .btn,
.rt-pricing-table.element-six > .holder > .more .btn,
.rt-pricing-table.element-eight > .holder > .more .btn{
	border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-pricing-table.element-one > .holder > .pricing .price,
.rt-pricing-table.element-one > .holder > .more .btn,
.rt-pricing-table.element-two.spotlight > .holder > .heading .title,
.rt-pricing-table.element-two:hover > .holder > .heading .title,
.rt-pricing-table.element-two > .holder > .more .btn,
.rt-pricing-table.element-three.spotlight > .holder > .list ul li:before,
.rt-pricing-table.element-three:hover > .holder > .list ul li:before,
.rt-pricing-table.element-three > .holder > .list .btn,
.rt-pricing-table.element-four > .holder > .pricing .price,
.rt-pricing-table.element-four > .holder > .more .btn,
.rt-pricing-table.element-six > .holder > .more .btn,
.rt-pricing-table.element-eight > .holder > .pricing .price,
.rt-pricing-table.element-eight > .holder > .more .btn{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-pricing-table.element-one.spotlight > .holder > .pricing .period,
.rt-pricing-table.element-one:hover > .holder > .pricing .period,
.rt-pricing-table.element-one.spotlight > .holder > .more .btn,
.rt-pricing-table.element-one:hover > .holder > .more .btn,
.rt-pricing-table.element-two.spotlight > .holder > .more .btn,
.rt-pricing-table.element-two:hover > .holder > .more .btn,
.rt-pricing-table.element-three.spotlight > .holder > .heading,
.rt-pricing-table.element-three:hover > .holder > .heading,
.rt-pricing-table.element-three.spotlight > .holder > .list .btn,
.rt-pricing-table.element-three:hover > .holder > .list .btn,
.rt-pricing-table.element-four.spotlight > .holder:before,
.rt-pricing-table.element-four:hover > .holder:before,
.rt-pricing-table.element-four.spotlight > .holder > .more .btn,
.rt-pricing-table.element-four:hover > .holder > .more .btn,
.rt-pricing-table.element-five > .holder > .more .btn,
.rt-pricing-table.element-six:hover > .holder > .more .btn,
.rt-pricing-table.element-seven > .holder > .more .btn,
.rt-pricing-table.element-eight > .holder:hover > .more .btn{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements List Style
--------------------------------------------------------------
*/
?>

.radiantthemes-list.element-one ul li:before,
.radiantthemes-list.element-two ul li:before,
.radiantthemes-list.element-three ul li:before,
.radiantthemes-list.element-four ul li:before,
.radiantthemes-list.element-five ul li:before,
.radiantthemes-list.element-six ul li:before,
.radiantthemes-list.element-seven ul li:before,
.radiantthemes-list.element-eight ul li:before,
.radiantthemes-list.element-nine ul li:before{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Testimonial
--------------------------------------------------------------
*/
?>

.testimonial.element-three .owl-item.center .testimonial-item > .holder > .testimonial-data,
.testimonial.element-six .testimonial-item > .holder > .testimonial-pic > .testimonial-pic-quote,
.testimonial[class*='element-'].owl-dot-style-one .owl-dots > .owl-dot.active > span{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.testimonial.element-three .testimonial-item > .holder > .testimonial-data:before{
	border-color: <?php echo esc_attr( $color_solid ); ?> transparent transparent transparent;
}

.testimonial.element-five .testimonial-item > .holder > .testimonial-data .btn{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Accordion
--------------------------------------------------------------
*/
?>

.radiantthemes-accordion.element-one .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon i,
.radiantthemes-accordion.element-two .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon i,
.radiantthemes-accordion.element-three .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon i,
.radiantthemes-accordion.element-four .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon i{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiantthemes-accordion.element-five .radiantthemes-accordion-item > .radiantthemes-accordion-item-title,
.radiantthemes-accordion.element-six .radiantthemes-accordion-item > .radiantthemes-accordion-item-title{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Tab
--------------------------------------------------------------
*/
?>

.rt-tab.element-one > ul.nav-tabs > li > a:before,
.rt-tab.element-three > ul.nav-tabs > li > a:before,
.rt-tab.element-four > ul.nav-tabs > li > a:before,
.rt-tab.element-seven > ul.nav-tabs > li.active > a:before,
.rt-tab.element-eight > ul.nav-tabs > li > a:before,
.rt-tab.element-nine > ul.nav-tabs > li > a:before,
.rt-tab.element-ten > ul.nav-tabs > li > a:before,
.rt-tab.element-eleven > ul.nav-tabs > li > a:before{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-tab.element-six > ul.nav-tabs > li.active > a,
.rt-tab.element-eight > ul.nav-tabs > li.active > a,
.rt-tab.element-ten > ul.nav-tabs > li.active > a,
.rt-tab.element-twelve > ul.nav-tabs > li.active > a,
.rt-tab.element-twelve > ul.nav-tabs > li.active > a i{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-tab.element-six > ul.nav-tabs > li > a:before{
	border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Iconbox
--------------------------------------------------------------
*/
?>

.radiantthemes-iconbox.element-one > .radiantthemes-iconbox-holder > i{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Progress Bar
--------------------------------------------------------------
*/
?>

.rt-progress-bar.element-one > .progress > .progress-bar{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Theme Button
--------------------------------------------------------------
*/
?>

.radiantthemes-button > .radiantthemes-button-main,
.gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit],
.radiant-contact-form .form-row input[type=button],
.radiant-contact-form .form-row button[type=submit],
.post.style-two .post-read-more .btn,
.post.style-three .entry-main .post-read-more .btn,
.woocommerce #respond input#submit,
.woocommerce form .form-row input.button,
.woocommerce .return-to-shop .button,
.widget-area > .widget.widget_price_filter .button,
.rt-fancy-text-box.element-one > .holder > .more > a,
.rt-fancy-text-box.element-two > .holder > .more > a,
.rt-fancy-text-box.element-three > .holder > .more > a,
.rt-fancy-text-box.element-four > .holder > .more > a,
.rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn,
.rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn,
.rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn,
.rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn,
.rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Portfolio
--------------------------------------------------------------
*/
?>

.rt-portfolio-box.element-ten .rt-portfolio-box-item > .holder > .overlay ul.category-list li{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Fancy Text Box
--------------------------------------------------------------
*/
?>

.rt-fancy-text-box.element-eleven > .holder:hover > .more .btn{
	border-color: <?php echo esc_attr( $color_solid ); ?> ;
}
.rt-fancy-text-box.element-one > .holder > .data .title,
.rt-fancy-text-box.element-two > .holder > .heading > .icon i,
.rt-fancy-text-box.element-four > .holder:hover > .heading > .title,
.rt-fancy-text-box.element-eight > .holder > .heading > .title,
.rt-fancy-text-box.element-eight > .holder > .heading > .subtitle,
.rt-fancy-text-box.element-nine > .holder > .icon i,
.rt-fancy-text-box.element-eleven > .holder:hover > .icon i{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}
.rt-fancy-text-box.element-one > .holder:hover:before,
.rt-fancy-text-box.element-one > .holder > .data .subtitle:before,
.rt-fancy-text-box.element-five > .holder:before,
.rt-fancy-text-box.element-six > .holder:before,
.rt-fancy-text-box.element-eight > .holder:hover,
.rt-fancy-text-box.element-ten > .holder > .data .content:before,
.rt-fancy-text-box.element-eleven > .holder:hover > .more .btn{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Custom Menu
--------------------------------------------------------------
*/
?>

.radiantthemes-custom-menu.element-one ul.menu li a:before{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Blog
--------------------------------------------------------------
*/
?>

.blog.element-five .blog-item > .holder > .date,
.blog.element-ten .blog-item > .holder > .data:before,
.blog.element-twelve .blog-item > .holder:hover{
    background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.blog.element-five .blog-item > .holder .data .btn,
.blog.element-six .blog-item > .holder > .data ul.meta-data li,
.blog.element-ten .blog-item > .holder .data ul.meta li i,
.blog.element-twelve .blog-item > .holder > .data > .author .date{
    color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Animated Link
--------------------------------------------------------------
*/
?>

.rt-animated-link.element-one > .holder > .main-link,
.rt-animated-link.element-two > .holder > .main-link,
.rt-animated-link.element-three > .holder > .main-link,
.rt-animated-link.element-four > .holder > .main-link,
.rt-animated-link.element-five > .holder > .main-link,
.rt-animated-link.element-six > .holder > .main-link,
.rt-animated-link.element-seven > .holder > .main-link,
.rt-animated-link.element-eight > .holder > .main-link{
    color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-animated-link.element-three > .holder > .main-link:before,
.rt-animated-link.element-four > .holder > .main-link:before,
.rt-animated-link.element-five > .holder > .main-link:before,
.rt-animated-link.element-six > .holder > .main-link > .dot-holder > .dots,
.rt-animated-link.element-seven > .holder > .main-link:before,
.rt-animated-link.element-seven > .holder > .main-link:after,
.rt-animated-link.element-eight > .holder > .main-link-fliper{
    background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-animated-link.element-one > .holder:before{
    border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Timeline
--------------------------------------------------------------
*/
?>

.radiantthemes-timeline.element-one > .radiantthemes-timeline-item > .radiantthemes-timeline-item-datestamp,
.radiantthemes-timeline.element-two > .radiantthemes-timeline-item > .radiantthemes-timeline-item-line:after{
    background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiantthemes-timeline.element-one > .radiantthemes-timeline-item > .holder > .radiantthemes-timeline-item-data .month,
.radiantthemes-timeline.element-three > .radiantthemes-timeline-slider .radiantthemes-timeline-item .radiantthemes-timeline-item-data .date{
    color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiantthemes-timeline.element-two > .radiantthemes-timeline-item > .radiantthemes-timeline-item-dot,
.radiantthemes-timeline.element-three > .radiantthemes-timeline-slider > .owl-thumbs > .owl-thumb-item.active:after{
    border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Team
--------------------------------------------------------------
*/
?>

.team.element-six .team-item > .holder > .data{
    background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Currency Converter
--------------------------------------------------------------
*/
?>

.radiantthemes-currency-converter.element-one .radiantthemes-currency-converter-form .radiantthemes-currency-converter-form-row select{
    color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Contact Box
--------------------------------------------------------------
*/
?>

.radiantthemes-contact-box ul.contact li i{
    color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Case Studies Slider
--------------------------------------------------------------
*/
?>

.rt-case-studies-slider.element-one .owl-dots > .owl-dot.active > span,
.rt-case-studies-slider.element-two .owl-dots > .owl-dot.active > span{
    background-color: <?php echo esc_attr( $color_solid ); ?> ;
}