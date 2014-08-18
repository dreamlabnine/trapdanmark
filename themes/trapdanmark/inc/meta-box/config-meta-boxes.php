<?php
/**
 * prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign

add_filter( 'rwmb_meta_boxes', 'trapdanmark_register_meta_boxes' );
function trapdanmark_register_meta_boxes( $meta_boxes )
{
	$prefix = 'trapdanmark_';
	$meta_boxes[] = array(
		'title' => __( 'Oplysninger', 'trapdanmark' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',
		'fields' => array(
			array(
				'name'             => __( 'Navn med titel', 'trapdanmark' ),
				'id'               => "{$prefix}name_with_title",
				'type'             => 'text',
			),
			array(
				'name'             => __( 'Stilling', 'trapdanmark' ),
				'id'               => "{$prefix}position",
				'type'             => 'text',
			),
		),
		'pages'	   => array('personer'),
	);
	return $meta_boxes;
}