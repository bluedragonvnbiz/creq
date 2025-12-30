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
        let files = this.files;
        if (!files || files.length === 0) {
            return;
        }
        let el = $(this).closest(".upload-box._name");
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
        }
    })



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
    }, options );

    return this.each(function(i) {
        
      var input = $(this);
          
      var container = document.createElement('div'),
          btnAdd = document.createElement('div'),
          btnRem = document.createElement('div'),
          min = (settings.min) ? settings.min : (input.attr('min') ? parseFloat(input.attr('min')) : undefined),
          max = (settings.max) ? settings.max : (input.attr('max') ? parseFloat(input.attr('max')) : undefined),
          step = (settings.step) ? settings.step : (input.attr('step') ? parseFloat(input.attr('step')) : 1),
          value = input.val() ? parseFloat(input.val()) : 0;
      
      container.className = 'numberstyle-qty';
      btnAdd.className = (max !== undefined && value >= max ) ? 'qty-btn qty-add disabled' : 'qty-btn qty-add';
      btnAdd.innerHTML = '+';
      btnRem.className = (min !== undefined && value <= min) ? 'qty-btn qty-rem disabled' : 'qty-btn qty-rem';
      btnRem.innerHTML = '-';
      input.wrap(container);
      input.closest('.numberstyle-qty').prepend(btnRem).append(btnAdd);

      $(document).off('click','.qty-btn').on('click','.qty-btn',function(e){
        
        var input = $(this).siblings('input'),
            sibBtn = $(this).siblings('.qty-btn'),
            step = (settings.step) ? parseFloat(settings.step) : (input.attr('step') ? parseFloat(input.attr('step')) : 1),
            min = (settings.min) ? settings.min : (input.attr('min') ? parseFloat(input.attr('min')) : undefined),
            max = (settings.max) ? settings.max : (input.attr('max') ? parseFloat(input.attr('max')) : undefined),
            oldValue = input.val() === '' ? 0 : parseFloat(input.val()),
            newVal;
        
        if ( $(this).hasClass('qty-add') ) {   
          
          newVal = (max !== undefined && oldValue >= max) ? oldValue : oldValue + step;
          newVal = (max !== undefined && newVal > max) ? max : newVal;
          
          if (max !== undefined && newVal >= max) {
            $(this).addClass('disabled');
          }
          sibBtn.removeClass('disabled');
         
        } else {
          
          newVal = (min !== undefined && oldValue <= min) ? oldValue : oldValue - step;
          newVal = (min !== undefined && newVal < min) ? min : newVal; 
          
          if (min !== undefined && newVal <= min) {
            $(this).addClass('disabled');
          }
          sibBtn.removeClass('disabled');
          
        }
          
        input.val(newVal).trigger('change');
            
      });
      
      input.on('change',function(){
        
        const val = input.val() === '' ? 0 : parseFloat(input.val()),
              min = (settings.min) ? settings.min : (input.attr('min') ? parseFloat(input.attr('min')) : undefined),
              max = (settings.max) ? settings.max : (input.attr('max') ? parseFloat(input.attr('max')) : undefined);
        
        if ( max !== undefined && val > max ) {
          input.val(max);   
        }
        
        if ( min !== undefined && val < min ) {
          input.val(min);
        }
      });
      
    });
  };
  $('.numberstyle').numberstyle();

}) //end jquery

