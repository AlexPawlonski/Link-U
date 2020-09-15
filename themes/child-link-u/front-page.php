<?php
get_header();
// Sidebar gauche
get_sidebar();
// Content

// Sidebar gauche
?><div class="frontPageContent avecSidebar"><?php



// Les dernières actualités
if (have_posts()) : while (have_posts()) : the_post(); ?>
<p><?php the_content(); ?></p>
</div><!-- fermeture frontPageContent -->
<?php
endwhile;
endif;

// Les promotions
// Sidebar droite
get_footer();
