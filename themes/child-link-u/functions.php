<?php
// CUSTOMIZE
require_once 'inc/customize.php';
add_action('customize_register', 'link_u_customize_register');
add_theme_support('post-thumbnails');

function jquery_jquery_ui() {
    if (!is_admin()) {
     wp_deregister_script('jquery');
     // Google API (CDN)
     wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', false, '1.10.1', true);
     wp_register_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('jquery'), "1.10.3", true);
     wp_enqueue_script('jquery');
     wp_enqueue_script('jquery-ui');
    }
}
add_action('init', 'jquery_jquery_ui');

function custom_js(){
    wp_register_script("custom", get_template_directory_uri()."/js/script.js", array("jquery", "jquery-ui"), "2013.06.14", true);
    wp_enqueue_script("custom");
}
add_action("init", "custom_js"); 

function link_u_scripts(){
    wp_enqueue_style('link-u-style', get_stylesheet_uri());

    wp_enqueue_style( 'link-u-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fontawesome', "https://use.fontawesome.com/releases/v5.14.0/css/all.css" );
    wp_enqueue_script( 'link-u-script', get_stylesheet_directory_uri().'/js/script.js', array('jquery') );

    if(is_home() || is_front_page()){
        wp_enqueue_style('BXslider', "https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css");
        wp_enqueue_script( 'BXslider-js','https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery') );
    }
    
    $apiKey = get_theme_mod('Key');
	if (!empty($apiKey) && is_page_template('page-contact.php')) {
		wp_enqueue_script( 'gmapApi', 'https://maps.googleapis.com/maps/api/js?key='. $apiKey .'&callback=initMap');
	}
}
add_action('wp_enqueue_scripts', 'link_u_scripts');



function link_u_register_sidebars(){
    if(function_exists('register_sidebar')){
        register_sidebar(array(
            'id'=>'sidebar-accueil',
            'name'=>'Barre latérale de la page Accueil',
            'description' => 'Colonne de widget qui apparait à gauche',
            'before_widget'=>'',
            'after_widget'=>'',
            'before_title' =>'<h3>',
            'after_title' =>'</h3>'
        ));
        register_sidebar(array(
            'id'=>'sidebar-boutique',
            'name'=>'Barre latérale de la page Boutique',
            'description' => 'Colonne de widget qui apparait à droite',
            'before_widget'=>'',
            'after_widget'=>'',
            'before_title' =>'<h3>',
            'after_title' =>'</h3>'
        ));
        register_sidebar(array(
            'id'=>'sidebar-contactdroite',
            'name'=>'Barre latérale droite de la page Contact',
            'description' => 'Colonne de widget qui apparait à droite',
            'before_widget'=>'',
            'after_widget'=>'',
            'before_title' =>'<h3>',
            'after_title' =>'</h3>'
        ));
        register_sidebar(array(
            'id'=>'sidebar-contactgauche',
            'name'=>'Barre latérale gauche de la page Contact',
            'description' => 'Colonne de widget qui apparait à gauche',
            'before_widget'=>'',
            'after_widget'=>'',
            'before_title' =>'<h3>',
            'after_title' =>'</h3>'
        ));
        register_sidebar(array(
            'id'=>'sidebar-decoration',
            'name'=>'Barre latérale de la page Decoration',
            'description' => 'Colonne de widget qui apparait à droite',
            'before_widget'=>'',
            'after_widget'=>'',
            'before_title' =>'<h3>',
            'after_title' =>'</h3>'
        ));
    }
}
        add_action('widgets_init','link_u_register_sidebars');
        function add_excerpt_to_widget_products( $args ) {
        global $product;
        echo '<div class="produc-excerpt">'. $product->get_description(). '</div>';
        }
        add_filter('woocommerce_widget_product_item_end', 'add_excerpt_to_widget_products', 10, 1 );
        function my_child_theme_locale() {
            load_child_theme_textdomain( 'total', get_stylesheet_directory() . '/languages' );
        }
        add_action( 'after_setup_theme', 'my_child_theme_locale' );
        
        function child_theme_slug_setup() {
            load_child_theme_textdomain( 'twentynineteen', get_stylesheet_directory() . '/languages' );
        }
        add_action( 'after_setup_theme', 'child_theme_slug_setup' );