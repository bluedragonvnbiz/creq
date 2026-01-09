<?php
/**
 * Bảng `campaign_quotas`
 *
 * Nhiệm vụ: Lưu trữ số lượng (quota) tuyển dụng cho từng mức lương (level) trong một chiến dịch cụ thể.
 * Mỗi bản ghi liên kết một chiến dịch với một mức lương cơ bản và số lượng cần tuyển cho mức đó.
 *
 * - `id`: ID tự tăng.
 * - `campaign_id`: ID của chiến dịch (liên kết với bảng campaigns).
 * - `base_salary_id`: ID của mức lương cơ bản (liên kết với bảng wp_base_salaries trong ảnh).
 * - `quantity`: Số lượng (quota) cần tuyển cho mức này.
 * - `created_at`: Thời gian tạo.
 * - `updated_at`: Thời gian cập nhật.
 */
function create_table_campaign_quotas($db_model) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'campaign_quotas';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        campaign_id BIGINT(20) UNSIGNED NOT NULL,
        base_salary_id BIGINT(20) UNSIGNED NOT NULL,
        quantity INT(11) UNSIGNED NOT NULL DEFAULT 0,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function update_table_campaign_quotas($db_model) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'campaign_quotas';

    // 1. Khóa ngoại cho campaign_id
    $db_model->addForeignKeyIfMissing(
        $table_name,
        'campaign_id',
        $wpdb->prefix . 'campaigns', 
        'id',
        'fk_cq_campaign_id',
        'CASCADE'
    );

    // 2. Khóa ngoại cho base_salary_id
    $db_model->addForeignKeyIfMissing(
        $table_name,
        'base_salary_id',
        $wpdb->prefix . 'base_salaries',
        'id',
        'fk_cq_base_salary_id',
        'CASCADE'
    );
}