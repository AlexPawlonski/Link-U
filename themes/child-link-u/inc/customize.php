<?php
function link_u_customize_register($wp_customize){

if( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'blogname', array('selector' => 'header h1')
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array('selector' => 'header h2')
	);
	$wp_customize->selective_refresh->add_partial(
		'header_image', array('selector' => '#logo')
	);
	$wp_customize->selective_refresh->add_partial(
		'copyright', array('selector' => '#copyright')
	);
	$wp_customize->selective_refresh->add_partial(
		'facebook', array('selector' => '#lien')
	);
	$wp_customize->selective_refresh->add_partial(
		'Sise', array('selector' => '#colonneDroite')
	);
	$wp_customize->selective_refresh->add_partial(
		'carousel', array('selector' => '.bxslider')
	);
}

/*-----------------SECTION ------------------------*/

$wp_customize-> add_section('Logo', array(
	'title' => 'Logo header',
	'priority' => 10
));
$wp_customize-> add_section('language', array(
	'title' => 'Logo Langue',
	'priority' => 150
));
$wp_customize-> add_section('carousel', array(
	'title' => 'Carousel page d\'accueil',
	'priority' => 80
));
$wp_customize-> add_section('footer', array(
	'title' => 'Footer',
	'priority' => 120
));

//logo header
$wp_customize->add_setting('logo-header', array(
	'transport' => 'refresh'
));	
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'logo-header', array(
	'section' => 'Logo',
	'label' => __( 'Image logo' , 'text-domain' ),
	'settings' => 'logo-header',
	'flex_width' => false,
	'flex_height' => false,
	'width' => 1200,
	'height' => 500,
)));


//Gestion des logo langue 
for ($i=1; $i<= 2; $i++){
	$wp_customize->add_setting('language-logo-'.$i, array(
		'transport' => 'refresh'
	));	
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'language-logo-'.$i, array(
		'section' => 'language',
		'label' => __( 'Image logo '.$i, 'text-domain' ),
		'settings' => 'language-logo-'.$i,
		'flex_width' => false,
		'flex_height' => false,
		'width' => 200,
		'height' => 200,
	)));
};


/*--------------------carousel-------------*/
$wp_customize-> add_section('carousel', array(
	'title' => 'Carousel page d\'accueil',
	'priority' => 80
));

for ($i=1; $i <= 8; $i++) { 
	$wp_customize -> add_setting('carousel-image-'.$i.'', array(
	'transport' => 'refresh'   
));
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'carousel-image-'.$i.'', array(
	'section' => 'carousel',
	'label' => __( 'Image '.$i, 'text-domain' ),
	'settings' => 'carousel-image-'.$i,
	'flex_width' => false,
	'flex_height' => false,
	'width' => 1280,
	'height' => 400,
)));
};

}


//update fil d’Ariane de WooCommerce 
add_filter( 'woocommerce_breadcrumb_defaults', 'wpm_woocommerce_breadcrumbs' );
function wpm_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' > ',
            'wrap_before' => '<nav class="woocomerce-fil" itemprop="breadcrumb">', // Modifie la balise HTML ouvrant le fil d'ariane
            'wrap_after'  => '</nav>', // Modifie la balise HTML fermant le fil d'ariane
            'before'      => '', // Ajoute une chaine de caractère avant chaque item du fil d'ariane
            'after'       => '', // Ajoute une chaine de caractère après chaque item du fil d'ariane
            'home'        => _x( 'Accueil', 'breadcrumb', 'woocommerce' ), // Modifiez ici le texte "Accueil"
        );
}