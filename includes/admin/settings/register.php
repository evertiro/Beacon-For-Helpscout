<?php
/**
 * Register settings
 *
 * @package     Beacon\Admin\Settings\Register
 * @since       1.0.0
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
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
	$menu['page_title'] = __( 'Beacon For Help Scout Settings', 'beacon-for-helpscout' );
	$menu['show_title'] = true;
	$menu['menu_title'] = __( 'Beacon', 'beacon-for-helpscout' );
	$menu['capability'] = 'manage_options';

	return $menu;
}
add_filter( 'beacon_menu', 'beacon_add_menu' );


/**
 * Register the settings tabs
 *
 * @since       1.1.0
 * @param       array $tabs The existing settings tabs
 * @return      array $tabs The updated settings tabs
 */
function beacon_settings_tabs( $tabs ) {
	$tabs['general']   = __( 'General', 'beacon-for-helpscout' );
	$tabs['customize'] = __( 'Customize', 'beacon-for-helpscout' );
	$tabs['strings']   = __( 'Text Strings', 'beacon-for-helpscout' );
	$tabs['support']   = __( 'Support', 'beacon-for-helpscout' );

	return $tabs;
}
add_filter( 'beacon_settings_tabs', 'beacon_settings_tabs' );


/**
 * Register settings sections
 *
 * @since       1.3.0
 * @param       array $sections The existing settings sections
 * @return      array $sections The updated settings sections
 */
function beacon_settings_sections( $sections ) {
	$sections = array(
		'general' => apply_filters( 'beacon_settings_sections_general', array(
			'main'       => __( 'General Settings', 'beacon-for-helpscout' ),
			'visibility' => __( 'Visibility', 'beacon-for-helpscout' )
		) ),
		'customize' => apply_filters( 'beacon_settings_sections_customize', array(
			'main'   => __( 'Beacon Customization', 'beacon-for-helpscout' ),
			'fields' => __( 'Fields', 'beacon-for-helpscout' )
		) ),
		'strings' => apply_filters( 'beacon_settings_sections_strings', array() ),
		'support' => apply_filters( 'beacon_settings_sections_support', array() )
	);

	return $sections;
}
add_filter( 'beacon_registered_settings_sections', 'beacon_settings_sections' );


/**
 * Disable save button on unsavable tabs
 *
 * @since       1.3.0
 * @return      array $tabs The updated tabs
 */
function beacon_define_unsavable_tabs() {
	$tabs = array( 'support' );

	return $tabs;
}
add_filter( 'beacon_unsavable_tabs', 'beacon_define_unsavable_tabs' );


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
			'main' => apply_filters( 'beacon_settings_general_main', array(
				array(
					'id'   => 'main_header',
					'name' => __( 'Beacon Configuration', 'beacon-for-helpscout' ),
					'desc' => '',
					'type' => 'header'
				),
				array(
					'id'   => 'enable_docs',
					'name' => __( 'Enable Docs Search', 'beacon-for-helpscout' ),
					'desc' => __( 'Display the docs search form in Beacon', 'beacon-for-helpscout' ),
					'type' => 'checkbox'
				),
				array(
					'id'   => 'collection',
					'name' => __( 'Limit To Collection', 'beacon-for-helpscout' ),
					'desc' => sprintf( __( 'Limit docs to a single collection by specifying a %s', 'beacon-for-helpscout' ), '<a href="#" data-featherlight="' . BEACON_URL . 'assets/img/collection-id.png">' . __( 'Collection ID', 'beacon-for-helpscout' ) . '</a>' ),
					'type' => 'text'
				),
				array(
					'id'   => 'enable_contact',
					'name' => __( 'Enable Contact Form', 'beacon-for-helpscout' ),
					'desc' => __( 'Display a contact form in Beacon', 'beacon-for-helpscout' ),
					'type' => 'checkbox'
				),
				array(
					'id'   => 'helpscout_url',
					'name' => __( 'HelpScout Subdomain', 'beacon-for-helpscout' ),
					'desc' => sprintf( __( 'Enter the subdomain for your HelpScout Docs instance found <a href="%s" target="_blank">here</a>', 'beacon-for-helpscout' ), 'https://secure.helpscout.net/settings/docs/site' ),
					'type' => 'text'
				),
				array(
					'id'   => 'form_id',
					'name' => __( 'Form ID', 'beacon-for-helpscout' ),
					'desc' => sprintf( __( 'Enter the form ID for your Beacon found <a href="%s" target="_blank">here</a>', 'beacon-for-helpscout' ), 'https://secure.helpscout.net/settings/beacons/' ),
					'type' => 'text'
				),
				array(
					'id'   => 'shortcodes_header',
					'name' => __( 'Beacon Shortcodes', 'beacon-for-helpscout' ),
					'desc' => '',
					'type' => 'header'
				),
				array(
					'id'   => 'shortcodes_note',
					'name' => '<code>beacon_article</code>',
					'desc' => sprintf( __( 'The %s shortcode can be used to quick-link to a specific article. It accepts a single arguement, %s, which should be the ID of the article to display%s', 'beacon-for-helpscout' ), '<code>beacon_article</code>', '<code>id</code>', '<br /><br /><strong>Example:</strong> <code>[beacon_article id="562410b6c69791452ed4c976"]Click Me![/beacon_article]</code>' ),
					'type' => 'descriptive_text'
				)
			) ),
			'visibility' => apply_filters( 'beacon_settings_general_visibility', array(
				array(
					'id'   => 'visibility_header',
					'name' => __( 'Visibility Settings', 'beacon-for-helpscout' ),
					'desc' => '',
					'type' => 'header'
				),
				array(
					'id'      => 'visibility',
					'name'    => __( 'Page Visibility', 'beacon-for-helpscout' ),
					'desc'    => __( 'Select whether to hide or show on the below pages', 'beacon-for-helpscout' ),
					'type'    => 'select',
					'std'     => 'hide',
					'options' => array(
						'hide' => __( 'Hide', 'beacon-for-helpscout' ),
						'show' => __( 'Show', 'beacon-for-helpscout' )
					)
				),
				array(
					'id'       => 'visibility_pages',
					'name'     => __( 'Pages', 'beacon-for-helpscout' ),
					'desc'     => __( 'Select the page(s) to hide or show beacon on', 'beacon-for-helpscout' ),
					'type'     => 'select',
					'select2'  => true,
					'multiple' => true,
					'size'     => '25em',
					'options'  => beacon_get_pages()
				),
				array(
					'id'   => 'show_on_dashboard',
					'name' => __( 'Show On Dashboard', 'beacon-for-helpscout' ),
					'desc' => __( 'Specify whether or not to show beacon on the WordPress dashboard', 'beacon-for-helpscout' ),
					'type' => 'checkbox'
				)
			) )
		) ),
		'customize' => apply_filters( 'beacon_settings_customize', array(
			'main' => apply_filters( 'beacon_settings_customize_beacon', array(
				array(
					'id'   => 'customize_header',
					'name' => __( 'Beacon Customization', 'beacon-for-helpscout' ),
					'desc' => '',
					'type' => 'header'
				),
				array(
					'id'   => 'top_articles',
					'name' => __( 'Display Top Articles', 'beacon-for-helpscout' ),
					'desc' => __( 'Check to display top articles automatically instead of just the search box', 'beacon-for-helpscout' ),
					'type' => 'checkbox'
				),
				array(
					'id'   => 'powered_by',
					'name' => __( 'Hide Powered By Text', 'beacon-for-helpscout' ),
					'desc' => __( 'By default, beacons display a \'Powered By Help Scout\' line on the contact form confirmation dialog. Select this to disable it.', 'beacon-for-helpscout' ),
					'type' => 'checkbox'
				),
				array(
					'id'   => 'instructions',
					'name' => __( 'Instructions', 'beacon-for-helpscout' ),
					'desc' => __( 'Enter custom text to display on top of the contact form', 'beacon-for-helpscout' ),
					'type' => 'text'
				),
				array(
					'id'      => 'display_type',
					'name'    => __( 'Display Type', 'beacon-for-helpscout' ),
					'desc'    => __( 'Specify how to display the beacon interface.', 'beacon-for-helpscout' ),
					'type'    => 'select',
					'std'     => 'popover',
					'options' => array(
						'popover' => __( 'Popover', 'beacon-for-helpscout' ),
						'modal'   => __( 'Modal', 'beacon-for-helpscout' ),
					),
					'tooltip_title' => __( 'Display Type', 'beacon-for-helpscout' ),
					'tooltip_desc'  => __( 'Specify whether to display the standard beacon popover, or display beacon through a modal triggered by a link with the class \'show-beacon\'', 'beacon-for-helpscout' )
				),
				array(
					'id'   => 'display_note',
					'name' => '',
					'desc' => sprintf( __( '%s When using the Popover display type, you can also trigger the popover through buttons with the %s, %s and %s IDs or classes', 'beacon-for-helpscout' ), '<strong>' . __( 'Note:', 'beacon-for-helpscout' ) . '</strong>', '<code>beacon-open</code>', '<code>beacon-close</code>', '<code>beacon-toggle</code>' ),
					'type' => 'descriptive_text'
				),
				array(
					'id'   => 'appearance_header',
					'name' => __( 'Beacon Appearance', 'beacon-for-helpscout' ),
					'desc' => '',
					'type' => 'header'
				),
				array(
					'id'   => 'default_color',
					'name' => __( 'Default Color', 'beacon-for-helpscout' ),
					'desc' => __( 'Specify the default color for Beacon elements', 'beacon-for-helpscout' ),
					'type' => 'color',
					'std'  => '#31A8D9'
				),
				array(
					'id'      => 'icon',
					'name'    => __( 'Icon', 'beacon-for-helpscout' ),
					'desc'    => __( 'Select the icon for the popup button', 'beacon-for-helpscout' ),
					'type'    => 'select',
					'std'     => 'bouy',
					'options' => array(
						'bouy'     => __( 'Bouy', 'beacon-for-helpscout' ),
						'beacon'   => __( 'Beacon', 'beacon-for-helpscout' ),
						'message'  => __( 'Message', 'beacon-for-helpscout' ),
						'question' => __( 'Question', 'beacon-for-helpscout' ),
						'search'   => __( 'Search', 'beacon-for-helpscout' )
					)
				),
				array(
					'id'      => 'position',
					'name'    => __( 'Position', 'beacon-for-helpscout' ),
					'desc'    => __( 'Specify the location for the popup button', 'beacon-for-helpscout' ),
					'type'    => 'select',
					'std'     => 'br',
					'options' => array(
						'br' => __( 'Bottom/Right', 'beacon-for-helpscout' ),
						'bl' => __( 'Bottom/Left', 'beacon-for-helpscout' )
					)
				),
				array(
					'id'   => 'zindex',
					'name' => __( 'zIndex', 'beacon-for-helpscout' ),
					'desc' => __( 'Specify a custom z-index for Beacon', 'beacon-for-helpscout' ),
					'type' => 'number',
					'size' => 'small',
					'step' => '1',
					'std'  => '1050'
				)
			) ),
			'fields' => apply_filters( 'beacon_settings_customize_fields', array(
				array(
					'id'   => 'fields_header',
					'name' => __( 'Field Customization', 'beacon-for-helpscout' ),
					'desc' => '',
					'type' => 'header'
				),
				array(
					'id'            => 'show_name',
					'name'          => __( 'Show Name Field', 'beacon-for-helpscout' ),
					'desc'          => __( 'Allow customers to enter their name manually.', 'beacon-for-helpscout' ),
					'type'          => 'checkbox',
					'tooltip_title' => __( 'Name Field', 'beacon-for-helpscout' ),
					'tooltip_desc'  => __( 'If this is not enabled, Help Scout will attempt to figure out their name from their email address.', 'beacon-for-helpscout' )
				),
				array(
					'id'            => 'show_subject',
					'name'          => __( 'Show Subject Field', 'beacon-for-helpscout' ),
					'desc'          => __( 'Allow customers to enter a subject.', 'beacon-for-helpscout' ),
					'type'          => 'checkbox',
					'tooltip_title' => __( 'Subject Field', 'beacon-for-helpscout' ),
					'tooltip_desc'  => __( 'If this is not enabled, the subject will default to the last search value or a generic message.', 'beacon-for-helpscout' )
				),
				array(
					'id'            => 'show_contact_fields',
					'name'          => __( 'Show Pre-filled Fields', 'beacon-for-helpscout' ),
					'desc'          => __( 'Check to prevent hiding pre-filled fields.', 'beacon-for-helpscout' ),
					'type'          => 'checkbox',
					'tooltip_title' => __( 'Pre-filled Fields', 'beacon-for-helpscout' ),
					'tooltip_desc'  => __( 'Beacon can pre-fill the name and subject fields which are then hidden by default. Check this to force them to show even when pre-filled.', 'beacon-for-helpscout' )
				),
				array(
					'id'   => 'attachments',
					'name' => __( 'Enable Attachments', 'beacon-for-helpscout' ),
					'desc' => __( 'Check to enable attachments in the contact form', 'beacon-for-helpscout' ),
					'type' => 'checkbox',
					'std'  => true
				)
			) )
		) ),
		'strings' => apply_filters( 'beacon_settings_strings', array(
			array(
				'id'   => 'strings_header',
				'name' => __( 'Customize Text Strings', 'beacon-for-helpscout' ),
				'desc' => '',
				'type' => 'header'
			),
			array(
				'id'   => 'search_label',
				'name' => __( 'Search Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Search label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'What can we help you with?', 'beacon-for-helpscout' )
			),
			array(
				'id'   => 'search_error_label',
				'name' => __( 'Search Error Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Search error label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Your search timed out. Please double-check your internet connection and try again.', 'beacon-for-helpscout' )
			),
			array(
				'id'   => 'no_results_label',
				'name' => __( 'No Results Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the No Results label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'No results found for', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'contact_label',
				'name' => __( 'Contact Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Contact label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Send a Message', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'attach_file_label',
				'name' => __( 'Attach File Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Attach File label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Attach a file', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'attach_file_error',
				'name' => __( 'Attach File Error', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Attach File error', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'The maximum file size is 10mb', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'file_extension_error',
				'name' => __( 'File Extension Error', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the File Extension error', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'The file format you uploaded is not allowed.', 'beacon-for-helpscout' )
			),
			array(
				'id'   => 'name_label',
				'name' => __( 'Name Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Name label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Your Name', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'name_error',
				'name' => __( 'Name Error Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Name error label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Please enter your name', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'email_label',
				'name' => __( 'Email Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Email label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Email address', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'email_error',
				'name' => __( 'Email Error Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Email error label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Please enter a valid email address', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'topic_label',
				'name' => __( 'Topic Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Topic label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Select a topic', 'beacon-for-helpscout' )
			),
			array(
				'id'   => 'topic_error',
				'name' => __( 'Topic Error', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Topic error label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Please select a topic from the list', 'beacon-for-helpscout' )
			),
			array(
				'id'   => 'subject_label',
				'name' => __( 'Subject Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Subject label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Subject', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'subject_error',
				'name' => __( 'Subject Error Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Subject error label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Please enter a subject', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'message_label',
				'name' => __( 'Message Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Message label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'How can we help you?', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'message_error',
				'name' => __( 'Message Error Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Message error label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Please enter a message', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'send_label',
				'name' => __( 'Send Button Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Send button', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Send', 'beacon-for-helpscout' )
			),
			array(
				'id'   => 'success_label',
				'name' => __( 'Contact Success Label', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Contact success label', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Message sent!', 'beacon-for-helpscout' ),
			),
			array(
				'id'   => 'success_desc',
				'name' => __( 'Contact Success Description', 'beacon-for-helpscout' ),
				'desc' => __( 'Enter the text for the Contact success description', 'beacon-for-helpscout' ),
				'type' => 'text',
				'std'  => __( 'Thanks for reaching out! Someone from our team will get back to you soon.', 'beacon-for-helpscout' )
			)
		) ),
		'support' => apply_filters( 'beacon_settings_support', array(
			array(
				'id'   => 'support_header',
				'name' => __( 'Beacon For Help Scout Support', 'beacon-for-helpscout' ),
				'desc' => '',
				'type' => 'header'
			),
			array(
				'id'   => 'get_help',
				'name' => __( 'Need Some Help?', 'beacon-for-helpscout' ),
				'desc' => '',
				'type' => 'hook'
			),
			array(
				'id'   => 'system_info',
				'name' => __( 'System Info', 'beacon-for-helpscout' ),
				'desc' => '',
				'type' => 'sysinfo'
			)
		) )
	);

	return $beacon_settings;
}
add_filter( 'beacon_registered_settings', 'beacon_settings' );


/**
 * Display the help link
 *
 * @since       1.3.0
 * @return      void
 */
function beacon_display_help() {
	echo '<a href="https://section214.com/contact/?reason=product-support&product=beacon-for-help-scout&website=' . esc_url( get_site_url() ) . '" class="beacon-get-help button button-secondary" target="_blank"><span class="dashicons dashicons-sos"></span>' . __( 'Submit a Ticket', 'beacon' ) . '</a>';
}
add_action( 'beacon_get_help', 'beacon_display_help' );
