<?php
/* 
 * Plugin Name: Quick WordPress Customizer
 * Plugin URI:  https://smartik.ws/
 * Description: Create customizer controls quick and easy. It allows to exclude most of the options that are required in default WordPress Customizer.
 * Author:      Smartik
 * Version:     1.0
 * Author URI:  http://smartik.ws/
 * Licence:     GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Copyright:   (c) 2015 Smartik. All rights reserved
 */

/*
-------------------------------------------------------------------------------
Determine if this file is loaded as a plugin or in theme
-------------------------------------------------------------------------------
*/
function qwc_is_plugin(){
	$current_dir = dirname(__FILE__);
	$current_dir = str_replace("\\", "/", $current_dir);
	$is_plugin   = (strpos($current_dir,'wp-content/plugins') !== false);

	return $is_plugin;
}

/*
-------------------------------------------------------------------------------
Get the url to the plugin root
-------------------------------------------------------------------------------
*/
function qwc_root_url(){
	if( qwc_is_plugin() ){
		$url = trailingslashit( plugin_dir_url( __FILE__ ) );
	}
	else{
		$url = trailingslashit( get_template_directory_uri() ) . basename( dirname(__FILE__) ) .'/';
	}
	return $url;
}

/*
-------------------------------------------------------------------------------
Define PATH and URI constants
-------------------------------------------------------------------------------
*/
if( !defined( 'QWC_PATH' ) ) define('QWC_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
if( !defined( 'QWC_URI' ) )  define('QWC_URI', qwc_root_url() );

/*
-------------------------------------------------------------------------------
All registered custom controls
-------------------------------------------------------------------------------
*/
function qwc_custom_controls(){
	return apply_filters( 'qwc_custom_controls', array() );
}

/*
-------------------------------------------------------------------------------
Include sources
-------------------------------------------------------------------------------
*/
require_once( QWC_PATH . 'build.php' );
require_once( QWC_PATH . 'custom-controls-log.php' );

$custom_fields = glob(QWC_PATH .'controls/*/control.class.php');
foreach ($custom_fields as $field) {
	require_once( $field );
}

/*
-------------------------------------------------------------------------------
Register built-in controls
-------------------------------------------------------------------------------
*/
qwc_register_control( 'color', 'WP_Customize_Color_Control' );
qwc_register_control( 'upload', 'WP_Customize_Upload_Control' );
qwc_register_control( 'image', 'WP_Customize_Image_Control' );
qwc_register_control( 'background', 'WP_Customize_Background_Image_Control' );





/*
-------------------------------------------------------------------------------
Demo 
-------------------------------------------------------------------------------
*/
require_once( QWC_PATH . 'demo.php' );