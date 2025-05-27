<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */  

add_action( 'wp_enqueue_scripts', 'astra_planty_child_style' );
				function astra_planty_child_style() {
					wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
					wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
				}

add_filter( 'wp_nav_menu_items', function($items, $args) {
    if ( is_user_logged_in() && current_user_can('administrator') && $args->theme_location == 'primary' ) {
        $items_array = array();

        while ( false !== ( $item_pos = strpos( $items, '<li', 3 ) ) ) {
            $items_array[] = substr( $items, 0, $item_pos );
            $items = substr( $items, $item_pos );
        }
        $items_array[] = $items;

        // Insérer le lien Admin en 2e position
        array_splice( $items_array, 1, 0, '<li class="menu-item menu-admin"><a href="/wp-admin/">Admin</a></li>' );

        $items = implode( '', $items_array );
    }
    return $items;
}, 10, 2 );




/**
 * Your code goes below.
 */

