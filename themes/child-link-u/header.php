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
                            'sort_column'=>'menu-order',
                            'menu'=> 'principal'
                        ));
                    ?>
                </nav>
                <div id="logo">
                    <a href="<?php echo(wc_get_cart_url()) ?>" title="Mon panier"><i class="fas fa-shopping-cart"></i></a>
                    <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>" title="Mon compte"><i class="fas fa-user"></i></a>
                </div>
            </section>
        </header>  
        <?php
        if(is_home() || is_front_page()):
            ?><ul class="bxslider">
                <?php
            for ($i=1; $i < 8; $i++) { 
                $img = get_theme_mod( 'carousel-image-'.$i);

                if(!empty($img)){
                    if(!empty($img)):?><li><img src="<?php echo wp_get_attachment_url($img);?>" title=""></li><?php endif;
                }
            }
             ?> </ul>
           
            <script>
                    jQuery(document).ready(function($){ 
                        $('.bxslider').bxSlider({
                            mode: 'fade',
                            captions: true,
                            slideWidth: 1200, 
                        }); 
                    });
            </script>
            <?php 
        endif;
        ?>
        
        <main  id="post-<?php the_ID(); ?>" class=" <?php post_class();?> ">