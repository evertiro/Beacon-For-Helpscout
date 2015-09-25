<?php
/**
 * Admin actions
 *
 * @package     Beacon\Admin\Actions
 * @since       1.0.0
 */


// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


/**
 * Process all actions sent via POST and GET by looking for the 'beacon-action'
 * request and running do_action() to call the function
 *
 * @since       1.0.0
 * @return      void
 */
function beacon_process_actions() {
	if( isset( $_POST['beacon-action'] ) ) {
		do_action( 'beacon_' . $_POST['beacon-action'], $_POST );
	}

	if( isset( $_GET['beacon-action'] ) ) {
		do_action( 'beacon_' . $_GET['beacon-action'], $_GET );
	}
}
add_action( 'admin_init', 'beacon_process_actions' );
