<?php
/**
 * Scripts
 *
 * @package     Beacon\Scripts
 * @since       1.0.0
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Load admin scripts
 *
 * @since       1.0.0
 * @param       string $hook The page hook
 * @return      void
 */
function beacon_admin_scripts( $hook ) {
	wp_enqueue_script( 'beacon-admin', BEACON_URL . 'assets/js/admin.js', array( 'jquery' ), BEACON_VER );
	wp_enqueue_style( 'beacon-admin', BEACON_URL . 'assets/css/admin.css', array(), BEACON_VER );
	wp_enqueue_script( 'featherlight', BEACON_URL . 'assets/js/featherlight/release/featherlight.min.js', array( 'jquery' ), '1.7.1' );
	wp_enqueue_style( 'featherlight', BEACON_URL . 'assets/js/featherlight/release/featherlight.min.css', array(), '1.7.1' );
}
add_action( 'admin_enqueue_scripts', 'beacon_admin_scripts', 100 );


/**
 * Load scripts
 *
 * @since       1.0.0
 * @return      void
 */
function beacon_scripts() {
	if ( ! beacon_get_visibility() ) {
		return;
	}

	$settings = beacon()->settings;

	$position     = ( $settings->get_option( 'position', 'br' ) == 'bl' ? 'left' : 'right' );
	$current_user = wp_get_current_user();
	$user_name    = '';
	$user_email   = '';

	if ( is_user_logged_in() ) {
		$user_name  = $current_user->user_firstname . ' ' . $current_user->user_lastname;
		$user_name  = trim( $user_name );
		$user_email = $current_user->user_email;
	}

	wp_enqueue_script( 'beacon', BEACON_URL . 'assets/js/beacon.js', array( 'jquery' ), BEACON_VER, true );
	wp_localize_script( 'beacon', 'beacon_vars', array(
		'user_name'            => $user_name,
		'user_email'           => $user_email,
		'modal'                => ( $settings->get_option( 'display_type', 'popover' ) == 'popover' ) ? 'false' : 'true',
		'enable_docs'          => $settings->get_option( 'enable_docs', false ),
		'collection'           => $settings->get_option( 'collection', '' ),
		'enable_contact'       => $settings->get_option( 'enable_contact', false ),
		'subdomain'            => $settings->get_option( 'helpscout_url', '' ),
		'form_id'              => $settings->get_option( 'form_id', '' ),
		'default_color'        => $settings->get_option( 'default_color', '#31A8D9' ),
		'icon'                 => $settings->get_option( 'icon', 'bouy' ),
		'position'             => $position,
		'zindex'               => $settings->get_option( 'zindex', '1050' ),
		'show_name'            => $settings->get_option( 'show_name', false ) ? true : false,
		'show_subject'         => $settings->get_option( 'show_subject', false ) ? true : false,
		'show_contact_fields'  => $settings->get_option( 'show_contact_fields', false ) ? 'true' : 'false',
		'top_articles'         => $settings->get_option( 'top_articles', false ) ? true : false,
		'attachment'           => $settings->get_option( 'attachments', false ) ? true : false,
		'powered_by'           => $settings->get_option( 'powered_by', false ) ? true : false,
		'instructions'         => strip_tags( $settings->get_option( 'instructions', '' ) ),
		'search_label'         => strip_tags( $settings->get_option( 'search_label', __( 'What can we help you with?', 'beacon-for-helpscout' ) ) ),
		'search_error_label'   => strip_tags( $settings->get_option( 'search_error_label', __( 'Your search timed out. Please double-check your internet connection and try again.', 'beacon-for-helpscout' ) ) ),
		'no_results_label'     => strip_tags( $settings->get_option( 'no_results_label', __( 'No results found for', 'beacon-for-helpscout' ) ) ),
		'contact_label'        => strip_tags( $settings->get_option( 'contact_label', __( 'Send a Message', 'beacon-for-helpscout' ) ) ),
		'attach_file_label'    => strip_tags( $settings->get_option( 'attach_file_label', __( 'Attach a file', 'beacon-for-helpscout' ) ) ),
		'attach_file_error'    => strip_tags( $settings->get_option( 'attach_file_error', __( 'The maximum file size is 10mb', 'beacon-for-helpscout' ) ) ),
		'file_extension_error' => strip_tags( $settings->get_option( 'file_extension_error', __( ' 	The file format you uploaded is not allowed.', 'beacon-for-helpscout' ) ) ),
		'name_label'           => strip_tags( $settings->get_option( 'name_label', __( 'Your Name', 'beacon-for-helpscout' ) ) ),
		'name_error'           => strip_tags( $settings->get_option( 'name_error', __( 'Please enter your name', 'beacon-for-helpscout' ) ) ),
		'email_label'          => strip_tags( $settings->get_option( 'email_label', __( 'Email address', 'beacon-for-helpscout' ) ) ),
		'email_error'          => strip_tags( $settings->get_option( 'email_error', __( 'Please enter a valid email address', 'beacon-for-helpscout' ) ) ),
		'topic_label'          => strip_tags( $settings->get_option( 'topic_label', __( 'Select a topic', 'beacon-for-helpscout' ) ) ),
		'topic_error'          => strip_tags( $settings->get_option( 'topic_error', __( 'Please select a topic from the list', 'beacon-for-helpscout' ) ) ),
		'subject_label'        => strip_tags( $settings->get_option( 'subject_label', __( 'Subject', 'beacon-for-helpscout' ) ) ),
		'subject_error'        => strip_tags( $settings->get_option( 'subject_error', __( 'Please enter a subject', 'beacon-for-helpscout' ) ) ),
		'message_label'        => strip_tags( $settings->get_option( 'message_label', __( 'How can we help you?', 'beacon-for-helpscout' ) ) ),
		'message_error'        => strip_tags( $settings->get_option( 'message_error', __( 'Please enter a message', 'beacon-for-helpscout' ) ) ),
		'send_label'           => strip_tags( $settings->get_option( 'send_label', __( 'Send', 'beacon-for-helpscout' ) ) ),
		'success_label'        => strip_tags( $settings->get_option( 'success_label', __( 'Message sent!', 'beacon-for-helpscout' ) ) ),
		'success_desc'         => strip_tags( $settings->get_option( 'success_desc', __( 'Thanks for reaching out! Someone from our team will get back to you soon.', 'beacon-for-helpscout' ) ) )
	) );
}
add_action( 'wp_enqueue_scripts', 'beacon_scripts' );
add_action( 'admin_enqueue_scripts', 'beacon_scripts' );
