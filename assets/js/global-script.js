jQuery(document).ready(function($) {
    $(".form-data").on("input",function(e){
		$(this).find(".is-invalid").removeClass("is-invalid");
		$(this).find(".invalid-feedback").remove();
	})
});

const elementPageLoad = `<div id="page_load"><span class="loader"></span></div>`;
function addLoading() {
    jQuery('body').append(elementPageLoad);
}
function unLoading() {
    jQuery('#page_load').remove();
}