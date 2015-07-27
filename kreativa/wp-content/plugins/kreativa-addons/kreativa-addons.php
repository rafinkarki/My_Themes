<?php

/*

Plugin Name: kreativa Addons

Description: This is addon for kreativa theme to generate custom post types and widgets

Version: 1.0

Author: Rafin/Sudip

Text Domain: kreativa-addons

*/

// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) exit;



class kreativaAddons{

 

    public function __construct() {

 

        load_plugin_textdomain( 'kreativa-addons', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );

        add_filter( 'init', array( $this, 'kreativa_addons_posttypes' ) );

        add_action( 'init', array( $this, 'custom_post_type' ) );

        add_action( 'init', array( $this, 'create_portfolio_taxonomies' ));

        add_filter( 'init', array( $this, 'kreativa_addons_shortcode' ) );

 

    }



    public function kreativa_addons_posttypes() {



    }



    public function kreativa_addons_shortcode() {

      add_shortcode( 'portfolio', array($this, 'portfolio_shortcode') );

    }



    function portfolio_shortcode( $atts ) {
      $test=extract( shortcode_atts(
              array(
                 
                  'category' => '',
                  
                  'excerpt' => 'false',
              ), $atts )
      );  $output = '';
     
    return $output;
    }    

    public function custom_post_type() {

    $labels = array(
        'name'                => _x( 'Teams', 'Post Type General Name', 'kreativa' ),
        'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'kreativa' ),
        'menu_name'           => __( 'Team', 'kreativa' ),
        'parent_item_colon'   => __( 'Parent Team:', 'kreativa' ),
        'all_items'           => __( 'All Teams', 'kreativa' ),
        'view_item'           => __( 'View Team', 'kreativa' ),
        'add_new_item'        => __( 'Add New Team', 'kreativa' ),
        'add_new'             => __( 'Add New', 'kreativa' ),
        'edit_item'           => __( 'Edit Team', 'kreativa' ),
        'update_item'         => __( 'Update Team', 'kreativa' ),
        'search_items'        => __( 'Search Team', 'kreativa' ),
        'not_found'           => __( 'Not found', 'kreativa' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'kreativa' ),
    );
    $args = array(
        'label'               => __( 'team_member', 'kreativa' ),
        'description'         => __( 'You can add the team members from here with their posts.', 'kreativa' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor','thumbnail'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 60,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'team', $args );

    $labels = array(
        'name'                => _x( 'Projects', 'Post Type General Name', 'kreativa' ),
        'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'kreativa' ),
        'menu_name'           => __( 'Project', 'kreativa' ),
        'parent_item_colon'   => __( 'Parent Project:', 'kreativa' ),
        'all_items'           => __( 'All Projects', 'kreativa' ),
        'view_item'           => __( 'View Project', 'kreativa' ),
        'add_new_item'        => __( 'Add New Project', 'kreativa' ),
        'add_new'             => __( 'Add New', 'kreativa' ),
        'edit_item'           => __( 'Edit Project', 'kreativa' ),
        'update_item'         => __( 'Update Project', 'kreativa' ),
        'search_items'        => __( 'Search Project', 'kreativa' ),
        'not_found'           => __( 'Not found', 'kreativa' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'kreativa' ),
    );
    $args = array(
        'label'               => __( 'portfolio_type', 'kreativa' ),
        'description'         => __( 'You can create portfolios slider from here.', 'kreativa' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor','thumbnail'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 60,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'portfolio', $args );



    }



    public function create_portfolio_taxonomies()

    {
    $labels = array(
        'name'                       => _x( 'Designations', 'Taxonomy General Name', 'kreativa' ),
        'singular_name'              => _x( 'Designation', 'Taxonomy Singular Name', 'kreativa' ),
        'menu_name'                  => __( 'Designation', 'kreativa' ),
        'all_items'                  => __( 'All Items', 'kreativa' ),
        'parent_item'                => __( 'Parent Item', 'kreativa' ),
        'parent_item_colon'          => __( 'Parent Item:', 'kreativa' ),
        'new_item_name'              => __( 'New Item Name', 'kreativa' ),
        'add_new_item'               => __( 'Add New Item', 'kreativa' ),
        'edit_item'                  => __( 'Edit Item', 'kreativa' ),
        'update_item'                => __( 'Update Item', 'kreativa' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'kreativa' ),
        'search_items'               => __( 'Search Items', 'kreativa' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'kreativa' ),
        'choose_from_most_used'      => __( 'Choose from the most used items', 'kreativa' ),
        'not_found'                  => __( 'Not Found', 'kreativa' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'team_post', array( 'team' ), $args );
       
    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'kreativa' ),
        'singular_name'              => _x( 'Filter', 'Taxonomy Singular Name', 'kreativa' ),
        'menu_name'                  => __( 'Filter', 'kreativa' ),
        'all_items'                  => __( 'All Items', 'kreativa' ),
        'parent_item'                => __( 'Parent Item', 'kreativa' ),
        'parent_item_colon'          => __( 'Parent Item:', 'kreativa' ),
        'new_item_name'              => __( 'New Item Name', 'kreativa' ),
        'add_new_item'               => __( 'Add New Item', 'kreativa' ),
        'edit_item'                  => __( 'Edit Item', 'kreativa' ),
        'update_item'                => __( 'Update Item', 'kreativa' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'kreativa' ),
        'search_items'               => __( 'Search Items', 'kreativa' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'kreativa' ),
        'choose_from_most_used'      => __( 'Choose from the most used items', 'kreativa' ),
        'not_found'                  => __( 'Not Found', 'kreativa' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'portfolio_filter', array( 'portfolio' ), $args );
}
}
 
$addons = new kreativaAddons();