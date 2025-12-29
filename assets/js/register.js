jQuery(document).ready(function($){

    const $birthInput = $('input[name="birth_date"]');
    if ($birthInput.length > 0) {
        $birthInput.datepicker({
            dateFormat: 'yy.mm.dd', 
            changeMonth: true,
            changeYear: true,
            showOtherMonths: true,
            selectOtherMonths: true,
            yearRange: '1900:c',
            maxDate: 0,
            onSelect: function(dateText, inst) {
                hideErrorFeedback($(this));
                $(this).trigger('input');
            }
        });
    }

    $(document).on('click', '.field-datepicker', function(e) {
        const $input = $(this).find('input[name="birth_date"]');
        if ($(e.target).is($input)) {
            return;
        }
        $input.datepicker('show');
    });

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

    // Kiểm tra form đăng ký khi nhập liệu, không có field rỗng sẽ active nút submit
    $(document).on('input change', '#registerForm', function() {
        validateForm();
    });

    // Hàm kiểm tra các input checkbox required của form đăng ký
    function validateForm() {
        let isValidStep1 = true;
        $('#step1 [required]').each(function() {
            const $field = $(this);
            const type = $field.attr('type');

            if (type === 'checkbox') {
                if (!$field.is(':checked')) {
                    isValidStep1 = false;
                }
            } else {
                if ($field.val().trim() === '') {
                    isValidStep1 = false;
                }
            }
        });
        $('#step1 .btn-next-step').prop('disabled', !isValidStep1);
    }

    // Xử lý sự kiện submit step 1 form đăng ký
    $(document).on('click', '#step1 .btn-next-step', function(e) {
        e.preventDefault();
        const $this = $(this);
        const $form = $('#registerForm');
        let formData = new FormData($form[0]);
        formData.append('action', 'handle_register_step1');

        $.ajax({
            url: define.ajax_url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                addLoading();
                $this.prop('disabled', true);
            },
            success: function(response) {
                if (response.success) {
                    
                } else {
                    // Hiển thị feedback lỗi cho trường cụ thể nếu có
                    if ( response.data.fields ) {
                        console.log(response.data.fields);
                        // Loop qua từng key trong object fields (email, password)
                        $.each(response.data.fields, function(fieldName, errorMessage) {
                            const $field = $form.find(`input[name="${fieldName}"]`);
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
                    showAlertModal('회원가입 실패', '회원가입에 실패했습니다.<br/>잠시 후 다시 시도해주세요.');
                }
            },
            complete: function() {
                unLoading();
                $this.prop('disabled', false);
            }
        });
    });

}) //end jquery