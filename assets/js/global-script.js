jQuery(document).ready(function($) {
    // Xử lý input numeric chỉ cho phép nhập số, nếu nhập chữ không thay đổi value
    $(document).on('input', 'input[inputmode="numeric"]', function() {
        let value = $(this).val().replace(/\D/g, ''); // bỏ ký tự không phải số
        $(this).val(value);
    });

    // Xử lý format input phone number
    $(document).on('input', 'input[type="tel"]', function() {
        let value = $(this).val().replace(/\D/g, ''); // bỏ ký tự không phải số
        if (value.length > 3 && value.length <= 7) {
            value = value.replace(/^(\d{3})(\d+)/, '$1-$2');
        } else if (value.length > 7) {
            value = value.replace(/^(\d{3})(\d{4})(\d+)/, '$1-$2-$3');
        }
        $(this).val(value);
    });

    var stackedZIndex = 100000;
    var backdropCount = 0;

    $(document).on('show.bs.modal', '.modal[data-stack="true"]', function () {
        backdropCount = $('.modal-backdrop').length;
    });

    $(document).on('shown.bs.modal', '.modal[data-stack="true"]', function () {
        var $modal = $(this);

        stackedZIndex += 10;
        $modal.css('z-index', stackedZIndex);

        var $newBackdrop = $('.modal-backdrop').eq(backdropCount);

        if ($newBackdrop.length) {
            $newBackdrop
                .css('z-index', stackedZIndex - 5)
                .addClass('stacked-backdrop');
        }
    });

    $(document).on('hidden.bs.modal', '.modal[data-stack="true"]', function () {
        $('.modal-backdrop.stacked-backdrop').last().remove();

        if ($('.modal.show[data-stack="true"]').length === 0) {
            stackedZIndex = 100000;
        }
    });

}); //end jquery

function addLoading() {
    jQuery('body').append(`<div id="page_load"><span class="loader"></span></div>`);
}
function unLoading() {
    jQuery('#page_load').remove();
}
function showErrorFeedback($field, message) {
    const $group = $field.closest('.field-group');
    $group.addClass('is-error');
    const $feedback = jQuery(`<span class="error-feedback">${message}</span>`);

    // Nếu đã có thông báo lỗi thì không thêm nữa
    if ($group.siblings('.error-feedback').length === 0) {
        $group.after($feedback);
    }
}
function hideErrorFeedback($field) {
    const $group = $field.closest('.field-group');
    $group.removeClass('is-error');
    $group.siblings('.error-feedback').remove();
}
function showAlertModal(title, message) {
    const $alertModal = jQuery('#pv-alert-modal');
    $alertModal.find('.modal-title').text(title);
    $alertModal.find('.modal-message').html(message);
    $alertModal.modal('show');
}
function hideAlertModal() {
    const $alertModal = jQuery('#pv-alert-modal');
    $alertModal.modal('hide');
}

function backFunc(){
    let referrer = document.referrer;
    let currentHost = window.location.hostname;

    if ( referrer === "" || history.length <= 1 ||  !referrer.includes(currentHost) ) {
        window.location.href = "/";
    } else {
       history.back();
    }
    return false;
}

