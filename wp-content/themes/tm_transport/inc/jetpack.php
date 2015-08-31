<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Infinity
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function infinity_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'infinity_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function infinity_jetpack_setup
add_action( 'after_setup_theme', 'infinity_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function infinity_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function infinity_infinite_scroll_render
