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

define('ADMIN_SINGLE_PAGES', [
    'dashboard', 
    'login'
]);

define('ADMIN_OPTION_PAGES', [
    'campaigns',
    'settings'
]);

define('INFLUENCER_CHANNELS', [
    'instagram' => ['kr' => '인스타그램', 'en' => 'Instagram'],
    'youtube' => ['kr' => '유튜브', 'en' => 'YouTube'],
    'tiktok' => ['kr' => '틱톡', 'en' => 'TikTok']
]);

define('PRODUCT_CATEGORIES', [
    'fashion' => ['kr' => '패션', 'en' => 'Fashion'],
    'beauty' => ['kr' => '뷰티', 'en' => 'Beauty'],
    'food' => ['kr' => '푸드', 'en' => 'Food'],
    'tech' => ['kr' => 'IT, 테크', 'en' => 'IT, Tech'],
    'living' => ['kr' => '리빙', 'en' => 'Living'],
    'parenting' => ['kr' => '육아', 'en' => 'Parenting'],
    'health' => ['kr' => '헬스', 'en' => 'Health'],
    'restaurants' => ['kr' => '맛집', 'en' => 'Restaurants'],
    'travel' => ['kr' => '여행', 'en' => 'Travel'],
    'pets' => ['kr' => '펫', 'en' => 'Pets'],
    'self_development' => ['kr' => '자기개발', 'en' => 'Self-Development'],
    'books' => ['kr' => '도서', 'en' => 'Books'],
    'games' => ['kr' => '게임', 'en' => 'Games'],
]);