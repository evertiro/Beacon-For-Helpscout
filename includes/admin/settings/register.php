<?php
/**
 * Register settings
 *
 * @package     Beacon\Admin\Settings\Register
 * @since       1.0.0
 */


// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Register the menu item
 *
 * @since       1.1.0
 * @param       array $menu The existing menu settings
 * @return      array $menu The updated menu settings
 */
function beacon_add_menu( $menu ) {
	$menu['type']       = 'submenu';
	$menu['parent']     = 'options-general.php';
	$menu['page_title'] = __( 'Beacon For Help Scout Settings', 'beacon-for-help-scout' );
	$menu['show_title'] = true;
	$menu['menu_title'] = __( 'Beacon', 'beacon-for-help-scout' );
	$menu['capability'] = 'manage_options';                             // The minimum capability required to access the settings panel. Defaults to 'manage_options'.

	return $menu;
}
add_filter( 'beacon_menu', 'beacon_add_menu' );


/**
 * Register the settings tabs
 *
 * @since       1.1.0
 * @param       array tabs The existing settings tabs
 * @return      array tabs The updated settings tabs
 */
function beacon_settings_tabs( $tabs ) {
	$tabs['general']   = __( 'General', 'beacon-for-help-scout' );
	$tabs['customize'] = __( 'Customize', 'beacon-for-help-scout' );
	$tabs['strings']   = __( 'Text Strings', 'beacon-for-help-scout' );

	return $tabs;
}
add_filter( 'beacon_settings_tabs', 'beacon_settings_tabs' );


/**
 * Retrieve the array of plugin settings
 *
 * @since       1.0.0
 * @return      array $beacon_settings The registered settings
 */
function beacon_settings( $settings ) {
	$beacon_settings = array(
		// Settings
		'general' => apply_filters( 'beacon_settings_general', array(
			array(
				'id'        => 'general_header',
				'name'      => __( 'General Settings', 'beacon-for-help-scout' ),
				'desc'      => '',
				'type'      => 'header'
			),
			array(
				'id'        => 'enable_docs',
				'name'      => __( 'Enable Docs Search', 'beacon-for-help-scout' ),
				'desc'      => __( 'Display the docs search form in Beacon', 'beacon-for-help-scout' ),
				'type'      => 'checkbox'
			),
			array(
				'id'        => 'enable_contact',
				'name'      => __( 'Enable Contact Form', 'beacon-for-help-scout' ),
				'desc'      => __( 'Display a contact form in Beacon', 'beacon-for-help-scout' ),
				'type'      => 'checkbox'
			),
			array(
				'id'        => 'helpscout_url',
				'name'      => __( 'HelpScout Subdomain', 'beacon-for-help-scout' ),
				'desc'      => sprintf( __( 'Enter the subdomain for your HelpScout Docs instance found <a href="%s" target="_blank">here</a>', 'beacon-for-help-scout' ), 'https://secure.helpscout.net/settings/docs/site' ),
				'type'      => 'text'
			),
			array(
				'id'        => 'form_id',
				'name'      => __( 'Form ID', 'beacon-for-help-scout' ),
				'desc'      => sprintf( __( 'Enter the form ID for your Beacon found <a href="%s" target="_blank">here</a>', 'beacon-for-help-scout' ), 'https://secure.helpscout.net/settings/beacons/' ),
				'type'      => 'text'
			)
		) ),
		'customize' => apply_filters( 'beacon_settings_customize', array(
			array(
				'id'        => 'display_type',
				'name'      => __( 'Display Type', 'beacon-for-help-scout' ),
				'desc'      => __( 'Specify whether to display the standard beacon popover, or display beacon through a modal triggered by a link with the class \'show-beacon\'', 'beacon-for-help-scout' ),
				'type'      => 'select',
				'options'   => array(
					'popover'   => __( 'Popover', 'beacon-for-help-scout' ),
					'modal'     => __( 'Modal', 'beacon-for-help-scout' ),
				),
				'std'       => 'popover'
			),
			array(
				'id'        => 'default_color',
				'name'      => __( 'Default Color', 'beacon-for-help-scout' ),
				'desc'      => __( 'Specify the default color for Beacon elements', 'beacon-for-help-scout' ),
				'type'      => 'color',
				'std'       => '#31A8D9'
			),
			array(
				'id'        => 'icon',
				'name'      => __( 'Icon', 'beacon-for-help-scout' ),
				'desc'      => __( 'Select the icon for the popup button', 'beacon-for-help-scout' ),
				'type'      => 'select',
				'options'   => array(
					'bouy'      => __( 'Bouy', 'beacon-for-help-scout' ),
					'beacon'    => __( 'Beacon', 'beacon-for-help-scout' ),
					'message'   => __( 'Message', 'beacon-for-help-scout' ),
					'question'  => __( 'Question', 'beacon-for-help-scout' ),
					'search'    => __( 'Search', 'beacon-for-help-scout' )
				),
				'std'       => 'bouy'
			),
			array(
				'id'        => 'top_articles',
				'name'      => __( 'Display Top Articles', 'beacon-for-help-scout' ),
				'desc'      => __( 'Check to display top articles automatically instead of just the search box', 'beacon-for-help-scout' ),
				'type'      => 'checkbox'
			),
			array(
				'id'        => 'attachments',
				'name'      => __( 'Enable Attachments', 'beacon-for-help-scout' ),
				'desc'      => __( 'Check to enable attachments in the contact form', 'beacon-for-help-scout' ),
				'type'      => 'checkbox',
				'std'       => true
			),
			array(
				'id'        => 'powered_by',
				'name'      => __( 'Hide Powered By Text', 'beacon-for-help-scout' ),
				'desc'      => __( 'By default, beacons display a \'Powered By Help Scout\' line on the contact form confirmation dialog. Select this to disable it.', 'beacon-for-help-scout' ),
				'type'      => 'checkbox'
			),
			array(
				'id'        => 'instructions',
				'name'      => __( 'Instructions', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter custom text to display on top of the contact form', 'beacon-for-help-scout' ),
				'type'      => 'text'
			),
		) ),
		'strings' => apply_filters( 'beacon_settings_strings', array(
			array(
				'id'        => 'search_label',
				'name'      => __( 'Search Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Search label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'What can we help you with?', 'beacon-for-help-scout' )
			),
			array(
				'id'        => 'search_error_label',
				'name'      => __( 'Search Error Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Search error label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Your search timed out. Please double-check your internet connection and try again.', 'beacon-for-help-scout' )
			),
			array(
				'id'        => 'no_results_label',
				'name'      => __( 'No Results Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the No Results label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'No results found for', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'contact_label',
				'name'      => __( 'Contact Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Contact label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Send a Message', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'attach_file_label',
				'name'      => __( 'Attach File Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Attach File label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Attach a file', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'attach_file_error',
				'name'      => __( 'Attach File Error', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Attach File error', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'The maximum file size is 10mb', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'name_label',
				'name'      => __( 'Name Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Name label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Your Name', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'name_error',
				'name'      => __( 'Name Error Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Name error label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Please enter your name', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'email_label',
				'name'      => __( 'Email Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Email label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Email address', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'email_error',
				'name'      => __( 'Email Error Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Email error label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Please enter a valid email address', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'subject_label',
				'name'      => __( 'Subject Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Subject label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Subject', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'subject_error',
				'name'      => __( 'Subject Error Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Subject error label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Please enter a subject', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'message_label',
				'name'      => __( 'Message Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Message label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'How can we help you?', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'message_error',
				'name'      => __( 'Message Error Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Message error label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Please enter a message', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'success_label',
				'name'      => __( 'Contact Success Label', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Contact success label', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Message sent!', 'beacon-for-help-scout' ),
			),
			array(
				'id'        => 'success_desc',
				'name'      => __( 'Contact Success Description', 'beacon-for-help-scout' ),
				'desc'      => __( 'Enter the text for the Contact success description', 'beacon-for-help-scout' ),
				'type'      => 'text',
				'std'       => __( 'Thanks for reaching out! Someone from our team will get back to you soon.', 'beacon-for-help-scout' )
			)
		) )
	);

	return $beacon_settings;
}
add_filter( 'beacon_registered_settings', 'beacon_settings' );
