<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

define('THEME_URI', get_stylesheet_directory());
define('THEME_URL', get_stylesheet_directory_uri());
define('ASSETS_URL', get_stylesheet_directory_uri() . '/assets');
define('IMAGES_URL', get_stylesheet_directory_uri() . '/assets/images');
define('ASSETS_ADMIN_URL', get_stylesheet_directory_uri() . '/admin/assets');
define('LIBS_URL', get_stylesheet_directory_uri() . '/assets/libs');
define('STYLE_VER', time());
define('TEXT_DOMAIN', 'creq');