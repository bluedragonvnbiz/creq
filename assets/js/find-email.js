jQuery(document).ready(function($){
    // Xử lý sự kiện input để ẩn feedback lỗi
    $(document).on('input change', '#findEmailForm input', function() {
        validateForm();
    });

    // Xử lý sự kiện submit form tìm email
    $(document).on('submit', '#findEmailForm', function(e) {
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
                    $('#findEmailFormWrap').remove();
                    $('#foundEmail').text(response.data.user_email);
                    $('#successWrap').removeClass('d-none');
                } else {
                    // Hiển thị feedback lỗi cho trường cụ thể nếu có
                    if ( response.data.fields ) {
                        // Loop qua từng key trong object fields (full_name, phone_number)
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
                    showAlertModal('이메일 찾기 실패', '이메일 찾기에 실패했습니다.<br/>잠시 후 다시 시도해주세요.');
                }
            },
            complete: function() {
                unLoading();
                $this.find('button[type="submit"]').prop('disabled', false);
            }
        });
    });

    // Hàm kiểm tra form tìm email
    function validateForm() {
        let isValid = true;
        $('#findEmailForm [required]').each(function() {
            hideErrorFeedback($(this));
            if ($(this).val().trim() === '') {
                isValid = false;
            }
        });
        $('#findEmailForm button[type="submit"]').prop('disabled', !isValid);
    }
});