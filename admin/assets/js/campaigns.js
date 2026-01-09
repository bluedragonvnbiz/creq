jQuery(document).ready(function($){

    // Xử lý validate logic ngày tháng cho upload_starttime và upload_endtime
    $(document).on('input change', 'input[name="recruitment_endtime"], input[name="upload_starttime"], input[name="upload_endtime"]', function() {
        const recruitmentEndDate = $('input[name="recruitment_endtime"]').val();
        const uploadStartDate = $('input[name="upload_starttime"]').val();
        const uploadEndDate = $('input[name="upload_endtime"]').val();
        const $uploadWrap = $('input[name="upload_starttime"]').closest('.row-section');

        // Lỗi khi StartDate ĐÃ nhập nhưng sai logic (nhỏ hơn Recruitment hoặc thiếu Recruitment)
        const invalidDateValue = (uploadStartDate !== '') && (recruitmentEndDate === '' || uploadStartDate < recruitmentEndDate);
        // Lỗi khi StartDate CHƯA nhập (Rỗng) nhưng lại có đủ Recruitment End và Upload End
        const missingStartDate = (uploadStartDate === '') && (recruitmentEndDate !== '' && uploadEndDate !== '');

        const isInvalid = invalidDateValue || missingStartDate;

        $uploadWrap.find('.date-input-wrapper').toggleClass('invalid', isInvalid);
        $uploadWrap.find('.error-alert').toggleClass('d-none', !isInvalid);
    });

    // Xử lý xóa ngày recruitment_endtime nếu nhỏ hơn recruitment_starttime
    $(document).on('input change', 'input[name="recruitment_endtime"]', function() {
        const recruitmentStartDate = $('input[name="recruitment_starttime"]').val();
        const recruitmentEndDate = $('input[name="recruitment_endtime"]').val();
        if (recruitmentStartDate !== '' && recruitmentEndDate !== '' && recruitmentEndDate < recruitmentStartDate) {
            $('input[name="recruitment_endtime"]').val('').trigger('input');
        }
    });

    // Xử lý xóa ngày upload_endtime nếu nhỏ hơn upload_starttime
    $(document).on('input change', 'input[name="upload_endtime"]', function() {
        const uploadStartDate = $('input[name="upload_starttime"]').val();
        const uploadEndDate = $('input[name="upload_endtime"]').val();
        if (uploadStartDate !== '' && uploadEndDate !== '' && uploadEndDate < uploadStartDate) {
            $('input[name="upload_endtime"]').val('').trigger('input');
        }
    });

    // Xử lý xóa các từ không bắt đầu bằng # trong input required_hashtags
    $(document).on('input', 'input[name="required_hashtags"]', function() {
        let val = $(this).val();

        // Regex giải thích:
        // (^|\s)   : Bắt đầu dòng HOẶC một khoảng trắng (Group 1)
        // [^#\s]   : Ký tự tiếp theo KHÔNG phải là dấu # và KHÔNG phải khoảng trắng
        // [^\s]* : Theo sau là bất kỳ ký tự nào (cho đến khi gặp khoảng trắng tiếp theo) - Dùng để xử lý cả trường hợp paste
        
        // Logic: Tìm những từ không bắt đầu bằng # và thay thế chúng bằng Group 1 (chỉ giữ lại khoảng trắng hoặc đầu dòng)
        let newVal = val.replace(/(^|\s)([^#\s][^\s]*)/g, '$1');

        // Chỉ cập nhật lại value nếu có sự thay đổi (để tránh lỗi con trỏ nhảy lung tung)
        if (newVal !== val) {
            $(this).val(newVal);
        }
    });

    $(document).on('input change', '#addCampaignForm [required], #addCampaignForm .field-required', function() {
        validateAddCampaignForm();
    });

    $(document).on('submit', '#addCampaignForm', function(e) {
        e.preventDefault();
        const $this = $(this);
        const campaignStatus = $this.find('input[name="campaign_status"]').val();
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

                if (response.success) {
                    // Event modal đóng xong
                    $('#pv-alert-modal').on('hidden.bs.modal', function () {
                        if(campaignStatus === 'pending') {
                            if (response.data.redirect_url) {
                                window.location.href = response.data.redirect_url;
                            } else {
                                window.location.href = `${define.home_url}/creq-admin/campaigns`;
                            }
                        } else {
                            // Nếu là lưu nháp, truyền draft_id vào form để tiếp tục chỉnh sửa
                            let draftId = response.data.draft_id;
                            $('#addCampaignForm input[name="draft_id"]').val(draftId).trigger('input');
                        }
                    });
                }
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
                if(campaignStatus === 'pending') {
                    $this.find('button[type="submit"]').prop('disabled', false);
                }
            }
        });
    });

    $(document).on('click', '#saveDraftCampaign', function(e) {
        e.preventDefault();
        $('#addCampaignForm input[name="campaign_status"]').val('draft').trigger('input');
        // Trigger submit form
        $('#addCampaignForm').trigger('submit');
    });
    $(document).on('click', '#addCampaignForm button[type="submit"]', function(e) {
        $('#addCampaignForm input[name="campaign_status"]').val('pending').trigger('input');
    });


    function validateAddCampaignForm() {
        let isValid = true;
        $('#addCampaignForm [required], #addCampaignForm .field-required').each(function() {
            const $field = $(this);
            const type = $field.attr('type');

            if (type === 'checkbox') {
                if (!$field.is(':checked')) {
                    isValid = false;
                }
            } else if (type === 'radio') {
                // Kiểm tra nếu không có radio nào được chọn
                const name = $field.attr('name');
                if ($(`input[name="${name}"]:checked`).length === 0) {
                    isValid = false;
                }
            } else {
                const val = $field.val();
                if (!val || val.toString().trim() === '') {
                    isValid = false;
                }
            }
        });

        $('#addCampaignForm button[type="submit"]').prop('disabled', !isValid);
    }
});