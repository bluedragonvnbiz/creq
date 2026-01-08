<div class="campaign-card d-flex flex-column gap-12 p-3">
    <div class="d-flex column-gap-2 align-items-center justify-content-between">
        <div class="d-flex column-gap-2 align-items-center">
            <span class="campaign-tag campaign-tag--instagram">
                <img src="<?= IMAGES_URL; ?>/icons/instagram.svg" alt="">
                <span>인스타그램</span>
            </span>
            <span class="campaign-tag">
                카테고리
            </span>
            <span class="campaign-tag disabled">
                모집완료
            </span>
            <span class="campaign-tag campaign-tag--code">
                D-93
            </span>
        </div>

        <button class="campaign-card__share btn p-0 border-0 ms-auto h-auto" type="button">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M7.15833 11.2582L12.85 14.5748M12.8417 5.42484L7.15833 8.7415M17.5 4.1665C17.5 5.54722 16.3807 6.6665 15 6.6665C13.6193 6.6665 12.5 5.54722 12.5 4.1665C12.5 2.78579 13.6193 1.6665 15 1.6665C16.3807 1.6665 17.5 2.78579 17.5 4.1665ZM7.5 9.99984C7.5 11.3805 6.38071 12.4998 5 12.4998C3.61929 12.4998 2.5 11.3805 2.5 9.99984C2.5 8.61913 3.61929 7.49984 5 7.49984C6.38071 7.49984 7.5 8.61913 7.5 9.99984ZM17.5 15.8332C17.5 17.2139 16.3807 18.3332 15 18.3332C13.6193 18.3332 12.5 17.2139 12.5 15.8332C12.5 14.4525 13.6193 13.3332 15 13.3332C16.3807 13.3332 17.5 14.4525 17.5 15.8332Z" stroke="#373739" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
        </button>
    </div>
    <a class="campaign-card__body d-flex column-gap-2 text-black" href="?id">
        <div class="campaign-card__thumbnail flex-shrink-0">
            <img class="object-fit-cover rounded-3" src="<?= IMAGES_URL; ?>/demo/demo-1.jpg" alt="">
        </div>

        <div class="campaign-card__content">
            <h3 class="fs-14 fw-semibold mb-1">
                [삼미푸드] 초코칩 아이스크림 쿠키 샌드위치
            </h3>
            <p class="mb-0 fs-12">
                캠페인 개요에 대한 내용입니다. 50자 이내만 입력할 수 있습니다.
            </p>            
        </div>
    </a>
    <p class="campaign-card__date fs-12 d-flex align-items-center column-gap-2 mb-0">
	    <span class="fw-semibold">업로드 기간</span>
	    <span>2025.01.01 ~ 2025.12.01</span>
	</p>
    <div class="campaign-card__footer d-flex column-gap-2">   
        <?php  
        if(isset($args["type"])){ ?>
            <button class="btn btn-outline-light w-100 rounded-3" type="button" data-bs-toggle="modal" data-bs-target="#review-modal">보류하기</button>
        <?php
        }else{ ?>
            <button class="btn btn-outline-light w-100 rounded-3" type="button" data-bs-toggle="modal" data-bs-target="#remove-modal">보류하기</button>
            <button class="btn btn-outline-primary w-100 rounded-3" type="button" data-bs-toggle="modal" data-bs-target="#offer-modal">신청하기</button>
        <?php
        }
        ?>	    	
    </div>
</div>
