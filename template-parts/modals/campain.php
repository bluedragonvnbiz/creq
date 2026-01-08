<div class="modal fade pv-modal" id="type-modal" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column row-gap-3">
                <p class="mb-0 fw-semibold fs-6 text-center">검색 채널을 선택해주세요.</p>
                <div class="d-flex column-gap-3">
                	<button class="btn h-auto w-100 p-3 d-flex flex-column row-gap-2 rounded-3 border-primary" type="button">
                		<img src="<?= IMAGES_URL; ?>/icons/youtube-2.svg" alt="" width="30px">
                		<span class="fw-semibold fs-11">Youtube</span>
                	</button>
                	<button class="btn h-auto w-100 p-3 d-flex flex-column row-gap-2 rounded-3 border-light" type="button">
                		<img src="<?= IMAGES_URL; ?>/icons/instagram.svg" alt="" width="30px">
                		<span class="fw-semibold fs-11">Instagram</span>
                	</button>
                	<button class="btn h-auto w-100 p-3 d-flex flex-column row-gap-2 rounded-3 border-light" type="button">
                		<img src="<?= IMAGES_URL; ?>/icons/tiktok.svg" alt="" width="30px">
                		<span class="fw-semibold fs-11">Tiktok</span>
                	</button>
                </div>
                <div class="modal-group-btn d-flex align-items-center column-gap-2 justify-content-center">
                	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">취소</button>
                	<button type="button" class="btn btn-primary">확인</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade pv-modal" id="category-modal" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column row-gap-3">
                <p class="mb-0 fw-semibold fs-6 text-center">검색 카테고리를 선택하세요.</p>
                <div class="input-group-label">
                <?php  
                $arr = ["패션","뷰티","푸드","IT,테크","리빙","육아","헬스","맛집","여행","펫","자기개발","도서","게임"];
                foreach ($arr as $key => $value) { ?>
                	<input type="checkbox" name="" id="checkbox-<?= $key ?>">
                	<label for="checkbox-<?= $key ?>"><?= $value ?></label>
                <?php
                }
                ?>
                </div>
                <div class="modal-group-btn d-flex align-items-center column-gap-2 justify-content-center">
                	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">취소</button>
                	<button type="button" class="btn btn-primary">다음</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade pv-modal" id="remove-modal" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <p class="mb-2 fw-semibold fs-6 text-center">제안을 보류하시겠습니까?</p>
                <div class="mb-3 fs-14 text-center" style="color:#9E9E9E">
                보류된 캠페인은 ‘보류' 페이지에서 확인 가능하며,<br>
                모집기간 내  ‘보류 취소’를 통해<br>
                캠페인을 신청하실 수 있습니다.
                </div>
                <div class="modal-group-btn d-flex align-items-center column-gap-2 justify-content-center">
                	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">확인</button>
                	<button type="button" class="btn btn-primary">다음</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade pv-modal" id="cancel-modal" tabindex="-1" data-stack="true" style="z-index: 100010;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <p class="mb-2 fw-semibold fs-6 text-center">신청을 취소 하시겠습니까?</p>
                <div class="mb-3 fs-14 text-center" style="color:#9E9E9E">
                취소한 신청은 복구가 불가능하며,<br>
                모집 기간 내 재신청이 가능합니다.
                </div>
                <div class="modal-group-btn d-flex align-items-center column-gap-2 justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">취소</button>
                    <button type="button" class="btn btn-primary">확인</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade pv-modal" id="confirm-modal" tabindex="-1" data-stack="true" style="z-index: 100010;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="confirm-box">
                    <div class="mb-3 fs-16 text-center fw-semibold">
                    필수 가이드를 확인하셨습니까?<br>
                    필수 사항을 지키지 않을 경우<br>
                    문제가 될 수 있습니다.
                    </div>
                    <div class="modal-group-btn d-flex align-items-center column-gap-2 justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">취소</button>
                        <button type="button" class="btn btn-primary confirm-btn">확인</button>
                    </div>
                </div>
                <div class="success-box text-center" style="display:none;">
                    <img src="<?= IMAGES_URL; ?>/logo.svg" alt="Logo" style="height: 18px;" class="mb-3">
                    <p class="fw-semibold fs-6">성공적으로 신청이 완료되었습니다.</p>
                    <div class="modal-group-btn d-flex align-items-center column-gap-2 justify-content-center pt-3">
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#review-modal">신청 정보 확인</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">캠페인 더보기</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade pv-modal fullscreen" id="offer-modal" tabindex="-1" >
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
        	<div class="modal-header d-flex align-items-center border-0">
        		<button type="button" class="h-auto btn p-0 border-0 flex-shrink-0" data-bs-dismiss="modal" aria-label="Close">
        			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6.36026 12.3558C6.16203 12.16 6.16203 11.84 6.36026 11.6442L15.7743 2.34771C15.9693 2.15509 16.2831 2.15544 16.4777 2.34848L17.6421 3.50342C17.8393 3.699 17.8393 4.01781 17.6421 4.2134L10.1497 11.645C9.95253 11.8406 9.95253 12.1594 10.1497 12.355L17.6421 19.7866C17.8393 19.9822 17.8393 20.301 17.6421 20.4966L16.4777 21.6515C16.2831 21.8446 15.9693 21.8449 15.7743 21.6523L6.36026 12.3558Z" fill="#373739"/>
					</svg>
        		</button>
				<span class="fw-semibold fs-18 w-100 text-center">캠페인 신청</span>
				<div class="flex-shrink-0" style="width:24px"></div>
        	</div>
            <div class="modal-body p-3 d-flex flex-column row-gap-3">
            	<div>
                    <strong class="fs-18 d-block mb-1">브랜드가 잘 맞는 이유 & 나의 강점</strong>
                    <p class="fs-14 text-gray mb-0">제품을 어떻게 잘 보여줄 수 있는지, 내 콘텐츠 스타일의 특징을 중심으로 작성해주세요. (100자 이내)</p>   
                </div>
                <textarea class="form-control flex-grow-1 border-light fs-14 p-3 content" name="" placeholder="내용을 입력해주세요."></textarea>
                <div class="d-flex flex-column row-gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="check-term-1">
                      <label class="form-check-label fs-14" for="check-term-1">제품링크를 업로드하겠습니다.</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="check-term-2">
                      <label class="form-check-label fs-14" for="check-term-2">콘텐츠 2차 활용에 동의합니다.</label>
                    </div>
                    <p class="mb-0 fs-10 text-danger">2차 활용 및 링크 업로드를 미동의할 경우 진행 확률이 낮아질 수 있습니다. </p>
                </div>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-lg w-100 submit-btn-form" type="button" disabled>신청하기</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade pv-modal fullscreen" id="review-modal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center border-0">
                <button type="button" class="h-auto btn p-0 border-0 flex-shrink-0" data-bs-dismiss="modal" aria-label="Close">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.36026 12.3558C6.16203 12.16 6.16203 11.84 6.36026 11.6442L15.7743 2.34771C15.9693 2.15509 16.2831 2.15544 16.4777 2.34848L17.6421 3.50342C17.8393 3.699 17.8393 4.01781 17.6421 4.2134L10.1497 11.645C9.95253 11.8406 9.95253 12.1594 10.1497 12.355L17.6421 19.7866C17.8393 19.9822 17.8393 20.301 17.6421 20.4966L16.4777 21.6515C16.2831 21.8446 15.9693 21.8449 15.7743 21.6523L6.36026 12.3558Z" fill="#373739"/>
                    </svg>
                </button>
                <span class="fw-semibold fs-18 w-100 text-center">신청 정보 확인</span>
                <div class="flex-shrink-0" style="width:24px"></div>
            </div>
            <div class="modal-body p-3 d-flex flex-column row-gap-3">
                <div>
                    <strong class="fs-18 d-block mb-1">자기소개 및 강점</strong>
                    <p class="fs-14 text-gray mb-0">제품을 어떻게 잘 보여줄 수 있는지, 내 콘텐츠 스타일의 특징을 중심으로 작성해주세요. (100자 이내)</p>   
                </div>
                <textarea class="form-control flex-grow-1 border-light fs-14 p-3 content" name="" placeholder="내용을 입력해주세요.">브랜드에 강점을 설명에 적었던 내용들을 보여줍니다.브랜드에 강점을 설명에 적었던 내용들을 보여줍니다.브랜드에 강점을 설명에 적었던 내용들을 보여줍니다.브랜드에 강점을 설명에 적었던 내용들을 보여줍니다.브랜드에 강점을 설명에 적었던 내용들을 보여줍니다.브랜드에 강점을 설명에 적었던 내용들을 보여줍니다.브랜드에 강점을 설명에 적었던 내용들을 보여줍니다.브랜드에 강점을 설명에 적었던 내용들을 보여줍니다.브랜드에 강점을 설명에 적었던 내용들을 보여줍니다.브랜드에 강점을 설명에 적었던 내용들을 보여줍니다.   </textarea>
                <div class="d-flex flex-column row-gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="check-term-11">
                      <label class="form-check-label fs-14" for="check-term-11">제품링크를 업로드하겠습니다.</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="check-term-22">
                      <label class="form-check-label fs-14" for="check-term-22">콘텐츠 2차 활용에 동의합니다.</label>
                    </div>
                    <p class="mb-0 fs-10 text-danger">2차 활용 및 링크 업로드를 미동의할 경우 진행 확률이 낮아질 수 있습니다. </p>
                </div>
            </div>
            <div class="modal-footer">
                <div class="confirm-btns d-flex column-gap-2 flex-nowrap w-100" style="display:none">
                    <button class="btn btn-outline-danger btn-lg w-100 confirm-cancel-btn" type="button">신청 취소하기</button>
                    <button class="btn btn-outline-dark btn-lg w-100 confirm-save-btn" type="button">내용 수정하기</button>
                </div>
                <button class="btn btn-primary btn-lg w-100 save-btn" type="button" style="display:none">수정 저장하기</button>
            </div>
                
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($){
        $("textarea.content").on("input",function(){
            $(".submit-btn-form").prop("disabled",$(this).val().trim() == "");
        })
        $(".submit-btn-form").click(function(){
            $("#confirm-modal").modal("show")
        })
        $(".confirm-cancel-btn").click(function(){
            $("#cancel-modal").modal("show")
        })
        $(".confirm-btn").click(function(){
            $("#confirm-modal .confirm-box").hide();
            $("#confirm-modal .success-box").fadeIn(200).addClass("show");
        })

        $(".confirm-save-btn").click(function(){
            $(".confirm-btns").removeClass("d-flex");
            $(".save-btn").fadeIn(200);
        })

        $('#confirm-modal').on('hidden.bs.modal', function () {
            var $successBox = $('#confirm-modal .success-box');

            if ($successBox.length && $successBox.hasClass("show")) {
                $('.modal.show').not(this).each(function () {
                    $(this).modal('hide');
                });
                reset_offer();
            }
        });

        $(document).on('hidden.bs.modal', '#offer-modal', function () {
            reset_offer();
        })

        function reset_offer(){
            // Reset textarea content
            $("#offer-modal textarea.content").val("");
            
            // Uncheck all checkboxes
            $("#offer-modal .form-check-input").prop("checked", false);
            
            // Disable submit button
            $("#offer-modal .submit-btn-form").prop("disabled", true);
            
            // Reset confirm modal to initial state
            $("#confirm-modal .confirm-box").show();
            $("#confirm-modal .success-box").hide().removeClass("show");
        }

    })//end jquery
</script>