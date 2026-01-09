jQuery(document).ready(function ($) {

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

  $(document).on('input', '.input-numeric', function () {
      const el = this;
      let raw = el.value;

      // có dấu phẩy ở cuối không?
      const hasTrailingComma = raw.endsWith(',');

      // bỏ tất cả ký tự không phải số hoặc phẩy
      raw = raw.replace(/[^\d,]/g, '');

      // bỏ phẩy, chỉ lấy số
      let digits = raw.replace(/,/g, '');

      // bỏ số 0 ở đầu nếu sau còn số
      digits = digits.replace(/^0+(?=\d)/, '');

      if (digits === '') {
          el.value = hasTrailingComma ? ',' : '';
          return;
      }

      // format số có dấu phẩy nghìn
      let formatted = digits.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

      // logic giữ hoặc bỏ dấu phẩy cuối
      if (hasTrailingComma) {
          // cho phép nếu:
          // - chỉ có 1 chữ số, hoặc
          // - số chữ số chia hết cho 3
          if (digits.length === 1 || digits.length % 3 === 0) {
          formatted += ',';
          }
      }

      el.value = formatted;
  });

    $('.count-box').each(function () {
        var $box = $(this);
        var $input = $box.find('.count-input');
        var $result = $box.find('.count-result');
        var max = parseInt($input.data('max')) || 0;

        $input.on('input', function () {
            var length = $(this).val().length;
            $result.text(length);
            $box.toggleClass('invalid', length > max);
        });
    });

    $(".sidebar-collapsed-btn").click(function(){
        $(".admin-sidebar").toggleClass("sidebar-collapsed");
    })

    $('body').on('input', '.auto-height', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    $('.auto-height').each(function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    // custom input file 
    $(".input-file-upload").on("change",function(){
        let el = $(this).closest(".upload-box._name");
        let files = this.files;
        if (!files || files.length === 0) {
            el.find(".file-name").val("");
            return;
        }
        let fileName = files[0].name;
        el.find(".file-name").val(fileName);
    })


    // custom input file img
    $(".upload-single-file-wp input[type='file']").change(function(e){       
        let el = $(this).closest(".upload-single-file-wp");
        let file = e.target.files[0];
        let button = el.find(".img-action");    
        let $preview = el.find('.img-preview');
    
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                el.find('.img-preview img').remove();
                $preview.append('<img src="'+event.target.result+'" />');
            }
            reader.readAsDataURL(file);
        } else {
            el.find('.img-preview img').remove();
        }
    });



    //custom input date
    function format_date(val) {
        return val.replace(/-/g, '.');
    }

    $('.date-input-wrapper').each(function () {
        var $wrap = $(this);
        if ($wrap.data('time-initialized')) return;
        $wrap.data('time-initialized', true);

        var $input = $wrap.find('input[type="date"]');
        var $placeholder = $wrap.find('.text-label');
        var defaultText = $.trim($placeholder.text());

        function sync() {
            var val = $input.val();
            if (val) {
                $placeholder.text(format_date(val)).css('color', '#373739');
            } else {
                $placeholder.text(defaultText).css('color', '#D5D5D7');
            }
        }

        $wrap.on('click', function () {
            var el = $input[0];
            if (el && el.showPicker) {
                try { el.showPicker(); } catch (e) { $input.trigger('focus'); }
            } else {
                $input.trigger('focus');
            }
        });

        $input.on('input change blur', sync);
        sync();
    });

    //custom input number
    $.fn.numberstyle = function(options) {

        var settings = $.extend({
            value: 0,
            step: undefined,
            min: undefined,
            max: undefined
        }, options);

        return this.each(function(i) {

            var input = $(this);

            // Tạo container và các nút
            var container = document.createElement('div'),
                btnAdd = document.createElement('div'),
                btnRem = document.createElement('div'),
                min = (settings.min) ? settings.min : (input.attr('min') ? parseFloat(input.attr('min')) : undefined),
                max = (settings.max) ? settings.max : (input.attr('max') ? parseFloat(input.attr('max')) : undefined),
                step = (settings.step) ? settings.step : (input.attr('step') ? parseFloat(input.attr('step')) : 1),
                value = input.val() ? parseFloat(input.val()) : 0;

            container.className = 'numberstyle-qty';
            btnAdd.className = (max !== undefined && value >= max) ? 'qty-btn qty-add disabled' : 'qty-btn qty-add';
            btnAdd.innerHTML = '+';
            btnRem.className = (min !== undefined && value <= min) ? 'qty-btn qty-rem disabled' : 'qty-btn qty-rem';
            btnRem.innerHTML = '-';

            input.wrap(container);
            input.closest('.numberstyle-qty').prepend(btnRem).append(btnAdd);

            // --- PHẦN SỬA ĐỔI QUAN TRỌNG ---
            // Thay vì $(document).off... thì dùng $(container).on...
            // Để đảm bảo biến 'settings' và các biến cục bộ là của chính input này
            var $container = input.closest('.numberstyle-qty');
            
            $container.on('click', '.qty-btn', function(e) {

                var input = $(this).siblings('input'),
                    sibBtn = $(this).siblings('.qty-btn'),
                    // Lấy lại step/min/max từ settings (scope chính xác) hoặc attribute
                    step = (settings.step) ? parseFloat(settings.step) : (input.attr('step') ? parseFloat(input.attr('step')) : 1),
                    min = (settings.min) ? settings.min : (input.attr('min') ? parseFloat(input.attr('min')) : undefined),
                    max = (settings.max) ? settings.max : (input.attr('max') ? parseFloat(input.attr('max')) : undefined),
                    oldValue = input.val() === '' ? 0 : parseFloat(input.val()),
                    newVal;

                if ($(this).hasClass('qty-add')) {

                    newVal = (max !== undefined && oldValue >= max) ? oldValue : oldValue + step;
                    newVal = (max !== undefined && newVal > max) ? max : newVal;

                    if (max !== undefined && newVal >= max) {
                        $(this).addClass('disabled');
                    }
                    sibBtn.removeClass('disabled');

                } else {

                    // Logic trừ
                    newVal = (min !== undefined && oldValue <= min) ? oldValue : oldValue - step;
                    newVal = (min !== undefined && newVal < min) ? min : newVal;

                    if (min !== undefined && newVal <= min) {
                        $(this).addClass('disabled');
                    }
                    sibBtn.removeClass('disabled');

                }

                input.val(newVal).trigger('change');

            });
            // --- HẾT PHẦN SỬA ---

            input.on('change', function() {

                const val = input.val() === '' ? 0 : parseFloat(input.val()),
                    min = (settings.min) ? settings.min : (input.attr('min') ? parseFloat(input.attr('min')) : undefined),
                    max = (settings.max) ? settings.max : (input.attr('max') ? parseFloat(input.attr('max')) : undefined);

                if (max !== undefined && val > max) {
                    input.val(max);
                }

                if (min !== undefined && val < min) {
                    input.val(min);
                }
            });

        });
    };

    $('.numberstyle').numberstyle();

}) //end jquery

function addLoading() {
    jQuery('body').append(`<div id="page_load"><span class="loader"></span></div>`);
}
function unLoading() {
    jQuery('#page_load').remove();
}
function showAlertModal(title, message = '') {
    const $alertModal = jQuery('#pv-alert-modal');
    $alertModal.find('.modal-title').html(title);
    $alertModal.find('.modal-message').html(message);

    // nếu message khác rỗng thì hiển thị
    if (message && message.trim() !== '') {
        $alertModal.find('.modal-message').show();
    } else {
        $alertModal.find('.modal-message').hide();
    }

    $alertModal.modal('show');
}
function hideAlertModal() {
    const $alertModal = jQuery('#pv-alert-modal');
    $alertModal.modal('hide');
}