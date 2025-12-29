jQuery(document).ready(function($) {

    // Xử lý sự kiện click .btn-show-password
    $(document).on('click', '.btn-show-password', function() {
        const $this = $(this);
        const $passwordInput = $this.closest('.field-group').find('input[type="password"], input[type="text"]');

        if ($passwordInput.attr('type') === 'password') {
            $passwordInput.attr('type', 'text');
            $this.find('.icon').removeClass('hide-password').addClass('show-password');
        } else {
            $passwordInput.attr('type', 'password');
            $this.find('.icon').removeClass('show-password').addClass('hide-password');
        }
    });

    // Xử lý sự kiện input để ẩn feedback lỗi
    $(document).on('input', '#loginForm input, #loginForm textarea, #loginForm select', function() {
        const $field = $(this);
        hideErrorFeedback($field);
        validateForm();
    });

    // Xử lý sự kiện submit form đăng nhập
    $(document).on('submit', '#loginForm', function(e) {
        e.preventDefault();
        const $this = $(this);
        let formData = new FormData(this);

        $.ajax({
            url: define.ajax_url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                addLoading();
                $this.find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = define.home_url;
                } else {
                    // Hiển thị feedback lỗi cho trường cụ thể nếu có
                    if ( response.data.fields ) {
                        // Loop qua từng key trong object fields (email, password)
                        $.each(response.data.fields, function(fieldName, errorMessage) {
                            const $field = $this.find(`input[name="${fieldName}"]`);
                            if ($field.length > 0) {
                                showErrorFeedback($field, errorMessage);
                            }
                        });
                    }
                }
            },
            error: function(xhr, status, error) {
                if (xhr.status === 0) {
                    showAlertModal('네트워크 오류', '네트워크 연결을 확인해주세요.');
                } else if (xhr.status >= 500) {
                    showAlertModal('서버오류', '일시적인 오류가 발생했습니다.<br/>잠시 후 다시 시도해주세요.');
                } else {
                    showAlertModal('로그인 실패', '로그인에 실패했습니다.<br/>잠시 후 다시 시도해주세요.');
                }
            },
            complete: function() {
                unLoading();
                $this.find('button[type="submit"]').prop('disabled', false);
            }
        });
    });

    // Hàm kiểm tra form đăng nhập
    function validateForm() {
        let isValid = true;
        $('#loginForm [required]').each(function() {
            if ($(this).val().trim() === '') {
                isValid = false;
            }
        });
        $('#loginForm button[type="submit"]').prop('disabled', !isValid);
    }
});