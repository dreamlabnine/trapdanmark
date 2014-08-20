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
$titan = TitanFramework::getInstance( 'trapdanmark' );
get_header(); ?>

<script>
	var controller;
	$(document).ready(function($) {
		// init controller
		controller = new ScrollMagic();
	});
</script>
<div style="background: black;">
	<ul class="cb-slideshow">
		<li><span style="background-image: url(<?php echo $titan->getOption('background_img_1');?>);">Image 01</span></li>
		<li><span style="background-image: url(<?php echo $titan->getOption('background_img_2');?>);">Image 02</span></li>
		<li><span style="background-image: url(<?php echo $titan->getOption('background_img_3');?>);">Image 03</span></li>
		<li><span style="background-image: url(<?php echo $titan->getOption('background_img_4');?>);">Image 04</span></li>
		<li><span style="background-image: url(<?php echo $titan->getOption('background_img_5');?>);">Image 05</span></li>
	</ul>
</div>

</div>

	<div class="container-fluid intro col-xs-12">
		<div class="circle-container">
			<div class="circle-text-outer">
				<div class="circle-text">
					<div class="circle-text-inner">
						<div class="circle-text-top"><span>OPDAG</span></div>
						<div class="circle-text-bottom"><span>DANMARK</span></div>
						<div class="circle-text-subtext">
							<span>Et nyt storværk er på vej.<br>Trap Danmark vil samle al væsentlig viden om Danmark på ét sted og gøre den tilgængelig overalt.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 separator">
		<div class="separator-text">VORES DONATORER</div>
	</div>
	<?php get_template_part( 'content', 'donator' ); ?>

<?php get_footer(); ?>

<script type="text/javascript" language="javascript">
if ($(window).width() < 768) {
	$(document).ready(function() {
		$(".circle-text-inner").animate({
			opacity: 1
		}, 2500);
	});
} else {
	$(document).ready(function() {
		$(".circle-text").animate({
			opacity: 1,
			maxWidth: 500
		}, 2000, function() {
			$(".circle-text-inner").animate({
				opacity: 1
			}, 1000);
		});
	});
}
</script>