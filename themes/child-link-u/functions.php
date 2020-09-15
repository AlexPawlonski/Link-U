<?php


function link_u_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


function link_u_register_sidebars(){
    if(function_exists('register_sidebar')){
        register_sidebar(array(
            'id'=>'sidebar-droite',
            'name'=>'Barre latérale droite',
            'description' => 'Colonne de widget qui apparait à droite',
            'before_widget'=>'',
            'after_widget'=>'',
            'before_title' =>'<h3>',
            'after_title' =>'</h3>'
        ));
        register_sidebar(array(
            'id'=>'sidebar-gauche',
            'name'=>'Barre latérale gauche',
            'description' => 'Emplacement de widget à gauche du contenu',
            'before_widget'=>'',
            'after_widget'=>'',
            'before_title' =>'<h3>',
            'after_title' =>'</h3>'
        ));
    }
}
add_action('widgets_init','link_u_register_sidebars');