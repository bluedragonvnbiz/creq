<?php
get_template_part("template-parts/components/header","back",["title" => "캠페인 정보"]);
?>
<div class="container has-fixed-bottom">
	<div class="campaign-card py-3 shadow-none rounded-0">
	    <div class="d-flex column-gap-2 align-items-center justify-content-between mb-3">
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
	    <a class="campaign-card__body d-flex column-gap-2 text-black mb-3" href="?id">
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
	    <div class="d-table fs-12 mb-1" style="border-spacing: 8px 4px;margin-left: -4px;margin-right: -4px;">
	    	<div class="d-table-row">
	    		<span class="fw-semibold d-table-cell">모집 기간 </span>
		    	<span class="d-table-cell">2025.01.01 ~ 2025.12.01</span>
	    	</div>
	    	<div class="d-table-row">
	    		<span class="fw-semibold d-table-cell">업로드 기간</span>
		    	<span class="d-table-cell">2025.01.01 ~ 2025.12.01</span>
	    	</div>
	    </div>
	    <p class="mb-0 text-primary fs-12">모집기간 종료 후 선정이 진행됩니다.</p>
	</div>
	<div class="py-2">
		<ul class="nav nav-tabs pv-tabs flex-nowrap" role="tablist">
		  <li class="nav-item" role="presentation">
		    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#campain-tab-1" type="button" role="tab" aria-selected="true">제품 안내</button>
		  </li>
		  <li class="nav-item" role="presentation">
		    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#campain-tab-2" type="button" role="tab" aria-selected="false" tabindex="-1">콘텐츠 안내</button>
		  </li>
		</ul>
	</div>
	<div class="tab-content campain">
	  	<div class="py-3 tab-pane fade show active fs-12" id="campain-tab-1">
	  		<div class="d-flex flex-column row-gap-3">
	  			<div>
		  			<strong class="d-block fs-14 mb-2">제품명</strong>
		  			<div class="bg-gray rounded-3 p-12">
		  				초코칩 아이스크림 쿠키 샌드위치 
		  			</div>
		  		</div>
		  		<div>
		  			<strong class="d-block fs-14 mb-2">제품 판매 링크</strong>
		  			<div class="bg-gray rounded-3 p-12">
		  				<p class="mb-0 text-primary text-decoration-underline">https://www.cookiehouse.com/product/icecream-cookie-sandwich</p>
		  			</div>
		  		</div>
		  		<div>
		  			<strong class="d-block fs-14 mb-2">제품 설명</strong>
		  			<div class="bg-gray rounded-3 p-12">
		  				부드러운 바닐라 아이스크림을 두 장의 초코칩 쿠키로 감싼 달콤한 쿠키 샌드위치입니다.
		  			</div>
		  		</div>
	  		</div>  		
	  	</div><!--campain-tab-1-->
	  	<div class="tab-pane fade fs-12 py-3" id="campain-tab-2">
	  		<div class="d-flex flex-column row-gap-3">
	  			<div>
		  			<strong class="d-block fs-14 mb-2">콘텐츠 정보</strong>
		  			<div class="bg-gray rounded-3 p-12">
		  				<ul class="list-unstyled mb-0 list-info list-between row-gap-2">
		  					<li>
		  						<span>콘텐츠 유형</span>
		  						<strong>인스타그램 / 숏폼</strong>
		  					</li>
		  					<li>
		  						<span>콘텐츠 검수여부</span>
		  						<strong>진행</strong>
		  					</li>
		  					<li>
		  						<span>프로필 제품링크 업로드</span>
		  						<strong>필수</strong>
		  					</li>
		  					<li>
		  						<span>콘텐츠 2차 활용여부</span>
		  						<strong>필수</strong>
		  					</li>
		  				</ul>
		  			</div>
		  		</div>
		  		<div>
		  			<strong class="d-block fs-14 mb-2">콘텐츠 가이드</strong>
		  			<div class="bg-gray rounded-3 p-12">
		  				브랜드가 작성한 콘텐츠 가이드가 보이는 곳입니다.<br>
						콘텐츠에서 강조했으면 하는 점은~~~~<br>
						가이드 내용이 작성되어 있어요. 가이드 내용이 작성되어 있어요. 가이드 내용이 작성되어 있어요. 가이드 내용이 작성되어 있어요. <br>
						가이드1<br>
						가이드2<br>
						가이드3<br>
						가이드4
		  			</div>
		  		</div>
		  		<div>
		  			<strong class="d-block fs-14 mb-2">권장 및 안내사항</strong>
		  			<div class="bg-gray rounded-3 p-12">
		  				브랜드가 작성한 콘텐츠 가이드가 보이는 곳입니다.<br>
						콘텐츠에서 강조했으면 하는 점은~~~~<br>
						가이드 내용이 작성되어 있어요. 가이드 내용이 작성되어 있어요. 가이드 내용이 작성되어 있어요. 가이드 내용이 작성되어 있어요. <br>
						가이드1<br>
						가이드2<br>
						가이드3<br>
						가이드4
		  			</div>
		  		</div>
		  		<div>
		  			<strong class="d-block fs-14 mb-2">컨텐츠 가이드 파일</strong>
		  			<div class="bg-gray rounded-3 p-12">
		  				xxxxxxx.pdf
		  			</div>
		  		</div>
		  		<div>
		  			<strong class="d-block fs-14 mb-2">필수 해시태그</strong>
		  			<div class="bg-gray rounded-3 p-12 d-flex align-items-center gap-2 flex-wrap">
		  				<span>#해시태그</span>
						<span>#해시태그</span>
						<span>#해시태그</span>
						<span>#해시태그</span>
		  			</div>
		  		</div>
	  		</div>
	  	</div><!--campain-tab-2-->
	</div>
</div>
<div class="fixed-bottom px-3 py-2 d-flex shadow column-gap-2 bg-white">
	<button class="btn btn-outline-secondary btn-lg w-100" type="button" disabled>보류하기</button>
    <button class="btn btn-outline-primary btn-lg w-100" type="button" data-bs-toggle="modal" data-bs-target="#offer-modal">신청하기</button>
</div>
<?php
get_template_part("template-parts/modals/campain");