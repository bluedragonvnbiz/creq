<?php
add_action('wp_ajax_user_login', 'user_login');
add_action('wp_ajax_nopriv_user_login', 'user_login');
function user_login() {
    die(json_encode(["status" => "error","el" => ".password-div","message" => "Mật khẩu không đúng"]));
}