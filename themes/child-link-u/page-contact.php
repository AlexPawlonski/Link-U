<?php
/*
Template Name: Page Contact
*/
get_header();

?>
<div class="contactPage">
	<?php
	get_sidebar('contactgauche');
	if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php
			the_widget('Kontakt_Widget');
			?>
			<p><?php the_content(); ?></p>
	<?php endwhile;
	endif; ?>
	<?php
	get_sidebar('contactdroit');
	?>
</div><!-- fermeture contactPage -->
<?php

get_footer();
