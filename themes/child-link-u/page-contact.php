<?php
/*
Template Name: Page Contact
*/

get_header();
?>
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
		<section id="pages" class="haut">
			<section id="topContact">
				<div class="titlestyle-container">
					<div class="titlestyle">
						<div class="imgtitle"><img class="imgfond" src="<?php echo $urlFd; ?>" alt="imagefond"></div>
						<h2><?php the_title(); ?></h2>
						<div class="imgtitle"><img class="imgfondturn" src="<?php echo $urlFd; ?>" alt="imagefond"><img class="imgfrontr" src="<?php echo $urlFt; ?>" alt="imageface"></div>
					</div>
				</div>
				<div class="content-block">
					<form id="form-in" name="" action="<?php echo get_permalink(); ?>" method="post">
						<ul class="form-contact">
							<li>
								<p class="left">
									<label for="name">Nom *</label>
									<input type="text" class="input-text" name="name" id="name" placeholder="Nom" required="required">
								</p>
								<p class="right">
									<label for="name">Prénom *</label>
									<input type="text" class="input-text" name="surname" id="surname" placeholder="Prénom" required="required">
								</p>
							</li>
							<li>
								<p class="left">
									<label for="name">Email *</label>
									<input type="email" class="input-text" name="email" id="email" placeholder="mail@xyz.fr" required="required">
								</p>
								<p class="right">
									<label for="name">Téléphone</label>
									<input type="tel" class="input-text" name="phone" id="phone" placeholder="01 02 03 04 05">
								</p>
							</li>
							<li>
								<p class="left">
									<label for="category-products">Catégorie de produit *</label>
									<select name="category-products" id="category-products">
										<option valeur="boutique">Informations sur la boutique</option>
										<option valeur="contact">Contact</option>
									</select>
								</p>
							</li>
							<li>
								<p class="left">
									<label for="subject">Sujet du message *</label>
									<input type="text" class="input-text" name="subject" id="subject" placeholder="Subject of message" required="required">
								</p>
							</li>
							<li id="textareaform">
								<p class="left">
									<label for="name">Message</label>
									<textarea class="input-text" name="msg" id="msg" rows="10" cols="50" placeholder="Écrivez votre message ici..."></textarea>
									<p>* Champs obligatoires</p>
								</p>
							</li>
						</ul>
						<div id="bottomform">
							<!-- Captcha à placer ici --> 
							<input class='btn-form' type="submit" name="submit-contact" value="Valider" />
						</div>
					</form>
				</div>
			</section>
			<section id="bottomContact">
				<div class="titlestyle">
					<div class="imgtitle"><img class="imgfond" src="<?php echo $urlFd; ?>" alt="imagefond"><img class="imgfrontl" src="<?php echo $urlFt; ?>" alt="imageface"></div>
					<h2>Nous trouver</h2>
					<div class="imgtitle"><img class="imgfondturn" src="<?php echo $urlFd; ?>" alt="imagefond"></div>
				</div>
				<div id="sectionbottom">
					<div class="gmap">
						<?php
							if (get_theme_mod('gmapshow') == 1 && !empty(get_theme_mod('gmapLat')) && !empty(get_theme_mod('gmapLong'))) :;
						?>
						<div id="gmapContainer"></div>
							<script type="text/javascript" class="scriptJsGmap">
							function gmap() {
								var map = new google.maps.Map(document.getElementById('gmapContainer'), {
									center: {
										lat: <?php echo get_theme_mod('gmapLat'); ?>,
										lng: <?php echo get_theme_mod('gmapLong'); ?>
									},
									zoom: <?php echo get_theme_mod('zoom', '15'); ?>
								})
							}
						</script>
					</div>
				<?php endif;
			endif; ?>
				
			</section><!-- bottomContact -->
		</section><!-- haut -->
<?php endwhile;
endif; ?>

<?php
get_footer(); ?>