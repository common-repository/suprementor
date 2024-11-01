<?php
/**
* Plugin Name: Supreme Products & Posts
* Description: Database powered Elementor widgets for building blogs and shops.
* Plugin URI:  https://supremepap.com
* Version:     1.0.0
* Author:      Sam Wright
* Text Domain: suprementor
*/

namespace Suprementor;

if ( ! defined( 'ABSPATH' ) ) exit;

define('SUPREMENTOR', true );
define('SUPREMENTOR_PATH', plugin_dir_path( __FILE__ ) );

/**
* The main class that initiates and runs the plugin.
*/

class Instance {

	/**
	* Holds the plugins current version
	*/
	const VERSION = '1.0.0';

	/**
	* The minimum required elementor version
	*/
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	* The minimum required PHP version
	*/
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	* The minimum required WP version
	*/
	const MINIMUM_WP_VERSION = '5.3';

	/**
	* Instance
	*/
	private static $_instance = null;

	/**
	* Modules Manager
	*/
	public $module_manager;

	/**
	* Instance
	*/
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	* Constructor
	*/
	public function __construct() {
		$this->register_autoloader();
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	* Register Autoloader
	*/
	private function register_autoloader() {
		spl_autoload_register( [ $this, 'autoload' ] );
	}

	/**
	* Autoload
	*/
	public function autoload( $class ) {
		if ( strpos( $class, 'Suprementor\\' ) !== false ) {
			if ( ! class_exists( $class ) ) {
				$filename = str_replace( 'Suprementor\\', '', $class );
				$filename = str_replace( '\\', '/', $filename );
				$filename = str_replace( '_', '-', $filename );
				$filename = strtolower( $filename );
				$filename = SUPREMENTOR_PATH . $filename . '.php';
				if ( is_readable( $filename ) ) {
					include_once( $filename );
				}
			}
		}
	}

	/**
	* Initialize the plugin
	*
	* Load the plugin only after Elementor (and other plugins) are loaded.
	* Checks for basic plugin requirements, if one check fail don't continue,
	* if all check have passed load the files required to run the plugin.
	*
	* Fired by `plugins_loaded` action hook.
	*
	*/
	public function init() {

		global $wp_version;

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( ! version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Check for required WP version
		if ( ! version_compare( $wp_version, self::MINIMUM_WP_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_wp_version' ] );
			return;
		}

		// broadcast that the checks were passed
		do_action( 'suprementor/loaded' );

		// Load elementor modules
		$this->module_manager = new \Suprementor\Managers\Module_Manager();

		// Add image sizes
		add_action( 'init', [ $this, 'init_image_sizes' ] );

		// Add custom widget controls
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

		// Add widget categories
		add_action( 'elementor/elements/categories_registered', [ $this, 'init_widget_categories' ] );

		// Add scripts
		add_action( 'wp_enqueue_scripts', [ $this, 'scripts' ] );

		// add acf fields if acf is installed and activate
		add_action('acf/init', [ $this, 'add_acf_fields' ] );

	}

	/**
	* Adds the required image sizes used by the plugin.
	*/
	public function init_image_sizes() {

		add_image_size('suprementor_extra_small', 50, 50, true);
		add_image_size('suprementor_small', 90, 90, true);
		add_image_size('suprementor_medium', 555, 450, true);
		add_image_size('suprementor_wide', 670, 420, true);
		add_image_size('suprementor_large', 1024, 1024, true);
		add_image_size('suprementor_wide_small', 585, 250, true);
		add_image_size('suprementor_wide_large', 1170, 500, true);
		add_image_size('suprementor_hd', 1280, 720, true);
		add_image_size('suprementor_fhd', 1920, 1080, true);
		add_image_size('suprementor_tall_small', 360, 450, true);
		add_image_size('suprementor_tall_small_alt', 360, 595, true);
		add_image_size('suprementor_tall_large', 720, 900, true);
		add_image_size('suprementor_tall_top', 360, 450, [ 'center', 'top' ] );
		add_image_size('suprementor_tall_top_large', 720, 900, [ 'center', 'top'] );

	}

	/**
	* Include controls files and register them.
	*/
	public function init_controls() {

		\Elementor\Plugin::$instance->controls_manager->add_group_control( \Suprementor\Group_Controls\Get_Post::get_type(), new \Suprementor\Group_Controls\Get_Post() );
		\Elementor\Plugin::$instance->controls_manager->add_group_control( \Suprementor\Group_Controls\Get_Posts::get_type(), new \Suprementor\Group_Controls\Get_Posts() );

	}

	/**
	* Includes categories for custom widgets.
	*/
	public function init_widget_categories($elements_manager) {

		$elements_manager->add_category(
			'suprementor',
			[
				'title' => __( 'Supreme', 'suprementor' ),
				'icon' => 'fa fa-plug',
			]
		);

	}

	/**
	* Includes css and js.
	*/
	public function scripts() {

		wp_enqueue_style( 'suprementor-uikit', plugins_url( '/assets/suprementor-uikit.css', __FILE__ ), array(), self::VERSION );
		wp_enqueue_script( 'suprementor-uikit', plugins_url( '/assets/suprementor-uikit.js', __FILE__ ), array(), self::VERSION );
		wp_enqueue_script( 'suprementor-uikit-icons', plugins_url( '/assets/suprementor-uikit-icons.js', __FILE__ ), array(), self::VERSION );

	}

	/**
	* Adds the acf fields if the acf init action was done.
	*/
	public function add_acf_fields() {

		\Suprementor\Acf\Acf::add_fields();

	}

	/**
	* Warning when the site doesn't have Elementor installed or activated.
	*/
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'suprementor' ),
			'<strong>' . esc_html__( 'Suprementor', 'suprementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'suprementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-error is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	* Warning when the site doesn't have a minimum required Elementor version.
	*/
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'suprementor' ),
			'<strong>' . esc_html__( 'Suprementor', 'suprementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'suprementor' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-error is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	* Warning when the site doesn't have a minimum required PHP version.
	*/
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'suprementor' ),
			'<strong>' . esc_html__( 'Suprementor', 'suprementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'suprementor' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-error is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	* Warning when the site doesn't have a minimum required WP version.
	*/
	public function admin_notice_minimum_wp_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'suprementor' ),
			'<strong>' . esc_html__( 'Suprementor', 'suprementor' ) . '</strong>',
			'<strong>' . esc_html__( 'WordPress', 'suprementor' ) . '</strong>',
			self::MINIMUM_WP_VERSION
		);

		printf( '<div class="notice notice-error is-dismissible"><p>%1$s</p></div>', $message );

	}

}

\Suprementor\Instance::instance();
