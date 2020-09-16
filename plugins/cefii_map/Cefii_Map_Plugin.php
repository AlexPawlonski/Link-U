<?php
class Cefii_Map_Plugin
{
	function cefii_map_install()
	{
		global $wpdb;
		$table_site = $wpdb->prefix . 'cefiimap';
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_site'") != $table_site) {
			$sql = "CREATE TABLE `$table_site`(`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY , `titre` TEXT NOT NULL,`longitude` TEXT NOT NULL, `latitude` TEXT NOT NULL)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}
	function init()
	{
		if (function_exists('add_options_page')) {
			$mapage = add_options_page('CEFii Map', 'CEFii Map', 'administrator', dirname(__FILE__), array($this, 'cefii_map_admin_page'));
			add_action('load-' . $mapage, array($this, 'cefii_map_admin_header'));
		}
	}
	function cefii_map_admin_page()
	{
		if (isset($_GET['p']) && $_GET['p'] == 'map') {

			require_once('template-map.php');
		} else {
			require_once('template-admin.php');
			if (isset($_GET['action']) && $_GET['action'] == 'deletemap' && isset($_POST['Cm-id'])) {
				if ((trim($_POST['Cm-id']) != '')) {
					$deletemap = $this->deletemap($_POST['Cm-id']);
					if ($deletemap) {
						$location = get_bloginfo('url') . '/wp-admin/options-general.php?page=cefii_map&map=deleted';
					?>
						<script>
							window.location = '<?php echo $location ?>'
						</script>
					<?php
					}
				}
			}
		}
		if (isset($_GET['map'])) {
			if ($_GET['map'] == 'ok') {
				echo '<p class="success">' . __("The map has been successfully created !", "cefii-map") . '</p>';
			}
			if ($_GET['map'] == 'updated') {
				echo '<p class="success">' . __("The map has been successfully updated !", "cefii-map") . '</p>';
			}
			if ($_GET['map'] == 'deleted') {
				echo '<p class="success">' . __("The map has been deleted.", "cefii-map") . '</p>';
			}
		}
		if (isset($_GET['action']) && isset($_POST['Cm-title']) && isset($_POST['Cm-latitude']) && isset($_POST['Cm-longitude'])) {
			if ($_GET['action'] == 'createmap') {
				if ((trim($_POST['Cm-title']) != '')
					&& (trim($_POST['Cm-latitude']) != '')
					&& (trim($_POST['Cm-longitude']) != '')
				) {
					$insertmap = $this->insertmap($_POST['Cm-title'], $_POST['Cm-latitude'], $_POST['Cm-longitude']);
					if ($insertmap) {
						$location = get_bloginfo('url') . '/wp-admin/options-general.php?page=cefii_map&map=ok';
					?>
						<script>
							window.location = "<?php echo $location ?>"
						</script>
					<?php
					} else {
						echo '<p class="erreur">Une erreur est survenue.</p>';
					}
				} else {
					echo '<p class="erreur">Veuillez remplir tous les champs.</p>';
				}
			} elseif ($_GET['action'] == 'updatemap') {
				if ((trim($_POST['Cm-title']) != '')
					&& (trim($_POST['Cm-latitude']) != '')
					&& (trim($_POST['Cm-longitude']) != '')
					&& (trim($_POST['Cm-id']))
				) {
					$updatemap = $this->updatemap($_POST['Cm-title'], $_POST['Cm-latitude'], $_POST['Cm-longitude'], $_POST['Cm-id']);
					if ($updatemap) {
						$location = get_bloginfo('url') . '/wp-admin/options-general.php?page=cefii_map&p=map&id=' . $_POST['Cm-id'] . '&map=updated';
					?>
						<script>
							window.location = '<?php echo $location ?>'
						</script>
		<?php
					}
				}
			}
		}
	}
	function cefii_map_admin_header()
	{
		// CSS du menu admin
		wp_register_style('cefii_map_css', plugins_url('css/admin_cefii_map.css', __FILE__));
		wp_enqueue_style('cefii_map_css');
		// JS du menu admin
		wp_enqueue_script('cefii_map_js', plugins_url('js/admin_cefii_map.js', __FILE__), array('jquery'));
		// GoogleMap
		wp_enqueue_script('google_map_js', 'https://maps.googleapis.com/maps/api/js?key=' . get_option('cleApi'));

		// Envoi des traductions vers admin_cefii_map.js
		wp_localize_script('google_map_js', 'textJS', array(
			'confirmation' => __("Do you want to delete this map?", "cefii-map"),
			'copy' => __("Copied to clipboard ", "cefii-map")
		));
	}
	function cefii_map_front_header()
	{
		// GoogleMap
		wp_enqueue_script('google_map_js', 'https://maps.googleapis.com/maps/api/js?key=' . get_option('cleApi'));
	}
	function insertmap($title, $latitude, $longitude)
	{
		global $wpdb;
		$table_map = $wpdb->prefix . 'cefiimap';
		$sql = $wpdb->prepare(
			"INSERT INTO " . $table_map . "(titre,latitude,longitude) VALUES (%s,%s,%s)",
			$title,
			$latitude,
			$longitude
		);
		$req = $wpdb->query($sql);
		return $req;
	}
	public static function getmaplist()
	{
		global $wpdb;
		$table_map = $wpdb->prefix . 'cefiimap';
		$sql = "SELECT * FROM " . $table_map;
		$maplist = $wpdb->get_results($sql);
		return $maplist;
	}
	public static function getmap($id)
	{
		global $wpdb;
		$table_map = $wpdb->prefix . 'cefiimap';
		$sql = $wpdb->prepare("SELECT * FROM " . $table_map . " WHERE id=%d LIMIT 1", $id);
		$map = $wpdb->get_results($sql);
		return $map;
	}
	function updatemap($title, $latitude, $longitude, $id)
	{
		global $wpdb;
		$table_map = $wpdb->prefix . 'cefiimap';
		$sql = $wpdb->prepare(
			"UPDATE " . $table_map . " SET titre='$title',latitude='$latitude',longitude='$longitude' WHERE id='$id'"
		);
		$req = $wpdb->query($sql);
		return $req;
	}
	function deletemap($id)
	{
		global $wpdb;
		$table_map = $wpdb->prefix . 'cefiimap';
		$sql = $wpdb->prepare(
			"DELETE FROM " . $table_map . " WHERE id=%d",
			$id
		);
		$req = $wpdb->query($sql);
		return $req;
	}
	function champ_cleAPI()
	{
		?>
		<input type="text" name="cleApi" id="cleApi" value="<?php echo get_option('cleApi'); ?>" size="50">
		<?php
	}
	function cefiiMap_options()
	{
		add_settings_section("cefiiMap-section", '', null, "Cefii_Map");
		add_settings_field("cleApi", __('Your API key', "cefii-map"), array($this, 'champ_cleApi'), "Cefii_Map", "cefiiMap-section");
		register_setting("cefiiMap-section", "cleApi");
	}
	function cefii_map_shortcode($att)
	{
		$map = $this->getmap($att['id']);
		ob_start();
		?>
		<div id="map<?php echo $map[0]->id; ?>" style="width: 400px; height:400px;"></div>
		<script>
			function initMap() {
				// The location of lieu
				var lieu = {
					lat: <?php echo $map[0]->latitude ?>,
					lng: <?php echo $map[0]->longitude ?>
				};
				// The map, centered at lieu
				var map = new google.maps.Map(
					document.getElementById('map<?php echo $map[0]->id; ?>'), {
						zoom: 17,
						center: lieu
					});
				// The marker, positioned at lieu
				var marker = new google.maps.Marker({
					position: lieu,
					map: map
				});
			}
			initMap();
		</script>
		<?php return ob_get_clean();
	}
	function cefii_map_load_textdomain()
	{
		load_plugin_textdomain('cefii-map', false, dirname(plugin_basename(__FILE__)) . '/languages/');
	}
}
