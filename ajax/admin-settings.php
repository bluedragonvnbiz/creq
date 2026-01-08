<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

add_action('wp_ajax_setting_base_salary', 'setting_base_salary');
add_action('wp_ajax_nopriv_setting_base_salary', 'setting_base_salary');
function setting_base_salary() {
    if ( empty($_POST['action_nonce']) || !wp_verify_nonce($_POST['action_nonce'], 'setting_base_salary_nonce') ) {
        wp_send_json_error([
            'title' => "보안 인증에 실패했습니다",
            'message' => "보안 인증에 실패했습니다.<br/>페이지를 새로고침하고 다시 시도해 주세요." // Invalid data. Data verification failed. Please refresh and try again.
        ]);
    }

    global $wpdb;
    $base_salary_model = new BaseSalaryModel();
    $base_salaries = isset($_POST['base_salary']) ? $_POST['base_salary'] : [];
    $channels = ['instagram', 'youtube', 'tiktok'];
    $level_name_mapping = [
        'Core' => '코어',
        'Lead' => '리드',
        'Seed' => '시드',
        'Prime' => '프라임',
        'Active' => '액티브',
        'Starter' => '스타터',
        'Newbie' => '뉴비',
    ];

    // Kiểm tra xem có phần tử nào rỗng không
    foreach ($base_salaries as $key => $value) {
        if ( trim($value) === '' || !is_numeric(clear_price($value)) || floatval(clear_price($value)) < 0 ) {
            wp_send_json_error([
                'title' => "잘못된 데이터", // Invalid data
                'message' => "필수 정보를 모두 입력해 주세요.", // Please fill in all required fields.
            ]);
        }
    }

    // Lưu vào database
    $wpdb->query('START TRANSACTION');
    try {
        foreach ($channels as $channel) {
            foreach ($base_salaries as $level_en_name => $base_salary) {
                $level_kr_name = isset($level_name_mapping[$level_en_name]) ? $level_name_mapping[$level_en_name] : '';
                $existing_record = $base_salary_model->getRow('WHERE channel = %s AND level_en_name = %s', [$channel, $level_en_name]);

                $data = [
                    'channel' => $channel,
                    'level_en_name' => $level_en_name,
                    'level_kr_name' => $level_kr_name,
                    'base_salary' => floatval(clear_price($base_salary)),
                ];

                if ($existing_record) {
                    // Cập nhật
                    $rs = $base_salary_model->update($data, ['id' => $existing_record->id]);
                    if (!$rs) {
                        // Ném lỗi của wp
                        throw new Exception($wpdb->last_error);
                    }
                        
                } else {
                    // Thêm mới
                    $rs = $base_salary_model->insert($data);
                    if (!$rs) {
                        throw new Exception($wpdb->last_error);
                    }
                }
            }
        }
        $wpdb->query('COMMIT');
    } catch (Exception $e) {
        $wpdb->query('ROLLBACK');
        wp_send_json_error([
            'title' => "업데이트 실패", // Update failed
            'message' => "기본 급여 업데이트에 실패했습니다.", // Failed to update base salary.
            'debug' => $e->getMessage(),
        ]);
    }

    wp_send_json_success([
        'title' => "업데이트 성공", // Update successful
        'message' => "기본 급여가 성공적으로 업데이트되었습니다.", // Base salary has been successfully updated.
    ]);
}