<?php
get_header();
// Sidebar gauche
get_sidebar('gauche');
// Content
	// Sidebar gauche
		// Et droite
		// Sans droite
	// Sans gauche
		// Et droite
		// Sans droite

// Les dernières actualités
if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="homeWidget">
<h3><?php the_title(); ?></h3>
<p><?php the_content(); ?></p>
</div>


<?php
endwhile;
endif;

// Les promotions


// Sidebar droite
get_sidebar();
// get_footer();