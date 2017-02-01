<?php
/**
 * Helper functions
 *
 * @package     Beacon\Functions
 * @since       1.0.0
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Retrieve a list of all published pages
 *
 * On large sites this can be expensive, so only load if on the settings page or $force is set to true
 *
 * @since       1.1.0
 * @param       bool $force Force the pages to be loaded even if not on settings
 * @return      array $pages_options An array of the pages
 */
function beacon_get_pages( $force = false ) {
	$pages_options = array( '' => '' ); // Blank option

	if ( ( ! isset( $_GET['page'] ) || 'beacon-settings' != $_GET['page'] ) && ! $force ) {
		return $pages_options;
	}

	$pages = get_pages();
	if ( $pages ) {
		foreach ( $pages as $page ) {
			$pages_options[ $page->ID ] = $page->post_title;
		}
	}

	return $pages_options;
}


/**
 * Get the visibility status for a given page
 *
 * @since       1.0.0
 * @return      bool $visible Whether or not to show the beacon
 */
function beacon_get_visibility() {
	$visible    = true;
	$visibility = beacon()->settings->get_option( 'visibility', false );
	$pages      = beacon()->settings->get_option( 'visibility_pages', false );
	$dashboard  = beacon()->settings->get_option( 'show_on_dashboard', false );

	if ( $visibility && $pages ) {
		if ( is_page() ) {
			global $post;

			if ( isset( $post->ID ) && in_array( $post->ID, $pages ) && $visibility == 'hide' ) {
				$visible = false;
			} elseif ( isset( $post->ID ) && ! in_array( $post->ID, $pages ) && $visibility == 'show' ) {
				$visible = false;
			}
		}
	}

	if ( is_admin() && ! $dashboard ) {
		$visible = false;
	}

	return $visible;
}
