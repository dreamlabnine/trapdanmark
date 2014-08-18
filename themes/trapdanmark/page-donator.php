<?php
/*
Template Name: Donatorer
*/

/**
 * The template for displaying the donators page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package TrapDanmark
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="col-xs-12 page-featured-image" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>') center center;"></div>
				
				<div class="col-xs-12 page-container">

				<?php the_breadcrumb(); ?>
					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						// // If comments are open or we have at least one comment, load up the comment template
						// if ( comments_open() || '0' != get_comments_number() ) :
						// 	comments_template();
						// endif;
					?>

				</div>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_template_part( 'content', 'donator' ); ?>

<?php get_footer(); ?>
