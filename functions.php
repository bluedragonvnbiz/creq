<?php

// add_action('after_setup_theme', function () {
//     $autoload = get_stylesheet_directory() . '/vendor/autoload.php';
//     if (file_exists($autoload)) {
//         require_once $autoload;
//     } else {
// 		// Composer autoload file not found
// 		error_log('Composer autoload not found at: ' . $autoload);
// 	}
// });

add_action( 'after_setup_theme', 'creq_setup', 10 );
if ( ! function_exists( 'creq_setup' ) ) {

	function creq_setup() {

        if ( ! is_admin() ) {
            show_admin_bar( false ); 
        }

		//load_theme_textdomain('creq', get_stylesheet_directory() . '/languages');

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'custom-line-height' );
		add_theme_support( 'link-color' );
		add_theme_support( 'custom-spacing' );
		// page template

	}

}

/**
 * load all file from themes/creq/config directory
 */
foreach ( glob( get_stylesheet_directory() . "/config/*.php" ) as $file ) {
    include_once( $file );
}

/**
 * load all file from themes/creq/models directory
 */
foreach ( glob( get_stylesheet_directory() . "/Models/*.php" ) as $file ) {
    include_once( $file );
}

/**
 * load all file from themes/creq/database directory
 */
foreach ( glob( get_stylesheet_directory() . "/database/*.php" ) as $file ) {
    include_once( $file );
}

/**
 * load all file from themes/creq/functions directory
 */
foreach ( glob( get_stylesheet_directory() . "/functions/*.php" ) as $file ) {
    include_once( $file );
}

/**
 * load all file from themes/creq/ajax directory
 */
foreach ( glob( get_stylesheet_directory() . "/ajax/*.php" ) as $file ) {
    include_once( $file );
}
foreach ( glob( get_stylesheet_directory() . "/ajax/admin/*.php" ) as $file ) {
    include_once( $file );
}