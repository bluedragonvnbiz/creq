<?php get_admin_header(); ?>
<?php get_template_part("admin/template-parts/layouts/topbar","",["title" => "캠페인 관리"]) ?>
<div class="admin-toolbar admin-section d-flex justify-content-between align-items-center mb-12">
	<div class="d-flex gap-10 align-items-center">
		<div class="social-group-btn d-flex column-gap-1">
			<button class="btn border-0 active" type="button">
				<img src="<?= IMAGES_URL ?>/icons/instagram.svg" alt="">
				<span>인스타그램</span>
			</button>
			<button class="btn border-0" type="button">
				<img src="<?= IMAGES_URL ?>/icons/youtube.svg" alt="">
				<span>유튜브</span>
			</button>
			<button class="btn border-0" type="button">
				<img src="<?= IMAGES_URL ?>/icons/tiktok.svg" alt="">
				<span>틱톡</span>
			</button>
		</div>
		<a href="?mode=add" class="btn btn-primary">새 캠페인 시작</a>
	</div>
	<div class="d-flex justify-content-end gap-15">
		<select class="form-select max-content" name="">
			<option>상태</option>
			<option>임시저장</option>
			<option>진행 전</option>
		</select>
		<div class="input-group">
			<select class="form-select max-content flex-grow-0" name="">
				<option>기간 전체</option>
			</select>
		  	<input type="text" class="form-control" placeholder="2025.01.01~2025.01.30">
		</div>
		<div class="input-group">
		  <span class="input-group-text bg-white pe-0">
		  	<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M16.2918 17.1458L11.0418 11.9167C10.6252 12.2639 10.146 12.5347 9.60433 12.7292C9.06266 12.9236 8.50711 13.0208 7.93766 13.0208C6.50711 13.0208 5.29877 12.5278 4.31266 11.5417C3.32655 10.5556 2.8335 9.34722 2.8335 7.91667C2.8335 6.5 3.32655 5.295 4.31266 4.30167C5.29877 3.30889 6.50711 2.8125 7.93766 2.8125C9.35433 2.8125 10.5557 3.30556 11.5418 4.29167C12.5279 5.27778 13.021 6.48611 13.021 7.91667C13.021 8.51389 12.9238 9.08333 12.7293 9.625C12.5349 10.1667 12.271 10.6389 11.9377 11.0417L17.1668 16.2708L16.2918 17.1458ZM7.93766 11.7708C9.00711 11.7708 9.9135 11.3958 10.6568 10.6458C11.3996 9.89583 11.771 8.98611 11.771 7.91667C11.771 6.84722 11.3996 5.9375 10.6568 5.1875C9.9135 4.4375 9.00711 4.0625 7.93766 4.0625C6.85433 4.0625 5.94127 4.4375 5.1985 5.1875C4.45516 5.9375 4.0835 6.84722 4.0835 7.91667C4.0835 8.98611 4.45516 9.89583 5.1985 10.6458C5.94127 11.3958 6.85433 11.7708 7.93766 11.7708Z" fill="#373739"/>
			</svg>
		  </span>
		  <input type="text" class="form-control border-start-0" placeholder="캠페인명으로 검색">
		</div>
	</div>
</div>
<div class="bg-white">
	<span class="d-block fs-14 fw-semibold" style="padding:10px 20px">총  253개의 캠페인</span>
	<div class="table-responsive">
		<table class="table table-striped table-bordered mb-0">
			<thead>
				<tr>
					<th scope="col">캠페인/제품</th>
					<th scope="col">진행 상태</th>
					<th scope="col">캠페인 채널</th>
					<th scope="col">모집 기간</th>
					<th scope="col">총 예산</th>
					<th scope="col" class="col-action" style="padding-right: 15px !important;">노출</th>
					<th scope="col" class="col-action">복제</th>
					<th scope="col" class="col-action">삭제</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<a class="campaign-item" href="?edit_id=1">
							<img src="<?= IMAGES_URL ?>/demo/demo-1.jpg" alt="">
							<div class="d-flex flex-column fs-12 justify-content-center">
								<strong class="fw-semibold">캠페인명</strong>
								<span>제품명</span>
							</div>
						</a>
					</td>
					<td>임시저장</td>
					<td>
						<div class="d-flex gap-05 align-items-center">
							<img src="<?= IMAGES_URL ?>/icons/instagram.svg" alt="">
							<span class="fs-12">인스타그램</span>
						</div>
					</td>
					<td>2025.01.01 ~ 2025.01.30</td>
					<td>156,938,212원</td>
					<td class="col-action" style="padding-right: 15px !important;">
						<div class="form-check form-switch">
						  <input class="form-check-input" type="checkbox" role="switch" disabled>
						</div>
					</td>
					<td class="col-action"><a href="javascript:void(0)" class="btn btn-dark btn-sm text-nowrap">복제</a></td>
					<td class="col-action"><a href="javascript:void(0)" class="btn btn-outline-light btn-sm text-nowrap" data-bs-toggle="modal" data-bs-target="#confirm-modal">삭제</a></td>
				</tr>
 				<tr>
					<td>
						<a class="campaign-item" href="?edit_id=1">
							<img src="<?= IMAGES_URL ?>/demo/demo-2.jpg" alt="">
							<div class="d-flex flex-column fs-12 justify-content-center">
								<strong class="fw-semibold">캠페인명</strong>
								<span>제품명</span>
							</div>
						</a>
					</td>
					<td>
						<div class="d-flex align-items-center gap-05">
							<span>진행 중 > [인플루언서 모집]</span>
							<div class="dropdown dropdown-center">
							  <button class="btn p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							    <svg width="13" height="13"><use href="#icon-i"></use></svg>
							  </button>
							  <ul class="dropdown-menu list-info">
							    <li>발송 준비 <strong>0</strong></li>
						    	<li>배송 중 <strong>0</strong></li>
						    	<li>제작 중 <strong>0</strong></li>
						    	<li>검수 중 <strong>0</strong></li>
						    	<li>업로드 대기 <strong>0</strong></li>
						    	<li>업로드 완료 <strong>0</strong></li>
						    	<li>최종 승인 <strong>0</strong></li>
							  </ul>
							</div>
						</div>
					</td>
					<td>
						<div class="d-flex gap-05 align-items-center">
							<img src="<?= IMAGES_URL ?>/icons/youtube.svg" alt="">
							<span class="fs-12">유튜브</span>
						</div>
					</td>
					<td>2025.01.01 ~ 2025.01.30</td>
					<td>156,938,212원</td>
					<td class="col-action" style="padding-right: 15px !important;">
						<div class="form-check form-switch">
						  <input class="form-check-input" type="checkbox" role="switch" disabled checked>
						</div>
					</td>
					<td class="col-action"><a href="javascript:void(0)" class="btn btn-dark btn-sm text-nowrap">복제</a></td>
					<td class="col-action"><a href="javascript:void(0)" class="btn btn-outline-light btn-sm text-nowrap disabled">삭제</a></td>
				</tr>
				<tr>
					<td>
						<a class="campaign-item" href="?edit_id=1">
							<img src="<?= IMAGES_URL ?>/demo/demo-2.jpg" alt="">
							<div class="d-flex flex-column fs-12 justify-content-center">
								<strong class="fw-semibold">캠페인명</strong>
								<span>제품명</span>
							</div>
						</a>
					</td>
					<td>임시저장</td>
					<td>
						<div class="d-flex gap-05 align-items-center">
							<img src="<?= IMAGES_URL ?>/icons/instagram.svg" alt="">
							<span class="fs-12">인스타그램</span>
						</div>
					</td>
					<td>2025.01.01 ~ 2025.01.30</td>
					<td>156,938,212원</td>
					<td class="col-action">
						<div class="form-check form-switch">
						  <input class="form-check-input" type="checkbox" role="switch">
						</div>
					</td>
					<td class="col-action"><a href="javascript:void(0)" class="btn btn-dark btn-sm text-nowrap">복제</a></td>
					<td class="col-action"><a href="javascript:void(0)" class="btn btn-outline-light btn-sm text-nowrap" data-bs-toggle="modal" data-bs-target="#confirm-modal">삭제</a></td>
				</tr>
				<tr>
					<td>
						<a class="campaign-item" href="?edit_id=1">
							<img src="<?= IMAGES_URL ?>/demo/demo-2.jpg" alt="">
							<div class="d-flex flex-column fs-12 justify-content-center">
								<strong class="fw-semibold">캠페인명</strong>
								<span>제품명</span>
							</div>
						</a>
					</td>
					<td>임시저장</td>
					<td>
						<div class="d-flex gap-05 align-items-center">
							<img src="<?= IMAGES_URL ?>/icons/instagram.svg" alt="">
							<span class="fs-12">인스타그램</span>
						</div>
					</td>
					<td>2025.01.01 ~ 2025.01.30</td>
					<td>156,938,212원</td>
					<td class="col-action" style="padding-right: 15px !important;">
						<div class="form-check form-switch">
						  <input class="form-check-input" type="checkbox" role="switch" checked>
						</div>
					</td>
					<td class="col-action"><a href="javascript:void(0)" class="btn btn-dark btn-sm text-nowrap">복제</a></td>
					<td class="col-action"><a href="javascript:void(0)" class="btn btn-outline-light btn-sm text-nowrap" data-bs-toggle="modal" data-bs-target="#confirm-modal">삭제</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade admin-modal" id="confirm-modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<div class="modal-body text-center">
    		<strong class="fw-semibold fs-18 mb-3 d-block">정말 해당 캠페인을 삭제하시겠어요?</strong>
    		<p class="mb-0 text-gray fs-13">삭제 후 복구는 불가능합니다.</p>
    	</div>
    	<div class="modal-footer">
    		<button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">취소</button>
    		<button type="button" class="btn btn-primary">확인</button>
    	</div>
    </div>
  </div>
</div>
<div class="d-none">
<svg id="icon-i" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_722_9284)">
<path d="M6.50017 1.08325C5.42885 1.08325 4.38159 1.40093 3.49083 1.99612C2.60006 2.59132 1.90579 3.43728 1.49582 4.42705C1.08584 5.41682 0.978575 6.50593 1.18758 7.55666C1.39658 8.60739 1.91247 9.57255 2.67 10.3301C3.42754 11.0876 4.3927 11.6035 5.44343 11.8125C6.49416 12.0215 7.58327 11.9142 8.57303 11.5043C9.5628 11.0943 10.4088 10.4 11.004 9.50926C11.5991 8.61849 11.9168 7.57123 11.9168 6.49992C11.9168 5.78859 11.7767 5.08423 11.5045 4.42705C11.2323 3.76987 10.8333 3.17274 10.3303 2.66976C9.82734 2.16677 9.23022 1.76778 8.57303 1.49557C7.91585 1.22336 7.21149 1.08325 6.50017 1.08325ZM7.04183 8.66659C7.04183 8.81024 6.98476 8.94802 6.88318 9.0496C6.7816 9.15118 6.64382 9.20825 6.50017 9.20825C6.35651 9.20825 6.21873 9.15118 6.11715 9.0496C6.01557 8.94802 5.9585 8.81024 5.9585 8.66659V5.95825C5.9585 5.81459 6.01557 5.67682 6.11715 5.57524C6.21873 5.47365 6.35651 5.41659 6.50017 5.41659C6.64382 5.41659 6.7816 5.47365 6.88318 5.57524C6.98476 5.67682 7.04183 5.81459 7.04183 5.95825V8.66659ZM6.50017 4.87492C6.39303 4.87492 6.28831 4.84315 6.19923 4.78363C6.11015 4.72411 6.04073 4.63952 5.99973 4.54054C5.95873 4.44156 5.94801 4.33265 5.96891 4.22758C5.98981 4.12251 6.0414 4.02599 6.11715 3.95024C6.1929 3.87448 6.28942 3.82289 6.39449 3.80199C6.49956 3.78109 6.60848 3.79182 6.70745 3.83282C6.80643 3.87381 6.89103 3.94324 6.95054 4.03232C7.01006 4.12139 7.04183 4.22612 7.04183 4.33325C7.04183 4.47691 6.98476 4.61469 6.88318 4.71627C6.7816 4.81785 6.64382 4.87492 6.50017 4.87492Z" fill="#69696B"/>
</g>
<defs>
<clipPath id="clip0_722_9284">
<rect width="13" height="13" fill="white"/>
</clipPath>
</defs>
</svg>
</div>
<?php get_admin_footer(); ?>