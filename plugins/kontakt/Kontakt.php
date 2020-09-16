<?php
/*
Plugin Name: Kontakt
Description: Adds kontakt form to your website
Author: Vincent M.
Version: 1.0
Text Domain: kontakt
Domain Path: /languages/
*/
__('Adds kontakt form to your website','kontakt');

class Kontakt
{
	function __construct()
	{
		include_once plugin_dir_path(__FILE__ ) . 'Kontakt_Plugin.php';
		include_once plugin_dir_path(__FILE__ ) . 'Kontakt_Widget.php';
		if(class_exists('Kontakt'))
		{
			$inst_contact = new Kontakt_Plugin();
		}
		if(isset($inst_contact))
		{
			register_activation_hook( __FILE__, array($inst_contact,'kontakt_install') );
			add_action( 'plugins_loaded', array($inst_contact, 'kontakt_load_textdomain'));
			add_action( 'widgets_init', function(){
				register_widget( 'Kontakt_Widget' );
			} );
			add_action( 'wp_head', array($inst_contact, 'kontakt_front_header'));

			if(isset($_POST['action']))
			{
				add_action( 'wp_ajax_nopriv_kontakt_click', array($inst_contact, 'kontakt_front_ajax') );
				add_action( 'wp_ajax_kontakt_click', array($inst_contact, 'kontakt_front_ajax') );
			}
		}
	}
}

new Kontakt();