<?php
/*
Template Name: Om os
*/

/**
 * The template for displaying the about page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package TrapDanmark
 */

get_header(); 

$splash_page_title = ($titan->getOption( 'about_us_splash_title' )) ? $titan->getOption( 'about_us_splash_title' ) : get_the_title($titan->getOption( 'about_us_splash_page_id' ));

function getOption($slug, $option)
{
	$titan = TitanFramework::getInstance( 'trapdanmark' );
	$option_page_id = $titan->getOption( 'about_us_' . $slug . '_page_id' );
	switch ($option) {
		case 'title':
			$result['title'] = ($titan->getOption( 'about_us_' . $slug . '_title' )) ? $titan->getOption( 'about_us_' . $slug . '_title' ) : get_the_title($option_page_id);
			break;
		
		case 'text':
			$result['text'] = $titan->getOption( 'about_us_' . $slug . '_text' );
			break;

		case 'link':
			$result['link'] = get_permalink($titan->getOption( 'about_us_' . $slug . '_page_id' ));
			break;

		case 'image':
			$result['image'] = 'linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(' . wp_get_attachment_url( get_post_thumbnail_id($option_page_id) ) . ') center center';
			break;

	}
	
	return $result[$option];
}

?>

	<!-- Splash section -->
	<div class="container-fluid about-splash col-xs-12" style="background: linear-gradient(
      rgba(0, 0, 0, 0.7), 
      rgba(0, 0, 0, 0.7)
    ), url(<?php echo get_template_directory_uri() . '/images/1.jpg'; ?>);">
		<div class="intro-inner">
			<div class="intro-header"><span><?php echo getOption('splash','title'); ?></span></div>
			<div class="intro-text">
				<span><?php echo getOption('splash','text'); ?></span>
			</div>
			<div><a href="<?php echo getOption('splash','link'); ?>"><img class="read-more" src="<?php echo get_template_directory_uri() . '/images/read_more-button.png'; ?>"></a></div>
		</div>
	</div>	
	<!-- End splash section -->

	<!-- Middle section -->
	<div class="container-fluid col-xs-12 section-about pattern">
		<div class="section-about-inner">
			<div><img id="target" style="opacity: 0.1;" src="<?php echo get_template_directory_uri() . '/images/logo-black.png'; ?>"></div>
			<div class="section-about-middle-header"><span><?php echo getOption('middle', 'title'); ?></span></div>
			<div class="section-about-middle-text"><span><?php echo getOption('middle','text'); ?></span></div>
			<div><a href="<?php echo getOption('middle','link'); ?>"><img class="read-more" src="<?php echo get_template_directory_uri() . '/images/read_more-button.png'; ?>"></a></div>
		</div>
	</div>
	<!-- End middle section -->

	<!-- Bottom left section -->
	<div class="col-xs-12 col-md-6 section-team_behind" style="background: <?php echo getOption('bottom_left','image'); ?>">
		<div class="section-team_behind-inner">
			<div class="section-team_behind-header"><span><?php echo getOption('bottom_left','title'); ?></span></div>
			<div class="section-team_behind-text"><span><?php echo getOption('bottom_left','text'); ?></span></div>
			<div><a href="<?php echo getOption('bottom_left','link'); ?>"><img class="read-more" src="<?php echo get_template_directory_uri() . '/images/read_more-button.png'; ?>"></a></div>
		</div>
	</div>
	<!-- End bottom left section -->

	<!-- Bottom right section -->
	<div class="col-xs-12 col-md-6 section-partners" style="background: <?php echo getOption('bottom_right','image'); ?>">
		<div class="section-partners-inner">
			<div class="section-partners-header"><span><?php echo getOption('bottom_right','title'); ?></span></div>
			<div class="section-partners-text"><span><?php echo getOption('bottom_right','text'); ?></span></div>
			<div><a href="<?php echo getOption('bottom_right','link'); ?>"><img class="read-more" src="<?php echo get_template_directory_uri() . '/images/read_more-button.png'; ?>"></a></div>
		</div>
	</div>
	<!-- End bottom right section -->

<?php get_footer(); ?>

<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		
		$(".intro-inner").animate({
			opacity: 1,
			maxWidth: 500
		}, 2500);

		if ($(window).width() > 768) {
			var controller = new ScrollMagic();
			var tween = TweenMax.to("#target", 1, {opacity: 1, scale: 1.1, ease: Linear.easeOut});
			var scene = new ScrollScene({triggerElement: ".pattern", duration: 200})
												.setTween(tween)
												.addTo(controller);
		} else {
			$("#target").animate({
				opacity: 1
			}, 1000);
		}
	});
</script>
