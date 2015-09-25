<?php
/**
 * Admin pages
 *
 * @package     Beacon\Admin\Pages
 * @since       1.0.0
 */


// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


/**
 * Create the settings menu pages
 *
 * @since       1.0.0
 * @global      string $beacon_settings_page The Beacon settings page hook
 * @return      void
 */
function beacon_add_settings_pages() {
    global $beacon_settings_page;

	$beacon_settings_page = add_options_page( __( 'Beacon Settings', 'beacon-for-helpscout' ), __( 'Beacon', 'beacon-for-helpscout' ), 'manage_options', 'beacon-settings', 'beacon_render_settings_page' );
}
add_action( 'admin_menu', 'beacon_add_settings_pages', 10 );


/**
 * Determines whether or not the current admin page is an Beacon page
 *
 * @since       1.0.0
 * @param       string $hook The hook for this page
 * @global      string $typenow The post type we are viewing
 * @global      string $pagenow The page we are viewing
 * @global      string $beacon_settings_page The Beacon settings page hook
 * @return      bool $ret True if Beacon page, false otherwise
 */
function beacon_is_admin_page( $hook ) {
    global $typenow, $pagenow, $beacon_settings_page;

    $ret    = false;
    $pages  = apply_filters( 'beacon_admin_pages', array( $beacon_settings_page ) );

    if( in_array( $hook, $pages ) ) {
        $ret = true;
    }

    return (bool) apply_filters( 'beacon_is_admin_page', $ret );
}
