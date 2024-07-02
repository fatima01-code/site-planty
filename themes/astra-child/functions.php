<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );

}

add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );

function add_extra_item_to_nav_menu( $items, $args ) {

    if (is_user_logged_in() && ($args->theme_location == 'primary' || $args->theme_location == 'mobile_menu')) {
        $items .= '<li class="lienAdmin menu-item"><a href="'. admin_url() .'">Admin</a></li>';
    }
    return $items;
}


add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );
add_filter('wpcf7_autop_or_not', '__return_false');

