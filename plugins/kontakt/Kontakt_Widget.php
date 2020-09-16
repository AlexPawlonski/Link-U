<?php
class Kontakt_Widget extends WP_Widget
{
	public function __construct()
	{
		$widget_options = array(
			'classname' => 'kontakt',
			'description' => __('Adds a contact form', 'kontakt')
		);
		parent::__construct('kontakt', 'Kontakt', $widget_options);
	}

	public function form($instance)
	{
		$defaults = array(
			'title' => 'Kontakt',
		);
		$instance = wp_parse_args($instance, $defaults);
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'kontakt') ?> : </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>">
		</p>

	<?php
	}

	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	public function widget($args, $instance)
	{
		extract($args);
		echo $before_widget;
		echo $before_title . "Nous Contacter" . $after_title;
	?>
		<form id="formKontakt" method="POST" action="">
			<?php
			$orderby = 'name';
			$order = 'asc';
			$hide_empty = false ;
			$cat_args = array(
				'orderby'    => $orderby,
				'order'      => $order,
				'hide_empty' => $hide_empty,
			);
			 
			$product_categories = get_terms( 'product_cat', $cat_args );
			?>
			<ul>
				<li>
					<label for="kontakt_name"><?php _e('Your name :', 'kontakt') ?>*</label>
					<input type="text" id="kontakt_name" name="kontakt_name" value="" required>
					<div id="errorkontakt_name" class="errorMessage"></div>
				</li>
				<li>
					<label for="kontakt_firstname"><?php _e('Your firstname :', 'kontakt') ?>*</label>
					<input type="text" id="kontakt_firstname" name="kontakt_firstname" value="" required>
					<div id="errorkontakt_firstname" class="errorMessage"></div>
				</li>
				<li>
					<label for="kontakt_mail"><?php _e('Your email :', 'kontakt') ?>*</label>
					<input type="text" id="kontakt_mail" name="kontakt_mail" value="" required>
					<div id="errorkontakt_mail" class="errorMessage"></div>
				</li>
				<li>
					<label for="kontakt_tel"><?php _e('Your telephone :', 'kontakt') ?>*</label>
					<input type="text" id="kontakt_tel" name="kontakt_tel" value="" required>
					<div id="errorkontakt_tel" class="errorMessage"></div>
				</li>
				<li class="li2">
					<div class="inputWrap">
						<label for="kontakt_category"><?php _e('Category :', 'kontakt') ?>*</label>
						<select name="kontakt_category" id="kontakt_category" required>
							<?php foreach($product_categories as $values)
							{
								if($values->slug !== 'non-classe'){
									echo '<option value="'.$values->slug.'">'.$values->name.'</option>';
								}
							}
							 ?>
						</select>
						<div id="errorkontakt_category" class="errorMessage"></div>
					</div>
					<div class="inputWrap">

						<label for="kontakt_subject"><?php _e('Subject of your message :', 'kontakt') ?>*</label>
						<input type="text" id="kontakt_subject" name="kontakt_subject" value=""  required>
						<div id="errorkontakt_subject" class="errorMessage"></div>
					</div>
				</li>
				<li class="li2">
					<label for="kontakt_message"><?php _e('Your message :', 'kontakt') ?></label>
					<textarea name="kontakt_message" id="kontakt_message" cols="50" rows="5"></textarea>
					<div id="errorkontakt_message" class="errorMessage"></div>
				</li>
					<input type="hidden"  name="horodate" id="horodate" value="<?php echo(current_time('mysql')) ?>">
				<li class="buttons">
					<input id="formKontaktSubmit" type="button" value="<?php _e('Submit', 'kontakt') ?>">
				</li>
				<div id="ajaxError"></div>
			</ul>
		</form>
<?php
		echo $after_widget;
	}
}
