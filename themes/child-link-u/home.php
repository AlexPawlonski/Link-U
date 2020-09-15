<?php
get_header();

?><div class="pageHome"><?php

if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="homeArticle">
	<a href="<?php echo(get_permalink()) ?>">
		<h2><?php the_title() ?></h2>
		<?php if(has_post_thumbnail()) :?>
		<img src="<?php the_post_thumbnail_url( )?>" alt="<?php the_title()?>" >
		<?php endif; ?>
		
		<?php the_excerpt(); ?>
	</a>
</div>
<?php
endwhile;
endif;
?>
</div><!-- fermeture pageStandard -->
<?php 
get_footer();