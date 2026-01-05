<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

function is_valid_korean_phone($phone_number) {
    // Chỉ lấy số từ chuỗi
    $phone_number = preg_replace('/[^\d]/', '', $phone_number);
    // Kiểm tra định dạng số điện thoại di động Hàn Quốc
    return preg_match('/^01[0]\d{7,8}$/', $phone_number);
}

function is_valid_password($password) {
    // Kiểm tra password có ít nhất 6 ký tự, bao gồm cả chữ cái và số
    return strlen($password) >= 6 && preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password);
}

// Format phone number to Korean style XXX-XXXX-XXXX
function format_phone_number($phone_number) {
    // Chỉ lấy số từ chuỗi
    $phone_number = preg_replace('/[^\d]/', '', $phone_number);
    
    // Định dạng số điện thoại Hàn Quốc
    if ( strlen($phone_number) === 11 ) {
        return preg_replace('/(\d{3})(\d{4})(\d{4})/', '$1-$2-$3', $phone_number);
    } elseif ( strlen($phone_number) === 10 ) {
        return preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1-$2-$3', $phone_number);
    }

    return $phone_number; // Trả về nguyên bản nếu không đúng định dạng
}

function clear_phone_number($phone_number) {
    // Chỉ lấy số từ chuỗi
    return preg_replace('/[^\d]/', '', $phone_number);
}

/**
 * Kiểm tra ngày có hợp lệ và ĐÚNG ĐỊNH DẠNG hay không
 * @param string $dateInput Ví dụ: '2025.03.12'
 * @param string $format    Ví dụ: 'Y.m.d'
 */
function is_valid_date($dateInput, $format = 'Y.m.d') {
    // 1. Tạo object ngày từ format quy định
    $d = DateTime::createFromFormat($format, $dateInput);
    
    // 2. Kiểm tra 2 điều kiện:
    //    a. $d phải tồn tại (tạo thành công)
    //    b. Format ngược lại phải KHỚP 100% với input ban đầu.
    //       Điều này giúp chặn các case nhập sai dấu như '2025-03-12' 
    //       hoặc ngày ảo như '2025.02.30' (ngày 30/2 ko tồn tại)
    return $d && $d->format($format) === $dateInput;
}