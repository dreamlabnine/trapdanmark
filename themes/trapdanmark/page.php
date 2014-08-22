<?php
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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page_header' ); ?>
				
				<div class="col-xs-12 page-container">

					<?php the_breadcrumb(); ?>
					<?php get_template_part( 'content', 'page' ); ?>

				</div>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if (is_page( 'historien' )) get_template_part( 'content', 'page_history' ); else echo 'test'; ?>

<?php get_footer(); ?>
