<?php
class Cefii_Map_Widget extends WP_Widget
{
	public function __construct()
	{
		$widget_options = array(
			'classname' => 'cefiiMap',
			'description' => __('Add customized maps to your content', 'cefii-map')
		);
		parent::__construct('widget-cefiiMap', 'Cefii Map', $widget_options);
	}

	public function form($instance)
	{
		$defaults = array(
			'title' => 'CefiiMap',
			'map' => '',
			'displayTitle' => 'Display Title',
			'zoom' => '17'
		);
		$instance = wp_parse_args($instance, $defaults);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cefii-map') ?> : </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('map'); ?>"><?php _e('Select the map', 'cefii-map') ?> : </label>
			<select name="<?php echo $this->get_field_name('map'); ?>" id="<?php echo $this->get_field_id('map'); ?>">
				<option></option>
				<?php
				$mapList = Cefii_Map_Plugin::getmaplist();
				foreach ($mapList as $key) {
				?>
					<option value="<?php echo $key->id ?>" id="<?php echo $this->get_field_id('map') . 'Option' . $key->id; ?>"
					<?php if($key->id == $instance['map']){echo "selected";}?>>
						<?php echo $key->titre ?>
					</option>
				<?php
				}
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('zoom'); ?>"></label>
			<input type="range" min="13" max="21" id="<?php echo $this->get_field_id('zoom');?>" name="<?php echo $this->get_field_name('zoom');?>" value="<?php echo $instance['zoom']; ?>">
		</p>
		<p>
			<?php _e('Or you can create a new one ', 'cefii-map') ?><a href="<?php echo get_admin_url() . 'options-general.php?page=cefii_map' ?>" target="_blank"><?php _e('here', 'cefii-map') ?></a>
		</p>
		<p>
			<?php _e('Do you want to display the map title ?', 'cefii-map') ?>
			<input type="checkbox" id="<?php echo $this->get_field_id('displayTitle'); ?>" name="<?php echo $this->get_field_name('displayTitle')?>"; 
			<?php if($instance['displayTitle'] == 'on'){echo " checked";}
			?>>
			<label for="<?php echo $this->get_field_id('displayTitle'); ?>"><?php _e('Yes', 'cefii-map') ?></label>
		</p>
		<?php
	}

	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['map'] = strip_tags($new_instance['map']);
		$instance['displayTitle'] = strip_tags($new_instance['displayTitle']);
		$instance['zoom'] = strip_tags($new_instance['zoom']);
		return $instance;
	}

	public function widget($args,$instance)
	{
		extract($args);
		$mapInfos = Cefii_Map_Plugin::getmap($instance['map']);
		echo $before_widget;
		if ($instance['displayTitle'] == true)
		{
			echo $before_title . $instance['title'] . $after_title;
		}
		if($instance['map'] != '')
		{
			?>
			<div id="widgetmap<?php echo $mapInfos[0]->id; ?>" style="width: 400px; height:400px;"></div>
			<script>
				function initMap() {
					// The location of lieu
					var lieu = {
						lat: <?php echo $mapInfos[0]->latitude ?>,
						lng: <?php echo $mapInfos[0]->longitude ?>
					};
					// The map, centered at lieu
					var map = new google.maps.Map(
						document.getElementById('widgetmap<?php echo $mapInfos[0]->id; ?>'), {
							zoom: <?php echo $instance['zoom'] ?>,
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
			<?php
		}
		
		echo $after_widget;
	}
}
