<?php


class Settings_Caldera_Grid_Module extends Caldera_Grid_Module{


	/**
	 * Start up
	 */
	public function __construct(){

		// add admin page
		add_action( 'admin_menu', array( $this, 'add_settings_pages' ), 25 );
		// save config
		add_action( 'wp_ajax_cgrd_save_config', array( $this, 'save_config') );
		
	}

	/**
	 * saves a config
	 */
	public function save_config(){

		if( empty( $_POST['caldera-grid-module-setup'] ) || !wp_verify_nonce( $_POST['caldera-grid-module-setup'], 'caldera-grid-module' ) ){
			if( empty( $_POST['config'] ) ){
				return;
			}
		}

		if( !empty( $_POST['caldera-grid-module-setup'] ) && empty( $_POST['config'] ) ){
			$config = stripslashes_deep( $_POST );
			update_option( '_caldera_grid_module', $config );
			wp_redirect( '?page=caldera_grid_module&updated=true' );
			exit;
		}

		if( !empty( $_POST['config'] ) ){
			$config = json_decode( stripslashes_deep( $_POST['config'] ), true );
			if(	wp_verify_nonce( $config['caldera-grid-module-setup'], 'caldera-grid-module' ) ){
				update_option( '_caldera_grid_module', $config );
				wp_send_json_success( $config );
			}
		}

		// nope
		wp_send_json_error( $config );

	}

	

	/**
	 * Add options page
	 */
	public function add_settings_pages(){
		// This page will be under "Settings"
	
			$this->plugin_screen_hook_suffix['caldera_grid_module'] =  add_menu_page( __( 'Caldera Grid Module', $this->plugin_slug ), __( 'Grid Module', $this->plugin_slug ), 'manage_options', 'caldera_grid_module', array( $this, 'create_admin_page' ) );
			add_action( 'admin_print_styles-' . $this->plugin_screen_hook_suffix['caldera_grid_module'], array( $this, 'enqueue_admin_stylescripts' ) );


	}


	/**
	 * Options page callback
	 */
	public function create_admin_page(){
		// Set class property        
		$screen = get_current_screen();
		$base = array_search($screen->id, $this->plugin_screen_hook_suffix);
			
		// include main template
		include CGRD_PATH .'includes/edit.php';

		// php based script include
		if( file_exists( CGRD_PATH .'assets/js/inline-scripts.php' ) ){
			echo "<script type=\"text/javascript\">\r\n";
				include CGRD_PATH .'assets/js/inline-scripts.php';
			echo "</script>\r\n";
		}

	}


}

if( is_admin() )
	$settings_caldera_grid_module = new Settings_Caldera_Grid_Module();
