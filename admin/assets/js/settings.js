jQuery(document).ready(function($){

    $(document).on('input change', '#baseSalaryForm input', function() {
        validateForm();
    });

    $(document).on('submit', '#baseSalaryForm', function(e) {
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
                showAlertModal(response.success ? '처리 완료' : '오류 발생', response.data.message);
            },
            error: function(xhr, status, error) {
                if (xhr.status === 0) {
                    showAlertModal('네트워크 오류', '네트워크 연결을 확인해주세요.');
                } else if (xhr.status >= 500) {
                    showAlertModal('서버오류', '일시적인 오류가 발생했습니다.<br/>잠시 후 다시 시도해주세요.');
                } else {
                    showAlertModal('요청 실패', '요청을 처리하는 도중 오류가 발생했습니다.<br/>잠시 후 다시 시도해주세요.');
                }
            },
            complete: function() {
                unLoading();
                $('#base-salary-modal').modal('hide');
                $this.find('button[type="submit"]').prop('disabled', false);
            }
        });
    });

    function validateForm() {
        let isValid = true;
        $('#baseSalaryForm [required]').each(function() {
            if ($(this).val().trim() === '') {
                isValid = false;
            }
        });
        $('#baseSalaryForm button[type="submit"]').prop('disabled', !isValid);
    }
});