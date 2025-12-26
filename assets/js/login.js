jQuery(document).ready(function($) {
    
    const $alertModal = $('#pv-alert-modal');

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

                // Xóa thông báo lỗi cũ
                $this.find('.form-invalid-feedback').addClass('d-none').empty();
                $this.find('input').removeClass('invalid');
                $this.find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = define.home_url;
                } else {

                    // Hiển thị modal thông báo lỗi
                    $alertModal.find('.modal-title > span').text('로그인 실패');
                    $alertModal.find('.modal-message').text(`로그인에 실패했습니다.<br/>잠시 후 다시 시도해주세요.`);
                    $alertModal.modal('show');

                    if ( response.data.field ) {
                        const $field = $this.find(`input[name="${response.data.field}"]`);
                        $field.addClass('invalid'); // Thêm class invalid vào trường input
                        $field.closest('.form-group').find('.form-invalid-feedback')
                            .html(response.data.message)
                            .removeClass('d-none');
                    } else if ( response.data.type && response.data.type === 'alert') {
                        alert(response.data.message);
                    }
                }
            },
            error: function(xhr, status, error) {
                if (xhr.status === 0) {

                } else {

                }
            },
            complete: function() {
                unLoading();
                $this.find('button[type="submit"]').prop('disabled', false);
            }
        });
    });
});