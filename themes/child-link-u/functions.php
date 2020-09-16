<?php
function link_u_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css' );
    wp_enqueue_script( 'jq-script', get_template_directory_uri() . '/js/link_u_js.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'link_u_enqueue_styles' );



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