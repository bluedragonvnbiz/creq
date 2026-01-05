<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

add_action('wp_ajax_user_login', 'user_login');
add_action('wp_ajax_nopriv_user_login', 'user_login');
function user_login() {
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
    $full_name = isset($_POST['full_name']) ? sanitize_text_field(trim($_POST['full_name'])) : '';
    $phone_number = isset($_POST['phone_number']) ? sanitize_text_field(trim($_POST['phone_number'])) : '';
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
    } elseif ( $user_model->isPhoneExists($phone_number) ) {
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

add_action('wp_ajax_handle_register_step4', 'handle_register_step4');
add_action('wp_ajax_nopriv_handle_register_step4', 'handle_register_step4');
function handle_register_step4() {
    if ( empty($_POST['action_nonce']) || !wp_verify_nonce($_POST['action_nonce'], 'user_register_nonce') ) {
        wp_send_json_error([
            'message' => "잘못된 요청입니다.", // Invalid request.
            'debug' => 'Nonce verification failed.'
        ]);
    }

    $user_model = new UserModel();

    $errors = []; // Mảng chứa lỗi

    // dữ liệu ở bước 1
    $user_email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $user_pass  = isset($_POST['password']) ? $_POST['password'] : '';
    $user_confirm_pass  = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $user_login = isset($_POST['nickname']) ? sanitize_user($_POST['nickname']) : '';
    $full_name = isset($_POST['full_name']) ? sanitize_text_field(trim($_POST['full_name'])) : '';
    $phone_number = isset($_POST['phone_number']) ? sanitize_text_field(trim($_POST['phone_number'])) : '';
    $birth_date = isset($_POST['birth_date']) ? sanitize_text_field($_POST['birth_date']) : '';
    $agree_privacy = isset($_POST['agree_privacy']) ? $_POST['agree_privacy'] : '';
    $agree_terms = isset($_POST['agree_terms']) ? $_POST['agree_terms'] : '';
    $referral_code = isset($_POST['referral_code']) ? sanitize_text_field(trim($_POST['referral_code'])) : '';

    // dữ liệu ở bước 4
    $exchange_entity = isset($_POST['exchange_entity']) ? sanitize_text_field($_POST['exchange_entity']) : null;
    $bank_id = isset($_POST['bank_id']) ? intval($_POST['bank_id']) : 0;
    $account_number = isset($_POST['account_number']) ? sanitize_text_field(trim($_POST['account_number'])) : '';
    $account_holder = isset($_POST['account_holder']) ? sanitize_text_field(trim($_POST['account_holder'])) : '';
    $id_card_file = isset($_FILES['id_card_file']) ? $_FILES['id_card_file'] : null;
    $bankbook_file = isset($_FILES['bankbook_file']) ? $_FILES['bankbook_file'] : null;

    // Validate Exchange Entity
    if ( empty($exchange_entity) || !in_array($exchange_entity, ['individual', 'business']) ) {
        $errors['exchange_entity'] = '환전주체를 선택해주세요.'; // Please select exchange entity.
    }

    // Validate Bank
    if ( empty($bank_id) || !is_numeric($bank_id) || $bank_id <= 0 ) {
        $errors['bank_id'] = '은행을 선택해주세요.'; // Please select a bank.
    }

    // Validate Account Number
    if ( empty($account_number) ) {
        $errors['account_number'] = '계좌번호를 입력해주세요.'; // Please enter account number.
    }

    // Validate Account Holder
    if ( empty($account_holder) ) {
        $errors['account_holder'] = '예금주명을 입력해주세요.'; // Please enter account holder name.
    }

    // Validate ID Card File
    if ( $id_card_file === null || $id_card_file['error'] === UPLOAD_ERR_NO_FILE ) {
        $errors['id_card_file'] = '신분증 사본을 업로드해주세요.'; // Please upload a copy of your ID card.
    }

    // Validate Bankbook File
    if ( $bankbook_file === null || $bankbook_file['error'] === UPLOAD_ERR_NO_FILE ) {
        $errors['bankbook_file'] = '통장 사본을 업로드해주세요.'; // Please upload a copy of your bankbook.
    }

    if ( !empty($errors) ) {
        wp_send_json_error([
            'fields' => $errors
        ]);
    }

    $allowed_mimes = [
        'image/jpeg' => ['jpg', 'jpeg'],
        'image/png'  => ['png'],
        'application/pdf' => ['pdf'],
    ];

    $uploaded_id_card = null;
    $uploaded_bankbook = null;

    $res_id = creq_custom_store_files('id_card_file', [
        'dest_subdir'   => 'id_cards',
        'allowed_mimes' => $allowed_mimes,
        'max_size'      => 5 * 1024 * 1024,
        'required'      => true,
        'rollback_on_fail' => true
    ]);

    if ( is_wp_error($res_id) ) {
        $errors['id_card_file'] = $res_id->get_error_message();
    } else {
        $uploaded_id_card = $res_id['files'][0];
    }

    if ( empty($errors) ) {
        $res_bank = creq_custom_store_files('bankbook_file', [
            'dest_subdir'   => 'bankbooks', // Thư mục đích
            'allowed_mimes' => $allowed_mimes,
            'max_size'      => 5 * 1024 * 1024,
            'required'      => true,
            'rollback_on_fail' => true
        ]);

        if ( is_wp_error($res_bank) ) {
            $errors['bankbook_file'] = $res_bank->get_error_message();
            
            // ROLLBACK
            if ($uploaded_id_card && file_exists($uploaded_id_card['path'])) {
                @unlink($uploaded_id_card['path']);
            }
        } else {
            $uploaded_bankbook = $res_bank['files'][0];
        }
    }

    if ( !empty($errors) ) {
        wp_send_json_error([ 'fields' => $errors ]);
    }

    // Đăng ký user
    $new_user_id = $user_model->register([
        'username' => $user_login,
        'password' => $user_pass,
        'email'    => $user_email,
        'full_name' => $full_name,
        'phone' => $phone_number,
        'birth_date' => $birth_date,
        'referral_code' => $referral_code,
        'exchange_entity' => $exchange_entity,
        'bank_id' => $bank_id,
        'account_number' => $account_number,
        'account_holder' => $account_holder,
        'id_card' => $uploaded_id_card['url'],
        'bankbook' => $uploaded_bankbook['url'],
    ]);
    if ( is_wp_error($new_user_id) ) {
        // Xoá file đã upload khi đăng ký thất bại
        if ($uploaded_id_card && file_exists($uploaded_id_card['path'])) {
            @unlink($uploaded_id_card['path']);
        }
        if ($uploaded_bankbook && file_exists($uploaded_bankbook['path'])) {
            @unlink($uploaded_bankbook['path']);
        }

        wp_send_json_error([
            'message' => '회원가입에 실패했습니다. 다시 시도해주세요.', // Registration failed. Please try again.
            'debug' => $new_user_id->get_error_message()
        ]);
    }

    wp_send_json_success();
}

add_action('wp_ajax_user_find_email', 'user_find_email');
add_action('wp_ajax_nopriv_user_find_email', 'user_find_email');
function user_find_email() {
    if ( empty($_POST['action_nonce']) || !wp_verify_nonce($_POST['action_nonce'], 'user_find_email_nonce') ) {
        wp_send_json_error([
            'message' => "잘못된 요청입니다.", // Invalid request.
            'debug' => 'Nonce verification failed.'
        ]);
    }

    $user_model = new UserModel();

    $errors = []; // Mảng chứa lỗi
    $full_name = isset($_POST['full_name']) ? sanitize_text_field(trim($_POST['full_name'])) : '';
    $phone_number = isset($_POST['phone_number']) ? sanitize_text_field(trim($_POST['phone_number'])) : '';

    // Validate Full name (이름)
    if ( empty($full_name) ) {
        $errors['full_name'] = '이름을 입력해주세요.'; // Please enter your full name.
    }

    // Validate Phone number (핸드폰번호)
    if ( empty($phone_number) ) {
        $errors['phone_number'] = '핸드폰번호를 입력해주세요.'; // Please enter your phone number.
    } elseif ( !is_valid_korean_phone($phone_number) ) {
        $errors['phone_number'] = '올바른 핸드폰번호 형식이 아닙니다.'; // Invalid phone number format.
    }

    // Kiểm tra sự tồn tại của người dùng với tên và số điện thoại
    $user_email = $user_model->findUserEmailByNameAndPhone($full_name, $phone_number);
    if ( !$user_email ) {
        $errors['full_name'] = '이름을 다시 확인해주세요.'; // Please check your full name again.
        $errors['phone_number'] = '핸드폰번호를 다시 확인해주세요.'; // Please check your phone number again.
    }

    if ( !empty($errors) ) {
        wp_send_json_error([
            'fields' => $errors
        ]);
    }

    wp_send_json_success([
        'user_email' => $user_email
    ]);
}