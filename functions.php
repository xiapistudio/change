<?php
/***************************************

	Theme Name: 	Change Theme
	Theme URI: 		https://github.com/xiapistudio/change
	Description: 	Chage主题，虾皮工作室专用
	Version: 		1.0.0
	Author: 		虾皮工作室
	Author URI: 	http://www.xiapistudio.com/
	License:     	GNU General Public License v3.0
	License URI: 	http://www.gnu.org/licenses/gpl-3.0.html
	
***************************************/

define ('THEME_NAME',	"Change Theme" );
define ('THEME_FOLDER',	"change theme" );
define ('THEME_VER', 	"1.0.0");

/** 
 * File Security Check 
 * demo:D:\AppServ/
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/** 
 * Sets the path to the parent theme directory. 
 * demo:D:\AppServ/wp-content/themes/xiapi
 */
if ( !defined( 'THEME_DIR' ) ) {
	define( 'THEME_DIR', get_template_directory() );
}

/** 
 * Sets the path to the parent theme directory URI. 
 * demo:http://localhost/wp-content/themes/xiapi
 */
if ( !defined( 'THEME_URI' ) ) {
	define( 'THEME_URI', get_template_directory_uri() );
}

/**
 * Sets the path to the theme framework directory
 * demo:D:\AppServ/wp-content/themes/xiapi/framework
 */
if (!defined('THEME_FRA_DIR') ) {
	define('THEME_FRA_DIR', THEME_DIR . '/framework');
}

/** 
 * Sets the path to the parent theme directory URI. 
 * demo:http://localhost/wp-content/themes/xiapi/framework
 */
if ( !defined( 'THEME_FRA_URL' ) ) {
	define( 'THEME_FRA_URL', get_template_directory_uri() . '/framework' );
}


/**
 * OptionTree framework integration: Use in theme mode
 */
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_settings_import', '__return_true' );
add_filter( 'ot_show_settings_export', '__return_true' );
add_filter( 'ot_show_docs', '__return_false' );
load_template( THEME_FRA_DIR . '/admin/option-tree/ot-loader.php' );


if ( ! function_exists( 'fun_load' ) ) {
	function fun_load() {
		// Load theme options
		load_template( THEME_FRA_DIR . '/admin/theme-options.php' );	
			
		// Load custom widgets
		load_template( THEME_FRA_DIR . '/widgets.php' );
		
		// Load functions
		load_template( THEME_FRA_DIR . '/functions/theme-functions.php' );
		load_template( THEME_FRA_DIR . '/functions/common-scripts.php' );
		load_template( THEME_FRA_DIR . '/functions/metabox-custom.php' );
		
		// Load language
		// load_theme_textdomain('xiapistudio',THEME_DIR . '/languages');
		load_theme_textdomain( 'option-tree',THEME_FRA_DIR . '/admin/option-tree/languages');
	}
}
add_action( 'after_setup_theme', 'fun_load' );
