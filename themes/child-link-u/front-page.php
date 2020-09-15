<?php
get_header();
// Sidebar gauche
get_sidebar('accueil');
// Content
	// Sidebar gauche
	?><div class="frontPageContent avecSidebarGauche"><?php

else{
	// !Sidebar gauche
	?><div class="frontPageContent"></div><?php
}

// Les dernières actualités
if (have_posts()) : while (have_posts()) : the_post(); ?>
<p><?php the_content(); ?></p>
</div>
<?php
endwhile;
endif;

// Les promotions
// Sidebar droite
get_footer();
