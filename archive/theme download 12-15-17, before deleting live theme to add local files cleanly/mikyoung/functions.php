<?php


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site Content',
		'menu_title'	=> 'Site Content',
		'menu_slug' 	=> 'acf-site-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
}



function register_my_menus(){

	register_nav_menus(

		array(

			'primary' => _( 'Main Menu' ),

		)

	);

}
add_action( 'init', 'register_my_menus');


function create_post_type() {

	register_post_type( 'project',

		array(

			'labels' => array(

				'name' => 'Projects',

				'singular_name' =>'Project',

				'add_new' => 'Add New',

				'add_new_item' => 'Add New Project',

				'edit_item' => 'Edit Project',

				'new_item' => 'New Project',

				'all_items' => 'All Projects',

				'view_item' => 'View Project',

				'search_items' => 'Search Projects',

				'not_found' =>  'No Projects found',

				'not_found_in_trash' => 'No Projects found in Trash', 				

			),

			'public' => true,

			'has_archive' => true,

			'rewrite' => array('slug' => 'projects'),

			'supports' => array( 'title', 'editor','thumbnail'),

			'taxonomies' => array('post_tag')			

		)

	);	

}
add_action( 'init', 'create_post_type' );




function custom_taxonomy()  {

	$labels = array(

		'name'                       => _x( 'Project Categories', 'Taxonomy General Name', 'text_domain' ),

		'singular_name'              => _x( 'Project Category', 'Taxonomy Singular Name', 'text_domain' ),

		'menu_name'                  => __( 'Project Category', 'text_domain' ),

		'all_items'                  => __( 'All Project Categories', 'text_domain' ),

		'parent_item'                => __( 'Parent Project Category', 'text_domain' ),

		'parent_item_colon'          => __( 'Parent Project Category:', 'text_domain' ),

		'new_item_name'              => __( 'New Project Category Name', 'text_domain' ),

		'add_new_item'               => __( 'Add New Project Category', 'text_domain' ),

		'edit_item'                  => __( 'Edit Project Category', 'text_domain' ),

		'update_item'                => __( 'Update Project Category', 'text_domain' ),

		'separate_items_with_commas' => __( 'Separate Project Categories with commas', 'text_domain' ),

		'search_items'               => __( 'Search Project Categories', 'text_domain' ),

		'add_or_remove_items'        => __( 'Add or remove Project Categories', 'text_domain' ),

		'choose_from_most_used'      => __( 'Choose from the most used Project Categories', 'text_domain' ),

	);

	$args = array(

		'labels'                     => $labels,

		'hierarchical'               => true,

		'public'                     => true,

		'show_ui'                    => true,

		'show_admin_column'          => true,

		'show_in_nav_menus'          => true,

		'show_tagcloud'              => true,

	);

	register_taxonomy( 'project_category', 'project', $args );

}
add_action( 'init', 'custom_taxonomy', 0 );





function theme_styles(){ 

	wp_register_style( 'main-css', get_template_directory_uri() . '/_/css/main.css'); 

	wp_enqueue_style( 'main-css' );  

}
add_action('wp_enqueue_scripts', 'theme_styles');



// function enqueue_less_styles($tag, $handle) {

// 	global $wp_styles;

// 	$match_pattern = '/\.less$/U';

// 	if ( preg_match( $match_pattern, $wp_styles->registered[$handle]->src ) ) {

// 		$handle = $wp_styles->registered[$handle]->handle;

// 		$media = $wp_styles->registered[$handle]->args;

// 		$href = $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;

// 		$rel = isset($wp_styles->registered[$handle]->extra['alt']) && $wp_styles->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';

// 		$title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr( $wp_styles->registered[$handle]->extra['title'] ) . "'" : '';



// 		$tag = "<link rel='stylesheet' id='$handle' $title href='$href' type='text/less' media='$media' />";

// 	}

// 	return $tag;

// }

// add_filter( 'style_loader_tag', 'enqueue_less_styles', 5, 2);





if ( function_exists( 'add_theme_support' ) ) {

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 1200, 1200, false );

}

if ( function_exists( 'add_image_size' ) ) {

	add_image_size( 'slideshow', 1680, 1000, true );

	add_image_size( 'landing', 1680, 1050, true );	

	add_image_size('project-slideshow',1440,768, true); 

	add_image_size('publications',300, 400, true); 	

	add_image_size( 'project-small', 260, 160, true ); 

	add_image_size( 'project-large', 1000, 777, true ); 

	add_image_size( 'project-tile', 488, 260, true ); 

	add_image_size( 'award-icon', 75, 75, true ); 

	add_image_size( 'person', 500, 500, true ); 

}



function autoset_featured() {

	global $post;

	$already_has_thumb = has_post_thumbnail($post->ID);

	if (!$already_has_thumb)  {

		$attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );

		if ($attached_image) {

			foreach ($attached_image as $attachment_id => $attachment) {

				set_post_thumbnail($post->ID, $attachment_id);

			}

		}

	}

}
add_action('the_post', 'autoset_featured');

add_action('save_post', 'autoset_featured');

add_action('draft_to_publish', 'autoset_featured');

add_action('new_to_publish', 'autoset_featured');

add_action('pending_to_publish', 'autoset_featured');

add_action('future_to_publish', 'autoset_featured');



function login_css() {

	wp_enqueue_style( 'login_css', get_template_directory_uri() . '/_/css/login.css' );

}
add_action('login_head', 'login_css');



function customAdmin() {

	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/_/css/admin.css' );

}
add_action('admin_head', 'customAdmin');


function get_template_parts( $parts = array() ) {

	foreach( $parts as $part ) {

		get_template_part( $part );

	};

}



add_filter('gettext', 'rename_admin_menu_items');

add_filter('ngettext', 'rename_admin_menu_items');



function rename_admin_menu_items( $menu ) {



	$menu = str_ireplace( 'Posts', 'Blog', $menu );



	return $menu;

}


show_admin_bar(false);


define('MAGPIE_FETCH_TIME_OUT', 180);


function custom_excerpt_length ( $length ) {

	if ( is_single() ) 

	{ 

		$length = 10; 

	} else {

		$length = 43;

	}



	return $length;

} // End woo_custom_excerpt_length()

add_filter( 'excerpt_length', 'custom_excerpt_length');



?>