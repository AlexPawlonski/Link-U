<!DOCTYPE html>
<html <?php language_attributes();?> >
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
</head>
<body <?php body_class();?>>
<?php wp_body_open();?>
    <div id="wrapper">
        <header>
            <a  href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>">
                <img id ='logo-site' src="<?php echo wp_get_attachment_url(get_theme_mod('logo-header'));?>" alt="Logo <?php bloginfo('name');?>">
            </a>
            <section id="rightHeader">
                <div id="recherche">
                    <?php for($i=1; $i<=2; $i++):?>
                    <img src="<?php echo wp_get_attachment_url(get_theme_mod('language-logo-'.$i));?>" alt="">
                    <?php endfor;?>
                    <?php get_search_form()?>
                </div>
                <div id="menuB">
                    <div class="ligne"></div>
                    <div class="ligne"></div>
                    <div class="ligne"></div>
                </div>
                <nav id="menuPrincipal">
                    <?php 
                        wp_nav_menu(array(
                            'sort_column'=>'nemu-order',
                            'theme_location'=> 'principal'
                        ));
                    ?>
                </nav>
                <div id="logo">
                    <i class="fas fa-shopping-cart"></i>
                    <i class="fas fa-user"></i>
                </div>
            </section>
        </header>  
        
        <main  id="post-<?php the_ID(); ?>" class=" <?php post_class();?> ">
        <?php
        if(is_home() || is_front_page()):
            ?><div class="bxslider"><?php
            for ($i=1; $i < 8; $i++) { 
                $img = get_theme_mod( 'carousel-image-'.$i);

                if(!empty($img)){
                    if(!empty($img)):?><div><img src="<?php echo wp_get_attachment_url($img);?>" title=""></div><?php endif;
                }
            }
             ?></div>
            <?php 
        endif;
        ?>