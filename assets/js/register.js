/**
 * Step 1
 */
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

    // Chặn click trực tiếp vào checkbox có .readonly-check
    $(document).on('click', '.readonly-check', function(e) {
        e.preventDefault();
        const $this = $(this);
        const $btnModal = $this.closest('.field-check').find('.field-check-link');
        if ($btnModal.length > 0) {
            $btnModal.trigger('click');
        }
    });

    // 2. Xử lý khi bấm nút "Đồng ý" (동의) trong Modal
    $(document).on('click', '.btn-agree', function() {
        // Lấy tên ID mục tiêu từ data-name="agree_terms" hoặc "agree_privacy"
        const targetId = $(this).data('name'); 
        const $checkbox = $('#' + targetId);

        if ($checkbox.length > 0) {
            $checkbox.prop('checked', true).trigger('change');
            if (typeof hideErrorFeedback === 'function') {
                hideErrorFeedback($checkbox);
            }
            $(this).closest('.modal').modal('hide');
        }
    });

    // Kiểm tra step 1 khi nhập liệu, không có field rỗng sẽ active nút next
    $(document).on('input change', '#step1 input, #step1 textarea, #step1 select', function() {
        const $field = $(this);
        hideErrorFeedback($field);
        validateStep1();
    });

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
                    if(window.saveRegisterState) {
                        window.saveRegisterState(3);
                    }
                    activateRegisterStep(3);
                } else {
                    // Hiển thị feedback lỗi cho trường cụ thể nếu có
                    if ( response.data.fields ) {
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
                    showAlertModal('요청 실패', '요청을 처리하는 도중 오류가 발생했습니다.<br/>잠시 후 다시 시도해주세요.');
                }
            },
            complete: function() {
                unLoading();
                $this.prop('disabled', false);
            }
        });
    });

    // Hàm kiểm tra các input checkbox required của form đăng ký
    function validateStep1() {
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
}) //end jquery

/**
 * Step 3
 */
jQuery(document).ready(function($){
    // Biến lưu trạng thái channel đang thao tác
    let activeChannel = null;

    // 1. Click nút Connect (.btn-channel-connect)
    $(document).on('click', '.btn-channel-connect', function(e) {
        e.preventDefault();
        const $btn = $(this);
        
        const channelName = $btn.closest('.channel-item').attr('data-channel');
        // Lưu lại channel đang thao tác để dùng cho các bước sau
        activeChannel = channelName;

        // Gọi API Connect Channel
        connectChannelAPI(channelName);
    });

    // 2. XỬ LÝ MODAL CATEGORY (Confirm -> Chuyển sang Style)
    $(document).on('input change', '#channel-category-modal input[type="checkbox"], #channel-category-modal input[type="text"]', function() {
        const $modal = $('#channel-category-modal');
        const checkedCount = $modal.find('input[type="checkbox"]:checked').length;
        const otherValue = $modal.find('input[name="other_category"]').val().trim();
        $modal.find('.btn-confirm').prop('disabled', checkedCount === 0 && otherValue === '');
    });
    $(document).on('click', '#channel-category-modal .btn-confirm', function() {
        const $modal = $('#channel-category-modal');
        const checkedCount = $modal.find('input[type="checkbox"]:checked').length;
        const otherValue = $modal.find('input[name="other_category"]').val().trim();

        if (checkedCount === 0 && otherValue === '') {
            return;
        }

        const selectedCats = [];
        $modal.find('input[type="checkbox"]:checked').each(function(){
            selectedCats.push($(this).val());
            // Tìm và cập nhật nhãn hiển thị .option-label trong .channel-labels
            const styleLabel = $(this).closest('.option-item').find('.option-label').text().trim();
            updateChannelLabels(activeChannel, styleLabel);
        });
        if (otherValue !== '') {
            updateChannelLabels(activeChannel, otherValue);
        }
        $(`input[name="connected_channels[${activeChannel}][categories]"]`).val(selectedCats.join(','));
        $(`input[name="connected_channels[${activeChannel}][other_category]"]`).val(otherValue);

        $modal.modal('hide');
        setTimeout(() => {
            resetModalForm('#channel-style-modal');
            $('#channel-style-modal').modal('show');
        }, 300);
    });

    // 3. XỬ LÝ MODAL STYLE (Confirm -> Hoàn tất)
    $(document).on('input change', '#channel-style-modal input[type="checkbox"], #channel-style-modal input[type="text"]', function() {
        const $modal = $('#channel-style-modal');
        const checkedCount = $modal.find('input[type="checkbox"]:checked').length;
        const otherValue = $modal.find('input[name="other_style"]').val().trim();
        $modal.find('.btn-confirm').prop('disabled', checkedCount === 0 && otherValue === '');
    });
    $(document).on('click', '#channel-style-modal .btn-confirm', function() {
        const $modal = $('#channel-style-modal');
        const checkedCount = $modal.find('input[type="checkbox"]:checked').length;
        const otherValue = $modal.find('input[name="other_style"]').val().trim();

        if (checkedCount === 0 && otherValue === '') {
            return;
        }

        const selectedStyles = [];
        $modal.find('input[type="checkbox"]:checked').each(function(){
            selectedStyles.push($(this).val());
            // Tìm và cập nhật nhãn hiển thị .option-label trong .channel-labels
            const styleLabel = $(this).closest('.option-item').find('.option-label').text().trim();
            updateChannelLabels(activeChannel, styleLabel);
        });
        if (otherValue !== '') {
            updateChannelLabels(activeChannel, otherValue);
        }
        $(`input[name="connected_channels[${activeChannel}][styles]"]`).val(selectedStyles.join(','));
        $(`input[name="connected_channels[${activeChannel}][other_style]"]`).val(otherValue);

        $modal.modal('hide');
        // Update giao diện nút Connect thành Linked
        window.updateChannelUI(activeChannel);
        // Reset biến tạm
        activeChannel = null;
        // Kiểm tra xem có thể Enable nút Next chưa
        validateStep3();
    });

    // 4. Nút Next Step
    $(document).on('click', '#step3 .btn-next-step', function(e) {
        e.preventDefault();
        
        // Sau này có thể thêm AJAX gửi dữ liệu lên server nếu cần 
        if(window.saveRegisterState) {
            window.saveRegisterState(4);
        }
        activateRegisterStep(4);
    });

    // API kết nối channel
    function connectChannelAPI(channel) {
        addLoading();
        setTimeout(function() {
            unLoading();
            // Giả lập thành công
            const response = { 
                success: true,
                data: {
                    account_avatar: 'https://upload.wikimedia.org/wikipedia/commons/b/b4/Lionel-Messi-Argentina-2022-FIFA-World-Cup_%28cropped%29.jpg',
                    account_id: 'leomessi',
                    is_verified: true
                }
            };
            if (response.success) {
                // Kết nối thành công -> Mở Modal 1: Category
                resetModalForm('#channel-category-modal'); // Reset checkbox cũ
                $('#channel-category-modal').modal('show');
                // Tạo element .connected-info rồi after nút connect (chưa hiển thị ngay)
                let connectedInfoHtml = `
                    <div class="connected-info d-none">
                        <div class="account-linked">
                            <img width="22" height="22" src="${response.data.account_avatar}" alt="Account Avatar" class="account-avatar">
                            <span class="account-id">${response.data.account_id}</span>
                            ${ 
                                response.data.is_verified 
                                ? `<img width="15" height="15" src="${define.assets_url}/images/icons/channel-verified.svg" alt="Verified Icon" class="verified-icon">` 
                                : ''
                            }
                        </div>
                        <div class="channel-labels">
                        </div>
                    </div>
                `;
                const $channelItem = $(`.channel-item[data-channel="${channel}"]`);
                if ( $channelItem.find('.connected-info').length === 0 ) {
                    $channelItem.find('.connect-box').after(connectedInfoHtml);
                }
            } else {
                alert(response.message || '채널 연결에 실패했습니다.'); // Hiển thị lỗi
            }
        }, 1000); 
    }

    // Hàm reset input, checkbox trong modal
    function resetModalForm(modalId) {
        $(modalId).find('input[type="checkbox"]').prop('checked', false);
        $(modalId).find('input[type="text"]').val('');
    }

    // Hàm update nhãn thể loại đã chọn trong .channel-labels
    function updateChannelLabels(channel, labelText) {
        const $labelsContainer = $(`.channel-item[data-channel="${channel}"] .channel-labels`);
        // Kiểm tra nếu nhãn đã tồn tại thì không thêm nữa
        let labelExists = false;
        $labelsContainer.find('.channel-label').each(function() {
            if ($(this).text().trim() === labelText) {
                labelExists = true;
                return false; // thoát khỏi vòng lặp each
            }
        });
        if (!labelExists) {
            const $label = $(`<span class="channel-label">${labelText}</span>`);
            $labelsContainer.append($label);
        }
    }

    // Hàm update giao diện sau khi connect xong
    window.updateChannelUI = function(channel) {
        // Thêm class connected
        $(`.channel-item[data-channel="${channel}"]`).addClass('is-connected');
        // Hiển thị thông tin connected
        $(`.channel-item[data-channel="${channel}"] .connected-info`).removeClass('d-none');
        // Disable nút connect
        $(`.channel-item[data-channel="${channel}"] .btn-channel-connect`).prop('disabled', true);
    }

    // Hàm kiểm tra các channel connected để enable nút next
    function validateStep3() {
        let isValid = false;
        $('#step3 .channel-item').each(function() {
            const $item = $(this);
            const channel = $item.attr('data-channel');

            const catVal = $(`input[name="connected_channels[${channel}][categories]"]`).val();
            const catOther = $(`input[name="connected_channels[${channel}][other_category]"]`).val();
            
            const styleVal = $(`input[name="connected_channels[${channel}][styles]"]`).val();
            const styleOther = $(`input[name="connected_channels[${channel}][other_style]"]`).val();

            const hasCategory = (catVal !== '' || catOther !== '');
            const hasStyle = (styleVal !== '' || styleOther !== '');

            if (hasCategory && hasStyle) {
                isValid = true;
            }
        });

        if (isValid) {
            $('#step3 .btn-next-step').prop('disabled', false);
        } else {
            $('#step3 .btn-next-step').prop('disabled', true);
        }
    }
});

/**
 * Step 4
 */
jQuery(document).ready(function($){
    // Xử lý hiển thị thông tin thuế dựa trên lựa chọn cá nhân/doanh nghiệp
    $(document).on('change', '#step4 input[name="exchange_entity"]', function() {
        const selectedValue = $(this).val();
        if (selectedValue === 'business') {
            $('#tax-info-wrap').removeClass('d-none');
        } else {
            $('#tax-info-wrap').addClass('d-none');
        }
    });
    // Kích hoạt sự kiện change để thiết lập hiển thị ban đầu
    $('#step4 input[name="exchange_entity"]:checked').trigger('change');

    // Xử lý khi chọn file ID Card hoặc Bankbook
    $(document).on('change', '#id_card_file, #bankbook_file', function() {
        const fileInput = this;
        const file = fileInput.files[0];
        const inputId = $(fileInput).attr('id'); // id_card_file hoặc bankbook_file
        const $displayInput = $('#' + inputId + '_display'); // Input hiển thị tên
        
        const $fileWrap = $displayInput.closest('.file-wrap');
        $fileWrap.removeClass('is-error');
        $fileWrap.siblings('.error-feedback').remove();

        // Cập nhật tên file vào ô display
        if (file) {
            $displayInput.val(file.name);
        } else {
            $displayInput.val('');
            $(fileInput).val('');
        }

        // C. Kiểm tra để bật nút Submit
        validateStep4();
    });

    // Kiểm tra form đăng ký khi nhập liệu, không có field rỗng sẽ active nút submit
    $(document).on('input change', '#step4 input[type="text"], #step4 textarea, #step4 select', function() {
        const $field = $(this);
        hideErrorFeedback($field);
        validateStep4();
    });

    // Xử lý sự kiện submit step 4 form đăng ký
    $(document).on('click', '#step4 .btn-next-step', function(e) {
        e.preventDefault();
        const $this = $(this);
        const $form = $('#registerForm');
        let formData = new FormData($form[0]);
        formData.append('action', 'handle_register_step4');

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
                    if(window.clearRegisterState) {
                        window.clearRegisterState();
                    }
                    $('#registerFormWrap').remove();
                    $('.auth-header-mobile').remove();
                    $('.auth-wp .right').css('margin-top', '0');
                    $('#successWrap').removeClass('d-none');
                } else {
                    // Hiển thị feedback lỗi cho trường cụ thể nếu có
                    if ( response.data.fields ) {
                        // Loop qua từng key trong object fields (email, password)
                        $.each(response.data.fields, function(fieldName, errorMessage) {
                            if(fieldName === 'id_card_file' || fieldName === 'bankbook_file') {
                                const $field = $form.find(`#${fieldName}`);
                                if ($field.length > 0) {
                                    const $fileWrap = $field.closest('.file-wrap');
                                    $fileWrap.addClass('is-error');
                                    const $feedback = jQuery(`<span class="error-feedback">${errorMessage}</span>`);

                                    // Nếu đã có thông báo lỗi thì không thêm nữa
                                    if ($fileWrap.siblings('.error-feedback').length === 0) {
                                        $fileWrap.after($feedback);
                                    }
                                }
                            } else {
                                const $field = $form.find(`[name="${fieldName}"]`);
                                if ($field.length > 0) {
                                    showErrorFeedback($field, errorMessage);
                                }
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
                    showAlertModal('요청 실패', '요청을 처리하는 도중 오류가 발생했습니다.<br/>잠시 후 다시 시도해주세요.');
                }
            },
            complete: function() {
                unLoading();
                $this.prop('disabled', false);
            }
        });
    });

    // Hàm kiểm tra các input required của step 4
    function validateStep4() {
        const exchangeEntity = $('input[name="exchange_entity"]:checked').val();
        const bankID = $('select[name="bank_id"]').val();
        const accNum = $('input[name="account_number"]').val().trim();
        const accHolder = $('input[name="account_holder"]').val().trim();
        
        const hasIdFile = $('#id_card_file').val() !== '';
        const hasBankFile = $('#bankbook_file').val() !== '';

        const $btnSubmit = $('#step4 .btn-submit');

        if (exchangeEntity && bankID && accNum && accHolder && hasIdFile && hasBankFile) {
            $btnSubmit.prop('disabled', false);
        } else {
            $btnSubmit.prop('disabled', true);
        }
    }
});

/**
 * AUTO-SAVE & RESTORE (REFRESH PAGE SUPPORT)
 * Giữ lại dữ liệu và trạng thái các bước khi người dùng F5
 * ============================================================================
 */
jQuery(document).ready(function($) {
    const STORAGE_KEY_DATA = 'creq_reg_data_v2';
    const STORAGE_KEY_STEP = 'creq_reg_step_v2';
    const STORAGE_KEY_META = 'creq_reg_meta_v2';
    const STORAGE_KEY_MAX  = 'creq_reg_max_v2';

    // 1. HÀM LƯU TRẠNG THÁI
    window.saveRegisterState = function(stepNumber) {
        try {
            // A. Lưu dữ liệu Form (Input values)
            const formArray = $('#registerForm').serializeArray();
            const formData = {};
            $.each(formArray, function(i, field) {
                if (formData[field.name]) {
                    if (!Array.isArray(formData[field.name])) {
                        formData[field.name] = [formData[field.name]];
                    }
                    formData[field.name].push(field.value);
                } else {
                    formData[field.name] = field.value;
                }
            });

            // B. Lưu Metadata giao diện Step 3 (Avatar, ID, Verified)
            // Quét qua các channel đã connect để lấy thông tin HTML hiện tại lưu lại
            const uiMeta = {};
            $('#step3 .channel-item').each(function() {
                const $item = $(this);
                const channel = $item.attr('data-channel');
                // Tìm xem channel này có đang hiện connected-info không?
                const $connectedInfo = $item.find('.connected-info');
                
                if ($connectedInfo.length > 0) {
                    uiMeta[channel] = {
                        isConnected: true,
                        avatarSrc: $connectedInfo.find('.account-avatar').attr('src'), // Lấy ảnh
                        accountId: $connectedInfo.find('.account-id').text().trim(),       // Lấy ID
                        isVerified: $connectedInfo.find('.verified-icon').length > 0,      // Check verified
                        labelsHtml: $connectedInfo.find('.channel-labels').html()
                    };
                }
            });

            let currentMax = parseInt(sessionStorage.getItem(STORAGE_KEY_MAX) || 1);
            let nextStepInt = parseInt(stepNumber);
            if (nextStepInt > currentMax) {
                currentMax = nextStepInt;
            }

            // C. Thực hiện lưu
            sessionStorage.setItem(STORAGE_KEY_DATA, JSON.stringify(formData));
            sessionStorage.setItem(STORAGE_KEY_META, JSON.stringify(uiMeta)); 
            sessionStorage.setItem(STORAGE_KEY_STEP, stepNumber);
            sessionStorage.setItem(STORAGE_KEY_MAX, currentMax);

        } catch (e) {
            console.error('Save state error:', e);
        }
    };

    // 2. HÀM XÓA TRẠNG THÁI
    window.clearRegisterState = function() {
        sessionStorage.removeItem(STORAGE_KEY_DATA);
        sessionStorage.removeItem(STORAGE_KEY_STEP);
        sessionStorage.removeItem(STORAGE_KEY_META);
        sessionStorage.removeItem(STORAGE_KEY_MAX);
    };

    // 3. HÀM KHÔI PHỤC TRẠNG THÁI
    function loadRegisterState() {
        const savedData = sessionStorage.getItem(STORAGE_KEY_DATA);
        const savedStep = sessionStorage.getItem(STORAGE_KEY_STEP);
        const savedMeta = sessionStorage.getItem(STORAGE_KEY_META); // Load metadata hình ảnh

        if (savedData && savedStep) {
            const formData = JSON.parse(savedData);
            const uiMeta   = savedMeta ? JSON.parse(savedMeta) : {};
            let targetStep = parseInt(savedStep);

            // A. FILL DỮ LIỆU INPUT
            $.each(formData, function(name, value) {
                const $el = $(`[name='${name}']`); 
                if ($el.length > 0) {
                    const type = $el.attr('type');
                    if (type === 'radio') {
                        $(`input[name='${name}'][value="${value}"]`).prop('checked', true);
                    } else if (type === 'checkbox') {
                        if (Array.isArray(value)) {
                            value.forEach(val => $(`input[name='${name}'][value="${val}"]`).prop('checked', true));
                        } else {
                            $(`input[name='${name}'][value="${value}"]`).prop('checked', true);
                        }
                    } else {
                        $el.val(value).trigger('change'); // Trigger để kích hoạt code validate cũ
                    }
                }
            });

            // B. KHÔI PHỤC UI STEP 3 (Render lại HTML Connected Info)
            restoreStep3UI(uiMeta);

            // C. NHẢY TỚI BƯỚC CẦN THIẾT
            activateRegisterStep(targetStep);
        }
    }

    // 4. HÀM RENDER UI STEP 3
    function restoreStep3UI(uiMeta) {
        // Loop qua từng channel trong Meta đã lưu
        $.each(uiMeta, function(channel, data) {
            if (data && data.isConnected) {
                const connectedHtml = `
                    <div class="connected-info">
                        <div class="account-linked">
                            <img width="22" height="22" src="${data.avatarSrc}" alt="Account Avatar" class="account-avatar">
                            <span class="account-id">${data.accountId}</span>
                            ${ 
                                data.isVerified 
                                ? `<img width="15" height="15" src="${define.assets_url}/images/icons/channel-verified.svg" alt="Verified Icon" class="verified-icon">` 
                                : ''
                            }
                        </div>
                        <div class="channel-labels">
                            ${data.labelsHtml || ''}
                        </div>
                    </div>
                `;

                // 3. Chèn HTML vào sau .connect-box
                const $channelItem = $(`.channel-item[data-channel="${channel}"]`);
                if ( $channelItem.find('.connected-info').length === 0 ) {
                    $channelItem.find('.connect-box').after(connectedHtml);
                }

                // 4. Cập nhật giao diện nút Connect thành Linked
                window.updateChannelUI(channel);
            }
        });
        
        // 5. Kiểm tra để enable nút Next (Sử dụng lại logic kiểm tra input hidden)
        // Tìm nút Next trong Step 3
        const $btnNext = $('#step3 .btn-next-step');
        let isAnyConnected = false;
        $('input[name*="[categories]"]').each(function() {
            if ($(this).val() !== '') isAnyConnected = true;
        });
        
        if (isAnyConnected) {
            $btnNext.prop('disabled', false);
        }
    }

    $(document).on('click', '.progess-bar .progress-step', function() {
        // Lấy bước muốn đến
        let targetStep = $(this).index() + 1;
        
        // Lấy bước hiện tại và bước cao nhất từ storage (để đảm bảo chính xác)
        const currentStep = parseInt(sessionStorage.getItem(STORAGE_KEY_STEP) || 1);
        const maxStep     = parseInt(sessionStorage.getItem(STORAGE_KEY_MAX) || 1);

        // --- XỬ LÝ LOGIC ĐẶC BIỆT CHO BƯỚC 2 ---
        if (targetStep === 2) {
            if (currentStep >= 3) {
                // Đang ở 3 hoặc 4 -> Click 2 -> Về 1
                targetStep = 1;
            } else if (currentStep === 1) {
                // Đang ở 1 -> Click 2 -> Đến 3 (Nếu 3 đã từng hoàn thành)
                if (maxStep >= 3) {
                    targetStep = 3;
                } else {
                    return; // Nếu chưa tới 3 bao giờ thì không cho click
                }
            }
        }

        if (targetStep <= maxStep) {
            
            if (typeof activateRegisterStep === 'function') {
                activateRegisterStep(targetStep);
            }

            sessionStorage.setItem(STORAGE_KEY_STEP, targetStep);

            const $targetFieldset = $('#step' + targetStep);
            $targetFieldset.find('.btn-next-step').prop('disabled', false);
        }
    });

    // 5. KÍCH HOẠT TỰ ĐỘNG
    loadRegisterState();
});

// Hàm kích hoạt step cụ thể trong form đăng ký
function activateRegisterStep(stepNumber) {
    // Lấy max step từ storage ra để check
    const maxStep = parseInt(sessionStorage.getItem('creq_reg_max_v2') || 1);

    jQuery('.progess-bar .progress-step').each(function(index) {
        const currentStep = index + 1;
        const stepTitle = jQuery(this).attr('data-title') || '';

        // Cập nhật tiêu đề bước hiện tại
        if (currentStep === stepNumber && stepTitle !== '') {
            jQuery('.step-title').text(stepTitle);
        }
        // Cập nhật tiêu đề header mobile
        if(stepNumber === 1 || stepNumber === 2) {
            jQuery('.header-mobile-title').text('회원가입');
        } else if (stepNumber === 3) {
            jQuery('.header-mobile-title').text('채널 유형 선택 및 연동');
        } else if (stepNumber === 4) {
            jQuery('.header-mobile-title').text('환전 계좌 정보 관리');
        }

        // Cập nhật trạng thái bước
        if (currentStep < stepNumber) {
            jQuery(this).removeClass('active').addClass('completed');
        } else if (currentStep === stepNumber) {
            // Bước HIỆN TẠI (VD: truyền 3 thì 3 là active)
            jQuery(this).removeClass('completed').addClass('active');
        } else {
            jQuery(this).removeClass('active completed');
        }
    });

    jQuery('fieldset[id^="step"]').addClass('d-none');
    jQuery('#step' + stepNumber).removeClass('d-none');
    jQuery('html, body').animate({ scrollTop: 0 }, 'fast');
}

// Khai báo biến toàn cục để theo dõi trạng thái kéo
let isDown = false;
let startX;
let scrollLeft;
let currentSlider = null; // Biến này lưu slider nào đang được kéo

// 1. Lắng nghe sự kiện Mousedown trên toàn bộ Document
document.addEventListener('mousedown', (e) => {
    // Tìm xem cái người dùng click vào có phải là .channel-labels (hoặc con của nó) không?
    const slider = e.target.closest('.channel-labels');
    
    // Nếu không phải click vào slider thì bỏ qua
    if (!slider) return;

    // Nếu đúng là slider, bắt đầu logic kéo
    isDown = true;
    currentSlider = slider; // Lưu lại slider đang được thao tác
    currentSlider.classList.add('is-hover');
    
    startX = e.pageX - currentSlider.offsetLeft;
    scrollLeft = currentSlider.scrollLeft;
});

// 2. Lắng nghe Mouseleave & Mouseup trên toàn bộ Document
// (Để đảm bảo dù chuột chạy ra ngoài khung vẫn nhả kéo được)
const stopDragging = () => {
    isDown = false;
    if (currentSlider) {
        currentSlider.classList.remove('is-hover');
        currentSlider = null; // Reset slider hiện tại
    }
};

document.addEventListener('mouseleave', stopDragging);
document.addEventListener('mouseup', stopDragging);

// 3. Lắng nghe Mousemove
document.addEventListener('mousemove', (e) => {
    // Nếu không đang trong trạng thái nhấn chuột hoặc không xác định được slider
    if (!isDown || !currentSlider) return;

    e.preventDefault(); // Ngăn bôi đen text
    
    const x = e.pageX - currentSlider.offsetLeft;
    const walk = (x - startX) * 2; // Tốc độ kéo (nhân 2 cho nhanh)
    
    currentSlider.scrollLeft = scrollLeft - walk;
});