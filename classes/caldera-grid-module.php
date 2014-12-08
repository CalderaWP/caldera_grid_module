<?php
/**
 * Caldera Grid Module.
 *
 * @package   Caldera_Grid_Module
 * @author    David <david@digilab.co.za>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 David <david@digilab.co.za>
 */

/**
 * Plugin class.
 * @package Caldera_Grid_Module
 * @author  David <david@digilab.co.za>
 */
class Caldera_Grid_Module {

	/**
	 * @var      string
	 */
	protected $plugin_slug = 'caldera-grid-module';
	/**
	 * @var      object
	 */
	protected static $instance = null;
	/**
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;
	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 */
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Activate plugin when new blog is added
		add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

		// Load admin style sheet and JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_stylescripts' ) );

	}


	/**
	 * Return an instance of this class.
	 *
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain( $this->plugin_slug, FALSE, basename( CGRD_PATH ) . '/languages');

	}
	
	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 *
	 * @return    null
	 */
	public function enqueue_admin_stylescripts() {

		$screen = get_current_screen();

		
		if( false !== strpos( $screen->base, 'caldera_grid_module' ) ){
			
			wp_enqueue_style( 'caldera_grid_module-core-style', CGRD_URL . '/assets/css/styles.css' );
			wp_enqueue_style( 'caldera_grid_module-core-grid', CGRD_URL . '/assets/css/grid.css' );
			wp_enqueue_style( 'caldera_grid_module-baldrick-modals', CGRD_URL . '/assets/css/modals.css' );
			wp_enqueue_script( 'caldera_grid_module-wp-baldrick', CGRD_URL . '/assets/js/wp-baldrick-full.js', array( 'jquery' ) , false, true );
			wp_enqueue_script( 'jquery-ui-autocomplete' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_style( 'caldera_grid_module-codemirror-style', CGRD_URL . '/assets/css/codemirror.css' );
			wp_enqueue_script( 'caldera_grid_module-codemirror-script', CGRD_URL . '/assets/js/codemirror.js', array( 'jquery' ) , false );
			wp_enqueue_script( 'caldera_grid_module-core-script', CGRD_URL . '/assets/js/scripts.js', array( 'caldera_grid_module-wp-baldrick' ) , false );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );			
		
		}


	}


}















