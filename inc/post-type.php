<?php
function register_product_init() {
	$label = array(
		'name'               => _x( 'Wholesale Product', 'post type general name', 'ferina' ),
		'singular_name'      => _x( 'Wholesale Product', 'post type singular name', 'ferina' ),
		'menu_name'          => _x( 'Wholesale Products', 'admin menu', 'ferina' ),
		'name_admin_bar'     => _x( 'Wholesale Product', 'add new on admin bar', 'ferina' ),
		'add_new'            => _x( 'Add New', 'wholesale-product', 'ferina' ),
		'add_new_item'       => __( 'Add New Wholesale Product', 'ferina' ),
		'new_item'           => __( 'New Product', 'ferina' ),
		'edit_item'          => __( 'Edit Product', 'ferina' ),
		'view_item'          => __( 'View Product', 'ferina' ),
		'all_items'          => __( 'All Products', 'ferina' ),
		'search_items'       => __( 'Search Products', 'ferina' ),
		'parent_item_colon'  => __( 'Parent Products:', 'ferina' ),
		'not_found'          => __( 'No products found.', 'ferina' ),
		'not_found_in_trash' => __( 'No products found in Trash.', 'ferina' )
	);

	$arg = array(
		'labels'             => $label,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'wholesale-product' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	$labels = array(
		'name'               => _x( 'Retail Product', 'post type general name', 'ferina' ),
		'singular_name'      => _x( 'Retail Product', 'post type singular name', 'ferina' ),
		'menu_name'          => _x( 'Retail Products', 'admin menu', 'ferina' ),
		'name_admin_bar'     => _x( 'Retail Product', 'add new on admin bar', 'ferina' ),
		'add_new'            => _x( 'Add New', 'retail-product', 'ferina' ),
		'add_new_item'       => __( 'Add New Retail Product', 'ferina' ),
		'new_item'           => __( 'New Product', 'ferina' ),
		'edit_item'          => __( 'Edit Product', 'ferina' ),
		'view_item'          => __( 'View Product', 'ferina' ),
		'all_items'          => __( 'All Products', 'ferina' ),
		'search_items'       => __( 'Search Products', 'ferina' ),
		'parent_item_colon'  => __( 'Parent Products:', 'ferina' ),
		'not_found'          => __( 'No products found.', 'ferina' ),
		'not_found_in_trash' => __( 'No products found in Trash.', 'ferina' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'retail-product' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'wholesale-product', $arg );
	register_post_type( 'retail-product', $args );

	$stylelabels = array(
		'name'              => _x( 'Styles', 'taxonomy general name', 'ferina'  ),
		'singular_name'     => _x( 'Style', 'taxonomy singular name', 'ferina'  ),
		'search_items'      => __( 'Search Styles', 'ferina' ),
		'all_items'         => __( 'All Styles', 'ferina' ),
		'parent_item'       => __( 'Parent Style', 'ferina' ),
		'parent_item_colon' => __( 'Parent Style:', 'ferina' ),
		'edit_item'         => __( 'Edit Style', 'ferina' ),
		'update_item'       => __( 'Update Style', 'ferina' ),
		'add_new_item'      => __( 'Add New Style', 'ferina' ),
		'new_item_name'     => __( 'New Style Name', 'ferina' ),
		'menu_name'         => __( 'Style', 'ferina' ),
	);

	$styleargs = array(
		'hierarchical'      => true,
		'labels'            => $stylelabels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'style' ),
	);

	register_taxonomy( 'style', array( 'retail-product', 'wholesale-product' ), $styleargs );

	$sizelabels = array(
		'name'              => _x( 'Sizes', 'taxonomy general name', 'ferina' ),
		'singular_name'     => _x( 'Size', 'taxonomy singular name', 'ferina' ),
		'search_items'      => __( 'Search Sizes', 'ferina' ),
		'all_items'         => __( 'All Sizes', 'ferina' ),
		'parent_item'       => __( 'Parent Size', 'ferina' ),
		'parent_item_colon' => __( 'Parent Size:', 'ferina' ),
		'edit_item'         => __( 'Edit Size', 'ferina' ),
		'update_item'       => __( 'Update Size', 'ferina' ),
		'add_new_item'      => __( 'Add New Size', 'ferina' ),
		'new_item_name'     => __( 'New Size Name', 'ferina' ),
		'menu_name'         => __( 'Size', 'ferina' ),
	);

	$sizeargs = array(
		'hierarchical'      => false,
		'labels'            => $sizelabels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'size' ),
	);

	$colorlabels = array(
		'name'              => _x( 'Colours', 'taxonomy general name', 'ferina' ),
		'singular_name'     => _x( 'Colour', 'taxonomy singular name', 'ferina' ),
		'search_items'      => __( 'Search Colours', 'ferina' ),
		'all_items'         => __( 'All Colours', 'ferina' ),
		'parent_item'       => __( 'Parent Colour', 'ferina' ),
		'parent_item_colon' => __( 'Parent Colour:', 'ferina' ),
		'edit_item'         => __( 'Edit Colour', 'ferina' ),
		'update_item'       => __( 'Update Colour', 'ferina' ),
		'add_new_item'      => __( 'Add New Colour', 'ferina' ),
		'new_item_name'     => __( 'New Style Colour', 'ferina' ),
		'menu_name'         => __( 'Colour', 'ferina' ),
	);

	$colorargs = array(
		'hierarchical'      => false,
		'labels'            => $colorlabels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'colour' ),
	);

	register_taxonomy( 'colour', array( 'retail-product' ), $colorargs );
	register_taxonomy( 'size', array( 'retail-product' ), $sizeargs );
}