<?php
/**
 * Plugin Name:     Beacon For Help Scout
 * Plugin URI:      http://wordpress.org/plugins/beacon-for-helpscout
 * Description:     Integrate Beacon from Help Scout into your WordPress site
 * Version:         1.3.0
 * Author:          Daniel J Griffiths
 * Author URI:      https://section214.com
 * Text Domain:     beacon
 *
 * @package         Beacon
 * @author          Daniel J Griffiths <dgriffiths@section214.com>
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'Beacon' ) ) {


	/**
	 * Main Beacon class
	 *
	 * @since       1.0.0
	 */
	class Beacon {


		/**
		 * @var         Beacon $instance The one true Beacon
		 * @since       1.0.0
		 */
		private static $instance;


		/**
		 * @var         object $settings The Beacon settings object
		 * @since       1.0.0
		 */
		public $settings;


		/**
		 * Get active instance
		 *
		 * @access      public
		 * @since       1.0.0
		 * @return      self::$instance The one true Beacon
		 */
		public static function instance() {
			if ( ! self::$instance ) {
				self::$instance = new Beacon();
				self::$instance->setup_constants();
				self::$instance->load_textdomain();
				self::$instance->includes();
			}

			return self::$instance;
		}


		/**
		 * Setup plugin constants
		 *
		 * @access      public
		 * @since       1.0.0
		 * @return      void
		 */
		public function setup_constants() {
			// Plugin version
			define( 'BEACON_VER', '1.3.0' );

			// Plugin path
			define( 'BEACON_DIR', plugin_dir_path( __FILE__ ) );

			// Plugin URL
			define( 'BEACON_URL', plugin_dir_url( __FILE__ ) );
		}


		/**
		 * Include necessary files
		 *
		 * @access      private
		 * @since       1.0.0
		 * @global		array $beacon_options The Beacon options array
		 * @return      void
		 */
		private function includes() {
			global $beacon_options;

			if ( ! class_exists( 'S214_Settings' ) ) {
				require_once BEACON_DIR . 'includes/libraries/s214-settings/source/class.s214-settings.php';
			}

			$this->settings = new S214_Settings( 'beacon', 'general' );
			$beacon_options = $this->settings->get_settings();

			require_once BEACON_DIR . 'includes/scripts.php';
			require_once BEACON_DIR . 'includes/functions.php';
			require_once BEACON_DIR . 'includes/shortcodes.php';
			require_once BEACON_DIR . 'includes/admin/settings/register.php';
		}


		/**
		 * Internationalization
		 *
		 * @access      public
		 * @since       1.0.0
		 * @return      void
		 */
		public function load_textdomain() {
			// Set filter for language directory
			$lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
			$lang_dir = apply_filters( 'beacon_for_helpscout_language_directory', $lang_dir );

			// Traditional WordPress plugin locale filter
			$locale = apply_filters( 'plugin_locale', get_locale(), '' );
			$mofile = sprintf( '%1$s-%2$s.mo', 'beacon-for-helpscout', $locale );

			// Setup paths to current locale file
			$mofile_local  = $lang_dir . $mofile;
			$mofile_global = WP_LANG_DIR . '/beacon-for-helpscout/' . $mofile;

			if ( file_exists( $mofile_global ) ) {
				// Look in global /wp-content/languages/beacon-for-helpscout/ folder
				load_textdomain( 'beacon-for-helpscout', $mofile_global );
			} elseif ( file_exists( $mofile_local ) ) {
				// Look in local /wp-content/plugins/beacon-for-helpscout/languages/ folder
				load_textdomain( 'beacon-for-helpscout', $mofile_local );
			} else {
				// Load the default language files
				load_plugin_textdomain( 'beacon-for-helpscout', false, $lang_dir );
			}
		}
	}
}


/**
 * The main function responsible for returning the one true Beacon
 * instance to functions everywhere
 *
 * @since       1.0.0
 * @return      Beacon The one true Beacon
 */
function beacon() {
	return Beacon::instance();
}
add_action( 'plugins_loaded', 'beacon' );
