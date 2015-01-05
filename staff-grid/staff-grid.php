<?php
/**
 * @package Staff_Grid
 * @version 2.0
 */
/*
Plugin Name: Staff Grid
Plugin URI: http://www.factor1studios.com
Description: This is a custom staff and people grid tool for 2015. 
Author: Matt Adams
Version: 2.0
Author URI: http://www.factor1studios.com
*/


// Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');

// Include ACF
include_once( 'vendor/acf/acf.php' );

$remodal_css = plugin_dir_url( 'css/remodal.css' );

// Get the ACF field group for the Staff plugin. 
include("fields.php");




/**
 * Register style sheet.
 */
function register_plugin_styles() {
	wp_register_style( 'f1_staff_grid_style', plugins_url( 'staff-grid/css/remodal.css' ) );
	wp_enqueue_style( 'f1_staff_grid_style' );
}   



function remodal_styles()
{
    wp_register_style( 'custom-style', plugins_url( '/css/jquery.remodal.css', __FILE__ ), array(), '20120208', 'all' );
    wp_enqueue_style( 'custom-style' );
}
add_action( 'wp_enqueue_scripts', 'remodal_styles' );




/**
 * Register Modal JS
 */
 
 function remodal_scripts_basic()
{
	// Deregister the included library
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), null, false );
    
    wp_register_script( 'modal-script', plugins_url( '/js/jquery.remodal.js', __FILE__ ) );
    wp_enqueue_script( 'modal-script' );
}
add_action( 'wp_enqueue_scripts', 'remodal_scripts_basic' );








// Register Custom Post Type
function f1_staffgrid() {

	$labels = array(
		'name'                => _x( 'Staff', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Staff Grid', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Staff Grid', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Staff', 'text_domain' ),
		'view_item'           => __( 'View Staff', 'text_domain' ),
		'add_new_item'        => __( 'Add New Staff', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Person', 'text_domain' ),
		'update_item'         => __( 'Update Person', 'text_domain' ),
		'search_items'        => __( 'Search Staff', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'f1_staffgrid_cpt', 'text_domain' ),
		'description'         => __( 'Staff Grid', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'f1_staffgrid_tax' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'menu_icon'           => plugins_url("/images/icon.png", __FILE__) ,	
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'f1_staffgrid_cpt', $args );

}

// Hook into the 'init' action
add_action( 'init', 'f1_staffgrid', 0 );



// Register Custom Taxonomy
function f1_staffgrid_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Departments', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Departments', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'f1_staffgrid_tax', array( 'f1_staffgrid_cpt' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'f1_staffgrid_taxonomy', 0 );