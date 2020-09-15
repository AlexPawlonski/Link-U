<?php
get_header();
// Sidebar gauche
// Content

// Sidebar gauche
?><div class="aboutContent"><?php



// Les dernières actualités
if (have_posts()) : while (have_posts()) : the_post(); ?>
<p><?php the_content(); ?></p>
</div><!-- fermeture frontPageContent -->
<?php
endwhile;
endif;

// Sidebar droite
get_footer();
