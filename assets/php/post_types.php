<?php

if ( ! function_exists('clients') ) {

// Register Custom Post Type
function clients() {

	$labels = array(
		'name'                  => _x( 'Clients', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Clients', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Clients', 'text_domain' ),
		'name_admin_bar'        => __( 'Clients', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Clients', 'text_domain' ),
		'add_new_item'          => __( 'Add New Client', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Client', 'text_domain' ),
		'edit_item'             => __( 'Edit Client', 'text_domain' ),
		'update_item'           => __( 'Update Client', 'text_domain' ),
		'view_item'             => __( 'View Client', 'text_domain' ),
		'search_items'          => __( 'Search Client', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'items_list'            => __( 'Clients list', 'text_domain' ),
		'items_list_navigation' => __( 'Clients list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'clients',
		'with_front'            => true,
		'pages'                 => false,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => __( 'Clients', 'text_domain' ),
		'description'           => __( 'Client Database', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'taxonomies'            => array( 'category'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'clients', $args );

}
add_action( 'init', 'clients', 0 );

}
add_filter('manage_clients_posts_columns', 'clients_table_head');
function clients_table_head( $defaults ) {
    $defaults['uploaded_by']  = 'Uploaded By';
    $defaults['categories']    = 'Client';
    $defaults['type']   = 'File Type';
    $defaults['title']   = 'File name';
   
    return $defaults;
}

add_action( 'manage_clients_posts_custom_column', 'clients_table_content', 10, 2 );

function clients_table_content( $column_name, $post_id ) {
	$c_opt_file = rwmb_meta("Cfile");
    $c_opt_author = rwmb_meta("uploaded_by" );
    $c_opt_type = rwmb_meta("type");

    if ($column_name == 'uploaded_by') {
    	echo $c_opt_author;
    }
    if ($column_name == 'categories') {
	    echo get_categories();
    }

    if ($column_name == 'type') {
    	echo $c_opt_type;
    }

}

