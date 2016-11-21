<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/*  CREATE CLASS TAXONOMY FOR PAGES
 * --------------------------------------------------*/
 // hook into the init action and call create_class_taxonomy when it fires
 add_action( 'init', 'create_class_taxonomy', 0 );

 // create taxonomy to add CSS class to page/section
 function create_class_taxonomy() {
 	// Add new taxonomy, make it hierarchical (like categories)
 	$labels = array(
 		'name'              => _x( 'Page Class', 'taxonomy general name', 'textdomain' ),
 		'singular_name'     => _x( 'Page Class', 'taxonomy singular name', 'textdomain' ),
 		'search_items'      => __( 'Search Page Classes', 'textdomain' ),
 		'all_items'         => __( 'All Page Classes', 'textdomain' ),

 		'edit_item'         => __( 'Edit Page Class', 'textdomain' ),
 		'update_item'       => __( 'Update Page Class', 'textdomain' ),
 		'add_new_item'      => __( 'Add New Page Class', 'textdomain' ),
 		'new_item_name'     => __( 'New Page Class Name', 'textdomain' ),
 		'menu_name'         => __( 'Page Class', 'textdomain' ),
 	);

 	$args = array(
 		'hierarchical'      => false,
 		'labels'            => $labels,
 		'show_ui'           => true,
 		'show_admin_column' => true,
 		'query_var'         => true,
 	);

 	register_taxonomy( 'page_classes', 'page', $args );
}
