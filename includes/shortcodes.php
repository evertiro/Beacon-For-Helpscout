<?php
/**
 * Shortcodes
 *
 * @package     Beacon\Shortcodes
 * @since       1.3.0
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Beacon article shortcode
 *
 * @since       1.3.0
 * @param       array $atts Shortcode attributes
 * @param       string $content
 * @return      string Fully formatted purchase link
 */
function beacon_article_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'id' => isset( $atts['id'] ) ? $atts['id'] : false
	),
	$atts, 'beacon_article' );

	if ( $atts['id'] ) {
		$link = '<a href="#" data-beacon-article="' . $atts['id'] . '" class="beacon-article-link">' . $content . '</a>';
	} else {
		$link = '<a href="#" class="beacon-article-link beacon-toggle">' . $content . '</a>';
	}

	return $link;
}
add_shortcode( 'beacon_article', 'beacon_article_shortcode' );
