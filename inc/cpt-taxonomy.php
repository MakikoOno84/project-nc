<?php
function nc_register_custom_post_types() {

    // News CPT
    $labels = array(
        'name'               => _x( 'お知らせ', 'post type general name' ),
        'singular_name'      => _x( 'News', 'post type singular name'),
        'menu_name'          => _x( 'お知らせ', 'admin menu' ),
        'name_admin_bar'     => _x( 'News', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'News' ),
        'add_new_item'       => __( 'Add New News' ),
        'new_item'           => __( 'New News' ),
        'edit_item'          => __( 'Edit News' ),
        'view_item'          => __( 'View News' ),
        'all_items'          => __( 'All News' ),
        'search_items'       => __( 'Search News' ),
        'parent_item_colon'  => __( 'Parent News:' ),
        'not_found'          => __( 'No News found.' ),
        'not_found_in_trash' => __( 'No News found in Trash.' ),
        'archives'           => __( 'News Archives'),
        'insert_into_item'   => __( 'Insert into News'),
        'uploaded_to_this_item' => __( 'Uploaded to this News'),
        'filter_item_list'   => __( 'Filter News list'),
        'items_list_navigation' => __( 'News list navigation'),
        'items_list'         => __( 'News list'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'news' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        // 'menu_position'      => 10,  // Order admin menu using "custom_menu_order" filter 
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array('title'),
    );
    register_post_type( 'nc-news', $args );

}
add_action( 'init', 'nc_register_custom_post_types' );

?>