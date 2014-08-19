<?php
/**
 * TrapDanmark functions and definitions
 *
 * @package TrapDanmark
 */

if ( ! function_exists( 'trapdanmark_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function trapdanmark_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TrapDanmark, use a find and replace
	 * to change 'trapdanmark' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'trapdanmark', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'trapdanmark' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'gallery', 'caption'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'trapdanmark_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // trapdanmark_setup
add_action( 'after_setup_theme', 'trapdanmark_setup' );

/**
 * Enqueue scripts and styles.
 */
function trapdanmark_scripts() {
	wp_enqueue_style( 'trapdanmark-style', get_stylesheet_uri() );
	wp_enqueue_script( 'trapdanmark-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'trapdanmark-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.0.1', true );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap/css/bootstrap.min.css', array(), '3.0.1', 'all' );

	wp_enqueue_style( 'trapdanmark-custom-style', get_template_directory_uri() . '/css/trapdanmark.css' );

	wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . '/js/modernizr.custom.86080.js');

}
add_action( 'wp_enqueue_scripts', 'trapdanmark_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**
 * Use the embedded Titan Framework
 *
 * When using the embedded framework, use it only if the framework
 * plugin isn't activated.
 *
 * @since TrapDanmark 0.5
 */
// Don't do anything when we're activating a plugin to prevent errors
// on redeclaring Titan classes
if ( ! empty( $_GET['action'] ) && ! empty( $_GET['plugin'] ) ) {
    if ( $_GET['action'] == 'activate' ) {
        return;
    }
}
// Check if the framework plugin is activated
$useEmbeddedFramework = true;
$activePlugins = get_option('active_plugins');
if ( is_array( $activePlugins ) ) {
    foreach ( $activePlugins as $plugin ) {
        if ( is_string( $plugin ) ) {
            if ( stripos( $plugin, '/inc/titan-framework.php' ) !== false ) {
                $useEmbeddedFramework = false;
                break;
            }
        }
    }
}
if ( $useEmbeddedFramework && ! class_exists( 'TitanFramework' ) ) {
    require_once( trailingslashit( dirname( __FILE__ ) ) . '/inc/titan-framework/titan-framework.php' );
}
$titan = TitanFramework::getInstance( 'trapdanmark' );
require get_template_directory() . '/inc/theme-options.php';



/**
 * Use the embedded meta-box Framework
 *
 * @since TrapDanmark 0.5
 */
// Re-define meta box path and URL
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/inc/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/inc/meta-box' ) );
// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';
// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
include RWMB_DIR . 'config-meta-boxes.php';



/**
 * Register Custom Post Type: Persons
 *
 * @since 0.0.5
 */
function personer() {
	$labels = array(
		'name'                => _x( 'Personer', 'Post Type General Name', 'trapdanmark' ),
		'singular_name'       => _x( 'Person', 'Post Type Singular Name', 'trapdanmark' ),
		'menu_name'           => __( 'Personer', 'trapdanmark' ),
		'parent_item_colon'   => __( 'Parent Item:', 'trapdanmark' ),
		'all_items'           => __( 'Alle personer', 'trapdanmark' ),
		'view_item'           => __( 'Se person', 'trapdanmark' ),
		'add_new_item'        => __( 'Tilføj ny person', 'trapdanmark' ),
		'add_new'             => __( 'Tilføj ny', 'trapdanmark' ),
		'edit_item'           => __( 'Ændre person', 'trapdanmark' ),
		'update_item'         => __( 'Opdater person', 'trapdanmark' ),
		'search_items'        => __( 'Søg person', 'trapdanmark' ),
		'not_found'           => __( 'Ikke fundet', 'trapdanmark' ),
		'not_found_in_trash'  => __( 'Ikke fundet i affaldskurv', 'trapdanmark' ),
	);
	$args = array(
		'label'               => __( 'personer', 'trapdanmark' ),
		'description'         => __( 'Personer', 'trapdanmark' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-groups',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'personer', $args );
}
// Hook into the 'init' action
add_action( 'init', 'personer', 0 );


/******************************************
 * Custom functions
 ******************************************/

/**
 * Creates a nicely formatted breadcrumb.
 *
 * @since TrapDanmark 0.5
 * @return formatted breadcrumb list 
 */
function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li class="pretext">DU ER HER:</li>';
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Forside';
        echo '</a></li><li class="breadcrumb_separator"> > </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="breadcrumb_separator"> > </li><li> ');
            if (is_single()) {
                echo '</li><li class="breadcrumb_separator"> > </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="breadcrumb_separator">></li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since TrapDanmark 0.5
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function trapdanmark_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	return $title;
}
add_filter( 'wp_title', 'trapdanmark_wp_title', 10, 2 );


/**
 * Get the full title if available
 *
 * @since TrapDanmark 0.6
 *
 * @param string $ID ID for person.
 * @return string Filtered title.
 */
function get_full_title($ID) {
	$full_title = (rwmb_meta( 'trapdanmark_name_with_title', $args = array(), $post_id = $ID )) ? rwmb_meta( 'trapdanmark_name_with_title', $args = array(), $post_id = $ID ) : get_the_title($ID);
	return $full_title;
}


/**
 * Get the persons position if available
 *
 * @since TrapDanmark 0.6
 *
 * @param string $ID ID for person.
 * @return string Filtered position.
 */
function get_position($ID) {
	$position = (rwmb_meta( 'trapdanmark_position', $args = array(), $post_id = $ID )) ? ', ' . rwmb_meta( 'trapdanmark_position', $args = array(), $post_id = $ID ) : '';
	return $position;
}


/**
 * Get the profile picture if available or a placeholder if not
 *
 * @since TrapDanmark 0.6
 *
 * @param string $ID ID for person.
 * @return string Filtered position.
 */
function get_profile_picture($ID) {
	$profile_picture = wp_get_attachment_url( get_post_thumbnail_id($ID) ) ? wp_get_attachment_url( get_post_thumbnail_id($ID) ) : 'http://placehold.it/240x180';
	return $profile_picture;
}


/**
 * Lists all people in an array with the their ID
 *
 * @since TrapDanmark 0.6
 *
 * @return array with ID.
 */
function list_people()
{
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
		$people_array[$person->ID] = $person->post_title;
	}

	return $people_array;
}
