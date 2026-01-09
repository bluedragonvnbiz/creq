<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

add_action('wp_enqueue_scripts', 'add_custom_scripts');
function add_custom_scripts() {
    //Register CSS
    wp_enqueue_style('bootstrap', LIBS_URL . '/bootstrap/bootstrap.min.css', array(), STYLE_VER, false);
    wp_enqueue_style('jquery-ui', LIBS_URL . '/jquery-ui/jquery-ui.min.css', array(), STYLE_VER, false);
    //Register JS
    wp_enqueue_script('bootstrap', LIBS_URL . '/bootstrap/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script('popper', LIBS_URL . '/bootstrap/popper.min.js', array(), false, true);
    wp_enqueue_script('jquery-ui', LIBS_URL . '/jquery-ui/jquery-ui.min.js', array(), false, true);
    wp_enqueue_script('jquery-ui-ko', LIBS_URL . '/jquery-ui/datepicker-ko_KR.js', array('jquery-ui'), false, true);

    wp_enqueue_style('global-css', ASSETS_URL . '/css/global-css.css', array(), STYLE_VER, false);
    // Enqueue only on front-end pages (not in admin area)
    if( empty( get_query_var( 'custom_admin_page' ) ) ){
        wp_enqueue_style('frontend-css', ASSETS_URL . '/css/front-end.css', array(), STYLE_VER, false);
        wp_enqueue_script('global-script', ASSETS_URL . '/js/global-script.js', array('jquery'), STYLE_VER, true);

        if(is_page('login')) {
            wp_enqueue_style('auth', ASSETS_URL . '/css/auth.css', array(), STYLE_VER, false);
            wp_enqueue_script('login', ASSETS_URL . '/js/login.js', array('jquery'), STYLE_VER, true);
        } elseif(is_page('register')) {
            wp_enqueue_style('auth', ASSETS_URL . '/css/auth.css', array(), STYLE_VER, false);
            wp_enqueue_script('register', ASSETS_URL . '/js/register.js', array('jquery'), STYLE_VER, true);
        } elseif(is_page('home')) {
            wp_enqueue_style('swiper', LIBS_URL . '/swiper/swiper-bundle.min.css', array(), STYLE_VER, false);
            wp_enqueue_script('swiper', LIBS_URL . '/swiper/swiper-bundle.min.js', array(), false, true);
        } elseif(is_page('find-email')) {
            wp_enqueue_style('auth', ASSETS_URL . '/css/auth.css', array(), STYLE_VER, false);
            wp_enqueue_script('find-email', ASSETS_URL . '/js/find-email.js', array('jquery'), STYLE_VER, true);
        } elseif(is_page('find-password')) {
            wp_enqueue_style('auth', ASSETS_URL . '/css/auth.css', array(), STYLE_VER, false);
            wp_enqueue_script('find-password', ASSETS_URL . '/js/find-password.js', array('jquery'), STYLE_VER, true);
        } elseif(is_page('reset-password')) {
            wp_enqueue_style('auth', ASSETS_URL . '/css/auth.css', array(), STYLE_VER, false);
            wp_enqueue_script('reset-password', ASSETS_URL . '/js/reset-password.js', array('jquery'), STYLE_VER, true);
        }

    } else {
        $page = get_query_var( 'custom_admin_page' );
        $mode = get_query_var( 'mode' );

        //Admin Pages
        wp_enqueue_style('admin-global', ASSETS_ADMIN_URL . '/css/admin.css', array(), false, false);
        wp_enqueue_script('admin', ASSETS_ADMIN_URL . '/js/admin.js', array('jquery'), false, true);

        if( $page === 'campaigns' ) {
            wp_enqueue_style('swiper', LIBS_URL . '/swiper/swiper-bundle.min.css', array(), STYLE_VER, false);
            wp_enqueue_script('swiper', LIBS_URL . '/swiper/swiper-bundle.min.js', array(), false, true);

            wp_enqueue_script('campaigns', ASSETS_ADMIN_URL . '/js/campaigns.js', array('jquery'), false, true);
        }

        if( $page === 'settings' ) {
            wp_enqueue_style('settings', ASSETS_ADMIN_URL . '/css/settings.css', array(), false, false);
            wp_enqueue_script('settings', ASSETS_ADMIN_URL . '/js/settings.js', array('jquery'), false, true);
        }

    }

    wp_localize_script(
		'global-script', 
		'define', 
		array(
		    'home_url' => home_url(),
			'ajax_url' 	=> admin_url('admin-ajax.php'),
			'creq_nonce'		=> wp_create_nonce('creq_wpnonce'),
			'assets_url' => ASSETS_URL,
            'assets_admin_url' => ASSETS_ADMIN_URL,
			'assets_admin_path' => get_stylesheet_directory() . '/admin/assets',
		)
	);

    wp_localize_script(
		'admin',
		'define', 
		array(
		    'home_url' => home_url(),
			'ajax_url' 	=> admin_url('admin-ajax.php'),
			'creq_nonce'		=> wp_create_nonce('creq_wpnonce'),
			'assets_url' => ASSETS_URL,
            'assets_admin_url' => ASSETS_ADMIN_URL,
			'assets_admin_path' => get_stylesheet_directory() . '/admin/assets',
		)
	);
}