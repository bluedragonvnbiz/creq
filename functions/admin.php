<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

function get_admin_part($part, $name = null, $args = []) {
    return get_template_part('admin/template-parts/' . $part, $name, $args);
}

function get_admin_header() {
    include_once get_stylesheet_directory() . '/admin/template-parts/layouts/header.php';
}

function get_admin_footer() {
    include_once get_stylesheet_directory() . '/admin/template-parts/layouts/footer.php';
}