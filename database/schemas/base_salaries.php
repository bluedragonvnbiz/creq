<?php
/**
 * Bảng `base_salaries`
 *
 * Nhiệm vụ: Đây là bảng lưu trữ thông tin cài đặt lương cơ bản của influencer theo từng cấp độ của mỗi channel.
 * Mỗi bản ghi đại diện cho một cấp độ lương cơ bản trong một channel cụ thể.
 *
 * - `id`: ID tự tăng của bản ghi.
 * - `channel`: Tên kênh (channel) mà cấp độ lương cơ bản này áp dụng. (instagram, youtube, tiktok)
 * - `level_en_name`: Tên cấp độ bằng tiếng Anh (ví dụ: Core, Lead, Seed, Prime, Active, Starter, Newbie).
 * - `level_kr_name`: Tên cấp độ bằng tiếng Hàn (ví dụ: 코어, 베이직, 리드, 시드, 프라임, 액티브, 스타터, 뉴비).
 * - `base_salary`: Mức lương cơ bản áp dụng cho cấp độ này (đơn vị: KRW).
 * - `description`: Mô tả thêm về cấp độ lương cơ bản này (nếu có).
 * - `created_at`: Thời gian tạo bản ghi.
 * - `updated_at`: Thời gian cập nhật bản ghi gần nhất.
 */
function create_table_base_salaries($db_model) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'base_salaries';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "DROP TABLE IF EXISTS $table_name";
    //$wpdb->query($sql);

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        channel VARCHAR(50) NOT NULL,
        level_en_name VARCHAR(50) NOT NULL,
        level_kr_name VARCHAR(50) NOT NULL,
        base_salary DECIMAL(15,2) NOT NULL DEFAULT 0,
        description TEXT DEFAULT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function update_table_base_salaries($db_model) {
}