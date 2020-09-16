<div class="wrapCefiiMap">
	<h2>CEFii Map</h2>

	<div id="apiKey">
		<p class="warning"><strong><span class="dashicons dashicons-warning"></span> <?php _e("Important", "cefii-map") ?></strong></p>
		<p><?php _e("An API key is required for displaying GoogleMaps ", "cefii-map") ?> <a href="https://console.cloud.google.com/apis/credentials/" target="_blank" class="button-primary"><?php _e("Get a new API key", "cefii-map") ?></a></p>
		<p><?php _e("After creating the API key, paste it right below : ", "cefii-map") ?></p>
		<form action="options.php" method="POST">
			<?php
			settings_fields("cefiiMap-section");
			do_settings_sections("Cefii_Map");
			submit_button(__("Save the key", "cefii-map"));
			?>
		</form>
	</div>
	
	<nav class="choixMap" id="choixMap">
		<ul>
			<li id="newMap"><a href="options-general.php?page=cefii_map"><?php _e("New Map", "cefii-map") ?></a></li>
			<?php
			$maplist = $this->getmaplist();
			foreach ($maplist as $map) {
				echo "<li><a href='?page=cefii_map&p=map&id=" . $map->id . "'>" . stripslashes($map->titre) . "</a></li>";
			}
			?>
		</ul>
	</nav>
	<div class="cadreMap">
		<form action="?page=cefii_map&action=createmap" method="POST" id="formMap">
			<ul>
				<li>
					<label for="Cm-title"><?php _e("Title", "cefii-map") ?>* :</label><br>
					<input type="text" id="Cm-title" name="Cm-title">
				</li>
				<li class="errorCefiiMap">
					<p class="errorCefiiText" id="Cm-title-error">
						<span class="dashicons dashicons-warning"></span>
						<?php _e("Please enter a title", "cefii-map") ?>
					</p>
				</li>
				<li>
					<label for="Cm-latitude"><?php _e("Latitude", "cefii-map") ?>* :</label><br>
					<input type="text" id="Cm-latitude" name="Cm-latitude">
				</li>
				<li class="errorCefiiMap">
					<p class="errorCefiiText" id="Cm-latitude-error">
						<span class="dashicons dashicons-warning"></span>
						<?php _e("Please enter a latitude", "cefii-map") ?>
					</p>
				</li>
				<li>
					<label for="Cm-longitude"><?php _e("Longitude", "cefii-map") ?>* :</label><br>
					<input type="text" id="Cm-longitude" name="Cm-longitude">

				</li>
				<li class="errorCefiiMap">
					<p class="errorCefiiText" id="Cm-longitude-error">
						<span class="dashicons dashicons-warning"></span>
						<?php _e("Please enter a longitude", "cefii-map") ?>
					</p>
				</li>
				<li>
					<input type="button" id="bt-map" value="<?php _e("Create", "cefii-map") ?>" class="button-primary">
				</li>
				<i><small>* <?php _e("Required fields", "cefii-map") ?></small></i>
			</ul>
		</form>
	</div>
</div>