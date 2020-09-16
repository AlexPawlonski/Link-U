<?php
/*
Plugin Name: Cefii Map
Author Name: Vincent M.
Version: 1.0
Text Domain: cefii-map
Domain Path: /languages/
Description: Add customized maps to your content
*/
__('Add customized maps to your content','cefii_map');

class Cefii_Map 
{
	function __construct()
	{
		include_once plugin_dir_path(__FILE__) . '/Cefii_Map_Plugin.php';
		include_once plugin_dir_path(__FILE__) . '/Cefii_Map_Widget.php';
		if (class_exists('Cefii_Map')) 
		{
			$inst_map = new Cefii_Map_Plugin();
		}
		if (isset($inst_map)) 
		{
			register_activation_hook(__FILE__, array($inst_map, 'cefii_map_install'));
			add_action('admin_menu', array($inst_map, 'init'));
			add_action('admin_init', array($inst_map, 'cefiiMap_options'));
			add_action('wp_enqueue_scripts', array($inst_map, 'cefii_map_front_header'));
			if(function_exists('add_shortcode'))
			{
				add_shortcode( 'cefiimap', array($inst_map,'cefii_map_shortcode'));
			}
			add_action( 'plugins_loaded', array($inst_map, 'cefii_map_load_textdomain'));
			add_action( 'widgets_init', function(){
				register_widget( 'Cefii_Map_Widget' );
			} );
		}
		
	}
};

new Cefii_Map();