<?php

	/*
		
	This is the template for the footer

	@package quantatheme

	*/
?>

<footer class="quanta-footer">
	<div class="container-fluid dark">
		<div class="row newsletter-container">
			<div class="col-12 col-lg-6">
				<div>
					Newsletter
				</div>
				<div>
					Inscrivez-vous et recevez toutes nos actualités en avant première !
				</div>
			</div>
			<div class="col-12 col-lg-6">
				form news
			</div>
		</div>
		<div class="row newsletter-container">
			<div class="col-12 col-lg-6">
				<div>
					Suivez nous sur les réseaux sociaux
				</div>
				<div>
					social icons
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<nav>
				  	<?php
					wp_nav_menu( array(
						'theme_location'	=> 'footer',
						'container' 		=> false,
						'menu_class' 		=> 'navbar-nav',
						'walker'     		=> new wp_bootstrap_navwalker()
					)) 
					?>
			  </nav>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>