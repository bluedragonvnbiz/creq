<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

function is_valid_korean_phone($phone_number) {
    // Loại bỏ khoảng trắng và dấu gạch ngang
    $phone_number = preg_replace('/[\s\-]/', '', $phone_number);
    // Kiểm tra định dạng số điện thoại di động Hàn Quốc
    return preg_match('/^01[016789]\d{7,8}$/', $phone_number);
}

function is_valid_password($password) {
    // Kiểm tra password có ít nhất 6 ký tự, bao gồm cả chữ cái và số
    return strlen($password) >= 6 && preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password);
}