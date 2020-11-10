<?php
function testimonial_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'faltoo' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'faltoo' ),
		'menu_name'             => __( 'Testimonials', 'faltoo' ),
		'name_admin_bar'        => __( 'Testimonial', 'faltoo' ),
		'archives'              => __( 'Item Archives', 'faltoo' ),
		'attributes'            => __( 'Item Attributes', 'faltoo' ),
		'parent_item_colon'     => __( 'Parent Item:', 'faltoo' ),
		'all_items'             => __( 'All Items', 'faltoo' ),
		'add_new_item'          => __( 'Add New Testimonial', 'faltoo' ),
		'add_new'               => __( 'Add Testimonial', 'faltoo' ),
		'new_item'              => __( 'New Testimonial', 'faltoo' ),
		'edit_item'             => __( 'Edit Item', 'faltoo' ),
		'update_item'           => __( 'Update Item', 'faltoo' ),
		'view_item'             => __( 'View Item', 'faltoo' ),
		'view_items'            => __( 'View Items', 'faltoo' ),
		'search_items'          => __( 'Search Item', 'faltoo' ),
		'not_found'             => __( 'Not found', 'faltoo' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'faltoo' ),
		'featured_image'        => __( 'Author Image', 'faltoo' ),
		'set_featured_image'    => __( 'Set Author image', 'faltoo' ),
		'remove_featured_image' => __( 'Remove Author image', 'faltoo' ),
		'use_featured_image'    => __( 'Use as Author image', 'faltoo' ),
		'insert_into_item'      => __( 'Insert into item', 'faltoo' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'faltoo' ),
		'items_list'            => __( 'Items list', 'faltoo' ),
		'items_list_navigation' => __( 'Items list navigation', 'faltoo' ),
		'filter_items_list'     => __( 'Filter items list', 'faltoo' ),
	);

	$args = array(
		'label'                 => __( 'Testimonial', 'faltoo' ),
		'description'           => __( 'Testimonial information page.', 'faltoo' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	
	register_post_type( 'faltoo_testimonials', $args);

}
add_action( 'init', 'testimonial_post_type', 0 );

// remove_meta_box('wpseo_meta', testimonials, 'normal');