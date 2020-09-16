<?php
class Kontakt_Plugin
{
	function kontakt_install()
	{
		global $wpdb;
		$table_contact = $wpdb->prefix . 'kontakt';
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_contact'") != $table_contact) {
			$sql = "CREATE TABLE `$table_contact`(`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , `name` TEXT NOT NULL,`firstname` TEXT NOT NULL,`email` TEXT NOT NULL,`tel` TEXT NOT NULL,`category` TEXT NOT NULL,`subject` TEXT NOT NULL,`message` TEXT NOT NULL,`date` TEXT NOT NULL  )ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}

	function kontakt_front_header()
	{
		// CSS front
		wp_register_style('kontakt_css', plugins_url('css/front_kontakt.css', __FILE__));
		wp_enqueue_style('kontakt_css');
		// Script JS
		wp_enqueue_script('front_kontakt_js', plugins_url('js/front_kontakt.js', __FILE__), array('jquery'));
		// Hook Ajax
		wp_localize_script('front_kontakt_js', 'kontakt', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'action' => 'kontakt_click',
			'nonce' => wp_create_nonce( 'kontakt_nonce' )
		));
	}

	function kontakt_front_ajax()
	{
		check_ajax_referer('kontakt_nonce', 'nonce');
		$insertion = $this->kontakt_insert($_POST['kontakt_name'],$_POST['kontakt_firstname'],$_POST['kontakt_mail'],$_POST['kontakt_tel'],$_POST['kontakt_category'],$_POST['kontakt_subject'], $_POST['kontakt_message'], $_POST['horodate']);
		if($insertion)
		{
			$message = '<span style="color:green;">'.__('Your request has been sent','kontakt').'</span>';
		}
		else
		{
			$message = '<span style="color:red;">'.__('An error has occured, please try again', 'kontakt' ).'</span>';
		}
		echo json_encode($message);
		exit();
	}


	function kontakt_insert($name,$firstname,$email,$tel,$category,$subject,$message,$date)
	{
		global $wpdb;
		$table_contact = $wpdb->prefix . 'kontakt';
		$sql = $wpdb->prepare(
			"INSERT INTO " . $table_contact . " (name,firstname,email,tel,category,subject,message,date) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)",
			$name,$firstname,$email,$tel,$category,$subject,$message,$date
		);
		$inserted = $wpdb->query($sql);
		return $inserted;
	}
	function kontakt_selectAll()
	{
		global $wpdb;
		$table_contact = $wpdb->prefix . 'kontakt';
		$sql = "SELECT * FROM " . $table_contact;
		$contactlist = $wpdb->get_results($sql);
		return $contactlist;
	}
	function kontakt_delete($id)
	{
		global $wpdb;
		$table_contact = $wpdb->prefix . 'kontakt';
		$sql = $wpdb->prepare(
			"DELETE FROM " . $table_contact . " WHERE id=%d",
			$id
		);
		$deleted = $wpdb->query($sql);
		return $deleted;
	}


	function kontakt_load_textdomain()
	{
		load_plugin_textdomain('kontakt', false, dirname(plugin_basename(__FILE__)) . '/languages/');
	}
}