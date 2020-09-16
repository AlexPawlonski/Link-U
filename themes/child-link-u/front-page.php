<?php
get_header();

// Sidebar gauche?>
<div id="langfrFR"><img src="./images/logoFran.png" alt=""></div>
<div id="langenEN"><img src="images/logoEngl.png" alt=""></div>
<div><?php _e('This is a test','twentynineteenchild');?></div>
<?php
get_sidebar();
// Content

// Sidebar gauche
?>
<div class="frontPageContent avecSidebar"><?php


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
