<?php

/*
// ---------
// Script includes 
//----------
*/

	// Load custom functions
	$functions_path = TEMPLATEPATH . '/func/';
	//require_once ($functions_path . 'add-meta-boxes.php');
	//require_once ($functions_path . 'cpt-register.php');
	//require_once ($functions_path . 'custom-theme-settings.php');

/*
// ---------
// Enqueue scripts 
//----------
*/

	//Replace WP Enqueue jQuery with Google jQuery
	function add_scripts(){
		// Load jQuery
		if ( !is_admin() ) {
			wp_deregister_script('jquery');
		   wp_register_script('jquery', ('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'), false);
		   wp_enqueue_script('jquery');
		
			// Your Scripts
			
			//wp_register_script('site', get_bloginfo('url').'/wp-content/themes/xk3/js/site.js', array('jquery'));
			//wp_enqueue_script('site');
		
			wp_register_script('site_js', get_stylesheet_directory_uri().'/js/site.js', array('jquery'));
			wp_enqueue_script('site_js');

		}
	}
	add_action('init','add_scripts');


/*
// ---------
// Register capabilities 
//----------
*/
	
	// custom background support
	//add_custom_background();

	// post thumbnail support
	add_theme_support( 'post-thumbnails' );
	
	// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header_menu' => 'Header Menu'
	  		)
	  	);
	}
	
	if ( function_exists('register_sidebar') )
	// Sidebar Widget
	// Location: the sidebar
	register_sidebar(array('name'=>'Sidebar',
		'before_widget' => '<div id="widget-sidebar" class="widget-area"><ul>',
		'after_widget' => '</ul></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
		
	// enable threaded comments
	function enable_threaded_comments(){
	if (!is_admin()) {
	if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
	wp_enqueue_script('comment-reply');
	}
	}
	add_action('get_header', 'enable_threaded_comments');	

/*
// ---------
// Admin customization 
//----------
*/

    //Remove unneeded admin dashboard widgets
    function disable_default_dashboard_widgets() {
        //remove_meta_box('dashboard_right_now', 'dashboard', 'core');
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
        //remove_meta_box('dashboard_plugins', 'dashboard', 'core');
        //remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
        //remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
        remove_meta_box('dashboard_primary', 'dashboard', 'core');
        remove_meta_box('dashboard_secondary', 'dashboard', 'core');
    }
    add_action('admin_menu', 'disable_default_dashboard_widgets');


	// turn admin bar off when viewing site
	add_filter( 'show_admin_bar', '__return_false' );
	remove_action( 'init', 'wp_admin_bar_init' );

	
	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));
	
	// Removes Trackbacks from the comment cout
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
		} else {
		return $count;
		}
	}
	
	//Custom thumbnail sizes	
	/*
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'extra-posts-thumb', 100, 100, true ); //(cropped)
		add_image_size( 'archive-thumb', 180, 180, true ); //(cropped)
		}
	*/

	//Add Twitter in Author Profile and remove Yahoo IM, Jabber, AIM
	function add_twitter_contactmethod( $contactmethods ) {
		// Add Twitter
		$contactmethods['twitter'] = 'Twitter Username';
	
		// Remove Yahoo IM
		unset($contactmethods['yim']);
	
		// Remove Jabber
		unset($contactmethods['jabber']);
	
		// Remove AIM
		unset($contactmethods['aim']);
		return $contactmethods;
	}
	add_filter('user_contactmethods','add_twitter_contactmethod',10,1);

	
/*
// ---------
// Front-end customization 
//----------
*/

	function no_more_jumping($post) {
		return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'&nbsp;Read More'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');
	
	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');
	
	
	// Filter wp_nav_menu() to add additional links and other output
	/*
	function new_nav_menu_items($items) {
		$homelink = '<li class="home"><a href="' . home_url( '/' ) . '">' . __('Home') . '</a></li>';
		$items = $homelink . $items;
		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'new_nav_menu_items' );
	*/
	
	/*
	if (is_plugin_active('plugin-directory/plugin-file.php')) {
		    //plugin is activated
		}
	*/

	//Gravity forms tab index fix
	add_filter("gform_tabindex", create_function("", "return false;"));
	
	//Header cleanup
	remove_action('wp_head', 'wp_generator');

		
/*
// ---------
// Front-end utility 
//----------
*/
	
	// Shorter excerpt
	function the_excerpt_max_charlength($charlength) {
	   $excerpt = get_the_excerpt();
	   $charlength++;
	   if(strlen($excerpt)>$charlength) {
	       $subex = substr($excerpt,0,$charlength-5);
	       $exwords = explode(" ",$subex);
	       $excut = -(strlen($exwords[count($exwords)-1]));
	       if($excut<0) {
	            echo substr($subex,0,$excut);
	       } else {
	       	    echo $subex;
	       }
	       echo ' <a href="'.get_permalink().'"> Read more ...</a>';
	   } else {
		   echo $excerpt;
	   }
	}
	
	function wpe_excerptlength_teaser($length) {
    	return 20;
	}
	function wpe_excerptlength_archive($length) {
	    return 80;
	}
	function wpe_excerptmore($more) {
	    return '<a class="more-link" href="'.get_permalink().'">Read More</a>';
	}
	
	function wpe_excerpt($length_callback='', $more_callback='') {
	    global $post;
	    if(function_exists($length_callback)){
	        add_filter('excerpt_length', $length_callback);
	    }
	    if(function_exists($more_callback)){
	        add_filter('excerpt_more', $more_callback);
	    }
	    $output = get_the_excerpt();
	    $output = apply_filters('wptexturize', $output);
	    $output = apply_filters('convert_chars', $output);
	    $output = '<p>'.$output.'&nbsp...</p>';
	    echo $output;
	}
			
// --------------------------

if ( ! function_exists( 'twentyeleven_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyeleven_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 */
	function twentyeleven_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
		<?php
				break;
			default :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php
							$avatar_size = 68;
							if ( '0' != $comment->comment_parent )
								$avatar_size = 39;
	
							echo get_avatar( $comment, $avatar_size );
	
							/* translators: 1: comment author, 2: date and time */
							printf( __( '%1$s on %2$s <span class="says">said:</span>', 'twentyeleven' ),
								sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
								sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
									esc_url( get_comment_link( $comment->comment_ID ) ),
									get_comment_time( 'f j, Y' ),
									/* translators: 1: date, 2: time */
									sprintf( __( '%1$s', 'twentyeleven' ), get_comment_date() )
								)
							);
						?>
	
						<?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-author .vcard -->
	
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
						<br />
					<?php endif; ?>
	
				</footer>
	
				<div class="comment-content"><?php comment_text(); ?></div>
	
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</article><!-- #comment-## -->
	
		<?php
				break;
		endswitch;
	}
	endif; // ends check for twentyeleven_comment()