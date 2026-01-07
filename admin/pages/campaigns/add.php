<?php get_admin_header(); ?>
<?php get_admin_part("layouts/topbar", "", ["title" => "새 캠페인"]); ?>

<section class="admin-section mb-24">
	<div class="admin-page-action d-flex justify-content-between align-items-center">
		<strong class="fs-18">캠페인 개설하기</strong>
		<div class="d-flex gap-3 align-content-center">
			<button class="btn btn-outline-secondary" type="button">임시저장</button>
			<button class="btn border-0 btn-dark" type="button">임시저장 불러오기</button>
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
							<?php  
							foreach (["인스타그램","유튜브","틱톡"] as $key => $value) { ?>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="input1[]" id="radioinput1<?= $key ?>">
								  <label class="form-check-label" for="radioinput1<?= $key ?>">
								    <?= $value ?>
								  </label>
								</div>
							<?php
							}
							?>
							</div>
						</div>
						<div class="row-section">
							<div class="col-label required"><span class="label">노출 여부</span> <span class="text-danger">*</span></div>
							<div class="col-input">
							<?php  
							foreach (["노출","미노출"] as $key => $value) { ?>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="input2[]" id="radioinput2<?= $key ?>">
								  <label class="form-check-label" for="radioinput2<?= $key ?>">
								    <?= $value ?>
								  </label>
								</div>
							<?php
							}
							?>
							</div>
						</div>
						<div class="row-section">
							<div class="col-label required"><span class="label">캠페인명</span> <span class="text-danger">*</span></div>
							<div class="col-input w-100">
								<div class="input-group count-box">
									<input type="text" class="form-control count-input border-end-0" data-max="20" placeholder="내용입력">
									<div class="input-group-text"><span class="count-result">0</span>/20</div>
								</div>
							</div>
						</div>
						<div class="row-section align-items-start">
							<div class="col-label required"><span class="label">캠페인 개요</span> <span class="text-danger">*</span></div>
							<div class="col-input w-100">
								<div class="textarea-group count-box">
									<textarea id="textarea1" class="form-control count-input auto-height" data-max="50" placeholder="캠페인 개요에 대한 내용입니다. 50자 이내만 입력할 수 있습니다."></textarea>
									<label for="textarea1" class="input-group-text"><span class="count-result">0</span>/50</label>
								</div>
							</div>
						</div>
						<div class="row-section">
							<div class="col-label required"><span class="label">모집기간</span> <span class="text-danger">*</span></div>
							<div class="col-input w-100 column-gap-2">
								<div class="date-input-wrapper">
									<span class="text-label">시작일</span>
									<input type="date" class="form-control date-input" value="" required="">
								</div>
								<span style="color:#D5D5D7">~</span>
								<div class="date-input-wrapper">
									<span class="text-label">마감일</span>
									<input type="date" class="form-control date-input" value="" required="">
								</div>
							</div>
						</div>
						<div class="row-section">
							<div class="col-label required"><span class="label">업로드 기간</span> <span class="text-danger">*</span></div>
							<div class="col-input w-100 column-gap-2">
								<div class="date-input-wrapper invalid">
									<span class="text-label">시작일</span>
									<input type="date" class="form-control date-input" value="" required="">
								</div>
								<span style="color:#D5D5D7">~</span>
								<div class="date-input-wrapper invalid">
									<span class="text-label">마감일</span>
									<input type="date" class="form-control date-input" value="" required="">
								</div>
								<p class="mb-0 fs-13 text-danger ps-2">You can set the upload period after the recruitment period ends.</p>
							</div>
						</div>
						<div class="row-section">
							<div class="col-label required"><span class="label">업로드 인원 제한</span> <span class="text-danger">*</span></div>
							<div class="col-input column-gap-2">
								<select class="form-select" name="" style="width: max-content;">
									<option>일일</option>
									<option>123</option>
								</select>
								<div class="input-group" style="max-width:144px">
									<input type="number" class="form-control text-end pe-0 border-end-0" placeholder="0">
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
					<table class="table table-borderless">
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
<div class="d-none">
<svg id="icon-info" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_176_47492)">
<path d="M6.50017 1.08325C5.42885 1.08325 4.38159 1.40093 3.49083 1.99612C2.60006 2.59132 1.90579 3.43728 1.49582 4.42705C1.08584 5.41682 0.978575 6.50593 1.18758 7.55666C1.39658 8.60739 1.91247 9.57255 2.67 10.3301C3.42754 11.0876 4.3927 11.6035 5.44343 11.8125C6.49416 12.0215 7.58327 11.9142 8.57303 11.5043C9.5628 11.0943 10.4088 10.4 11.004 9.50926C11.5991 8.61849 11.9168 7.57123 11.9168 6.49992C11.9168 5.78859 11.7767 5.08423 11.5045 4.42705C11.2323 3.76987 10.8333 3.17274 10.3303 2.66976C9.82734 2.16677 9.23022 1.76778 8.57303 1.49557C7.91585 1.22336 7.21149 1.08325 6.50017 1.08325ZM7.04183 8.66659C7.04183 8.81024 6.98476 8.94802 6.88318 9.0496C6.7816 9.15118 6.64382 9.20825 6.50017 9.20825C6.35651 9.20825 6.21873 9.15118 6.11715 9.0496C6.01557 8.94802 5.9585 8.81024 5.9585 8.66659V5.95825C5.9585 5.81459 6.01557 5.67682 6.11715 5.57524C6.21873 5.47365 6.35651 5.41659 6.50017 5.41659C6.64382 5.41659 6.7816 5.47365 6.88318 5.57524C6.98476 5.67682 7.04183 5.81459 7.04183 5.95825V8.66659ZM6.50017 4.87492C6.39303 4.87492 6.28831 4.84315 6.19923 4.78363C6.11015 4.72411 6.04073 4.63952 5.99973 4.54054C5.95873 4.44156 5.94801 4.33265 5.96891 4.22758C5.98981 4.12251 6.0414 4.02599 6.11715 3.95024C6.1929 3.87448 6.28942 3.82289 6.39449 3.80199C6.49956 3.78109 6.60848 3.79182 6.70745 3.83282C6.80643 3.87381 6.89103 3.94324 6.95054 4.03232C7.01006 4.12139 7.04183 4.22612 7.04183 4.33325C7.04183 4.47691 6.98476 4.61469 6.88318 4.71627C6.7816 4.81785 6.64382 4.87492 6.50017 4.87492Z" fill="#69696B"/>
</g>
<defs>
<clipPath id="clip0_176_47492">
<rect width="13" height="13" fill="white"/>
</clipPath>
</defs>
</svg>

</div>
<?php get_admin_footer(); ?>