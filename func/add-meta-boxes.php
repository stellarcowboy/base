<?php

/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */
 
// https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress/wiki/Field-Types

//'show_on' => array( 'key' => 'id', 'value' => array( 50, 24 ) ),
//'show_on' => array( 'key' => 'child_of', 'value' => array( 461 ) ),

add_filter( 'cmb_meta_boxes', 'client_metaboxes' );

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function client_metaboxes( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields

	/*
$meta_boxes[] = array(
		'id' => 'homepage_feature_metabox',
		'title' => 'Homepage Feature Metadata',
		'pages' => array('page'), // post type
		'show_on' => array( 'key' => 'child_of', 'value' => array( 461 ) ),		
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Feature Bucket Text',
				'desc' => 'This is the text for homepage bucket',
				'id' => $prefix . 'home_feature_bucket',
				'type' => 'wysiwyg'
			),
		)
	);

	$meta_boxes[] = array(
		'id' => 'staff_metabox',
		'title' => 'Staff Information',
		'pages' => array('staff'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Position',
				'desc' => 'List position',
				'id' => $prefix . 'staff_position',
				'type' => 'text'
			),
			array(
				'name' => 'Staff Image',
				'desc' => 'Upload 150 x 224 staff photo',
				'id' => $prefix . 'staff_image',
				'type' => 'file',
         	'save_id' => true, // save ID using true
         	'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
		)
	);
*/

	return $meta_boxes;
}

add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'cmb/init.php' );
	}
}

/**
 * Metabox for Children of Parent ID
 * @author Kenneth White
 * @link https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $meta_box
 * @return bool display metabox
 */
function be_metabox_show_on_child_of( $display, $meta_box ) {
	if ( 'child_of' !== $meta_box['show_on']['key'] )
		return $display;

	// If we're showing it based on ID, get the current ID					
	if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
	elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];
	if( !isset( $post_id ) )
		return $display;

	// If current page id is in the included array, do not display the metabox
	$meta_box['show_on']['value'] = !is_array( $meta_box['show_on']['value'] ) ? array( $meta_box['show_on']['value'] ) : $meta_box['show_on']['value'];
   $pageids = array();
	foreach ($meta_box['show_on']['value'] as $parent_id) {
   	$pages = get_pages('child_of='.$parent_id);
   	  foreach($pages as $page){
      	  $pageids[] = $page->ID;
         }
	}
	$pageids_unique = array_unique($pageids);
	if ( in_array( $post_id, $pageids_unique ) )
		return true;
	else
		return false;
}
add_filter( 'cmb_show_on', 'be_metabox_show_on_child_of', 10, 2 );