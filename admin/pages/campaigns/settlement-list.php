<?php get_admin_header(); ?>

<style>
	.camp-nav {
        margin-bottom: 0
    }
</style>

<?php get_admin_part("layouts/topbar", "", ["title" => "캠페인 관리"]); ?>
<?php get_admin_part("components/campaigns/campaign-header"); ?>
<?php get_admin_part("components/campaigns/campaign-navbar"); ?>

<div class="admin-section p-10 d-flex gap-10 align-items-center admin-filter-btn">
	<?php  
	$type_arr = [
		["전체",7],["미정",1],["요청 전",0],["승인 요청",0],["이의제기(재검토)",0],["최종 승인",0]
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
		    <th>환전주체</th>
		    <th>인플루언서 </th>
				<th>캠페인</th>
				<th>진행단계</th>
				<th>승인요청일</th>
				<th>이의제기일</th>
				<th>최종승인일</th>
				<th>기본급</th>
				<th>성과급</th>
				<th>총 정산금</th>
				<th>실지급액</th>
				<th class="text-center">Referral 여부</th>
				<th style="width:70px">최종승인</th>
	    </tr>
	  </thead>
	  <tbody>
	    	<tr>
		      <td>
		      	<a href="?id" class="user d-flex align-items-center gap-15">
			      		<div class="d-flex gap-10 align-items-center">
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
						</a>
		      </td>

		      <td>사업자</td>
		      <td>캠페인명</td>
		      <td>미정</td>
		      <td>-</td>
		      <td>-</td>
		      <td>-</td>		      
		      <td>100,000원</td>
		      <td>150,000원</td>
		      <td><strong>250,000원</strong></td>
		      <td><strong>241,750원</strong></td>
		      <td class="text-center"><strong>Y</strong></td>		      
		      <td class="text-center"><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#confirm-modal">승인</button></td>
		    </tr>
		    <tr>
		      <td>
		      	<a href="?id" class="user d-flex align-items-center gap-15">
			      		<div class="d-flex gap-10 align-items-center">
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
						</a>
		      </td>

		      <td>사업자</td>
		      <td>캠페인명</td>
		      <td><span class="text-primary">승인요청</span></td>
		      <td>-</td>
		      <td>2025.10.29</td>
		      <td>-</td>		      
		      <td>100,000원</td>
		      <td>150,000원</td>
		      <td><strong>250,000원</strong></td>
		      <td><strong>241,750원</strong></td>
		      <td class="text-center"><strong>N</strong></td>		      
		      <td class="text-center"><button class="btn btn-primary" disabled type="button" data-bs-toggle="modal" data-bs-target="#confirm-modal">승인</button></td>
		    </tr>
		    <tr>
		      <td>
		      	<a href="?id" class="user d-flex align-items-center gap-15">
			      		<div class="d-flex gap-10 align-items-center">
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
						</a>
		      </td>

		      <td>사업자</td>
		      <td>캠페인명</td>
		      <td><span class="text-danger">이의제기<br>(재검토)</span></td>
		      <td>2025.10.29</td>
		      <td>-</td>
		      <td>-</td>		      
		      <td>100,000원</td>
		      <td>150,000원</td>
		      <td><strong>250,000원</strong></td>
		      <td><strong>241,750원</strong></td>
		      <td class="text-center"><strong>N</strong></td>		      
		      <td class="text-center"><button class="btn btn-secondary" disabled type="button" data-bs-toggle="modal" data-bs-target="#confirm-modal">승인</button></td>
		    </tr>
	  </tbody>
	</table>
</div>

<div class="modal fade admin-modal" id="confirm-modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<div class="modal-body text-center">
    		<strong class="fw-semibold fs-18 mb-3 d-block">정말 최종승인 하시겠어요?</strong>
    		<p class="mb-0 text-gray fs-13">승인 시, 인플루언서에게 정산금이 즉시 지급됩니다.</p>
    	</div>
    	<div class="modal-footer">
    		<button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">취소</button>
    		<button type="button" class="btn btn-primary">확인</button>
    	</div>
    </div>
  </div>
</div>





<div class="d-none">
	<svg id="icon-blue-star" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M9.01515 1.28734L8.85648 1.06512C8.19173 0.134544 6.80873 0.134544 6.14398 1.06512L5.98532 1.28734C5.63433 1.77867 5.0451 2.04177 4.44501 1.97509L3.73749 1.89648C2.67597 1.77853 1.77902 2.67548 1.89697 3.737L1.97557 4.44452C2.04226 5.04461 1.77916 5.63384 1.28783 5.98483L1.06561 6.14349C0.135032 6.80824 0.135032 8.19124 1.06561 8.85599L1.28783 9.01466C1.77916 9.36566 2.04226 9.95491 1.97557 10.555L1.89697 11.2625C1.77902 12.324 2.67597 13.221 3.73749 13.103L4.44501 13.0244C5.0451 12.9577 5.63433 13.2208 5.98532 13.7122L6.14398 13.9343C6.80873 14.8649 8.19173 14.8649 8.85648 13.9343L9.01515 13.7122C9.36615 13.2208 9.9554 12.9577 10.5555 13.0244L11.263 13.103C12.3245 13.221 13.2215 12.324 13.1035 11.2625L13.0249 10.555C12.9582 9.95491 13.2213 9.36566 13.7127 9.01466L13.9348 8.85599C14.8654 8.19124 14.8654 6.80824 13.9348 6.14349L13.7127 5.98483C13.2213 5.63384 12.9582 5.04461 13.0249 4.44452L13.1035 3.737C13.2215 2.67548 12.3245 1.77853 11.263 1.89648L10.5555 1.97509C9.9554 2.04177 9.36615 1.77867 9.01515 1.28734Z" fill="#3B6FFF"/>
	<path d="M5 7.66667L6.51575 9.18242C6.59908 9.26575 6.73425 9.26575 6.81758 9.18242L10 6" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>
</div>

<?php get_admin_footer(); ?>
