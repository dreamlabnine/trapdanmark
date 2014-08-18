<?php

// Admin framework
$TrapDanmarkPanel = $titan->createAdminPanel( array(
	'name' => 'TrapDanmark',
) );

/**********************************
 * HOME PAGE TAB
 *********************************/

$frontpage = $TrapDanmarkPanel->createTab( array(
	'name' => 'FORSIDE',
) );


/**********************************
 * HOME PAGE SLIDER
 *********************************/

$frontpage->createOption( array(
    'name' => 'FORSIDE Slider',
    'type' => 'heading',
) );


/**********************************
 * ABOUT US TAB
 *********************************/
$about_us = $TrapDanmarkPanel->createTab( array(
	'name' => 'OM OS',
) );

$about_us->createOption( array(
    'name' => 'Splash boks',
    'type' => 'heading',
) );

$about_us->createOption( array(
	'name' => 'Side',
	'id' => 'about_us_splash_page_id',
	'type' => 'select-pages',
	'desc' => 'Vælg en side'
) );

$about_us->createOption( array(
	'name' => 'Tekst',
	'id' => 'about_us_splash_text',
	'type' => 'editor',
) );

$about_us->createOption( array(
	'name'		=> 'Special overskrift',
	'id'		=> 'about_us_splash_title',
	'type'		=> 'text',
	'desc'		=> 'Hvis den skal have en anden overskift end den valgtes sides overskift'
) );


$about_us->createOption( array(
    'name' => 'Midt sektion',
    'type' => 'heading',
) );

$about_us->createOption( array(
	'name' => 'Side',
	'id' => 'about_us_middle_page_id',
	'type' => 'select-pages',
	'desc' => 'Vælg en side'
) );

$about_us->createOption( array(
	'name' => 'Tekst',
	'id' => 'about_us_middle_text',
	'type' => 'editor',
) );

$about_us->createOption( array(
	'name'		=> 'Special overskrift',
	'id'		=> 'about_us_middle_title',
	'type'		=> 'text',
	'desc'		=> 'Hvis den skal have en anden overskift end den valgtes sides overskift'
) );


$about_us->createOption( array(
    'name' => 'Bund venstre boks',
    'type' => 'heading',
) );

$about_us->createOption( array(
	'name' => 'Side',
	'id' => 'about_us_bottom_left_page_id',
	'type' => 'select-pages',
	'desc' => 'Vælg en side'
) );

$about_us->createOption( array(
	'name' => 'Tekst',
	'id' => 'about_us_bottom_left_text',
	'type' => 'editor',
) );

$about_us->createOption( array(
	'name'		=> 'Special overskrift',
	'id'		=> 'about_us_bottom_left_title',
	'type'		=> 'text',
	'desc'		=> 'Hvis den skal have en anden overskift end den valgtes sides overskift'
) );


$about_us->createOption( array(
    'name' => 'Bund højre boks',
    'type' => 'heading',
) );

$about_us->createOption( array(
	'name' => 'Side',
	'id' => 'about_us_bottom_right_page_id',
	'type' => 'select-pages',
	'desc' => 'Vælg en side'
) );

$about_us->createOption( array(
	'name' => 'Tekst',
	'id' => 'about_us_bottom_right_text',
	'type' => 'editor',
) );

$about_us->createOption( array(
	'name'		=> 'Special overskrift',
	'id'		=> 'about_us_bottom_right_title',
	'type'		=> 'text',
	'desc'		=> 'Hvis den skal have en anden overskift end den valgtes sides overskift'
) );


/**********************************
 * THE TEAM BEHIND
 *********************************/
$team = $TrapDanmarkPanel->createTab( array(
	'name' => 'HOLDET BAG',
) );


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
	$person_array[$person->ID] = $person->post_title;
}
$team->createOption( array(
    'name' => 'Bestyrelsen',
    'id' => 'team_board_members',
    'type' => 'sortable',
    'desc' => 'Kun 6 vil blive vist',
    'options' => $person_array
) );

/**********************************
 * SAVE AND RESET BUTTON
 *********************************/
$TrapDanmarkPanel->createOption( array(
	'type' => 'save'
) );