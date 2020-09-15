<?php
get_header();

?><div class="pageStandard"><?php

if (have_posts()) : while (have_posts()) : the_post(); ?>
<p><?php the_content(); ?></p>
</div><!-- fermeture pageStandard -->
<?php
endwhile;
endif;

// Les promotions
// Sidebar droite
get_footer();