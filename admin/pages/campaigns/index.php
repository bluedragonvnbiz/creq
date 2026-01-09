<?php get_admin_header(); ?>
<?php get_admin_part("layouts/topbar", "", ["title" => "캠페인 관리"]); ?>

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
		<a href="<?php echo home_url('creq-admin/campaigns/add') ?>" class="btn btn-primary">새 캠페인 시작</a>
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
				<img width="20" height="20" src="<?= ASSETS_ADMIN_URL; ?>/images/icons/search.svg" alt="Search Icon">
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
						<a class="campaign-item" href="details/1/">
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
						<a class="campaign-item" href="details/1/">
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
									<img width="13" height="13" src="<?= ASSETS_ADMIN_URL; ?>/images/icons/tooltip-info.svg" alt="Info Icon">
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
						<a class="campaign-item" href="details/1/">
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
						<a class="campaign-item" href="details/1/">
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

<?php get_admin_footer(); ?>