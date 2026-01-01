<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

class UserModel {
    protected $wpdb;
    protected $table;
    protected $primary_key = 'ID';

    protected function getTableName() {
        return 'users'; // Tên bảng người dùng
    }

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . $this->getTableName();
    }

    /**
     * Kiểm tra số điện thoại đã tồn tại chưa (trong bảng user_info)
     */
    public function is_phone_exists($phone_number) {
        $cleared_phone = clear_phone_number($phone_number);
        // Truy vấn bảng user_info để kiểm tra số điện thoại
        $query = $this->wpdb->prepare(
            "SELECT user_id FROM {$this->wpdb->prefix}user_info WHERE phone = %s",
            $cleared_phone
        );
        $results = $this->wpdb->get_results($query);
        
        if(empty($results)) {
            return false; // Số điện thoại chưa tồn tại
        }

        foreach ($results as $row) {
            // Kiểm tra user có tồn tại không
            $user = get_user_by('ID', $row->user_id);
            if ($user) {
                return true; // Số điện thoại đã tồn tại
            }
        }

        return false; // Số điện thoại chưa tồn tại
    }

    /**
     * Đăng nhập người dùng
     * @param WP_User $user Đối tượng người dùng WordPress
     */
    public function login($user) {
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID, true); // true để nhớ đăng nhập
        do_action('wp_login', $user->user_login, $user); // Thực hiện hành động đăng nhập
    }

    /**
     * Đăng ký người dùng
     * @param array $data Mảng dữ liệu bao gồm:
     * username, password, email, display_name, 
     * phone, birth_date, referral_code, exchange_entity, 
     * bank_id, account_number, account_holder, id_card, bankbook
     */
    public function register($data) {
        // Start transaction
        $this->wpdb->query('START TRANSACTION');
        try {
            // Tạo người dùng mới
            $user_id = wp_create_user(
                $data['username'],
                $data['password'],
                $data['email']
            );
            if (is_wp_error($user_id)) {
                throw new Exception('Failed to create user: ' . $user_id->get_error_message());
            } 

            // Cập nhật display name
            wp_update_user(array(
                'ID' => $user_id,
                'display_name' => !empty($data['full_name']) ? $data['full_name'] : $data['username']
            ));
            if (is_wp_error($user_id)) {
                throw new Exception('Failed to update display name: ' . $user_id->get_error_message());
            }

            // Thêm thông tin bổ sung vào bảng user_info
            $user_info_table = $this->wpdb->prefix . 'user_info';

            $insert_result = $this->wpdb->insert($user_info_table, [
                'user_id' => $user_id,
                'phone' => clear_phone_number($data['phone']),
                'birth_date' => $data['birth_date'],
                'referral_code' => !empty($data['referral_code']) ? $data['referral_code'] : null,
                'exchange_entity' => $data['exchange_entity'],
                'bank_id' => intval($data['bank_id']),
                'account_number' => $data['account_number'],
                'account_holder' => $data['account_holder'],
                'id_card' => $data['id_card'],
                'bankbook' => $data['bankbook'],
            ]);
            if ( $insert_result === false ) {
                throw new Exception('Failed to insert user info: ' . $this->wpdb->last_error);
            }

            // Commit transaction
            $this->wpdb->query('COMMIT');
            return $user_id;
        } catch (Exception $e) {
            $this->wpdb->query('ROLLBACK');
            return new WP_Error('register_fail', $e->getMessage());
        }
    }

    /**
     * Đăng xuất người dùng
     */
    public function logout() {
        wp_logout();
    }


}