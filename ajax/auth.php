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

    $errors = []; // Khởi tạo mảng chứa lỗi
    $user_email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $user_pass  = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate Email
    if ( empty($user_email) ) {
        $errors['email'] = '이메일을 입력해주세요.'; // Please enter your email.
    } elseif ( !is_email($user_email) ) {
        $errors['email'] = '올바른 이메일 형식이 아닙니다.'; // Invalid email format.
    }

    // Validate Password
    if ( empty($user_pass) ) {
        $errors['password'] = '비밀번호를 입력해주세요.'; // Please enter your password.
    }

    if ( empty($errors) ) {
        $user = get_user_by('email', $user_email);
        if ( !$user ) {
            // Email chưa đăng ký
            $errors['email'] = '가입되지 않은 이메일입니다.'; // Email not registered.
        } else {
            // Email đúng, kiểm tra password
            if ( !wp_check_password($user_pass, $user->user_pass, $user->ID) ) {
                $errors['password'] = '비밀번호가 일치하지 않습니다.'; // Incorrect password.
            }
        }
    }

    if ( !empty($errors) ) {
        wp_send_json_error([
            'fields' => $errors // Trả về dạng ['email' => 'Lỗi A', 'password' => 'Lỗi B']
        ]);
    }

    // Đăng nhập người dùng
    $user_model = new UserModel();
    $user_model->login($user);

    wp_send_json_success();
}

add_action('wp_ajax_handle_register_step1', 'handle_register_step1');
add_action('wp_ajax_nopriv_handle_register_step1', 'handle_register_step1');
function handle_register_step1() {
    if ( empty($_POST['action_nonce']) || !wp_verify_nonce($_POST['action_nonce'], 'user_register_nonce') ) {
        wp_send_json_error([
            'message' => "잘못된 요청입니다.", // Invalid request.
            'debug' => 'Nonce verification failed.'
        ]);
    }

    $user_model = new UserModel();

    $errors = []; // Mảng chứa lỗi
    $user_email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $user_pass  = isset($_POST['password']) ? $_POST['password'] : '';
    $user_confirm_pass  = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $user_login = isset($_POST['nickname']) ? sanitize_user($_POST['nickname']) : '';
    $full_name = isset($_POST['full_name']) ? sanitize_text_field($_POST['full_name']) : '';
    $phone_number = isset($_POST['phone_number']) ? sanitize_text_field($_POST['phone_number']) : '';
    $birth_date = isset($_POST['birth_date']) ? sanitize_text_field($_POST['birth_date']) : '';
    $agree_privacy = isset($_POST['agree_privacy']) ? $_POST['agree_privacy'] : '';
    $agree_terms = isset($_POST['agree_terms']) ? $_POST['agree_terms'] : '';

    // Validate Email
    if ( empty($user_email) ) {
        $errors['email'] = '이메일을 입력해주세요.'; // Please enter your email.
    } elseif ( !is_email($user_email) ) {
        $errors['email'] = '올바른 이메일 형식이 아닙니다.'; // Invalid email format.
    } elseif ( email_exists($user_email) ) {
        $errors['email'] = '이미 가입된 이메일입니다.'; // Email already registered.
    }

    // Validate Password
    if ( empty($user_pass) ) {
        $errors['password'] = '비밀번호를 입력해주세요.'; // Please enter your password.
    } elseif ( !is_valid_password($user_pass) ) {
        $errors['password'] = '비밀번호는 최소 6자리 이상이어야 합니다.'; // Password must be at least 6 characters including letters and numbers.
    }

    // Validate password confirmation
    if ( empty($user_confirm_pass) ) {
        $errors['confirm_password'] = '비밀번호 확인을 입력해주세요.'; // Please confirm your password.
    } elseif ( $user_pass !== $user_confirm_pass ) {
        $errors['confirm_password'] = '비밀번호가 일치하지 않습니다.'; // Passwords do not match.
    }

    // Validate Nickname (닉네임)
    if ( empty($user_login) ) {
        $errors['nickname'] = '닉네임을 입력해주세요.'; // Please enter your nickname.
    } elseif ( username_exists($user_login) ) {
        $errors['nickname'] = '이미 사용 중인 닉네임입니다.'; // Nickname already in use.
    }

    // Validate Full name (이름)
    // Tối thiểu 2 ký tự - tối đa 5 ký tự
    // Chỉ được nhập tiếng Hàn
    // Không được nhập số và ký tự đặc biệt, khoảng trắng
    // Không được nhập chữ cái Latin
    // Không được nhập riêng lẻ phụ âm/nguyên âm (ㄱ, ㅏ …)
    if ( empty($full_name) ) {
        $errors['full_name'] = '이름을 입력해주세요.'; // Please enter your full name.
    } elseif ( !preg_match('/^[가-힣]+$/u', $full_name) ) {
        $errors['full_name'] = '이름은 한글만 사용할 수 있습니다 (자음, 모음 단독 사용 불가).'; // Full name can only contain Korean characters.
    } elseif ( mb_strlen($full_name) < 2 || mb_strlen($full_name) > 5 ) {
        $errors['full_name'] = '이름은 2자 이상 5자 이하로 입력해주세요.'; // Full name must be between 2 and 5 characters.
    }

    // Validate Phone number (핸드폰번호)
    if ( empty($phone_number) ) {
        $errors['phone_number'] = '핸드폰번호를 입력해주세요.'; // Please enter your phone number.
    } elseif ( !is_valid_korean_phone($phone_number) ) {
        $errors['phone_number'] = '올바른 핸드폰번호 형식이 아닙니다.'; // Invalid phone number format.
    } elseif ( $user_model->is_phone_exists($phone_number) ) {
        $errors['phone_number'] = '이미 사용 중인 핸드폰번호입니다.'; // Phone number already in use.
    }

    // Validate Birth Date (생년월일)
    if ( empty($birth_date) ) {
        $errors['birth_date'] = '생년월일을 입력해주세요.'; // Please enter your birth date.
    } elseif ( !is_valid_date($birth_date, 'Y.m.d') ) { // kiểm tra đúng định dạng yyyy.mm.dd và phải là hợp lệ
        $errors['birth_date'] = '올바른 생년월일 형식이 아닙니다.'; // Invalid birth date format.
    }

    // Validate Agreements
    if ( empty($agree_privacy) ) {
        $errors['agree_privacy'] = '개인정보 처리방침에 동의해야 합니다.'; // Must agree to privacy policy.
    }
    if ( empty($agree_terms) ) {
        $errors['agree_terms'] = '서비스 이용약관에 동의해야 합니다.'; // Must agree to terms of service.
    }

    if ( !empty($errors) ) {
        wp_send_json_error([
            'fields' => $errors // Trả về dạng ['email' => 'Lỗi A', 'password' => 'Lỗi B']
        ]);
    }

    wp_send_json_success();
}