<?php
/**
 * Plugin Name: Vision Plugin
 * Plugin URI: http://prashanthreddyb.sgedu.site/plugin-prashanth
 * Description: plugin for the word press
 * Version: 1.0
 * Author: Prashanth Reddy Bhagirthi
 * Author URI: http://prashanthreddyb.sgedu.site/
 */

add_action( 'init', 'Diagnose_custom_post_type' );
add_filter( 'post_updated_messages', 'Diagnose_messages' );
 
function Diagnose_custom_post_type() {
    $labels = array(
        'name'               => 'Diagnose',
        'singular_name'      => 'Diagnose',
        'menu_name'          => 'Diagnose',
        'name_admin_bar'     => 'Diagnose',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Diagnose',
        'new_item'           => 'New Diagnose',
        'edit_item'          => 'Edit Diagnose',
        'view_item'          => 'View Diagnose',
        'all_items'          => 'All Diagnose',
        'search_items'       => 'Search Diagnose',
        'parent_item_colon'  => 'Parent Diagnose:',
        'not_found'          => 'No Diagnose found.',
        'not_found_in_trash' => 'No Diagnose found in Trash.'
    );
 
    $args = array( 
        'public'      => true, 
        'labels'      => $labels,
        'rewrite'       => array( 'slug' => 'Diagnose' ),
        'has_archive'   => true,
        'menu_position' => 20,
        'menu_icon'     => 'dashicons-carrot',
        'taxonomies'        => array( 'post_tag', 'category' ),
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments' )
    );
        register_post_type( 'Diagnose', $args );
}
 
function Diagnose_messages( $messages ) {
    $post = get_post();
 
    $messages['Diagnose'] = array(
        0  => '',
        1  => 'Diagnose updated.',
        2  => 'Custom field updated.',
        3  => 'Custom field deleted.',
        4  => 'Recipe updated.',
        5  => isset( $_GET['revision'] ) ? sprintf( 'Diagnose restored to revision from %s',wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => 'Diagnose published.',
        7  => 'Diagnose saved.',
        8  => 'Diagnose submitted.',
        9  => sprintf(
            'Diagnose scheduled for: <strong>%1$s</strong>.',
            date_i18n( 'M j, Y @ G:i', strtotime( $post->post_date ) )
        ),
        10 => 'Diagnose draft updated.'
    );
 
    return $messages;
}