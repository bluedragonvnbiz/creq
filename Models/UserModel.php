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
     * @param array $data Mảng dữ liệu bao gồm 'username', 'password', 'email', ...
     */
    public function register($data) {
        $user_id = wp_create_user($data['username'], $data['password'], $data['email']);
        if (is_wp_error($user_id)) {
            return $user_id; // Trả về lỗi nếu có
        }
        return get_user_by('ID', $user_id);
    }

    /**
     * Đăng xuất người dùng
     */
    public function logout() {
        wp_logout();
    }


}