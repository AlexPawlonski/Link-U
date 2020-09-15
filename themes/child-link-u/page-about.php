<?php
get_header();

	?>
<div class="aboutContent">
	<?php
	if (have_posts()) : while (have_posts()) : the_post(); ?>
	<p><?php the_content(); ?></p>

</div><!-- fermeture aboutContent -->
<?php
endwhile;
endif;

get_footer();
