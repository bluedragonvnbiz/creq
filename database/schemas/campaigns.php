<?php
/**
 * Bảng `campaigns`
 *
 * Nhiệm vụ: Đây là bảng lưu trữ thông tin của các chiến dịch (campaigns).
 * Mỗi bản ghi đại diện cho một cấp độ lương cơ bản trong một channel cụ thể.
 *
 * - `id`: ID tự tăng của bản ghi.
 * - `channel`: Tên kênh (channel) được áp dụng cho chiến dịch. (instagram, youtube, tiktok)
 * - `campaign_name`: Tên chiến dịch.
 * - `campaign_overview`: Mô tả tổng quan về chiến dịch.
 * - `recruitment_starttime`: Thời gian bắt đầu tuyển dụng cho chiến dịch.
 * - `recruitment_endtime`: Thời gian kết thúc tuyển dụng cho chiến dịch.
 * - `upload_starttime`: Thời gian bắt đầu cho phép user tải nội dung lên cho chiến dịch.
 * - `upload_endtime`: Thời gian kết thúc cho phép user tải nội dung lên cho chiến dịch.
 * - `upload_limit_type`: Loại giới hạn tải lên (daily, weekly, monthly, none).
 * - `upload_limit`: Số lượng giới hạn tải lên dựa trên `upload_limit_type`.
 * - `product_category`: Danh mục sản phẩm liên quan đến chiến dịch.
 * - `product_name`: Tên sản phẩm liên quan đến chiến dịch.
 * - `product_sales_link`: Liên kết bán hàng của sản phẩm.
 * - `product_description`: Mô tả chi tiết về sản phẩm.
 * - `product_thumbnail`: Ảnh đại diện sản phẩm (URL).
 * - `content_inspection`: 
 * - `content_second_use`: 
 * - `profile_product_link`:
 * - `content_guide`: Hướng dẫn nội dung cho chiến dịch.
 * - `content_guide_recommendation`: Các đề xuất hướng dẫn nội dung.
 * - `content_guide_recommendation_pdf`: Tệp PDF chứa các đề xuất hướng dẫn nội dung.
 * - `required_hashtags`: Các hashtag bắt buộc phải sử dụng trong nội dung.
 * - `is_actived`: Hiển thị hay ẩn chiến dịch phía user. (1: Hiển thị, 0: Ẩn)
 * - `status`: Trạng thái hiện tại của chiến dịch. (draft, pending = before launch, in_progress, completed)
 * - `process_status`: Trạng thái quy trình chiến dịch (khi status đang là in_progress hoặc completed)
 *      - Khi status = 'in_progress': 'recruiting', 'selection', 'seeding'
 *      - Khi status = 'completed': 'final_report', 'settlement_processing', 'settlement_completed'
 * - `created_at`: Thời gian tạo bản ghi.
 * - `updated_at`: Thời gian cập nhật bản ghi gần nhất.
 * 
 * - NOTE:
 * - thời gian tuyển dụng nằm trong thời gian này thì mới cho user apply (nút apply mới active).
 * - trước ngày tuyển dụng bắt đầu thì vẫn cho hiện bên user web nhưng disable nút active.
 * - ngày tuyển dụng đã kết thúc thì ẩn khỏi user web. chỉ khi user chọn filter này thì mới hiện.
 * - upload_starttime > recruitment_endtime (ví dụ: tuyển dụng đến 30/9, upload từ 1/10)
 * - khi user đang in progress chiến dịch ở bước 1 (chọn upload schedule) thì chỉ được chọn ngày upload 
 *   trong khoảng thời gian upload_starttime và upload_endtime và tuân theo giới hạn upload_limit_type và upload_limit.
 *   ví dụ (ví dụ admin setting daily chỉ cho 3 người upload, đã có đủ 3 người chọn ngày này thì user không chọn được nữa)
 * - product_category chỉ lưu 1 category (không ảnh hưởng đến việc hiển thị cho user nào)
 * 
 * - pending: đã được admin duyệt nhưng chưa đến ngày tuyển dụng
 * - in_progress (recruiting): đang trong giai đoạn tuyển dụng
 * - in_progress (selection): đã kết thúc giai đoạn tuyển dụng. Khi việc chọn influencer hoàn tất, 
 *   hệ thống tự động chuyển sang giai đoạn seeding.
 * - in_progress (seeding): 
 *   + Tất cả influencer đã được chọn xong.
 *   + Giai đoạn này bao gồm toàn bộ quy trình từ gửi sản phẩm đến khi duyệt content.
 * - completed: campaign sẽ được chuyển sang trạng thái hoàn tất khi:
 *   + Kết thúc thời gian upload
 *   + Tất cả influencer đã được duyệt dù chưa hết thời gian upload.
 * 
 */
function create_table_campaigns($db_model) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'campaigns';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        channel VARCHAR(50) NOT NULL,
        campaign_name VARCHAR(255) DEFAULT NULL,
        campaign_overview TEXT DEFAULT NULL,
        recruitment_starttime DATETIME DEFAULT NULL,
        recruitment_endtime DATETIME DEFAULT NULL,
        upload_starttime DATETIME DEFAULT NULL,
        upload_endtime DATETIME DEFAULT NULL,
        upload_limit_type VARCHAR(50) NOT NULL DEFAULT 'daily',
        upload_limit INT(11) NOT NULL DEFAULT 0,
        product_category VARCHAR(100) DEFAULT NULL,
        product_name VARCHAR(255) DEFAULT NULL,
        product_thumbnail TEXT DEFAULT NULL,
        product_description TEXT DEFAULT NULL,
        product_sales_link TEXT DEFAULT NULL,
        content_inspection VARCHAR(50) NOT NULL DEFAULT 'in_progress',
        content_second_use VARCHAR(50) NOT NULL DEFAULT 'required',
        profile_product_link VARCHAR(50) NOT NULL DEFAULT 'required',
        content_guide TEXT DEFAULT NULL,
        content_guide_recommendation TEXT DEFAULT NULL,
        content_guide_recommendation_pdf TEXT DEFAULT NULL,
        required_hashtags TEXT DEFAULT NULL,
        is_actived TINYINT(1) NOT NULL DEFAULT 1,
        status VARCHAR(50) NOT NULL DEFAULT 'draft',
        process_status VARCHAR(50) DEFAULT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function update_table_campaigns($db_model) {
}