<?php
/**
 * @package   Caldera_Grid_Module
 * @author    David <david@digilab.co.za>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 David <david@digilab.co.za>
 *
 * @wordpress-plugin
 * Plugin Name: Caldera Grid Module
 * Plugin URI:  
 * Description: GRid module for yellowstone
 * Version:     0.0.1
 * Author:      David <david@digilab.co.za>
 * Author URI:  http://digilab.co.za/
 * Text Domain: caldera-grid-module
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('CGRD_PATH',  plugin_dir_path( __FILE__ ) );
define('CGRD_URL',  plugin_dir_url( __FILE__ ) );
define('CGRD_VER',  '0.0.1' );



// load internals
require_once( CGRD_PATH . '/classes/caldera-grid-module.php' );
require_once( CGRD_PATH . '/classes/options.php' );
require_once( CGRD_PATH . 'includes/settings.php' );

// Load instance
add_action( 'plugins_loaded', array( 'Caldera_Grid_Module', 'get_instance' ) );