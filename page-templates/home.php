<?php
/**
* Template Name: Home
*
* @package purnatur
*/

get_header();
?>


	<div class="primary" class="content-area">

		<main id="main" class="site-main" role="main">

		<?php

		?>

		<div class="section-header" class="header">
			<div class="background-image position-relative" style="background-image:url(<?php the_field('background_header'); ?>)">

				<div class="header-content-container">
					
					<div class="header-content">
						<div class="--top">
							<h1>
								<div>500g</div>
								<div>de Pur
								<br>Natur</div>
							</h1>
						</div>
						<div class="--bottom">
							<h2>Un yaourt qui ravit les papilles<br>depuis plus de 30 ans, <br>à la cuillère ou dans vos recettes</h2>
						</div>
					</div><!-- .header-content -->

			</div>
		</div>

		</main>

	</div>


<?php get_footer(); ?>