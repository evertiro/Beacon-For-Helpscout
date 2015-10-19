<?php
/**
 * Scripts
 *
 * @package     Beacon\Scripts
 * @since       1.0.0
 */


// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
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
	if( ! apply_filters( 'beacon_load_admin_scripts', beacon_is_admin_page( $hook ), $hook ) ) {
		return;
	}

	// Use minified libraries if SCRIPT_DEBUG is turned off
	$suffix     = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	$ui_style   = ( get_user_option( 'admin_color' ) == 'classic' ) ? 'classic' : 'fresh';

	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_media();
	wp_enqueue_style( 'jquery-ui-css', BEACON_URL . 'assets/css/jquery-ui-' . $ui_style . $suffix . '.css' );
	wp_enqueue_script( 'media-upload' );
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_script( 'thickbox' );

	wp_enqueue_style( 'beacon', BEACON_URL . 'assets/css/admin' . $suffix . '.css', array(), BEACON_VER );
	wp_enqueue_script( 'beacon', BEACON_URL . 'assets/js/admin' . $suffix . '.js', array( 'jquery' ), BEACON_VER );
	wp_localize_script( 'beacon', 'beacon_vars', array(
		'image_media_button'    => __( 'Insert Image', 'beacon-for-helpscout' ),
		'image_media_title'     => __( 'Select Image', 'beacon-for-helpscout' ),
	) );
}
add_action( 'admin_enqueue_scripts', 'beacon_admin_scripts', 100 );


/**
 * Load scripts
 *
 * @since		1.0.0
 * @return		void
 */
function beacon_scripts() {
	// Use minified libraries if SCRIPT_DEBUG is turned off
	$suffix     = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'beacon', BEACON_URL . 'assets/js/beacon' . $suffix . '.js', array( 'jquery' ), BEACON_VER, true );
	wp_localize_script( 'beacon', 'beacon_vars', array(
		'modal'             => ( beacon_get_option( 'display_type', 'popover' ) == 'popover' ) ? false : true,
		'enable_docs'       => beacon_get_option( 'enable_docs', false ),
		'enable_contact'    => beacon_get_option( 'enable_contact', false ),
		'subdomain'         => beacon_get_option( 'helpscout_url', '' ),
		'form_id'           => beacon_get_option( 'form_id', '' ),
		'default_color'     => beacon_get_option( 'default_color', '#31A8D9' ),
		'icon'              => beacon_get_option( 'icon', 'bouy' ),
		'top_articles'      => beacon_get_option( 'top_articles', false ) ? true : false,
		'attachment'        => beacon_get_option( 'attachments', false ) ? true : false,
		'powered_by'        => beacon_get_option( 'powered_by', false ) ? true : false,
		'instructions'      => strip_tags( beacon_get_option( 'instructions', '' ) ),
		'search_label'      => strip_tags( beacon_get_option( 'search_label', __( 'What can we help you with?', 'beacon-for-helpscout' ) ) ),
		'search_error_label'=> strip_tags( beacon_get_option( 'search_error_label', __( 'Your search timed out. Please double-check your internet connection and try again.', 'beacon-for-helpscout' ) ) ),
		'no_results_label'  => strip_tags( beacon_get_option( 'no_results_label', __( 'No results found for', 'beacon-for-helpscout' ) ) ),
		'contact_label'     => strip_tags( beacon_get_option( 'contact_label', __( 'Send a Message', 'beacon-for-helpscout' ) ) ),
		'attach_file_label' => strip_tags( beacon_get_option( 'attach_file_label', __( 'Attach a file', 'beacon-for-helpscout' ) ) ),
		'attach_file_error' => strip_tags( beacon_get_option( 'attach_file_error', __( 'The maximum file size is 10mb', 'beacon-for-helpscout' ) ) ),
		'name_label'        => strip_tags( beacon_get_option( 'name_label', __( 'Your Name', 'beacon-for-helpscout' ) ) ),
		'name_error'        => strip_tags( beacon_get_option( 'name_error', __( 'Please enter your name', 'beacon-for-helpscout' ) ) ),
		'email_label'       => strip_tags( beacon_get_option( 'email_label', __( 'Email address', 'beacon-for-helpscout' ) ) ),
		'email_error'       => strip_tags( beacon_get_option( 'email_error', __( 'Please enter a valid email address', 'beacon-for-helpscout' ) ) ),
		'subject_label'     => strip_tags( beacon_get_option( 'subject_label', __( 'Subject', 'beacon-for-helpscout' ) ) ),
		'subject_error'     => strip_tags( beacon_get_option( 'subject_error', __( 'Please enter a subject', 'beacon-for-helpscout' ) ) ),
		'message_label'     => strip_tags( beacon_get_option( 'message_label', __( 'How can we help you?', 'beacon-for-helpscout' ) ) ),
		'message_error'     => strip_tags( beacon_get_option( 'message_error', __( 'Please enter a message', 'beacon-for-helpscout' ) ) ),
		'success_label'     => strip_tags( beacon_get_option( 'success_label', __( 'Message sent!', 'beacon-for-helpscout' ) ) ),
		'success_desc'      => strip_tags( beacon_get_option( 'success_desc', __( 'Thanks for reaching out! Someone from our team will get back to you soon.', 'beacon-for-helpscout' ) ) )
	) );
}
add_action( 'wp_enqueue_scripts', 'beacon_scripts' );
