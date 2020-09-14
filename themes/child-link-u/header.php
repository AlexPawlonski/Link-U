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
            <div id="logo">
                        <?php $image = get_header_image();
                        if(!empty($image)):?>
                            <img 
                            src="<?php echo esc_url($image);?>" 
                            alt="Logo <?php bloginfo('name');?>"
                            width="<?php echo get_custom_header()->width;?>"
                            height="<?php echo get_custom_header()->height;?>"
                            >
                        <?php else: ?>
                            <img src="<?php echo get_theme_support('custom-header', 'default-image');?>" 
                            alt="Logo <?php bloginfo('name');?>">
                        <?php endif; ?>
            </div></a>
                    <a id="titre" href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>">
                        <?php if(display_header_text()):?>
                        <h1 class="fontPhotoshoot"><?php bloginfo('name'); ?></h1>
                        <h2 class="fontPhotoshoot"><?php bloginfo('description');?></h2>
                        <?php endif?>
                    </a>
            
            <nav id="menuPrincipal">
                    <?php 
                        wp_nav_menu(array(
                            'sort_column'=>'nemu-order',
                            'theme_location'=> 'principal'
                        ));
                    ?>
            </nav>
        </header>  
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
        
        <main  id="post-<?php the_ID(); ?>" class=" <?php post_class();?> ">