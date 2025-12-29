<?php
/**
 * Bảng `user_info`
 *
 * Nhiệm vụ: Đây là bảng lưu trữ cácc thông tin khác của user.
 * Mỗi bản ghi đại diện cho một user duy nhất và chứa các thông tin bổ sung liên quan đến user đó.
 *
 * - `id`: ID tự tăng của bản ghi.
 * - `user_id`: ID của người dùng.
 * - `phone`: Số điện thoại của người dùng.
 * - `birth_date`: Ngày sinh của người dùng.
 * - `referral_code`: Mã giới thiệu của người dùng.
 * - `created_at`: Thời gian tạo bản ghi.
 * - `updated_at`: Thời gian cập nhật bản ghi gần nhất.
 */
function create_table_user_info($db_model) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'user_info';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "DROP TABLE IF EXISTS $table_name";
    // $wpdb->query($sql);

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        user_id BIGINT(20) UNSIGNED NOT NULL,
        phone VARCHAR(20) DEFAULT NULL,
        birth_date DATE DEFAULT NULL,
        referral_code VARCHAR(20) DEFAULT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function update_table_user_info($db_model) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'user_info';

    // Thêm khóa ngoại cho user_id nếu chưa tồn tại
    $db_model->addForeignKeyIfMissing(
        $table_name,
        'user_id',
        $wpdb->prefix . 'users',
        'ID',
        'fk_creq_user_info_user_id',
        'CASCADE'
    );

    // Kiểm tra và thêm cột 'example' nếu chưa tồn tại
    // $column = $wpdb->get_results("SHOW COLUMNS FROM $table_name LIKE 'example'");
    // if (empty($column)) {
    //     $wpdb->query("ALTER TABLE $table_name ADD example VARCHAR(20) DEFAULT NULL");
    // }
}