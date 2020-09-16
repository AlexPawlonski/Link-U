<?php
/*
Template Name: Page Contact
*/
get_header();

	?>
<div class="contactPage">
	<?php
	if (have_posts()) : while (have_posts()) : the_post(); ?>
	<p><?php the_content(); ?></p>
	<?php 
	the_widget( 'Kontakt_Widget' );
	 ?>

</div><!-- fermeture contactPage -->
<?php
endwhile;
endif;

get_footer();