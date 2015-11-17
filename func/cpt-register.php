<?php
/*
add_action('init', 'codex_custom_init_project');
function codex_custom_init_project()
{
  $labels = array(
    'name' => _x('Projects', 'post type general name'),
    'singular_name' => _x('Project', 'post type singular name'),
    'add_new' => _x('Add New', 'project'),
    'add_new_item' => __('Add New Project'),
    'edit_item' => __('Edit Project'),
    'new_item' => __('New Project'),
    'view_item' => __('View Project'),
    'search_items' => __('Search Projects'),
    'not_found' =>  __('No project found'),
    'not_found_in_trash' => __('No project found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Projects'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','editor','author','revisions','custom-fields'),
    'taxonomies' => array('project_category')
  );
  register_post_type('project',$args);
};
*/

/*
add_action( 'init', 'create_project_taxonomy', 0 );
function create_project_taxonomy()
{
  $labels = array(
    'name' => _x( 'Project Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Project Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Project Categories' ),
    'all_items' => __( 'All Project Categories' ),
    'parent_item' => __( 'Parent Project Category' ),
    'parent_item_colon' => __( 'Parent Project Category:' ),
    'edit_item' => __( 'Edit Project Category' ),
    'update_item' => __( 'Update Project Category' ),
    'add_new_item' => __( 'Add New Project Category' ),
    'new_item_name' => __( 'New Project Category Name' ),
    'menu_name' => __( 'Project Categories' ),
  );
  register_taxonomy('project_category',array('project'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project-category'),
  ));
};
*/
?>