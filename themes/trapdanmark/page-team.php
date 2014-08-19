<?php
/*
Template Name: Holdet bag
*/

/**
 * The template for displaying the team behind.
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

				<?php 
				$board_members = $titan->getOption( 'team_board_members' );
				$editors = $titan->getOption( 'team_editors' );
				$group_members = $titan->getOption( 'team_group' );
				?>

				<div class="col-xs-12 page-featured-image" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>') center center;"></div>
				
				<div class="col-xs-12 page-team-container">

					<div class="page-container"><?php the_breadcrumb(); ?></div>

					<div class="panel-group" id="accordion">

						<!-- Bestyrelsen -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									<h4 class="panel-title">
										<span>Bestyrelsen</span>
									</h4>
								</a>
							</div>
							<div id="collapseOne" class="panel-collapse collapse">
								<div class="panel-body">
									<ul class="team-list">
										<?php foreach ($board_members as $board_member_id) {
											echo '<li>' .  get_full_title($board_member_id) . get_position($board_member_id) . '</li>';
										} ?>
									</ul>
									<?php foreach ($board_members as $board_member_id) {
										echo '<div class="no-padding col-xs-6 col-sm-4 col-md-2 col-lg-2 team-members">';
											echo '<div style="background: url(' . get_profile_picture($board_member_id) . ') center center no-repeat; background-size: cover; height:180px;"></div>';
											echo '<div class="team-members-name"><span>' . get_the_title($board_member_id) . '</span></div>';
										echo '</div>';
									} ?>
								</div>
							</div>
						</div>
						
						<!-- Redaktionen -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
									<h4 class="panel-title">
										<span>Redaktionen</span>
									</h4>
								</a>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body team-editors">
							  		<div class="col-md-3">
							  			<?php foreach ($editors as $editor_id) {
							  				echo '<div style="background: url(' . get_profile_picture($editor_id) . ') center center no-repeat; background-size: cover; height:180px;"></div>';
							  				echo '<div class="team-members-name"><span>' . get_the_title($editor_id) . '</span></div>';
							  			} ?>						  		
							  		</div>
							  		<div class="col-md-9 team-editors-text">
							  			<?php echo $titan->getOption( 'team_editors_text' ); ?>
							  		</div>
								</div>
							</div>
						</div>
						
						<!-- Forfattere og konsulenter -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
									<h4 class="panel-title">
										<span>Forfattere og konsulenter</span>
									</h4>
								</a>
							</div>
							<div id="collapseThree" class="panel-collapse collapse">
								<div class="panel-body team-writers team-editors-text">
									<?php echo $titan->getOption( 'team_writers_text' ); ?>
								</div>
							</div>
						</div>

						<!-- Trap rådet -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
									<h4 class="panel-title">
										<span>Trap rådet</span>
									</h4>
								</a>
							</div>
							<div id="collapseFour" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="team-group team-group-text">
									<?php echo $titan->getOption( 'team_group_text' ); ?>
									</div>
									<?php foreach ($group_members as $group_member_id) {
										echo '<div class="no-padding col-xs-6 col-sm-15 team-members">';
											echo '<div style="background: url(' . get_profile_picture($group_member_id) . ') center center no-repeat; background-size: cover; height:180px;"></div>';
											echo '<div class="team-members-name"><span>' . get_the_title($group_member_id) . '</span></div>';
										echo '</div>';
									} ?>
								</div>
							</div>
						</div>

					</div>

				</div>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
