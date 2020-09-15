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
$wp_customize-> add_section('my_footer', array(
	'title' => 'Footer',
	'priority' => 120
));
$wp_customize-> add_section('language', array(
	'title' => 'Logo Langue',
	'priority' => 150
));
$wp_customize-> add_section('carousel', array(
	'title' => 'Carousel page d\'accueil',
	'priority' => 80
));
$wp_customize-> add_section('contact', array(
	'title' => 'Page Contact',
	'priority' => 100
));


//Gestion des logo
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


/*::::::::::::::page accueil:::::::::::::::*/
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