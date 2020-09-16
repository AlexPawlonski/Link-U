<div class="wrapCefiiMap">
	<h2>CEFii Map</h2>
	<nav class="choixMap" id="choixMap">
		<ul>
			<li id="newMap"><a href="options-general.php?page=cefii_map"><?php _e("New Map", "cefii-map") ?></a></li>
			<?php
			$maplist = $this->getmaplist();
			$url_ID = $_GET['id'];
			$map = $this->getmap($url_ID);
			foreach ($maplist as $getmap) {
				if ($getmap->id == $url_ID) {
					echo "<li id='active'><input type='button' class='bt-delete button-alert' title='Supprimer la carte' value='x'><a href='#'>" . stripslashes($getmap->titre) . "</a></li>";
				} else {
					echo "<li><a href='?page=cefii_map&p=map&id=" . $getmap->id . "'>" . stripslashes($getmap->titre) . "</a></li>";
				}
			}
			?>
		</ul>
	</nav>
	<div class="cadreMap">
		<h3 class="mapTitle"><?php echo $map[0]->titre ?><div id="shortCode">
				<p><?php _e("Copy (ctrl+c) this code and paste it (ctrl+v) inside the page / article where you want it to appear", "cefii-map") ?></p>
				<input id="shortCodeInput" type="text" readonly value="[cefiimap id=&quot; <?php echo $map[0]->id ?>&quot;]">
			</div></h3>
		<div class="mapInfos">
			
			<form action="?page=cefii_map&action=updatemap" method="POST" id="formMap">
				<input type="hidden" value="<?php echo $url_ID  ?>" name="Cm-id">
				<ul>
					<li>
						<label for="Cm-title"><?php _e("Title", "cefii-map") ?>* :</label><br>
						<input type="text" id="Cm-title" name="Cm-title" value="<?php echo $map[0]->titre ?>">
					</li>
					<li class="errorCefiiMap">
						<p class="errorCefiiText" id="Cm-title-error">
							<span class="dashicons dashicons-warning"></span>
							<?php _e("Please enter a title", "cefii-map") ?>
						</p>
					</li>
					<li>
						<label for="Cm-latitude"><?php _e("Latitude", "cefii-map") ?>* :</label><br>
						<input type="text" id="Cm-latitude" name="Cm-latitude" value="<?php echo $map[0]->latitude ?>">
					</li>
					<li class="errorCefiiMap">
						<p class="errorCefiiText" id="Cm-latitude-error">
							<span class="dashicons dashicons-warning"></span>
							<?php _e("Please enter a latitude", "cefii-map") ?>
						</p>
					</li>
					<li>
						<label for="Cm-longitude"><?php _e("Longitude", "cefii-map") ?>* :</label><br>
						<input type="text" id="Cm-longitude" name="Cm-longitude" value="<?php echo $map[0]->longitude ?>">

					</li>
					<li class="errorCefiiMap">
						<p class="errorCefiiText" id="Cm-longitude-error">
							<span class="dashicons dashicons-warning"></span>
							<?php _e("Please enter a longitude", "cefii-map") ?>
						</p>
					</li>
					<li class="formButtons">
						<input type="button" id="bt-map" value="<?php _e("Save changes", "cefii-map") ?>" class="button-primary">
					</li>
					<i><small>* <?php _e("Required fields", "cefii-map") ?></small></i>
				</ul>
			</form>
			<form action="?page=cefii_map&action=deletemap" method="POST" id="deleteformMap">
				<input type="hidden" value="<?php echo $map[0]->id  ?>" name="Cm-id">
			</form>
		</div>
		<div class="mapPreview">
			<div id="map"></div>
			<script>
				function initMap() {
					// The location of lieu
					var lieu = {
						lat: <?php echo $map[0]->latitude ?>,
						lng: <?php echo $map[0]->longitude ?>
					};
					// The map, centered at lieu
					var map = new google.maps.Map(
						document.getElementById('map'), {
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
		</div>
	</div>
</div>