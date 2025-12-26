<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

/**
 * Register custom rewrite rules.
 */
add_action( 'init', 'custom_admin_rewrite_rules' );
function custom_admin_rewrite_rules() {
    // Trang gốc: creq-admin
    add_rewrite_rule(
        '^creq-admin/?$',
        'index.php?custom_admin_page=dashboard',
        'top'
    );

    foreach ( ADMIN_SINGLE_PAGES as $page ) {
        add_rewrite_rule(
            '^creq-admin/' . $page . '/?$',
            'index.php?custom_admin_page=' . $page,
            'top'
        );
    }
        
    foreach ( ADMIN_OPTION_PAGES as $page ) {
        // Trang chính
        add_rewrite_rule(
            '^creq-admin/' . $page . '/?$',
            'index.php?custom_admin_page=' . $page,
            'top'
        );

        // Mode: edit
        add_rewrite_rule(
            '^creq-admin/' . $page . '/edit/([0-9]+)/?$',
            'index.php?custom_admin_page=' . $page . '&mode=edit&edit_id=$matches[1]',
            'top'
        );

        // Mode: details
        add_rewrite_rule(
            '^creq-admin/' . $page . '/details/([0-9]+)/?$',
            'index.php?custom_admin_page=' . $page . '&mode=details&details_id=$matches[1]',
            'top'
        );

        // Mode: add
        add_rewrite_rule(
            '^creq-admin/' . $page . '/add/?$',
            'index.php?custom_admin_page=' . $page . '&mode=add',
            'top'
        );
    }
}

/**
 * Add custom query var.
 * @param array $vars The array of available query variables.
 */
add_filter( 'query_vars', 'custom_admin_query_vars' );
function custom_admin_query_vars( $vars ) {
    $vars[] = 'custom_admin_page'; // tên trang
    $vars[] = 'mode';              // add, edit, details
    $vars[] = 'edit_id';           // id cho edit
    $vars[] = 'details_id';         // id cho details
    return $vars;
}

/**
 * Include custom template.
 * @param string $template The path of the template to include.
 */
add_filter( 'template_include', 'custom_admin_template_include' );
function custom_admin_template_include( $template ) {
    $user = wp_get_current_user();
    $custom_page = get_query_var( 'custom_admin_page' );
    $mode = get_query_var( 'mode' );

    if ( $custom_page ) {

        // Kiểm tra xem user có đăng nhập không
        if ( !$user && $custom_page !== 'login' ) {
            wp_safe_redirect( home_url( '/creq-admin/login' ) );
            exit;
        }
        if ( $user && $custom_page !== 'login' && !in_array( 'administrator', (array) $user->roles ) && !in_array( 'editor', (array) $user->roles ) ) {
            wp_safe_redirect( home_url( '/creq-admin/login' ) );
            exit;
        }

        if ( $user && $custom_page === 'login' && ( in_array( 'administrator', (array) $user->roles ) || in_array( 'editor', (array) $user->roles ) ) ) {
            wp_safe_redirect( home_url( '/creq-admin' ) );
            exit;
        }

        if ( in_array( $custom_page, ADMIN_OPTION_PAGES ) ) {
            // Nếu có ID thì đang là trang edit
            $edit_id = get_query_var( 'edit_id' );
            if ( is_numeric($edit_id) ) {
                $edit_template = get_stylesheet_directory() . "/admin/pages/" . $custom_page . "/edit.php";
                if ( file_exists( $edit_template ) ) return $edit_template;
            }

            if ( $mode === 'details' && is_numeric(get_query_var('details_id')) ) {
                $details_template = get_stylesheet_directory() . "/admin/pages/" . $custom_page . "/details.php";
                if ( file_exists($details_template) ) return $details_template;
            }

            if ( $mode === 'add' ) {
                $add_template = get_stylesheet_directory() . "/admin/pages/" . $custom_page . "/add.php";
                if ( file_exists($add_template) ) return $add_template;
            }

            if ( $mode === 'reports' ) {
                $reports_template = get_stylesheet_directory() . "/admin/pages/" . $custom_page . "/reports.php";
                if ( file_exists($reports_template) ) return $reports_template;
            }

            // Mặc định là index.php
            $template_path = get_stylesheet_directory() . "/admin/pages/" . $custom_page . "/index.php";
            if ( file_exists($template_path) ) return $template_path;

        } elseif ( in_array( $custom_page, ADMIN_SINGLE_PAGES ) ) {
            $template_path = get_stylesheet_directory() . "/admin/pages/" . $custom_page . ".php";
            if ( file_exists($template_path) ) return $template_path;
        }
    }

    return $template;
}

/**
 * Flush rewrite rules on theme activation.
 */
add_action( 'after_switch_theme', 'custom_admin_theme_activate' );
function custom_admin_theme_activate() {
    custom_admin_rewrite_rules();
    flush_rewrite_rules();
}