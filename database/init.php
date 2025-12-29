<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

// Khởi tạo database khi kích hoạt theme
function theme_activate() {
    $db_manager_model = new DatabaseModel();
    $db_manager_model->initTables();
}
register_activation_hook(__FILE__, 'theme_activate');

// Kiểm tra và cập nhật schema
add_action('admin_init', 'check_database_updates');
function check_database_updates() {
    $db_manager_model = new DatabaseModel();
    $db_manager_model->updateSchema();
}