<?php
// get_header();
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
<h1><?php the_title(); ?></h1>
<?php the_excerpt();
endwhile;
endif;

// Les promotions


// Sidebar droite
get_sidebar('droite');
// get_footer();