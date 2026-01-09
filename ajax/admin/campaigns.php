<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

add_action('wp_ajax_add_new_campaign', 'add_new_campaign');
function add_new_campaign() {
    if ( empty($_POST['action_nonce']) || !wp_verify_nonce($_POST['action_nonce'], 'add_new_campaign_nonce') ) {
        wp_send_json_error([
            'message' => "보안 인증에 실패했습니다.<br/>페이지를 새로고침하고 다시 시도해 주세요." // Invalid data. Data verification failed. Please refresh and try again.
        ]);
    }

    global $wpdb;
    $campaign_model = new CampaignModel();
    $campaign_quota_model = new CampaignQuotaModel();
    $base_salary_model = new BaseSalaryModel();
    $channel = !empty($_POST['channel']) ? sanitize_text_field(wp_unslash(trim($_POST['channel']))) : '';
    $campaign_name = !empty($_POST['campaign_name']) ? sanitize_text_field(wp_unslash(trim($_POST['campaign_name']))) : null;
    $campaign_overview = !empty($_POST['campaign_overview']) ? sanitize_textarea_field(wp_unslash(trim($_POST['campaign_overview']))) : null;
    $recruitment_starttime = !empty($_POST['recruitment_starttime']) ? sanitize_text_field(wp_unslash(trim($_POST['recruitment_starttime']))) : null;
    $recruitment_endtime = !empty($_POST['recruitment_endtime']) ? sanitize_text_field(wp_unslash(trim($_POST['recruitment_endtime']))) : null;
    $upload_starttime = !empty($_POST['upload_starttime']) ? sanitize_text_field(wp_unslash(trim($_POST['upload_starttime']))) : null;
    $upload_endtime = !empty($_POST['upload_endtime']) ? sanitize_text_field(wp_unslash(trim($_POST['upload_endtime']))) : null;
    $upload_limit_type = !empty($_POST['upload_limit_type']) ? sanitize_text_field(wp_unslash(trim($_POST['upload_limit_type']))) : 'daily';
    $upload_limit = !empty($_POST['upload_limit']) ? intval($_POST['upload_limit']) : 0;
    $influencer_count = !empty($_POST['influencer_count']) ? $_POST['influencer_count'] : [];
    $is_actived = isset($_POST['is_actived']) && $_POST['is_actived'] == '1' ? 1 : 0;
    $product_category = !empty($_POST['product_category']) ? sanitize_text_field(wp_unslash(trim($_POST['product_category']))) : null;
    $product_name = !empty($_POST['product_name']) ? sanitize_text_field(wp_unslash(trim($_POST['product_name']))) : null;
    $product_sales_link = !empty($_POST['product_sales_link']) ? esc_url_raw(wp_unslash(trim($_POST['product_sales_link']))) : null;
    $product_description = !empty($_POST['product_description']) ? sanitize_textarea_field(wp_unslash(trim($_POST['product_description']))) : null;
    $product_thumbnail = isset($_FILES['product_thumbnail']) ? $_FILES['product_thumbnail'] : null;
    $content_inspection = !empty($_POST['content_inspection']) ? sanitize_text_field(wp_unslash(trim($_POST['content_inspection']))) : 'in_progress';
    $content_second_use = !empty($_POST['content_second_use']) ? sanitize_text_field(wp_unslash(trim($_POST['content_second_use']))) : 'required';
    $profile_product_link = !empty($_POST['profile_product_link']) ? sanitize_text_field(wp_unslash(trim($_POST['profile_product_link']))) : 'required';
    $content_guide = !empty($_POST['content_guide']) ? sanitize_textarea_field(wp_unslash(trim($_POST['content_guide']))) : null;
    $content_guide_recommendation = !empty($_POST['content_guide_recommendation']) ? sanitize_textarea_field(wp_unslash(trim($_POST['content_guide_recommendation']))) : null;
    $content_guide_recommendation_pdf = isset($_FILES['content_guide_recommendation_pdf']) ? $_FILES['content_guide_recommendation_pdf'] : null;
    $required_hashtags = !empty($_POST['required_hashtags']) ? sanitize_text_field(wp_unslash(trim($_POST['required_hashtags']))) : null;
    $campaign_status = !empty($_POST['campaign_status']) ? sanitize_text_field(wp_unslash(trim($_POST['campaign_status']))) : 'draft';
    $draft_id = !empty($_POST['draft_id']) ? intval($_POST['draft_id']) : 0;

    $seoul_now = new DateTime('now', new DateTimeZone('Asia/Seoul'));
    $seoul_today = ($seoul_now->setTime(0, 0, 0))->format('Y-m-d H:i:s');
    $current_time = $seoul_now->format('Y-m-d H:i:s');

    if ( $campaign_status === 'pending' ) { 
        // Validate required fields
        if ( 
            empty($channel) || !array_key_exists($channel, INFLUENCER_CHANNELS) || empty($campaign_name) || empty($campaign_overview) || 
            empty($recruitment_starttime) || empty($recruitment_endtime) || empty($upload_starttime) || empty($upload_endtime) ||
            empty($upload_limit_type) || $upload_limit < 0 || empty($influencer_count) || !is_array($influencer_count) ||
            empty($product_category) || !array_key_exists($product_category, PRODUCT_CATEGORIES) ||
            empty($product_name) || empty($product_sales_link) || empty($product_description) || 
            $product_thumbnail === null || $product_thumbnail['error'] === UPLOAD_ERR_NO_FILE ||
            empty($content_inspection) || !in_array($content_inspection, ['in_progress', 'not_in_progress']) ||
            empty($content_second_use) || !in_array($content_second_use, ['required', 'not_required']) ||
            empty($profile_product_link) || !in_array($profile_product_link, ['required', 'not_required']) ||
            empty($content_guide) || empty($required_hashtags) ||
            !in_array($upload_limit_type, ['daily', 'weekly'])
        ) {
            wp_send_json_error([
                'message' => "필수 정보를 모두 입력해 주세요.", // Please fill in all required fields.
            ]);
        }
        foreach ($influencer_count as $key => $value) {
            if ( trim($value) === '' || !is_numeric($value) || intval($value) < 0 ) {
                wp_send_json_error([
                    'message' => "필수 정보를 모두 입력해 주세요.", // Please fill in all required fields.
                ]);
            }
        }

        // Validate campaign_name (캠페인명)
        if ( mb_strlen($campaign_name) > 20 ) {
            wp_send_json_error([
                'message' => "캠페인명은 최대 20자까지 입력할 수 있습니다.", // Campaign name can be up to 20 characters.
            ]);
        }

        // Validate campaign_overview (캠페인 개요)
        if ( mb_strlen($campaign_overview) > 50 ) {
            wp_send_json_error([
                'message' => "캠페인 개요는 최대 50자까지 입력할 수 있습니다.", // Campaign overview can be up to 50 characters.
            ]);
        }

        // Validate recruitment_starttime and recruitment_endtime (모집기간)
        if( !is_valid_date($recruitment_starttime, 'Y-m-d') || !is_valid_date($recruitment_endtime, 'Y-m-d') ) {
            wp_send_json_error([
                'message' => "모집기간이 올바르지 않습니다.", // Recruitment period is invalid.
            ]);
        }

        // Validate upload_starttime and upload_endtime (업로드 기간)
        if( !is_valid_date($upload_starttime, 'Y-m-d') || !is_valid_date($upload_endtime, 'Y-m-d') ) {
            wp_send_json_error([
                'message' => "업로드 기간이 올바르지 않습니다.", // Upload period is invalid.
            ]);
        }

        // Format datetime
        $recruitment_starttime_dt = (new DateTime($recruitment_starttime))->setTime(0, 0, 0)->format('Y-m-d H:i:s');
        $recruitment_endtime_dt = (new DateTime($recruitment_endtime))->setTime(0, 0, 0)->format('Y-m-d H:i:s');
        $upload_starttime_dt = (new DateTime($upload_starttime))->setTime(0, 0, 0)->format('Y-m-d H:i:s');
        $upload_endtime_dt = (new DateTime($upload_endtime))->setTime(0, 0, 0)->format('Y-m-d H:i:s');

        // Kiểm tra logic ngày tháng
        if( strtotime($recruitment_starttime_dt) <= strtotime($seoul_today) ) {
            wp_send_json_error([
                'message' => "모집기간 시작일은 오늘 이후여야 합니다.", // Recruitment start date must be after today.
            ]);
        }
        if ( strtotime($recruitment_starttime_dt) >= strtotime($recruitment_endtime_dt) ) {
            wp_send_json_error([
                'message' => "모집기간 종료일은 모집기간 시작일 이후여야 합니다.", // Recruitment end date must be after start date.
            ]);
        }
        if ( strtotime($upload_starttime_dt) >= strtotime($upload_endtime_dt) ) {
            wp_send_json_error([
                'message' => "업로드 기간 종료일은 업로드 기간 시작일 이후여야 합니다.", // Upload end date must be after start date.
            ]);
        }
        if ( strtotime($upload_starttime_dt) <= strtotime($recruitment_endtime_dt) ) {
            wp_send_json_error([
                'message' => "업로드 기간 시작일은 모집기간 종료일 이후여야 합니다.", // Upload start date must be after recruitment end date.
            ]);
        }

        // Validate content_guide (콘텐츠 가이드)
        if ( mb_strlen($content_guide) > 1000 ) {
            wp_send_json_error([
                'message' => "콘텐츠 가이드는 최대 1000자까지 입력할 수 있습니다.", // Content guide can be up to 1000 characters.
            ]);
        }
        // Validate content_guide_recommendation (콘텐츠 가이드(권장 및 안내사항))
        if ( !empty($content_guide_recommendation) && mb_strlen($content_guide_recommendation) > 1000 ) {
            wp_send_json_error([
                'message' => "콘텐츠 가이드(권장 및 안내사항)는 최대 1000자까지 입력할 수 있습니다.", // Content guide recommendation can be up to 1000 characters.
            ]);
        }

        // Validate required_hashtags (필수 해시태그)
        // Kiểm tra đầu mỗi hashtag phải là dấu # và không có khoảng trắng trong hashtag
        $required_hashtags_array = array_filter(array_map('trim', explode(' ', $required_hashtags)));
        foreach ($required_hashtags_array as $hashtag) {
            if ( mb_substr($hashtag, 0, 1) !== '#' || mb_strlen($hashtag) < 2 || mb_strpos($hashtag, '#', 1) !== false ) {
                wp_send_json_error([
                    'message' => "필수 해시태그 형식이 올바르지 않습니다.", // Required hashtags format is invalid.
                ]);
            }
        }
    }

    $uploaded_product_thumbnail = '';
    $uploaded_content_guide_recommendation_pdf = '';

    // Lưu vào database
    $wpdb->query('START TRANSACTION');
    try {
        // Upload product_thumbnail
        if ( $product_thumbnail && $product_thumbnail['error'] !== UPLOAD_ERR_NO_FILE ) {
            $upload_res = creq_custom_store_files('product_thumbnail', [
                'dest_subdir'   => 'product_thumbnails',
                'allowed_mimes' => [
                    'image/jpeg' => ['jpg', 'jpeg'],
                    'image/png'  => ['png'],
                    'image/heic' => ['heic'],
                    'image/webp' => ['webp'],
                    'application/pdf' => ['pdf'],
                ],
                'max_size'      => 5 * 1024 * 1024,
                'required'      => true,
                'rollback_on_fail' => true
            ]);

            if ( is_wp_error($upload_res) ) {
                throw new Exception($upload_res->get_error_message());
            } else {
                $uploaded_product_thumbnail = $upload_res['files'][0];
            }
        }

        // Upload content_guide_recommendation_pdf (nếu có)
        if ( $content_guide_recommendation_pdf && $content_guide_recommendation_pdf['error'] !== UPLOAD_ERR_NO_FILE ) {
            $upload_res = creq_custom_store_files('content_guide_recommendation_pdf', [
                'dest_subdir'   => 'campaign_content_guides',
                'allowed_mimes' => ['application/pdf' => ['pdf']],
                'max_size'      => 10 * 1024 * 1024,
                'required'      => false,
                'rollback_on_fail' => true
            ]);

            if ( is_wp_error($upload_res) ) {
                throw new Exception($upload_res->get_error_message());
            } else {
                $uploaded_content_guide_recommendation_pdf = $upload_res['files'][0];
            }
        }

        $campaign_data = [
            'channel' => $channel,
            'campaign_name' => $campaign_name,
            'campaign_overview' => $campaign_overview,
            'recruitment_starttime' => $recruitment_starttime_dt,
            'recruitment_endtime' => $recruitment_endtime_dt,
            'upload_starttime' => $upload_starttime_dt,
            'upload_endtime' => $upload_endtime_dt,
            'upload_limit_type' => $upload_limit_type,
            'upload_limit' => $upload_limit,
            'product_thumbnail' => !empty($uploaded_product_thumbnail) ? $uploaded_product_thumbnail['url'] : null,
            'product_category' => $product_category,
            'product_name' => $product_name,
            'product_sales_link' => $product_sales_link,
            'product_description' => $product_description,
            'content_inspection' => $content_inspection,
            'content_second_use' => $content_second_use,
            'profile_product_link' => $profile_product_link,
            'content_guide' => $content_guide,
            'content_guide_recommendation' => $content_guide_recommendation,
            'content_guide_recommendation_pdf' => !empty($uploaded_content_guide_recommendation_pdf) ? $uploaded_content_guide_recommendation_pdf['url'] : null,
            'required_hashtags' => $required_hashtags,
            'is_actived' => $is_actived,
            'status' => $campaign_status,
            'process_status' => null,
            'created_at' => $current_time,
            'updated_at' => null,
        ];

        if( $draft_id > 0 ) {
            // Cập nhật draft
            $existing_draft = $campaign_model->getRow('WHERE id = %d AND status = %s', [$draft_id, 'draft']);
            if ( !$existing_draft ) {
                throw new Exception("임시 저장된 캠페인 정보를 찾을 수 없습니다."); // Draft campaign information not found.
            }
            $rs = $campaign_model->update($campaign_data, ['id' => $draft_id]);
            if ( !$rs ) {
                throw new Exception($wpdb->last_error);
            }
            $new_campaign_id = $draft_id;

            // Xoá các campaign_quotas cũ
            $rs = $campaign_quota_model->delete(['campaign_id' => $new_campaign_id]);
            if ( !$rs ) {
                throw new Exception($wpdb->last_error);
            }

            // Xoá file đã upload cũ (nếu có)
            if ( !empty($existing_draft->product_thumbnail) ) {
                // Lấy đường dẫn file từ URL
                $existing_file_path = creq_get_file_path_from_url($existing_draft->product_thumbnail);
                if ( $existing_file_path && file_exists($existing_file_path) ) {
                    @unlink($existing_file_path);
                }
            }
            if ( !empty($existing_draft->content_guide_recommendation_pdf) ) {
                // Lấy đường dẫn file từ URL
                $existing_file_path = creq_get_file_path_from_url($existing_draft->content_guide_recommendation_pdf);
                if ( $existing_file_path && file_exists($existing_file_path) ) {
                    @unlink($existing_file_path);
                }
            }
        } else {
            // Thêm mới
            $new_campaign_id = $campaign_model->insert($campaign_data);
            if ( !$new_campaign_id ) {
                throw new Exception($wpdb->last_error);
            }
        }

        // Lưu influencer_count
        foreach ($influencer_count as $level_en_name => $count) {
            $base_salary_record = $base_salary_model->getRow('WHERE channel = %s AND level_en_name = %s', [$channel, $level_en_name]);
            if(!$base_salary_record) {
                throw new Exception("기본 급여 정보가 존재하지 않습니다. 채널: $channel, 레벨: $level_en_name"); // Base salary information does not exist.
            }
            $campaign_quota_data = [
                'campaign_id' => $new_campaign_id,
                'base_salary_id' => $base_salary_record->id,
                'quantity' => intval($count),
                'created_at' => $current_time,
                'updated_at' => null,
            ];
            $new_campaign_quota_id = $campaign_quota_model->insert($campaign_quota_data);
            if (!$new_campaign_quota_id) {
                throw new Exception($wpdb->last_error);
            }
        }

        $wpdb->query('COMMIT');
    } catch (Exception $e) {
        $wpdb->query('ROLLBACK');

        // Xoá file đã upload (nếu có)
        if ( !empty($uploaded_product_thumbnail) && file_exists($uploaded_product_thumbnail['path']) ) {
            @unlink($uploaded_product_thumbnail['path']);
        }
        if ( !empty($uploaded_content_guide_recommendation_pdf) && file_exists($uploaded_content_guide_recommendation_pdf['path']) ) {
            @unlink($uploaded_content_guide_recommendation_pdf['path']);
        }

        wp_send_json_error([
            'message' => $campaign_status === 'pending' ? "캠페인 추가에 실패했습니다." : "캠페인 임시 저장에 실패했습니다.", // Failed to add new campaign | Failed to save draft campaign.
            'debug' => $e->getMessage(),
        ]);
    }

    wp_send_json_success([
        'message' => $campaign_status === 'pending' ? "새로운 캠페인이 성공적으로 추가되었습니다." : "캠페인 임시 저장이 성공적으로 완료되었습니다.", // New campaign has been successfully added | Draft campaign has been successfully saved.
        'redirect_url' => home_url('/creq-admin/campaigns/details/' . $new_campaign_id),
        'draft_id' => $new_campaign_id,
    ]);
}