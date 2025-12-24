jQuery(document).ready(function($){
	var is_busy = false;
	$(".form-data").on("input",function(e){
		$(this).find(".is-invalid").removeClass("is-invalid");
		$(this).find(".invalid-feedback").remove();
	})
	$(".form-data").submit(function(e){
        if(is_busy == true) return; is_busy = true;
        e.preventDefault();
        let select = $(this);
        addLoading();
        var formData = new FormData(select[0]);
        if(select.find('[name="token"]').length == 0){
            formData.append('token', $("#verify-token").val());
        }
        
        $.ajax({
            url: define.ajax_url,
            type: "post",
            dataType:"json",
            contentType: false,
            processData: false,
            data: formData,
            success: function(output) {   
               
                if (typeof ajax_success === 'function' && select.find('[name="function_return"]').length == 0 ){
                    ajax_success(output,select.find('[name="action"]').val());  
                }else if(select.find('[name="function_return"]').length = 1){
                    let function_name = select.find('[name="function_return"]').val();
                        if (typeof window[function_name] === 'function') {
                        window[function_name](output);
                    }
                }

                if(output.status == "error" && output.el && output.message){
                	$(output.el).addClass("is-invalid").after('<div class="invalid-feedback">'+output.message+'</div>')
                }
                unLoading();
                is_busy = false;
            },
        });
        return false;
    });

});//end ready

const elementPageLoad = '<div id="page_load"><span class="loader"> </span></div>';
function addLoading() {jQuery('body').append(elementPageLoad);}
function unLoading() {jQuery('#page_load').remove();}
