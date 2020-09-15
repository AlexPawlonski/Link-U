
        </main>
        <footer> 
            <nav id="menuFooter">
            <?php 
                wp_nav_menu(array(
                    'sort_column'=>'menu-order',
                    'theme_location'=> 'footer',
                    'fallback_cb'=> true
                ));
            ?>
            </nav>
            <?php if(get_theme_mod('twitter') != "" || get_theme_mod('facebook') != "" || get_theme_mod('linkedin') != "" || get_theme_mod('instagram') != ""):?>
                <p>Retrouvez-nous sur</p>
                <div id="reseaux">
                    <?php if(get_theme_mod('twitter') != ""):?>
                        <a id="twitter" href="<?php echo get_theme_mod('twitter');?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
                    <?php endif;?> 
                    <?php if(get_theme_mod('facebook') != ""):?> 
                        <a id="facebook" href="<?php echo get_theme_mod('facebook');?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <?php endif;?>   
                    <?php if(get_theme_mod('linkedin') != ""):?> 
                        <a id="linkedin" href="<?php echo get_theme_mod('linkedin');?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif;?> 
                    <?php if(get_theme_mod('instagram') != ""):?>
                            <a id="instagram" href="<?php echo get_theme_mod('instagram');?>" target="_blank"><i class="fab fa-instagram"></i></a>
                    <?php endif;?>
                </div>
            <?php endif;?>
            <?php wp_footer();?>
        </footer>
    </div>
</body>
</html