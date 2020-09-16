<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
	exit();
}
function kontakt_uninstall()
{
	global $wpdb;
	$table_site = $wpdb->prefix . 'kontakt';
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_site'") == $table_site) {
		$sql = "DROP TABLE $table_site";
		$wpdb->query($sql);
	}
}
kontakt_uninstall();