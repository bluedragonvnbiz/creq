jQuery(document).ready(function ($) {
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
    $('body').on('input', '.auto-height', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

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

}) //end jquery