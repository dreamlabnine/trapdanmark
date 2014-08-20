<?php
/*
Template Name: Test
*/
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package TrapDanmark
 */

get_header(); ?>
	
	<ul id="menu"></ul>
	<div id="content-wrapper">
		<div id="example-wrapper">
			<div class="scrollContent">
				<section id="titlechart">
					<div id="description">
						<h1>Simple Tweening</h1>
						<h2>Two examples of basic tweening.</h2>
						<ol>
							<li>When no duration is defined for the scene, the tween will simply start playing when the scroll reaches the trigger position.</li>
							<li>If the scene has a duration the progress of the tween will directly correspond to the scroll position.</li>
						</ol>
						<a href="#" class="viewsource">view source</a>
					</div>
					<script>
						var controller;
						$(document).ready(function($) {
							// init controller
							controller = new ScrollMagic();
						});
					</script>
				</section>
				<section class="demo">
					<div class="spacer s2"></div>
					<div id="trigger1" class="spacer s0"></div>
					<div id="animate1" class="box2 skin">
						<p>You wouldn't like me, when I'm angry!</p>
						<a href="#" class="viewsource">view source</a>
					</div>
					<div class="spacer s2"></div>
					<script>
						$(document).ready(function($) {
							// build tween
							var tween = TweenMax.to("#animate1", 0.5, {backgroundColor: "green", scale: 2.5});

							// build scene
							var scene = new ScrollScene({triggerElement: "#trigger1"})
											.setTween(tween)
											.addTo(controller);

							// show indicators (requires debug extension)
							scene.addIndicators();
						});
					</script>
				</section>
				<section class="demo">
					<div class="spacer s1"></div>
					<div id="trigger2" class="spacer s1"></div>
					<div class="spacer s0"></div>
					<div id="animate2" class="box1 black">
						<p>Smurf me!</p>
						<a href="#" class="viewsource">view source</a>
					</div>
					<div class="spacer s2"></div>
					<script>
						$(document).ready(function($) {
							// build tween
							var tween = TweenMax.fromTo("#animate2", 0.5, 
									{"border-top": "0px solid white"},
									{"border-top": "30px solid white", backgroundColor: "blue", scale: 0.7}
								);

							// build scene
							var scene = new ScrollScene({triggerElement: "#trigger2", duration: 300})
											.setTween(tween)
											.addTo(controller);

							// show indicators (requires debug extension)
							scene.addIndicators();
						});
					</script>
				</section>
				<div class="spacer s_viewport"></div>
			</div>
		</div>
	</div>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-37524344-3', 'janpaepke.github.io');
		ga('send', 'pageview');
	</script>

<?php get_footer(); ?>
