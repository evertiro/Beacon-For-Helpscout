<?php
/**
 * Register settings
 *
 * @package     Beacon\Admin\Settings\Register
 * @since       1.0.0
 */


// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


/**
 * Retrieve the settings tabs
 *
 * @since       1.0.0
 * @return      array $tabs The registered settings tabs
 */
function beacon_get_settings_tabs() {
	$settings = beacon_get_registered_settings();

	$tabs               = array();
	$tabs['general']    = __( 'General', 'beacon-for-helpscout' );
	$tabs['customize']  = __( 'Customize', 'beacon-for-helpscout' );

	// Translation doesn't work yet!
	//$tabs['strings']    = __( 'Text Strings', 'beacon-for-helpscout' );

	return apply_filters( 'beacon_settings_tabs', $tabs );
}


/**
 * Retrieve the array of plugin settings
 *
 * @since       1.0.0
 * @return      array $beacon_settings The registered settings
 */
function beacon_get_registered_settings() {
	$beacon_settings = array(
		// Settings
		'general' => apply_filters( 'beacon_settings_general', array(
			array(
				'id'        => 'general_header',
				'name'      => __( 'General Settings', 'beacon-for-helpscout' ),
				'desc'      => '',
				'type'      => 'header'
			),
			array(
				'id'        => 'enable_docs',
				'name'      => __( 'Enable Docs Search', 'beacon-for-helpscout' ),
				'desc'      => __( 'Display the docs search form in Beacon', 'beacon-for-helpscout' ),
				'type'      => 'checkbox'
			),
			array(
				'id'        => 'enable_contact',
				'name'      => __( 'Enable Contact Form', 'beacon-for-helpscout' ),
				'desc'      => __( 'Display a contact form in Beacon', 'beacon-for-helpscout' ),
				'type'      => 'checkbox'
			),
			array(
				'id'        => 'helpscout_url',
				'name'      => __( 'HelpScout Subdomain', 'beacon-for-helpscout' ),
				'desc'      => sprintf( __( 'Enter the subdomain for your HelpScout Docs instance found <a href="%s" target="_blank">here</a>', 'beacon-for-helpscout' ), 'https://secure.helpscout.net/settings/docs/site' ),
				'type'      => 'text'
			),
			array(
				'id'        => 'form_id',
				'name'      => __( 'Form ID', 'beacon-for-helpscout' ),
				'desc'      => sprintf( __( 'Enter the form ID for your Beacon found <a href="%s" target="_blank">here</a>', 'beacon-for-helpscout' ), 'https://secure.helpscout.net/settings/beacons/' ),
				'type'      => 'text'
			)
		) ),
		'customize' => apply_filters( 'beacon_settings_customize', array(
			array(
				'id'        => 'default_color',
				'name'      => __( 'Default Color', 'beacon-for-helpscout' ),
				'desc'      => __( 'Specify the default color for Beacon elements', 'beacon-for-helpscout' ),
				'type'      => 'color',
				'std'       => '#31A8D9'
			),
			array(
				'id'        => 'icon',
				'name'      => __( 'Icon', 'beacon-for-helpscout' ),
				'desc'      => __( 'Select the icon for the popup button', 'beacon-for-helpscout' ),
				'type'      => 'select',
				'options'   => array(
					'bouy'      => __( 'Bouy', 'beacon-for-helpscout' ),
					'beacon'    => __( 'Beacon', 'beacon-for-helpscout' ),
					'message'   => __( 'Message', 'beacon-for-helpscout' ),
					'question'  => __( 'Question', 'beacon-for-helpscout' ),
					'search'    => __( 'Search', 'beacon-for-helpscout' )
				),
				'std'       => 'bouy'
			),
			array(
				'id'        => 'top_articles',
				'name'      => __( 'Display Top Articles', 'beacon-for-helpscout' ),
				'desc'      => __( 'Check to display top articles automatically instead of just the search box', 'beacon-for-helpscout' ),
				'type'      => 'checkbox'
			),
			array(
				'id'        => 'attachments',
				'name'      => __( 'Enable Attachments', 'beacon-for-helpscout' ),
				'desc'      => __( 'Check to enable attachments in the contact form', 'beacon-for-helpscout' ),
				'type'      => 'checkbox',
				'std'       => true
			),
			array(
				'id'        => 'powered_by',
				'name'      => __( 'Hide Powered By Text', 'beacon-for-helpscout' ),
				'desc'      => __( 'By default, beacons display a \'Powered By Help Scout\' line on the contact form confirmation dialog. Select this to disable it.', 'beacon-for-helpscout' ),
				'type'      => 'checkbox'
			),
			array(
				'id'        => 'instructions',
				'name'      => __( 'Instructions', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter custom text to display on top of the contact form', 'beacon-for-helpscout' ),
				'type'      => 'text'
			),
		) ),
		'strings' => apply_filters( 'beacon_settings_strings', array(
			array(
				'id'        => 'search_label',
				'name'      => __( 'Search Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Search label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'What can we help you with?', 'beacon-for-helpscout' )
			),
			array(
				'id'        => 'search_error_label',
				'name'      => __( 'Search Error Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Search error label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Your search timed out. Please double-check your internet connection and try again.', 'beacon-for-helpscout' )
			),
			array(
				'id'        => 'no_results_label',
				'name'      => __( 'No Results Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the No Results label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'No results found for', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'contact_label',
				'name'      => __( 'Contact Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Contact label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Send a Message', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'attach_file_label',
				'name'      => __( 'Attach File Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Attach File label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Attach a file', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'attach_file_error',
				'name'      => __( 'Attach File Error', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Attach File error', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'The maximum file size is 10mb', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'name_label',
				'name'      => __( 'Name Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Name label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Your Name', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'name_error',
				'name'      => __( 'Name Error Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Name error label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Please enter your name', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'email_label',
				'name'      => __( 'Email Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Email label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Email address', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'email_error',
				'name'      => __( 'Email Error Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Email error label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Please enter a valid email address', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'subject_label',
				'name'      => __( 'Subject Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Subject label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Subject', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'subject_error',
				'name'      => __( 'Subject Error Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Subject error label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Please enter a subject', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'message_label',
				'name'      => __( 'Message Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Message label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'How can we help you?', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'message_error',
				'name'      => __( 'Message Error Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Message error label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Please enter a message', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'success_label',
				'name'      => __( 'Contact Success Label', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Contact success label', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Message sent!', 'beacon-for-helpscout' ),
			),
			array(
				'id'        => 'success_desc',
				'name'      => __( 'Contact Success Description', 'beacon-for-helpscout' ),
				'desc'      => __( 'Enter the text for the Contact success description', 'beacon-for-helpscout' ),
				'type'      => 'text',
				'std'       => __( 'Thanks for reaching out! Someone from our team will get back to you soon.', 'beacon-for-helpscout' )
			)
		) )
	);

	return apply_filters( 'beacon_registered_settings', $beacon_settings );
}


/**
 * Retrieve an option
 *
 * @since       1.0.0
 * @global      array $beacon_options The Beacon options
 * @return      mixed
 */
function beacon_get_option( $key = '', $default = false ) {
	global $beacon_options;

	$value = ! empty( $beacon_options[$key] ) ? $beacon_options[$key] : $default;
	$value = apply_filters( 'beacon_get_option', $value, $key, $default );

	return apply_filters( 'beacon_get_option_' . $key, $value, $key, $default );
}


/**
 * Retrieve all options
 *
 * @since       1.0.0
 * @return      array $beacon_options The Beacon options
 */
function beacon_get_settings() {
	$beacon_settings = get_option( 'beacon_settings' );

	if( empty( $beacon_settings ) ) {
		$beacon_settings = array();

		update_option( 'beacon_settings', $beacon_settings );
	}

	return apply_filters( 'beacon_get_settings', $beacon_settings );
}


/**
 * Add settings sections and fields
 *
 * @since       1.0.0
 * @return      void
 */
function beacon_register_settings() {
	if( get_option( 'beacon_settings' ) == false ) {
		add_option( 'beacon_settings' );
	}

	foreach( beacon_get_registered_settings() as $tab => $settings ) {
		add_settings_section(
			'beacon_settings_' . $tab,
			__return_null(),
			'__return_false',
			'beacon_settings_' . $tab
		);

		foreach( $settings as $option ) {
			$name = isset( $option['name'] ) ? $option['name'] : '';

			add_settings_field(
				'beacon_settings[' . $option['id'] . ']',
				$name,
				function_exists( 'beacon_' . $option['type'] . '_callback' ) ? 'beacon_' . $option['type'] . '_callback' : 'beacon_missing_callback',
				'beacon_settings_' . $tab,
				'beacon_settings_' . $tab,
				array(
					'section'       => $tab,
					'id'            => isset( $option['id'] )           ? $option['id']             : null,
					'desc'          => ! empty( $option['desc'] )       ? $option['desc']           : '',
					'name'          => isset( $option['name'] )         ? $option['name']           : null,
					'size'          => isset( $option['size'] )         ? $option['size']           : null,
					'options'       => isset( $option['options'] )      ? $option['options']        : '',
					'std'           => isset( $option['std'] )          ? $option['std']            : '',
					'min'           => isset( $option['min'] )          ? $option['min']            : null,
					'max'           => isset( $option['max'] )          ? $option['max']            : null,
					'step'          => isset( $option['step'] )         ? $option['step']           : null,
					'placeholder'   => isset( $option['placeholder'] )  ? $option['placeholder']    : null,
					'rows'          => isset( $option['rows'] )         ? $option['rows']           : null,
					'buttons'       => isset( $option['buttons'] )      ? $option['buttons']        : null,
					'wpautop'       => isset( $option['wpautop'] )      ? $option['wpautop']        : null,
					'teeny'         => isset( $option['teeny'] )        ? $option['teeny']          : null,
					'notice'        => isset( $option['notice'] )       ? $option['notice']         : false,
					'style'         => isset( $option['style'] )        ? $option['style']          : null,
					'header'        => isset( $option['header'] )       ? $option['header']         : null,
					'icon'          => isset( $option['icon'] )         ? $option['icon']           : null,
					'class'         => isset( $option['class'] )        ? $option['class']          : null
				)
			);
		}
	}

	register_setting( 'beacon_settings', 'beacon_settings', 'beacon_settings_sanitize' );
}
add_action( 'admin_init', 'beacon_register_settings' );


/**
 * Settings sanitization
 *
 * @since       1.0.0
 * @param       array $input The value entered in the field
 * @global      array $beacon_options The Beacon options
 * @return      string $input The sanitized value
 */
function beacon_settings_sanitize( $input = array() ) {
	global $beacon_options;

	if( empty( $_POST['_wp_http_referer'] ) ) {
		return $input;
	}

	parse_str( $_POST['_wp_http_referer'], $referrer );

	$settings   = beacon_get_registered_settings();
	$tab        = isset( $referrer['tab'] ) ? $referrer['tab'] : 'general';

	$input = $input ? $input : array();
	$input = apply_filters( 'beacon_settings_' . $tab . '_sanitize', $input );

	foreach( $input as $key => $value ) {
		$type = isset( $settings[$tab][$key]['type'] ) ? $settings[$tab][$key]['type'] : false;

		if( $type ) {
			// Field type specific filter
			$input[$key] = apply_filters( 'beacon_settings_sanitize_' . $type, $value, $key );
		}

		// General filter
		$input[$key] = apply_filters( 'beacon_settings_sanitize', $input[$key], $key );
	}

	if( ! empty( $settings[$tab] ) ) {
		foreach( $settings[$tab] as $key => $value ) {
			if( is_numeric( $key ) ) {
				$key = $value['id'];
			}

			if( empty( $input[$key] ) || ! isset( $input[$key] ) ) {
				unset( $beacon_options[$key] );
			}
		}
	}

	// Merge our new settings with the existing
	$input = array_merge( $beacon_options, $input );

	add_settings_error( 'beacon-notices', '', __( 'Settings updated.', 'beacon-for-helpscout' ), 'updated' );

	return $input;
}


/**
 * Sanitize text fields
 *
 * @since       1.0.0
 * @param       array $input The value entered in the field
 * @return      string $input The sanitized value
 */
function beacon_sanitize_text_field( $input ) {
	return trim( $input );
}
add_filter( 'beacon_settings_sanitize_text', 'beacon_sanitize_text_field' );


/**
 * Header callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @return      void
 */
function beacon_header_callback( $args ) {
	echo '<hr />';
}


/**
 * Checkbox callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @global      array $beacon_options The Beacon options
 * @return      void
 */
function beacon_checkbox_callback( $args ) {
	global $beacon_options;

	$checked = isset( $beacon_options[$args['id']] ) ? checked( 1, $beacon_options[$args['id']], false ) : '';

	$html  = '<input type="checkbox" id="beacon_settings[' . $args['id'] . ']" name="beacon_settings[' . $args['id'] . ']" value="1" ' . $checked . '/>&nbsp;';
	$html .= '<label for="beacon_settings[' . $args['id'] . ']">' . $args['desc'] . '</label>';

	echo $html;
}


/**
 * Color callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the settings
 * @global      array $beacon_options The Beacon options
 * @return      void
 */
function beacon_color_callback( $args ) {
	global $beacon_options;

	if( isset( $beacon_options[$args['id']] ) ) {
		$value = $beacon_options[$args['id']];
	} else {
		$value = isset( $args['std'] ) ? $args['std'] : '';
	}

	$default = isset( $args['std'] ) ? $args['std'] : '';
	$size    = ( isset( $args['size'] ) && ! is_null( $args['size'] ) ) ? $args['size'] : 'regular';

	$html  = '<input type="text" class="beacon-color-picker" id="beacon_settings[' . $args['id'] . ']" name="beacon_settings[' . $args['id'] . ']" value="' . esc_attr( $value ) . '" data-default-color="' . esc_attr( $default ) . '" />&nbsp;';
	$html .= '<span class="beacon-color-picker-label"><label for="beacon_settings[' . $args['id'] . ']">' . $args['desc'] . '</label></span>';

	echo $html;
}


/**
 * Editor callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @global      array $beacon_options The Beacon options
 * @return      void
 */
function beacon_editor_callback( $args ) {
	global $beacon_options;

	if( isset( $beacon_options[$args['id']] ) ) {
		$value = $beacon_options[$args['id']];
	} else {
		$value = isset( $args['std'] ) ? $args['std'] : '';
	}

	$rows       = ( isset( $args['rows'] ) && ! is_numeric( $args['rows'] ) ) ? $args['rows'] : '10';
	$wpautop    = isset( $args['wpautop'] ) ? $args['wpautop'] : true;
	$buttons    = isset( $args['buttons'] ) ? $args['buttons'] : true;
	$teeny      = isset( $args['teeny'] ) ? $args['teeny'] : false;

	wp_editor(
		$value,
		'beacon_settings_' . $args['id'],
		array(
			'wpautop'       => $wpautop,
			'media_buttons' => $buttons,
			'textarea_name' => 'beacon_settings[' . $args['id'] . ']',
			'textarea_rows' => $rows,
			'teeny'         => $teeny
		)
	);
	echo '<br /><label for="beacon_settings[' . $args['id'] . ']">' . $args['desc'] . '</label>';
}


/**
 * Multicheck callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @global      array $beacon_options The Beacon options
 * @return      void
 */
function beacon_multicheck_callback( $args ) {
	global $beacon_options;

	if( ! empty( $args['options'] ) ) {
		foreach( $args['options'] as $key => $option ) {
			$enabled = ( isset( $beacon_options[$args['id']][$key] ) ? $option : NULL );

			echo '<input name="beacon_settings[' . $args['id'] . '][' . $key . ']" id="beacon_settings[' . $args['id'] . '][' . $key . ']" type="checkbox" value="' . $option . '" ' . checked( $option, $enabled, false ) . ' />&nbsp;';
			echo '<label for="beacon_settings[' . $args['id'] . '][' . $key . ']">' . $option . '</label><br />';
		}
		echo '<p class="description">' . $args['desc'] . '</p>';
	}
}


/**
 * Number callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @global      array $beacon_options The Beacon options
 * @return      void
 */
function beacon_number_callback( $args ) {
	global $beacon_options;

	if( isset( $beacon_options[$args['id']] ) ) {
		$value = $beacon_options[$args['id']];
	} else {
		$value = isset( $args['std'] ) ? $args['std'] : '';
	}

	$max    = isset( $args['max'] ) ? $args['max'] : 999999;
	$min    = isset( $args['min'] ) ? $args['min'] : 0;
	$step   = isset( $args['step'] ) ? $args['step'] : 1;
	$size   = ( isset( $args['size'] ) && ! is_null( $args['size'] ) ) ? $args['size'] : 'regular';

	$html  = '<input type="number" step="' . esc_attr( $step ) . '" max="' . esc_attr( $max ) . '" min="' . esc_attr( $min ) . '" class="' . $size . '-text" id="beacon_settings[' . $args['id'] . ']" name="beacon_settings[' . $args['id'] . ']" value="' . esc_attr( stripslashes( $value ) ) . '" />&nbsp;';
	$html .= '<label for="beacon_settings[' . $args['id'] . ']">' . $args['desc'] . '</label>';

	echo $html;
}


/**
 * Password callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the settings
 * @global      array $beacon_options The Beacon options
 * @return      void
 */
function beacon_password_callback( $args ) {
	global $beacon_options;

	if( isset( $beacon_options[$args['id']] ) ) {
		$value = $beacon_options[$args['id']];
	} else {
		$value = isset( $args['std'] ) ? $args['std'] : '';
	}

	$size = ( isset( $args['size'] ) && ! is_null( $args['size'] ) ) ? $args['size'] : 'regular';

	$html  = '<input type="password" class="' . $size . '-text" id="beacon_settings[' . $args['id'] . ']" name="beacon_settings[' . $args['id'] . ']" value="' . esc_attr( $value )  . '" />&nbsp;';
	$html .= '<label for="beacon_settings[' . $args['id'] . ']">' . $args['desc'] . '</label>';

	echo $html;
}


/**
 * Radio callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @global      array $beacon_options The Beacon options
 * @return      void
 */
function beacon_radio_callback( $args ) {
	global $beacon_options;

	if( ! empty( $args['options'] ) ) {
		foreach( $args['options'] as $key => $option ) {
			$checked = false;

			if( isset( $beacon_options[$args['id']] ) && $beacon_options[$args['id']] == $key ) {
				$checked = true;
			} elseif( isset( $args['std'] ) && $args['std'] == $key && ! isset( $beacon_options[$args['id']] ) ) {
				$checked = true;
			}

			echo '<input name="beacon_settings[' . $args['id'] . ']" id="beacon_settings[' . $args['id'] . '][' . $key . ']" type="radio" value="' . $key . '" ' . checked( true, $checked, false ) . '/>&nbsp;';
			echo '<label for="beacon_settings[' . $args['id'] . '][' . $key . ']">' . $option . '</label><br />';
		}

		echo '<p class="description">' . $args['desc'] . '</p>';
	}
}


/**
 * Select callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @global      array $beacon_options The Beacon options
 * @return      void
 */
function beacon_select_callback( $args ) {
	global $beacon_options;

	if( isset( $beacon_options[$args['id']] ) ) {
		$value = $beacon_options[$args['id']];
	} else {
		$value = isset( $args['std'] ) ? $args['std'] : '';
	}

	$placeholder = isset( $args['placeholder'] ) ? $args['placeholder'] : '';

	$html = '<select id="beacon_settings[' . $args['id'] . ']" name="beacon_settings[' . $args['id'] . ']" placeholder="' . $placeholder . '" />';

	foreach( $args['options'] as $option => $name ) {
		$selected = selected( $option, $value, false );

		$html .= '<option value="' . $option . '" ' . $selected . '>' . $name . '</option>';
	}

	$html .= '</select>&nbsp;';
	$html .= '<label for="beacon_settings[' . $args['id'] . ']">' . $args['desc'] . '</label>';

	echo $html;
}


/**
 * Text callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @global      array $beacon_options The Beacon options
 * @return      void
 */
function beacon_text_callback( $args ) {
	global $beacon_options;

	if( isset( $beacon_options[$args['id']] ) ) {
		$value = $beacon_options[$args['id']];
	} else {
		$value = isset( $args['std'] ) ? $args['std'] : '';
	}

	$size = ( isset( $args['size'] ) && ! is_null( $args['size'] ) ) ? $args['size'] : 'regular';

	$html  = '<input type="text" class="' . $size . '-text" id="beacon_settings[' . $args['id'] . ']" name="beacon_settings[' . $args['id'] . ']" value="' . esc_attr( stripslashes( $value ) )  . '" />&nbsp;';
	$html .= '<label for="beacon_settings[' . $args['id'] . ']">' . $args['desc'] . '</label>';

	echo $html;
}


/**
 * Textarea callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @global      array $beacon_options The Beacon options
 * @return      void
 */
function beacon_textarea_callback( $args ) {
	global $beacon_options;

	if( isset( $beacon_options[$args['id']] ) ) {
		$value = $beacon_options[$args['id']];
	} else {
		$value = isset( $args['std'] ) ? $args['std'] : '';
	}

	$html  = '<textarea class="large-text" cols="50" rows="5" id="beacon_settings[' . $args['id'] . ']" name="beacon_settings[' . $args['id'] . ']">' . esc_textarea( stripslashes( $value ) ) . '</textarea>&nbsp;';
	$html .= '<label for="beacon_settings[' . $args['id'] . ']">' . $args['desc'] . '</label>';

	echo $html;
}


/**
 * Upload callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @global      array $beacon_options The Beacon options
 * @return      void
 */
function beacon_upload_callback( $args ) {
	global $beacon_options;

	if( isset( $beacon_options[$args['id']] ) ) {
		$value = $beacon_options[$args['id']];
	} else {
		$value = isset( $args['std'] ) ? $args['std'] : '';
	}

	$size = ( isset( $args['size'] ) && ! is_null( $args['size'] ) ) ? $args['size'] : 'regular';

	$html  = '<input type="text" class="' . $size . '-text" id="beacon_settings[' . $args['id'] . ']" name="beacon_settings[' . $args['id'] . ']" value="' . esc_attr( stripslashes( $value ) ) . '" />&nbsp;';
	$html .= '<span><input type="button" class="beacon_settings_upload_button button-secondary" value="' . __( 'Upload File', 'beacon-for-helpscout' ) . '" /></span>&nbsp;';
	$html .= '<label for="beacon_settings[' . $args['id'] . ']">' . $args['desc'] . '</label>';

	echo $html;
}


/**
 * Hook callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @return      void
 */
function beacon_hook_callback( $args ) {
	do_action( 'beacon_' . $args['id'] );
}


/**
 * Missing callback
 *
 * @since       1.0.0
 * @param       array $args Arguments passed by the setting
 * @return      void
 */
function beacon_missing_callback( $args ) {
	printf( __( 'The callback function used for the <strong>%s</strong> setting is missing.', 'beacon-for-helpscout' ), $args['id'] );
}
