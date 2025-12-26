<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

add_action('wp_ajax_user_login', 'user_login');
add_action('wp_ajax_nopriv_user_login', 'creq_user_login');
function creq_user_login() {
    if ( empty($_POST['action_nonce']) || !wp_verify_nonce($_POST['action_nonce'], 'user_login_nonce') ) {
        wp_send_json_error([
            'message' => "잘못된 요청입니다.", // Invalid request.
            'debug' => 'Nonce verification failed.'
        ]);
    }

    // Kiểm tra các trường bắt buộc
    $required_fields = ['email', 'password'];
    foreach ($required_fields as $field) {
        if ( empty($_POST[$field]) ) {
            $message = $field == 'email' ? '이메일을 입력해주세요.' : '비밀번호를 입력해주세요.'; // Please enter your email. / Please enter your password. 
            wp_send_json_error([
                'field' => $field,
                'message' => $message,
            ]);
        }
    }

    $user_email = sanitize_user($_POST['email']);
    $user_pass = $_POST['password'];

    // Kiểm tra định dạng email
    if ( !is_email($user_email) ) {
        wp_send_json_error([
            'field' => 'email',
            'message' => '올바른 이메일 형식이 아닙니다.', // Invalid email format.
        ]);
    }

    // Kiểm tra xem user có tồn tại không
    $user = get_user_by('email', $user_email);
    if ( !$user ) {
        wp_send_json_error([
            'field' => 'email',
            'message' => '가입되지 않은 이메일입니다.', // Email not registered.
        ]);
    }

    // Kiểm tra mật khẩu
    if ( !wp_check_password($user_pass, $user->user_pass, $user->ID) ) {
        wp_send_json_error([
            'field' => 'password',
            'message' => '비밀번호가 일치하지 않습니다.', // Incorrect password.
        ]);
    }

    // Đăng nhập người dùng
    wp_set_current_user($user->ID);
    wp_set_auth_cookie($user->ID, true); // true để nhớ đăng nhập
    do_action('wp_login', $user->user_login, $user); // Thực hiện hành động đăng nhập

    wp_send_json_success();
}