<?php
get_header();
if(is_active_sidebar( 'gauche' )){
	// Sidebar gauche
	get_sidebar('gauche');
	?><div class="content avecSidebarGauche"><?php
}
else{
	// !Sidebar gauche
	?><div class="content"></div><?php
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
get_sidebar();
?>
</div><!-- fermeture content -->
<?php
get_footer();