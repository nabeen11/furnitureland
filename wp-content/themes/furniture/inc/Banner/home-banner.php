<?php
  
/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */

function prefix_banner()
{
    $labels = array(
        'name'                  => __('Banners', 'furniture'),
        'singular_name'         => __('Banner', 'furniture'),
        'add_new'               => __('Add New Banner', 'furniture', 'furniture'),
        'add_new_item'          => __('Add New Banner', 'furniture'),
        'edit_item'             => __('Edit Banner', 'furniture'),
        'new_item'              => __('New Banner', 'furniture'),
        'view_item'             => __('View Banner', 'furniture'),
        'search_items'          => __('Search Banners', 'furniture'),
        'not_found'             => __('No Banners found', 'furniture'),
        'not_found_in_trash'    => __('No Banners found in Trash', 'furniture'),
        'parent_item_colon'     => __('Parent Banner', 'furniture'),
        'menu_name'             => __('Banners', 'furniture'),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'description',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        // 'show_in_rest'        => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-slides',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'supports'            => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            // 'custom-fields',
            'trackbacks',
            'comments',
            'revisions',
            'page-attributes',
            'post-formats',
        ),
    );

    register_post_type('banner', $args);
}

add_action('init', 'prefix_banner');
?>