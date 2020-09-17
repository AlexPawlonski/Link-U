<?php 
/*
Template name: Page Boutique
*/
 get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1><?php the_title(); ?></h1>
<?php the_excerpt();
endwhile;
endif;
// wp_list_categories(); 
?>
<div id='divBoutique'>
<ul id='ulBoutique'>
<?php
$categories = get_categories('taxonomy=product_cat&description&hide_empty=1');
$select = '';
  foreach($categories as $category){
  if($category->count > 0){
  $select .= "<a href='../categorie-produit/".$category->slug."' id='lienCategoryBoutique'><li value='".$category->slug."'><h4>".$category->name."</h4><img src='". get_theme_file_uri(  ) ."/images/logoLinkUpFinal.png' alt='logo' id='imageCategory'><p id='pCategory'>".$category->description."</p></li></a>";
//   $minia = the_category_thumbnail();
//   var_dump($minia);
}}
echo $select;
// var_dump($select);
// var_dump($categories);
?>
</ul>
</div>
<img src="<?php echo get_theme_file_uri(  ); ?>/images/fil.png" alt="fil" id='imageFil'>
<h1 id='incontournables'>Les incontournables !</h1>
<ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 6
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</ul>
<?php
get_sidebar('boutique');
get_footer(); ?>