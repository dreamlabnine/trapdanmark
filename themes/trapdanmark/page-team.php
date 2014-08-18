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

				<div class="col-xs-12 page-featured-image" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>') center center;"></div>
				
				<div class="col-xs-12 page-team-container">
<?php 

$board_members = $titan->getOption( 'team_board_members' );
$args = array(
	'posts_per_page'   => -1,
	'offset'           => 0,
	'category'         => '',
	'orderby'          => 'title',
	'order'            => 'ASC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'personer',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true ); 
$personer = get_posts( $args );
foreach ($personer as $person) {
	$person_array_test[$person->ID] = $person->post_name;
}

echo "<pre>";
print_r($board_members);
echo "</pre>";

echo rwmb_meta( 'trapdanmark_name_with_title', $args = array(), $post_id = 37 );

function get_full_title($ID) {
	$full_title = (rwmb_meta( 'trapdanmark_name_with_title', $args = array(), $post_id = $ID )) ? rwmb_meta( 'trapdanmark_name_with_title', $args = array(), $post_id = $ID ) : get_the_title($ID);
	return $full_title;
}
function get_position($ID) {
	$position = (rwmb_meta( 'trapdanmark_position', $args = array(), $post_id = $ID )) ? ', ' . rwmb_meta( 'trapdanmark_position', $args = array(), $post_id = $ID ) : '';
	return $position;
}
function get_profile_picture($ID) {
	$profile_picture = wp_get_attachment_url( get_post_thumbnail_id($ID) ) ? wp_get_attachment_url( get_post_thumbnail_id($ID) ) : 'http://placehold.it/240x180';
	return $profile_picture;
}
?>

					<div class="page-container"><?php the_breadcrumb(); ?></div>
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">

							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									<h4 class="panel-title">
										<span>Bestyrelsen</span>
									</h4>
								</a>
							</div>

						<div id="collapseOne" class="panel-collapse collapse in">
							<div class="panel-body">
								<ul class="team-list">
									<?php foreach ($board_members as $board_member_id) {
										echo '<li>' .  get_full_title($board_member_id) . get_position($board_member_id) . '</li>';
									} ?>
								</ul>
								<?php foreach ($board_members as $board_member_id) {
									echo '<div class="no-padding col-xs-12 col-sm-6 col-md-4 col-lg-2"><div style="background: url(' . get_profile_picture($board_member_id) . ') center center no-repeat; background-size: cover; height:180px;"></div><div>test</div></div>';
								} ?>
							</div>
						</div>
					  </div>
					  <div class="panel panel-default">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
									<h4 class="panel-title">
										<span>Collapsible Group Item #1</span>
									</h4>
								</a>
							</div>
						<div id="collapseTwo" class="panel-collapse collapse">
						  <div class="panel-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						  </div>
						</div>
					  </div>
					  <div class="panel panel-default">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
									<h4 class="panel-title">
										<span>Collapsible Group Item #1</span>
									</h4>
								</a>
							</div>
						<div id="collapseThree" class="panel-collapse collapse">
						  <div class="panel-body">
								<div class="col-sm-15">test</div>
								<div class="col-sm-15">test</div>
								<div class="col-sm-15">test</div>
								<div class="col-sm-15">test</div>
								<div class="col-sm-15">test</div>
						  </div>
						</div>
					  </div>
					</div>

				</div>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
