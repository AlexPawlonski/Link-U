<?php
get_header();
?>
<div class="frontPageWrapper">
<?php
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
?>

</div><!-- fermeture frontpagewrapper -->
<?php
get_footer();
