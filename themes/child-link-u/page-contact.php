<?php
/*
Template Name: Page Contact
*/
get_header();
?>

<div class="contactPage">
	<?php
	get_sidebar('contactgauche');
	?>
	<div class="contactContent">
		<?php
		if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
				the_widget('Kontakt_Widget');
				?>
				<p><?php the_content(); ?></p>
		<?php endwhile;
		endif; ?>
	</div><!-- fermeture contactContent -->
	<?php
	get_sidebar('contactdroit');
	?>
</div><!-- fermeture contactPage -->
<?php

get_footer();
