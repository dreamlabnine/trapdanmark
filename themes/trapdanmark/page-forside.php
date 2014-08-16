<?php
/*
Template Name: Forside
*/

/**
 * The template for displaying the front page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package TrapDanmark
 */

get_header(); ?>

	<ul class="cb-slideshow">
        <li><span>Image 01</span></li>
        <li><span>Image 02</span></li>
        <li><span>Image 03</span></li>
        <li><span>Image 04</span></li>
        <li><span>Image 05</span></li>
    </ul>

	<div class="container-fluid intro col-xs-12">
		<div class="circle-container">
			<div class="circle-text-outer">
				<div class="circle-text">
					<div class="circle-text-inner">
						<div class="circle-text-top"><span>OPDAG</span></div>
						<div class="circle-text-bottom"><span>DANMARK</span></div>
						<div class="circle-text-subtext">
							<span>Et nyt storværk er på vej.<br>Trap Danmark vil samle al 
	væsentlig viden om Danmark på ét sted og gøre den tilgængelig overalt.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php get_template_part( 'content', 'donator' ); ?>

<?php get_footer(); ?>
