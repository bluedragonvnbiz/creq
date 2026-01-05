<link rel="stylesheet" href="<?php echo LIBS_URL ?>/swiper/swiper-bundle.min.css"/>
<style>.camp-nav{margin-bottom: 0}</style>
<div class="admin-section p-10 d-flex gap-10 align-items-center admin-filter-btn">
	<?php  
	$type_arr = [
		["전체",7],["제품 발송 필요",1],["배송 중",0],["콘텐츠 제작 중",0],["콘텐츠 검수 요청",0],["콘텐츠 수정중",0],
		["콘텐츠 업로드 대기",1],["콘텐츠 업로드 완료  ",1],["최종 승인",1]
	];
	foreach ($type_arr as $key => $value) { 
		$isActive = $key == 0 ? " active" : "";
	?>
		<button class="btn btn-outline-light<?= $isActive ?>" type="button">
			<span><?= $value[0] ?></span>
			<span class="<?= $value[1] > 0 ? "text-primary" : "text-line-gray" ?>"><?= $value[1] ?></span>
		</button>
	<?php
	}
	?>
</div>
<div class="admin-section mb-12 table-responsive">
	<table class="table align-middle custom-table">
	  <thead>
	    <tr>
		    <th>인플루언서</th>
			<th>진행단계</th>
			<th>진행 단계 마감일</th>
			<th>배송정보 (수취인/연th락처/주소)</th>
			<th>배송정보 (택배사/운송장)</th>
			<th>제품 수령 완료일</th>
			<th>콘텐츠 업로드 예정일</th>
			<th>업로드 링크 확인</th>
			<th class="text-center">계약서</th>
			<th class="text-center">진행 취소</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php  
	    for ($i=0; $i < 2; $i++) { ?>
	    <tr>
	      <td>
	      	<div class="user d-flex align-items-center gap-15 featured">
	      		<div class="d-flex gap-10 align-items-center">
	      			<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	      				<path d="M9.939 2.24574C9.97552 2.17196 10.0319 2.10986 10.1019 2.06643C10.1718 2.02301 10.2525 2 10.3348 2C10.4172 2 10.4978 2.02301 10.5678 2.06643C10.6377 2.10986 10.6941 2.17196 10.7307 2.24574L12.6557 6.14491C12.7825 6.40155 12.9697 6.62359 13.2012 6.79196C13.4327 6.96033 13.7016 7.07001 13.9848 7.11158L18.2898 7.74158C18.3714 7.7534 18.448 7.7878 18.5111 7.84091C18.5741 7.89402 18.621 7.9637 18.6465 8.04208C18.672 8.12047 18.6751 8.20442 18.6553 8.28444C18.6356 8.36447 18.5938 8.43737 18.5348 8.49491L15.4215 11.5266C15.2162 11.7267 15.0626 11.9736 14.9739 12.2463C14.8852 12.5189 14.8641 12.809 14.9123 13.0916L15.6473 17.3749C15.6617 17.4564 15.6529 17.5404 15.6219 17.6171C15.5909 17.6939 15.5389 17.7604 15.472 17.8091C15.405 17.8577 15.3256 17.8866 15.2431 17.8923C15.1605 17.8981 15.0779 17.8805 15.0048 17.8416L11.1565 15.8182C10.9029 15.6851 10.6208 15.6155 10.3344 15.6155C10.048 15.6155 9.7659 15.6851 9.51233 15.8182L5.66483 17.8416C5.59178 17.8803 5.50933 17.8977 5.42688 17.8918C5.34442 17.8859 5.26527 17.857 5.19841 17.8084C5.13156 17.7598 5.07969 17.6934 5.04871 17.6168C5.01773 17.5401 5.00888 17.4563 5.02317 17.3749L5.75733 13.0924C5.80583 12.8097 5.78482 12.5194 5.69611 12.2466C5.60741 11.9738 5.45367 11.7267 5.24817 11.5266L2.13483 8.49575C2.07533 8.43827 2.03316 8.36524 2.01314 8.28497C1.99311 8.20471 1.99603 8.12043 2.02157 8.04174C2.0471 7.96305 2.09422 7.89311 2.15756 7.8399C2.22091 7.78668 2.29792 7.75233 2.37983 7.74074L6.684 7.11158C6.96755 7.07033 7.23682 6.96079 7.46865 6.7924C7.70048 6.62401 7.88792 6.4018 8.01483 6.14491L9.939 2.24574Z" stroke="#69696B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	      			</svg>
	      			<img class="object-fit-cover rounded-circle" src="<?= IMAGES_URL ?>/demo/user-01.jpg" alt="" style="width:36px;height: 36px;">
	      		</div>
	      		<div class="d-flex flex-column">
	      			<div class="d-flex align-items-center gap-05">
	      				<svg width="15" height="15"><use href="#icon-blue-star"></use></svg>
	      				<span class="fw-semibold">leomessi</span>
	      			</div>
	      			<div class="d-flex align-items-center gap-05">
	      				<img class="object-fit-cover rounded-circle" src="<?= IMAGES_URL ?>/icons/instagram.svg" alt="" style="width:15px;height: 15px;">
	      				<span>Leo messi</span>
	      			</div>
	      		</div>
					</div>
	      </td>
	      <td>콘텐츠 검수 요청</td>
	      <td>2025.10.29</td>
	      <td>
	      	김라라 <br>
					010-1234-5678<br>
					서울특별시 강남구 언주로 81길 6, 301호
	      </td>
	      <td>
	      	CJ대한통운<br>
					1234-5678-9012 <button class="btn p-0 border-0 open-seeding-detail-btn"><svg width="20" height="20"><use href="#icon-edit"></use></svg></button>
	      </td>
	      <td>미수령</td>
	      <td>2025.10.29</td>
	      <td>
	      	<button class="btn btn-primary light opacity-40 d-flex align-items-center gap-05" type="button">
	      		<svg width="20" height="20"><use href="#icon-more"></use></svg>
	      		<span>업로드 확인</span>
	      	</button>
	      </td>
	      <td class="text-center"><svg width="18" height="22"><use href="#icon-paper"></use></svg></td>
	      <td class="text-center"><button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#confirm-modal">취소</button></td>
	    </tr>
	    <tr class="seeding-detail d-none">
	    	<td colspan="10">
	    		<div class="seeding-detail-content" style="display: none;">
		    		<div class="d-flex justify-content-between align-items-center mb-3">
		    			<div class="d-flex flex-column">
		    				<span class="fs-14 fw-semibold">콘텐츠 내용</span>
		    				<span class="fs-12 text-gray">작성일 2025.10.25  16:31</span>
		    			</div>
		    			<div class="d-flex align-items-center gap-15">
		    				<span class="text-primary fs-14">콘텐츠 수정 중 (수정 전까지 이전에 작성한 내용으로 표시됩니다.)</span>
		    				<button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#edit-modal">수정 요청</button>
		    				<button class="btn btn-dark" type="button">승인</button>
		    			</div>
		    		</div>
		    		<div class="d-flex gap-15">
		    			<div class="gallery flex-shrink-0 swiper" style="cursor: pointer;">	    				
		    				<div class="swiper-wrapper">
		    					<div class="swiper-slide">
		    						<img class="object-fit-cover" src="<?= IMAGES_URL ?>/demo/product-1.png" alt="">
		    					</div>
		    					<div class="swiper-slide">
		    						<img class="object-fit-cover" src="<?= IMAGES_URL ?>/demo/product-2.png" alt="">
		    					</div>
		    					<div class="swiper-slide">
		    						<img class="object-fit-cover" src="<?= IMAGES_URL ?>/demo/product-3.png" alt="">
		    					</div>						    
		    				</div>
		    				<div class="swiper-pagination"></div>
		    				<div class="swiper-button-prev"></div>
		    				<div class="swiper-button-next"></div>						
							</div>
		    			<div class="w-100">
		    				<div class="mb-3">
			    				온라인으로 스페셜 크리에이터 밋업까지 참여완료오✌🏻 오프라인 밋업에 함께하지 못해 조금 아쉬웠지만, 온라인으로라도 프로그램 전반을 알 수 있어서 뜻깊은 시간이었어요😌 앞으로 어떤 활동들이 이어질지 더 궁금해지고, 기대도 한가득이에요🍸 집이라는 공간 속에서 새로운 영감을 나누고, 즐겁게 기록해나갈 이번 시즌 활동. 설레는 마음으로 시작해봅니다✌🏻(feat. 숨은마늘찾기🐈🔍)
			    			</div>
			    			<div class="d-flex align-items-center gap-10 fs-14 fw-semibold text-primary">
			    				<span>#오늘의집</span>
			    				<span>#스페셜크리에이터</span>
			    				<span>#스페셜오프닝밋업</span>
			    			</div>
		    			</div>
		    		</div>
	    		</div>
	    	</td>
	    </tr>
	  	<?php } ?>
	    <?php  
	    for ($i=0; $i < 9; $i++) { ?>
	    	<tr>
		      <td>
		      	<div class="user d-flex align-items-center gap-15">
		      		<div class="d-flex gap-10 align-items-center">
		      			<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
		      				<path d="M9.939 2.24574C9.97552 2.17196 10.0319 2.10986 10.1019 2.06643C10.1718 2.02301 10.2525 2 10.3348 2C10.4172 2 10.4978 2.02301 10.5678 2.06643C10.6377 2.10986 10.6941 2.17196 10.7307 2.24574L12.6557 6.14491C12.7825 6.40155 12.9697 6.62359 13.2012 6.79196C13.4327 6.96033 13.7016 7.07001 13.9848 7.11158L18.2898 7.74158C18.3714 7.7534 18.448 7.7878 18.5111 7.84091C18.5741 7.89402 18.621 7.9637 18.6465 8.04208C18.672 8.12047 18.6751 8.20442 18.6553 8.28444C18.6356 8.36447 18.5938 8.43737 18.5348 8.49491L15.4215 11.5266C15.2162 11.7267 15.0626 11.9736 14.9739 12.2463C14.8852 12.5189 14.8641 12.809 14.9123 13.0916L15.6473 17.3749C15.6617 17.4564 15.6529 17.5404 15.6219 17.6171C15.5909 17.6939 15.5389 17.7604 15.472 17.8091C15.405 17.8577 15.3256 17.8866 15.2431 17.8923C15.1605 17.8981 15.0779 17.8805 15.0048 17.8416L11.1565 15.8182C10.9029 15.6851 10.6208 15.6155 10.3344 15.6155C10.048 15.6155 9.7659 15.6851 9.51233 15.8182L5.66483 17.8416C5.59178 17.8803 5.50933 17.8977 5.42688 17.8918C5.34442 17.8859 5.26527 17.857 5.19841 17.8084C5.13156 17.7598 5.07969 17.6934 5.04871 17.6168C5.01773 17.5401 5.00888 17.4563 5.02317 17.3749L5.75733 13.0924C5.80583 12.8097 5.78482 12.5194 5.69611 12.2466C5.60741 11.9738 5.45367 11.7267 5.24817 11.5266L2.13483 8.49575C2.07533 8.43827 2.03316 8.36524 2.01314 8.28497C1.99311 8.20471 1.99603 8.12043 2.02157 8.04174C2.0471 7.96305 2.09422 7.89311 2.15756 7.8399C2.22091 7.78668 2.29792 7.75233 2.37983 7.74074L6.684 7.11158C6.96755 7.07033 7.23682 6.96079 7.46865 6.7924C7.70048 6.62401 7.88792 6.4018 8.01483 6.14491L9.939 2.24574Z" stroke="#69696B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		      			</svg>
		      			<img class="object-fit-cover rounded-circle" src="<?= IMAGES_URL ?>/demo/user-01.jpg" alt="" style="width:36px;height: 36px;">
		      		</div>
		      		<div class="d-flex flex-column">
		      			<div class="d-flex align-items-center gap-05">
		      				<svg width="15" height="15"><use href="#icon-blue-star"></use></svg>
		      				<span class="fw-semibold">leomessi</span>
		      			</div>
		      			<div class="d-flex align-items-center gap-05">
		      				<img class="object-fit-cover rounded-circle" src="<?= IMAGES_URL ?>/icons/instagram.svg" alt="" style="width:15px;height: 15px;">
		      				<span>Leo messi</span>
		      			</div>
		      		</div>
				</div>
		      </td>
		      <td>제품 발송 필요</td>
		      <td>@2025.10.29</td>
		      <td>
		      	김라라 <br>
				010-1234-5678<br>
				서울특별시 강남구 언주로 81길 6, 301호
		      </td>
		      <td>
		      	<span class="badge text-bg-dark badge-md">입력</span>
		      </td>
		      <td>미수령</td>
		      <td>-</td>
		      <td>
		      	<button class="btn btn-primary light opacity-40 d-flex align-items-center gap-05" type="button">
		      		<svg width="20" height="20"><use href="#icon-more"></use></svg>
		      		<span>업로드 확인</span>
		      	</button>
		      </td>
		      <td class="text-center"><svg width="18" height="22"><use href="#icon-paper-gray"></use></svg></td>
		      <td class="text-center"><button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#confirm-modal">취소</button></td>
		    </tr>
	   	<?php
	    }
	    ?>
	  </tbody>
	</table>
</div>

<div class="modal fade admin-modal" id="confirm-modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<div class="modal-body text-center">
    		<strong class="fw-semibold fs-18 mb-3 d-block">정말 해당 페이지를 저장하지 않고 나가시겠어요?</strong>
    		<p class="mb-0 text-gray fs-13">미저장 시, 수정 내용이 저장되지 않습니다. </p>
    	</div>
    	<div class="modal-footer">
    		<button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">취소</button>
    		<button type="button" class="btn btn-primary">확인</button>
    	</div>
    </div>
  </div>
</div>

<div class="modal fade admin-modal" id="edit-modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
    	<div class="modal-body text-center">
    		<strong class="fw-semibold fs-18 mb-3 d-block">수정 요청 사항 작성</strong>
    		<p class="mb-3 text-gray fs-13">수정은 1회만 가능하오니, 요청하실 수정 사항을 정확하게 작성 부탁드립니다.</p>
    		<textarea class="form-control" placeholder="수정요청사항을 입력해주세요." style="min-height:180px;resize: none;"></textarea>
    	</div>
    	<div class="modal-footer">
    		<button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">취소</button>
    		<button type="button" class="btn btn-primary" disabled>확인</button>
    	</div>
    </div>
  </div>
</div>

<div class="modal fade admin-modal" id="gallery-modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
    	<div class="modal-body">
    		<button type="button" class="btn p-0 border-0 position-absolute" data-bs-dismiss="modal" aria-label="Close" style="right:15px;top: 15px;z-index: 20;">
    			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_110_60704)">
					<path d="M13.4099 12.0002L17.7099 7.71019C17.8982 7.52188 18.004 7.26649 18.004 7.00019C18.004 6.73388 17.8982 6.47849 17.7099 6.29019C17.5216 6.10188 17.2662 5.99609 16.9999 5.99609C16.7336 5.99609 16.4782 6.10188 16.2899 6.29019L11.9999 10.5902L7.70994 6.29019C7.52164 6.10188 7.26624 5.99609 6.99994 5.99609C6.73364 5.99609 6.47824 6.10188 6.28994 6.29019C6.10164 6.47849 5.99585 6.73388 5.99585 7.00019C5.99585 7.26649 6.10164 7.52188 6.28994 7.71019L10.5899 12.0002L6.28994 16.2902C6.19621 16.3831 6.12182 16.4937 6.07105 16.6156C6.02028 16.7375 5.99414 16.8682 5.99414 17.0002C5.99414 17.1322 6.02028 17.2629 6.07105 17.3848C6.12182 17.5066 6.19621 17.6172 6.28994 17.7102C6.3829 17.8039 6.4935 17.8783 6.61536 17.9291C6.73722 17.9798 6.86793 18.006 6.99994 18.006C7.13195 18.006 7.26266 17.9798 7.38452 17.9291C7.50638 17.8783 7.61698 17.8039 7.70994 17.7102L11.9999 13.4102L16.2899 17.7102C16.3829 17.8039 16.4935 17.8783 16.6154 17.9291C16.7372 17.9798 16.8679 18.006 16.9999 18.006C17.132 18.006 17.2627 17.9798 17.3845 17.9291C17.5064 17.8783 17.617 17.8039 17.7099 17.7102C17.8037 17.6172 17.8781 17.5066 17.9288 17.3848C17.9796 17.2629 18.0057 17.1322 18.0057 17.0002C18.0057 16.8682 17.9796 16.7375 17.9288 16.6156C17.8781 16.4937 17.8037 16.3831 17.7099 16.2902L13.4099 12.0002Z" fill="#69696B"/>
					</g>
					<defs>
					<clipPath id="clip0_110_60704">
					<rect width="24" height="24" fill="white"/>
					</clipPath>
					</defs>
					</svg>
    		</button>
    		<div class="swiper-pagination position-relative fs-18 fw-semibold top-0"></div>
    		<div class="swiper gallery-main mb-3">
    			<div class="swiper-wrapper"></div>
    			<div class="swiper-button-prev"></div>
    			<div class="swiper-button-next"></div>
    		</div>
    		<div class="swiper gallery-thumbs">
    			<div class="swiper-wrapper"></div>
    		</div>
    	</div>
    </div>
  </div>
</div>

<div class="d-none">
	<svg id="icon-blue-star" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M9.01515 1.28734L8.85648 1.06512C8.19173 0.134544 6.80873 0.134544 6.14398 1.06512L5.98532 1.28734C5.63433 1.77867 5.0451 2.04177 4.44501 1.97509L3.73749 1.89648C2.67597 1.77853 1.77902 2.67548 1.89697 3.737L1.97557 4.44452C2.04226 5.04461 1.77916 5.63384 1.28783 5.98483L1.06561 6.14349C0.135032 6.80824 0.135032 8.19124 1.06561 8.85599L1.28783 9.01466C1.77916 9.36566 2.04226 9.95491 1.97557 10.555L1.89697 11.2625C1.77902 12.324 2.67597 13.221 3.73749 13.103L4.44501 13.0244C5.0451 12.9577 5.63433 13.2208 5.98532 13.7122L6.14398 13.9343C6.80873 14.8649 8.19173 14.8649 8.85648 13.9343L9.01515 13.7122C9.36615 13.2208 9.9554 12.9577 10.5555 13.0244L11.263 13.103C12.3245 13.221 13.2215 12.324 13.1035 11.2625L13.0249 10.555C12.9582 9.95491 13.2213 9.36566 13.7127 9.01466L13.9348 8.85599C14.8654 8.19124 14.8654 6.80824 13.9348 6.14349L13.7127 5.98483C13.2213 5.63384 12.9582 5.04461 13.0249 4.44452L13.1035 3.737C13.2215 2.67548 12.3245 1.77853 11.263 1.89648L10.5555 1.97509C9.9554 2.04177 9.36615 1.77867 9.01515 1.28734Z" fill="#3B6FFF"/>
	<path d="M5 7.66667L6.51575 9.18242C6.59908 9.26575 6.73425 9.26575 6.81758 9.18242L10 6" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>
	<svg id="icon-paper" width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M10.75 0.750003H2.75C2.21957 0.750003 1.71086 0.960717 1.33579 1.33579C0.960714 1.71086 0.75 2.21957 0.75 2.75V18.75C0.75 19.2804 0.960714 19.7891 1.33579 20.1642C1.71086 20.5393 2.21957 20.75 2.75 20.75H14.75C15.2804 20.75 15.7891 20.5393 16.1642 20.1642C16.5393 19.7891 16.75 19.2804 16.75 18.75V6.75M10.75 0.750003C11.0666 0.74949 11.3801 0.811605 11.6725 0.932772C11.965 1.05394 12.2306 1.23176 12.454 1.456L16.042 5.044C16.2668 5.26751 16.4452 5.53335 16.5667 5.82616C16.6882 6.11898 16.7505 6.43297 16.75 6.75M10.75 0.750003V5.75C10.75 6.01522 10.8554 6.26957 11.0429 6.45711C11.2304 6.64464 11.4848 6.75 11.75 6.75L16.75 6.75M6.75 7.75H4.75M12.75 11.75H4.75M12.75 15.75H4.75" stroke="#373739" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>
	<svg id="icon-paper-gray" width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M10.75 0.750003H2.75C2.21957 0.750003 1.71086 0.960717 1.33579 1.33579C0.960714 1.71086 0.75 2.21957 0.75 2.75V18.75C0.75 19.2804 0.960714 19.7891 1.33579 20.1642C1.71086 20.5393 2.21957 20.75 2.75 20.75H14.75C15.2804 20.75 15.7891 20.5393 16.1642 20.1642C16.5393 19.7891 16.75 19.2804 16.75 18.75V6.75M10.75 0.750003C11.0666 0.74949 11.3801 0.811605 11.6725 0.932772C11.965 1.05394 12.2306 1.23176 12.454 1.456L16.042 5.044C16.2668 5.26751 16.4452 5.53335 16.5667 5.82616C16.6882 6.11898 16.7505 6.43297 16.75 6.75M10.75 0.750003V5.75C10.75 6.01522 10.8554 6.26957 11.0429 6.45711C11.2304 6.64464 11.4848 6.75 11.75 6.75L16.75 6.75M6.75 7.75H4.75M12.75 11.75H4.75M12.75 15.75H4.75" stroke="#D5D5D7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>

	<svg id="icon-more" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M16.6667 9.16667C16.4457 9.16667 16.2337 9.25446 16.0774 9.41074C15.9211 9.56702 15.8333 9.77899 15.8333 10V15C15.8333 15.221 15.7455 15.433 15.5893 15.5893C15.433 15.7455 15.221 15.8333 15 15.8333H5C4.77899 15.8333 4.56702 15.7455 4.41074 15.5893C4.25446 15.433 4.16667 15.221 4.16667 15V5C4.16667 4.77899 4.25446 4.56702 4.41074 4.41074C4.56702 4.25446 4.77899 4.16667 5 4.16667H10C10.221 4.16667 10.433 4.07887 10.5893 3.92259C10.7455 3.76631 10.8333 3.55435 10.8333 3.33333C10.8333 3.11232 10.7455 2.90036 10.5893 2.74408C10.433 2.5878 10.221 2.5 10 2.5H5C4.33696 2.5 3.70107 2.76339 3.23223 3.23223C2.76339 3.70107 2.5 4.33696 2.5 5V15C2.5 15.663 2.76339 16.2989 3.23223 16.7678C3.70107 17.2366 4.33696 17.5 5 17.5H15C15.663 17.5 16.2989 17.2366 16.7678 16.7678C17.2366 16.2989 17.5 15.663 17.5 15V10C17.5 9.77899 17.4122 9.56702 17.2559 9.41074C17.0996 9.25446 16.8877 9.16667 16.6667 9.16667Z" fill="#705CFF"/>
	<path d="M13.3336 4.16667H14.6503L9.40861 9.4C9.3305 9.47747 9.26851 9.56964 9.2262 9.67119C9.18389 9.77274 9.16211 9.88166 9.16211 9.99167C9.16211 10.1017 9.18389 10.2106 9.2262 10.3121C9.26851 10.4137 9.3305 10.5059 9.40861 10.5833C9.48608 10.6614 9.57824 10.7234 9.67979 10.7657C9.78134 10.8081 9.89026 10.8298 10.0003 10.8298C10.1103 10.8298 10.2192 10.8081 10.3208 10.7657C10.4223 10.7234 10.5145 10.6614 10.5919 10.5833L15.8336 5.35V6.66667C15.8336 6.88768 15.9214 7.09964 16.0777 7.25592C16.234 7.4122 16.4459 7.5 16.6669 7.5C16.888 7.5 17.0999 7.4122 17.2562 7.25592C17.4125 7.09964 17.5003 6.88768 17.5003 6.66667V3.33333C17.5003 3.11232 17.4125 2.90036 17.2562 2.74408C17.0999 2.5878 16.888 2.5 16.6669 2.5H13.3336C13.1126 2.5 12.9006 2.5878 12.7444 2.74408C12.5881 2.90036 12.5003 3.11232 12.5003 3.33333C12.5003 3.55435 12.5881 3.76631 12.7444 3.92259C12.9006 4.07887 13.1126 4.16667 13.3336 4.16667Z" fill="#705CFF"/>
	</svg>

	<svg id="icon-edit" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	<rect x="0.5" y="0.5" width="19" height="19" rx="3.5" fill="#F8F8FA"/>
	<rect x="0.5" y="0.5" width="19" height="19" rx="3.5" stroke="#DFE5EF"/>
	<g clip-path="url(#clip0_145_24843)">
	<path d="M16.1669 6.11704L13.8836 3.8337C13.5856 3.55378 13.1951 3.39317 12.7864 3.38241C12.3776 3.37166 11.9792 3.51151 11.6669 3.77537L4.16691 11.2754C3.89755 11.547 3.72983 11.903 3.69191 12.2837L3.33358 15.7587C3.32235 15.8808 3.33819 16.0038 3.37996 16.119C3.42174 16.2343 3.48842 16.3389 3.57525 16.4254C3.65311 16.5026 3.74546 16.5637 3.84699 16.6052C3.94852 16.6467 4.05724 16.6677 4.16691 16.667H4.24191L7.71691 16.3504C8.09758 16.3125 8.45361 16.1447 8.72525 15.8754L16.2252 8.37537C16.5163 8.06784 16.6737 7.65746 16.6627 7.23415C16.6518 6.81084 16.4735 6.40913 16.1669 6.11704ZM7.56691 14.6837L5.06691 14.917L5.29191 12.417L10.0002 7.76704L12.2502 10.017L7.56691 14.6837ZM13.3336 8.90037L11.1002 6.66704L12.7252 5.00037L15.0002 7.27537L13.3336 8.90037Z" fill="#373739"/>
	</g>
	<defs>
	<clipPath id="clip0_145_24843">
	<rect width="20" height="20" fill="white"/>
	</clipPath>
	</defs>
	</svg>

</div>

<script src="<?php echo LIBS_URL ?>/swiper/swiper-bundle.min.js"></script>
<script>
jQuery(document).ready(function($){
  // Initialize each gallery swiper individually
  $('.gallery.swiper').each(function(index) {
    var $this = $(this);
    
    // Add unique classes to navigation elements
    $this.find('.swiper-pagination').addClass('pagination-' + index);
    $this.find('.swiper-button-prev').addClass('prev-' + index);
    $this.find('.swiper-button-next').addClass('next-' + index);
    
    // Initialize swiper for this gallery
    new Swiper($this[0], {
      pagination: {
        el: '.pagination-' + index,
        type: "fraction",
      },
      navigation: {
        nextEl: '.next-' + index,
        prevEl: '.prev-' + index,
      },
    });
  });

  let galleryThumbs, galleryMain;

  // Click handler for open seeding detail button
  $(document).on('click', '.open-seeding-detail-btn', function(e) {
    e.preventDefault();
    let $parentTr = $(this).closest('tr');
    let $detailContent = $parentTr.next('tr.seeding-detail').find('.seeding-detail-content');
    
    if ($detailContent.length) {
    	let detailContentPar = $parentTr.next('tr.seeding-detail');
    	if(detailContentPar.hasClass("d-none")){
    		detailContentPar.removeClass("d-none");
    	}else{
    		setTimeout(function() {
				  detailContentPar.addClass("d-none");
				}, 200);   		
    	}
    	
      $detailContent.slideToggle(200);
    }
  });

  // Click handler for gallery
  $(document).on('click', '.gallery', function(e) {
    // Prevent triggering when clicking on navigation buttons
    if ($(e.target).closest('.swiper-button-prev, .swiper-button-next, .swiper-pagination').length) {
      return;
    }
    
    var $gallery = $(this);
    var images = [];
    
    // Get all images from the clicked gallery
    $gallery.find('.swiper-slide img').each(function() {
      images.push($(this).attr('src'));
    });
    
    // Clear previous content
    $('#gallery-modal .gallery-main .swiper-wrapper').empty();
    $('#gallery-modal .gallery-thumbs .swiper-wrapper').empty();
    
    // Populate main slider
    images.forEach(function(src) {
      $('#gallery-modal .gallery-main .swiper-wrapper').append(
        '<div class="swiper-slide">' +
          '<img class="object-fit-cover" src="' + src + '">' +
        '</div>'
      );
    });
    
    // Populate thumbnails
    images.forEach(function(src) {
      $('#gallery-modal .gallery-thumbs .swiper-wrapper').append(
        '<div class="swiper-slide" style="cursor: pointer;">' +
          '<img class="object-fit-cover" src="' + src + '">' +
        '</div>'
      );
    });
    
    // Show modal
    $('#gallery-modal').modal('show');
  });

  // Initialize swipers when modal is shown
  $('#gallery-modal').on('shown.bs.modal', function() {
    // Destroy existing instances if any
    if (galleryThumbs) galleryThumbs.destroy();
    if (galleryMain) galleryMain.destroy();
    
    // Initialize thumbnail swiper
    galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: "auto",
      freeMode: true,
      watchSlidesProgress: true,
    });

    // Initialize main swiper with thumbnails
    galleryMain = new Swiper('.gallery-main', {
      spaceBetween: 0,
      pagination: {
        el: '#gallery-modal .swiper-pagination',
        type: "fraction",
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
  });

  // Destroy swipers when modal is hidden
  $('#gallery-modal').on('hidden.bs.modal', function() {
    if (galleryMain) galleryMain.destroy();
    if (galleryThumbs) galleryThumbs.destroy();
  });
}); //end jQuery
</script>