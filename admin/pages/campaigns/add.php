<?php get_admin_header(); ?>
<?php get_admin_part("layouts/topbar", "", ["title" => "새 캠페인"]); ?>

<form id="addCampaignForm" class="add-campaign-form" action="" method="post" enctype="multipart/form-data">
	<section class="admin-section mb-24">
		<div class="admin-page-action d-flex justify-content-between align-items-center">
			<strong class="fs-18">캠페인 개설하기</strong>
			<div class="d-flex gap-3 align-content-center">
				<button id="saveDraftCampaign" class="btn btn-outline-secondary" type="button">임시저장</button>
				<button id="loadDraftCampaigns" class="btn border-0 btn-dark" type="button">임시저장 불러오기</button>
			</div>
		</div>
		<div class="d-flex d-flex gap-12">
			<div class="admin-form-page _left w-100">
				<div class="card">
					<div class="card-header">
						<span class="title">캠페인 정보</span>
					</div>
					<div class="card-body">
						<div class="form-section">
							<div class="row-section">
								<div class="col-label required"><span class="label">캠페인 채널</span> <span class="text-danger">*</span></div>
								<div class="col-input">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="channel" id="instagramChannel" value="instagram" required checked>
										<label class="form-check-label" for="instagramChannel">인스타그램</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="channel" id="youtubeChannel" value="youtube" required>
										<label class="form-check-label" for="youtubeChannel">유튜브</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="channel" id="tiktokChannel" value="tiktok" required>
										<label class="form-check-label" for="tiktokChannel">틱톡</label>
									</div>
								</div>
							</div>
							<div class="row-section">
								<div class="col-label required"><span class="label">노출 여부</span> <span class="text-danger">*</span></div>
								<div class="col-input">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="is_actived" id="activedYes" value="1" required checked>
										<label class="form-check-label" for="activedYes">노출</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="is_actived" id="activedNo" value="0" required>
										<label class="form-check-label" for="activedNo">미노출</label>
									</div>
								</div>
							</div>
							<div class="row-section">
								<div class="col-label required"><span class="label">캠페인명</span> <span class="text-danger">*</span></div>
								<div class="col-input w-100">
									<div class="input-group count-box">
										<input type="text" class="form-control count-input border-end-0" data-max="20" name="campaign_name" id="campaignName" placeholder="내용입력" required>
										<div class="input-group-text"><span class="count-result">0</span>/20</div>
									</div>
								</div>
							</div>
							<div class="row-section align-items-start">
								<div class="col-label required"><span class="label">캠페인 개요</span> <span class="text-danger">*</span></div>
								<div class="col-input w-100">
									<div class="textarea-group count-box">
										<textarea class="form-control count-input auto-height" data-max="50" name="campaign_overview" id="campaignOverview" placeholder="내용입력" required></textarea>
										<label for="campaignOverview" class="input-group-text"><span class="count-result">0</span>/50</label>
									</div>
								</div>
							</div>
							<div class="row-section">
								<div class="col-label required"><span class="label">모집기간</span> <span class="text-danger">*</span></div>
								<div class="col-input w-100 column-gap-2">
									<div class="date-input-wrapper">
										<span class="text-label">시작일</span>
										<input type="date" class="form-control date-input" name="recruitment_starttime" placeholder="시작일" required>
									</div>
									<span style="color:#D5D5D7">~</span>
									<div class="date-input-wrapper">
										<span class="text-label">마감일</span>
										<input type="date" class="form-control date-input" name="recruitment_endtime" placeholder="마감일" required>
									</div>
								</div>
							</div>
							<div class="row-section">
								<div class="col-label required"><span class="label">업로드 기간</span> <span class="text-danger">*</span></div>
								<div class="col-input w-100 column-gap-2">
									<div class="date-input-wrapper invalid">
										<span class="text-label">시작일</span>
										<input type="date" class="form-control date-input" name="upload_starttime" placeholder="시작일" required>
									</div>
									<span style="color:#D5D5D7">~</span>
									<div class="date-input-wrapper invalid">
										<span class="text-label">마감일</span>
										<input type="date" class="form-control date-input" name="upload_endtime" placeholder="마감일" required>
									</div>
									<p class="mb-0 fs-13 text-danger ps-2">모집기간 종료 후 업로드 기간을 설정하실 수 있습니다.</p>
								</div>
							</div>
							<div class="row-section">
								<div class="col-label required"><span class="label">업로드 인원 제한</span> <span class="text-danger">*</span></div>
								<div class="col-input column-gap-2">
									<select class="form-select" name="upload_limit_type" required style="width: max-content;">
										<option value="daily">일일</option>
									</select>
									<div class="input-group" style="max-width:144px">
										<input type="number" class="form-control text-end pe-0 border-end-0" name="upload_limit" placeholder="0" required>
										<div class="input-group-text fs-14">명</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<span class="title">인플루언서 구성</span>
					</div>
					<div class="card-body table-responsive">
						<table class="table table-borderless mb-0">
						<thead>
							<tr>					      
							<th scope="col" style="width:43%">등급</th>
							<th scope="col">기본급 (원)</th>
							<th scope="col" class="text-end">인원 수 <span class="text-danger">*</span></th>
							</tr>
						</thead>
						<tbody>
							<tr>					      
							<td>
								<div class="d-flex align-items-center column-gap-1">
									<span>Mark</span>
									<span class="fs-12">코어</span>
									<img width="13" height="13" src="<?= ASSETS_ADMIN_URL; ?>/images/icons/tooltip-info.svg" alt="Info Icon">
								</div>
							</td>
							<td>100,000</td>
							<td class="d-flex justify-content-end">
								<input class="numberstyle" type="number" min="1" step="1" max="6" name="" placeholder="0" readonly>
							</td>
							</tr>
							<tr>					      
							<td>
								<div class="d-flex align-items-center column-gap-1">
									<span>Mark</span>
									<span class="fs-12">코어</span>
									<svg width="13" height="13"><use href="#icon-info"></use></svg>
								</div>
							</td>
							<td>100,000</td>
							<td class="d-flex justify-content-end">
								<input class="numberstyle" type="number" min="1" step="1" max="6" name="" placeholder="0" readonly>
							</td>
							</tr>
							<tr>					      
							<td>
								<div class="d-flex align-items-center column-gap-1">
									<span>Mark</span>
									<span class="fs-12">코어</span>
									<svg width="13" height="13"><use href="#icon-info"></use></svg>
								</div>
							</td>
							<td>100,000</td>
							<td class="d-flex justify-content-end">
								<input class="numberstyle" type="number" min="1" step="1" max="6" name="" value="2" placeholder="0" readonly>
							</td>
							</tr>
						</tbody>
						</table>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<span class="title">제품정보</span>
					</div>
					<div class="card-body form-section">
						<div class="row-section upload-single-file-wp">
							<div class="img-preview">
								<span>이미지</span>
							</div>
							<label class="btn img-action btn-primary btn-sm">변경
								<input type="file" class="d-none" name="" accept=".pdf, .jpg, .jpeg, .png, .heic">
							</label>
						</div>
						<div class="row-section">
							<div class="col-label"><span class="label">제품 카테고리</span> <span class="text-danger">*</span></div>
							<div class="col-input w-100">
								<select class="form-select" name="" required>
									<option value="" selected disabled>카테고리 선택</option>
									<option value="1">일일</option>
									<option value="2">123</option>
								</select>
							</div>
						</div>
						<div class="row-section">
							<div class="col-label"><span class="label">제품명</span> <span class="text-danger">*</span></div>
							<div class="col-input w-100">
								<input type="text" class="form-control" placeholder="제품명 입력">
							</div>
						</div>
						<div class="row-section">
							<div class="col-label"><span class="label">제품판매링크</span> <span class="text-danger">*</span></div>
							<div class="col-input w-100">
								<input type="text" class="form-control" placeholder="링크 입력">
							</div>
						</div>
						<div class="row-section align-items-start">
							<div class="col-label required"><span class="label">제품설명</span> <span class="text-danger">*</span></div>
							<div class="col-input w-100">
								<div class="textarea-group count-box _120">
									<textarea id="textarea2" class="form-control count-input auto-height" data-max="1000" placeholder="내용입력"></textarea>
									<label for="textarea2" class="input-group-text"><span class="count-result">0</span>/1000</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<span class="title">콘텐츠 정보</span>
					</div>
					<div class="card-body form-section">
						<div class="row-section">
							<div class="col-label required"><span class="label">콘텐츠 검수 유무</span> <span class="text-danger">*</span></div>
							<div class="col-input">
							<?php  
							foreach (["진행","미진행"] as $key => $value) { ?>
								<div class="form-check">
								<input class="form-check-input" type="radio" name="input3[]" id="radioinput3<?= $key ?>">
								<label class="form-check-label" for="radioinput3<?= $key ?>">
									<?= $value ?>
								</label>
								</div>
							<?php
							}
							?>
							</div>
						</div>
						<div class="row-section">
							<div class="col-label required"><span class="label">콘텐츠 2차 활용 여부</span> <span class="text-danger">*</span></div>
							<div class="col-input">
							<?php  
							foreach (["필수","상관없음"] as $key => $value) { ?>
								<div class="form-check">
								<input class="form-check-input" type="radio" name="input4[]" id="radioinput4<?= $key ?>">
								<label class="form-check-label" for="radioinput4<?= $key ?>">
									<?= $value ?>
								</label>
								</div>
							<?php
							}
							?>
							</div>
						</div>
						<div class="row-section">
							<div class="col-label required"><span class="label">프로필 제품링크 업로드</span> <span class="text-danger">*</span></div>
							<div class="col-input">
							<?php  
							foreach (["필수","상관없음"] as $key => $value) { ?>
								<div class="form-check">
								<input class="form-check-input" type="radio" name="input5[]" id="radioinput5<?= $key ?>">
								<label class="form-check-label" for="radioinput5<?= $key ?>">
									<?= $value ?>
								</label>
								</div>
							<?php
							}
							?>
							</div>
						</div>
						<div class="row-section align-items-start">
							<div class="col-label required"><span class="label">콘텐츠 가이드 </span> <span class="text-danger">*</span></div>
							<div class="col-input w-100">
								<div class="textarea-group count-box _120">
									<textarea id="textarea3" class="form-control count-input auto-height" data-max="1000" placeholder="내용입력"></textarea>
									<label for="textarea3" class="input-group-text"><span class="count-result">0</span>/1000</label>
								</div>
							</div>
						</div>
						<div class="row-section align-items-start">
							<div class="col-label required"><span class="label">콘텐츠 가이드 <br>(권장 및 안내사항) </span></div>
							<div class="col-input w-100 gap-05 flex-wrap">
								<div class="textarea-group count-box w-100 _120">
									<textarea id="textarea4" class="form-control count-input auto-height" data-max="1000" placeholder="내용입력"></textarea>
									<label for="textarea4" class="input-group-text"><span class="count-result">0</span>/1000</label>
								</div>
								<div class="d-flex gap-05 upload-box _name w-100">
									<input type="text" readonly class="form-control file-name" placeholder="파일 선택">
									<label class="btn btn-dark text-nowrap" type="button">
										PDF 업로드
										<input type="file" class="d-none input-file-upload" name="" accept=".pdf">
									</label>
								</div>
							</div>
						</div>
						<div class="row-section">
							<div class="col-label"><span class="label">필수 해시태그</span> <span class="text-danger">*</span></div>
							<div class="col-input w-100">
								<input type="text" class="form-control" placeholder="#포함하여 입력, 예) #크리크 #CREQ #인플루언서 #브랜드">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="flex-shrink-0">
				<div class="pv-wiget position-sticky" style="top: 12px;">
					<span class="widget-title">예상 광고비</span>
					<div class="wiget-body">
						<ul class="list-unstyled mb-0 list-between">
							<li><span>총 인원 수</span><span>0명</span></li>
						</ul>
						<hr>
						<ul class="list-unstyled list-between mb-0">
							<li><span>최저 금액</span><span>0명</span></li>
							<li><span>예상값 금액</span><span>0명</span></li>
							<li><span>최대 금액</span><span>0명</span></li>
						</ul>
					</div>
					<div class="wiget-footer">
						<button class="btn btn-primary w-100" type="submit" disabled>저장 및 캠페인 생성</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</form>

<?php get_admin_footer(); ?>