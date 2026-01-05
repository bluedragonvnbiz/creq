<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't load directly.

/**
 * Tạo thư mục uploads/subdir nếu chưa có, trả về [dir, url]
 */
function creq_ensure_upload_subdir($subdir) {
    $uploads = wp_upload_dir(null, false);
    $base_dir = trailingslashit($uploads['basedir']);
    $base_url = trailingslashit($uploads['baseurl']);

    $dir = trailingslashit($base_dir . ltrim($subdir, '/'));
    $url = trailingslashit($base_url . ltrim($subdir, '/'));

    if (!wp_mkdir_p($dir)) {
        return new WP_Error('upload_error', "Cannot create upload directory: {$dir}");
    }
    return ['dir' => $dir, 'url' => $url];
}

/**
 * Tạo tên file an toàn, tránh trùng tên (dùng sanitize + wp_unique_filename)
 */
function creq_unique_target($dir, $original_name) {
    $safe_name = sanitize_file_name($original_name);
    $unique    = wp_unique_filename($dir, $safe_name);
    return $unique; // chỉ tên file
}

if (!function_exists('creq_files_normalize')) {
    /**
     * Chuẩn hoá $_FILES[field] thành mảng các file, dù single hay multiple.
     */
    function creq_files_normalize($fileInput) {
        $files = [];
        if (is_array($fileInput['name'])) {
            $count = count($fileInput['name']);
            for ($i = 0; $i < $count; $i++) {
                $files[] = [
                    'name'     => $fileInput['name'][$i],
                    'type'     => $fileInput['type'][$i],
                    'tmp_name' => $fileInput['tmp_name'][$i],
                    'error'    => $fileInput['error'][$i],
                    'size'     => $fileInput['size'][$i],
                ];
            }
        } else {
            $files[] = $fileInput;
        }
        return $files;
    }
}

if (!function_exists('creq_upload_error_message')) {
    /**
     * Map mã lỗi UPLOAD_ERR_* thành thông báo thân thiện.
     */
    function creq_upload_error_message($code) {
        switch ($code) {
            case UPLOAD_ERR_OK: return 'OK';
            case UPLOAD_ERR_INI_SIZE: 
            case UPLOAD_ERR_FORM_SIZE: return 'File exceeds the allowed size.';
            case UPLOAD_ERR_PARTIAL:  return 'File upload is incomplete.';
            case UPLOAD_ERR_NO_FILE:  return 'No file selected.';
            case UPLOAD_ERR_NO_TMP_DIR: return 'Missing temporary folder on server.';
            case UPLOAD_ERR_CANT_WRITE: return 'Failed to write file to disk.';
            case UPLOAD_ERR_EXTENSION: return 'Upload blocked by extension.';
            default: return 'Unknown upload error.';
        }
    }
}

if (!function_exists('creq_is_allowed_mime')) {
    /**
     * Kiểm tra MIME thực tế (finfo) có trong whitelist không.
     * $allowed_mimes: ['application/pdf' => ['pdf'], 'image/jpeg' => ['jpg','jpeg'], ...]
     */
    function creq_is_allowed_mime($tmpFile, $allowed_mimes) {
        if (empty($allowed_mimes) || !file_exists($tmpFile)) return false;
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $real  = finfo_file($finfo, $tmpFile);
        finfo_close($finfo);
        return isset($allowed_mimes[$real]);
    }
}

if (!function_exists('creq_wp_check_ext')) {
    /**
     * Dùng WP để check extension & type dựa trên file name + tmp file.
     */
    function creq_wp_check_ext($fileName, $tmpFile) {
        // Từ WP 5.1+: wp_check_filetype_and_ext có thể kiểm tra nội dung thực.
        return wp_check_filetype_and_ext($tmpFile, $fileName);
    }
}

/**
 * Validate & move file vào uploads/subdir (không vào Media Library).
 *
 * @param string $field Tên field trong $_FILES (vd: 'contract_file' hoặc 'screenshots')
 * @param array  $opts  Các tuỳ chọn:
 *   - required (bool)        : Bắt buộc có file? (default: false)
 *   - max_files (int|null)   : Số file tối đa (default: 1 cho single input, null = unlimited)
 *   - min_size (int)         : Min bytes/file (default: 0)
 *   - max_size (int|null)    : Max bytes/file (default: null)
 *   - allowed_mimes (array)  : Whitelist MIME => ext
 *   - image_constraints (array) : min_w, min_h, max_w, max_h (optional)
 *   - dest_subdir (string)   : Ví dụ: 'order_contracts' hoặc 'order_screenshots'
 *   - rollback_on_fail (bool): Xoá các file đã lưu nếu 1 file lỗi (default: true)
 *
 * @return array|WP_Error
 *   Success: ['files' => [ ['filename'=>'abc.pdf','path'=>'/…/abc.pdf','url'=>'https://…/abc.pdf','mime'=>'application/pdf','size'=>12345], ... ]]
 *   Fail: WP_Error(...)
 */
function creq_custom_store_files($field, $opts = []) {
    $defaults = [
        'required'          => false,
        'max_files'         => 1,
        'min_size'          => 0,
        'max_size'          => null,
        'allowed_mimes'     => [],
        'image_constraints' => null,
        'dest_subdir'       => '',
        'rollback_on_fail'  => true,
    ];
    $o = array_merge($defaults, $opts);

    if (empty($_FILES[$field])) {
        if ($o['required']) {
            return new WP_Error('upload_error', "Field '{$field}' is required.");
        }
        return ['files' => []];
    }

    // Chuẩn hoá files
    $normalized = creq_files_normalize($_FILES[$field]);

    // Kiểm tra required
    $hasRealFile = false;
    foreach ($normalized as $nf) {
        if ($nf['error'] !== UPLOAD_ERR_NO_FILE) { $hasRealFile = true; break; }
    }
    if ($o['required'] && !$hasRealFile) {
        return new WP_Error('upload_error', "Field '{$field}' is required.");
    }

    // Giới hạn số file
    $countReal = 0;
    foreach ($normalized as $nf) {
        if ($nf['error'] !== UPLOAD_ERR_NO_FILE) $countReal++;
    }
    if ($o['max_files'] !== null && $countReal > $o['max_files']) {
        return new WP_Error('upload_error', "Too many files for '{$field}'. Max is {$o['max_files']}.");
    }

    // Chuẩn bị thư mục đích
    if (empty($o['dest_subdir'])) {
        return new WP_Error('upload_error', 'Destination subdir is required.');
    }
    $dest = creq_ensure_upload_subdir($o['dest_subdir']);
    if (is_wp_error($dest)) return $dest;
    $dest_dir = $dest['dir'];
    $dest_url = $dest['url'];

    $out        = [];
    $savedPaths = []; // để rollback

    foreach ($normalized as $f) {
        if ($f['error'] === UPLOAD_ERR_NO_FILE) continue;

        if ($f['error'] !== UPLOAD_ERR_OK) {
            if ($o['rollback_on_fail']) { foreach ($savedPaths as $p) @unlink($p); }
            return new WP_Error('upload_error', creq_upload_error_message($f['error']), ['debug' => $f]);
        }

        if (!is_uploaded_file($f['tmp_name'])) {
            if ($o['rollback_on_fail']) { foreach ($savedPaths as $p) @unlink($p); }
            return new WP_Error('upload_error', 'Potential file upload attack detected.', ['debug' => $f]);
        }

        // Size
        if ($o['min_size'] && $f['size'] < $o['min_size']) {
            if ($o['rollback_on_fail']) { foreach ($savedPaths as $p) @unlink($p); }
            return new WP_Error('upload_error', "File '{$f['name']}' is smaller than allowed.");
        }
        if ($o['max_size'] && $f['size'] > $o['max_size']) {
            if ($o['rollback_on_fail']) { foreach ($savedPaths as $p) @unlink($p); }
            return new WP_Error('upload_error', "File '{$f['name']}' exceeds maximum size.");
        }

        // MIME thực
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $realMime = finfo_file($finfo, $f['tmp_name']);
        finfo_close($finfo);

        if (!empty($o['allowed_mimes']) && !isset($o['allowed_mimes'][$realMime])) {
            if ($o['rollback_on_fail']) { foreach ($savedPaths as $p) @unlink($p); }
            return new WP_Error('upload_error', "File '{$f['name']}' has disallowed type: {$realMime}.");
        }

        // WP check (extension/type)
        $wpType = creq_wp_check_ext($f['name'], $f['tmp_name']);
        // Nếu WP không xác định được ext hợp lệ cho file này -> CHẶN NGAY
        if ( empty($wpType['ext']) ) {
            if ($o['rollback_on_fail']) { foreach ($savedPaths as $p) @unlink($p); }
            return new WP_Error('upload_error', "Security: File extension does not match file type.");
        }

        // Ảnh: kiểm tra dimension
        if (!empty($o['image_constraints']) && strpos($realMime, 'image/') === 0) {
            $dim = @getimagesize($f['tmp_name']);
            if (!$dim) {
                if ($o['rollback_on_fail']) { foreach ($savedPaths as $p) @unlink($p); }
                return new WP_Error('upload_error', "File '{$f['name']}' is not a valid image.");
            }
            list($w, $h) = $dim;
            $ic = $o['image_constraints'];
            if (!empty($ic['min_w']) && $w < $ic['min_w']) return new WP_Error('upload_error', "Image '{$f['name']}' width too small.");
            if (!empty($ic['min_h']) && $h < $ic['min_h']) return new WP_Error('upload_error', "Image '{$f['name']}' height too small.");
            if (!empty($ic['max_w']) && $w > $ic['max_w']) return new WP_Error('upload_error', "Image '{$f['name']}' width too large.");
            if (!empty($ic['max_h']) && $h > $ic['max_h']) return new WP_Error('upload_error', "Image '{$f['name']}' height too large.");
        }

        // Tên file duy nhất & move
        $target_filename = creq_unique_target($dest_dir, $f['name']); // chỉ tên
        $target_path     = $dest_dir . $target_filename;

        // move_uploaded_file (không dùng wp_handle_upload để tránh vào Media)
        if (!@move_uploaded_file($f['tmp_name'], $target_path)) {
            if ($o['rollback_on_fail']) { foreach ($savedPaths as $p) @unlink($p); }
            return new WP_Error('upload_error', "Cannot move uploaded file '{$f['name']}'.");
        }

        // Set permission "an toàn"
        @chmod($target_path, 0644);
        $savedPaths[] = $target_path;

        $out[] = [
            'filename' => $target_filename,
            'path'     => $target_path,
            'url'      => $dest_url . $target_filename,
            'mime'     => $realMime,
            'size'     => (int) $f['size'],
            'ext'      => !empty($wpType['ext']) ? $wpType['ext'] : pathinfo($target_filename, PATHINFO_EXTENSION),
        ];
    }

    return ['files' => $out];
}