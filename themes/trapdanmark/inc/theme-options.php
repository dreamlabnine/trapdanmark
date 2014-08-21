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

$frontpage->createOption( array(
    'name' => 'Slideshow hastighed',
    'id' => 'background_speed',
    'type' => 'number',
    'desc' => 'Hvor mange sekunder mellem hvert baggrundsbillede',
    'default' => '5',
    'min' => '2',
    'max' => '10',
) );

for ($i=1; $i < 6; $i++) { 
	$frontpage->createOption( array(
		'name' => 'Baggrundsbillede #' . $i,
		'id' => 'background_img_' . $i,
		'type' => 'upload',
	) );

	$frontpage->createOption( array(
		'name'	=> 'Baggrundsbillede #' . $i . ' størrelse',
		'id'	=> 'background_img_size_' . $i,
		'type'	=> 'select',
		'desc'	=> 'Tilpassning af billede',
		'options' => array(
			'' => '- Vælg en',
        	'contain' => 'Gentag billedet',
        	'cover' => 'Tilpas billedet',
    	),
	) );
}



/**********************************
 * ABOUT US TAB
 *********************************/
$about_us = $TrapDanmarkPanel->createTab( array(
	'name' => 'OM OS',
) );

// Splash boks
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

// Midt sektion
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

// Bund venstre boks
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
	'name' => 'Baggrundsbillede',
	'id' => 'about_us_bottom_left_img',
	'type' => 'upload',
) );

$about_us->createOption( array(
	'name'		=> 'Special overskrift',
	'id'		=> 'about_us_bottom_left_title',
	'type'		=> 'text',
	'desc'		=> 'Hvis den skal have en anden overskift end den valgtes sides overskift'
) );

// Bund højre boks
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
	'name' => 'Baggrundsbillede',
	'id' => 'about_us_bottom_right_img',
	'type' => 'upload',
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
$person_array = list_people();

$team = $TrapDanmarkPanel->createTab( array(
	'name' => 'HOLDET BAG',
) );

// Bestyrelsen
$team->createOption( array(
    'name' => 'Bestyrelsen',
    'type' => 'heading',
) );

$team->createOption( array(
    'name' => 'Bestyrelsen',
    'id' => 'team_board_members',
    'type' => 'sortable',
    'desc' => 'Fravælg personer ikke i bestyrelsen og sorter dem. Kun 6 kan vises.',
    'options' => $person_array
) );

// Redaktionen
$team->createOption( array(
    'name' => 'Redaktionen',
    'type' => 'heading',
) );

$team->createOption( array(
    'name' => 'Redaktionen',
    'id' => 'team_editors',
    'type' => 'sortable',
    'desc' => 'Fravælg personer ikke i redaktionen og sorter dem. Kun 2 kan vises.',
    'options' => $person_array
) );

$team->createOption( array(
	'name' => 'Tekst',
	'id' => 'team_editors_text',
	'type' => 'editor',
) );

// Forfattere og konsulenter
$team->createOption( array(
    'name' => 'Forfattere og konsulenter',
    'type' => 'heading',
) );

$team->createOption( array(
	'name' => 'Tekst',
	'id' => 'team_writers_text',
	'type' => 'editor',
) );

// Trap rådet
$team->createOption( array(
    'name' => 'Trap rådet',
    'type' => 'heading',
) );

$team->createOption( array(
    'name' => 'Trap rådet',
    'id' => 'team_group',
    'type' => 'sortable',
    'desc' => 'Fravælg personer ikke i Trap rådet og sorter dem. Kun 10 kan vises.',
    'options' => $person_array
) );

$team->createOption( array(
	'name' => 'Tekst',
	'id' => 'team_group_text',
	'type' => 'editor',
) );


/**********************************
 * DONATORS TAB
 *********************************/

$donator = $TrapDanmarkPanel->createTab( array(
	'name' => 'DONATORER',
) );

for ($i=1; $i <= 5; $i++) { 

	// Donator #1
	$donator->createOption( array(
	    'name' => 'Donator #' . $i,
	    'type' => 'heading',
	) );
	$donator->createOption( array(
		'name' => 'Logo',
		'id' => 'donator_logo_normal_' . $i,
		'type' => 'upload',
	) );
	$donator->createOption( array(
		'name' => 'Logo (hover)',
		'id' => 'donator_logo_hover_' . $i,
		'type' => 'upload',
	) );
	$donator->createOption( array(
		'name' => 'Link',
		'id' => 'donator_logo_link_' . $i,
		'type' => 'text',
	) );
}

/**********************************
 * FOOTER TAB
 *********************************/

$footer = $TrapDanmarkPanel->createTab( array(
	'name' => 'FOOTER',
) );

$footer->createOption( array(
	'name' => 'Copyright tekst',
	'id' => 'footer_copyright',
	'type' => 'text',
) );

/**********************************
 * SAVE AND RESET BUTTON
 *********************************/
$TrapDanmarkPanel->createOption( array(
	'type' => 'save'
) );