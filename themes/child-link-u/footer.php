
        </main>
        <footer> 
            <div id="contener-footer">
                <nav id="menuFooter">
                <?php 
                        wp_nav_menu(array(
                            'sort_column'=>'menu-order',
                            'theme_location'=> 'footer',
                            'fallback_cb'=> true
                        ));
                    ?>
                </nav>
            </div>

            <?php if(!empty(get_theme_mod('phone')) && !empty(get_theme_mod('post'))):?>
                <ul id="contact-footer">
                    <li><p class="fontPhotoshoot"><?php echo get_theme_mod('nom')?></p></li> 
                    <li><p><?php echo get_theme_mod('soustitre')?></p></li> 
                    <li><p><?php echo get_theme_mod('post')?></p></li> 
                    <p>-</p>
                    <li><a href="tel:+33241000001"><p><?php echo get_theme_mod('phone');?></p></a></li>
                    <li><p><?php echo get_theme_mod('email');?></p></li>   
                </ul>
            <?php endif;?>

            <?php if(get_theme_mod('twitter') != "" && get_theme_mod('facebook') != ""):?>
                <div id="lien">
                    <a id="twitter" href="<?php echo get_theme_mod('twitter');?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
                    <a id="facebook" href="<?php echo get_theme_mod('facebook');?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
                </div>
            <?php endif?>

            <?php wp_footer();?>
            
        </footer>
    </div>
</body>
</html