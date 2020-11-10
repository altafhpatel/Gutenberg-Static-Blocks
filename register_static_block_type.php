<?php
/*
 * @author 			Altaf Hussain Patel
 * @description Static blocks post type for gutenberg block wordpress
 * @Speciality  Include shortcode on post page see screenshot
 * @screenshot   		
 * version 1.0
 */
function register_static_blocks_type() {

	$labels = array(
		'name'                  => _x( 'Static Blocks', 'Post Type General Name', 'faltoo' ),
		'singular_name'         => _x( 'StaticBlock', 'Post Type Singular Name', 'faltoo' ),
		'menu_name'             => __( 'Static Blocks', 'faltoo' ),
		'name_admin_bar'        => __( 'Static Blocks', 'faltoo' ),
		'archives'              => __( 'Item Archives', 'faltoo' ),
		'attributes'            => __( 'Item Attributes', 'faltoo' ),
		'parent_item_colon'     => __( 'Parent Blocks:', 'faltoo' ),
		'all_items'             => __( 'All Blocks', 'faltoo' ),
		'add_new_item'          => __( 'Add New Static Block', 'faltoo' ),
		'add_new'               => __( 'Add Static Block', 'faltoo' ),
		'new_item'              => __( 'New Static Block', 'faltoo' ),
		'edit_item'             => __( 'Edit Block', 'faltoo' ),
		'update_item'           => __( 'Update Block', 'faltoo' ),
		'view_item'             => __( 'View Block', 'faltoo' ),
		'view_items'            => __( 'View Blocks', 'faltoo' ),
		'search_items'          => __( 'Search Block', 'faltoo' ),
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
		'label'                 => __( 'Static Block', 'faltoo' ),
		'description'           => __( 'Static Block information page.', 'faltoo' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
		'show_in_rest' 					=> true,
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	
	register_post_type( 'f_static_block', $args);

}
add_action( 'init', 'register_static_blocks_type', 0 );

function get_f_static_block($atts = null){
	$parameters = shortcode_atts( array(
		'id' => '',
	), $atts );

	if($parameters['id'] == ""  || empty( $parameters['id'])){
		$f_static_block_data = "Copy correct code from static blocks";
		return $f_static_block_data;
		
	}

	$f_static_blocks_args = array(
	    'post_type'=> 'f_static_block',
	    'order'    => 'ASC',
	    //'post__in' => array(11660)
	    'post__in' => array($parameters['id'] )
		);

	$f_static_block = new WP_Query($f_static_blocks_args);

	if( $f_static_block->have_posts() ){
			
	    while( $f_static_block->have_posts() ): $f_static_block->the_post();
	    	$f_static_block_data = "";
	    	$posts_post = $f_static_block->posts;
	    	foreach($posts_post as $post){
	    		$f_static_block_data .= do_shortcode($post->post_content);
	    	}
	    	
	    endwhile;
	}
	else
	{
		$f_static_block_data = "Copy correct code from static blocks";
	}
	wp_reset_postdata();
	
	return  $f_static_block_data;
}
add_shortcode('f_static_block' , 'get_f_static_block');


add_filter( 'manage_f_static_block_posts_columns', 'create_f_static_block_columns' );

function create_f_static_block_columns($columns) {
		unset($columns['date']);
    $columns['f_shortcode'] = __( 'Code', 'faltoo' );
    return $columns;
}

add_action( 'manage_f_static_block_posts_custom_column' , 'fill_f_static_block_columns_data', 10, 2 );


function fill_f_static_block_columns_data($columns,$post_id) {
  switch ($columns) {
  case 'f_shortcode':
	  echo "[f_static_block id=\"".$post_id."\"]";
  }
}