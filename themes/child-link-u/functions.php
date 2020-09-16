<?php


function link_u_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css' );
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
