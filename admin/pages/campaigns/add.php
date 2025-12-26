<?php get_admin_header(); ?>
<?php get_template_part("admin/template-parts/layouts/topbar","",["title" => "새 캠페인"]) ?>
<section class="admin-section">
	<div class="admin-page-action d-flex justify-content-between align-items-center">
		<strong class="fs-18">캠페인 개설하기</strong>
		<div class="d-flex gap-3 align-content-center">
			<button class="btn btn-outline-secondary" type="button">임시저장</button>
			<button class="btn border-0 btn-dark" type="button">임시저장 불러오기</button>
		</div>
	</div>
	<div class="d-flex admin-form-page">
		<div class="admin-form-page _left">
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
									<input type="text" class="form-control count-input" data-max="20" placeholder="내용입력">
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
							<div class="col-label required"><span class="label">업로드 인원 제한</span> <span class="text-danger">*</span></div>
							<div class="col-input column-gap-2">
								<select class="form-select" name="" style="width: max-content;">
									<option>일일</option>
									<option>123</option>
								</select>
								<div class="input-group" style="max-width:144px">
									<input type="number" class="form-control text-end pe-0" placeholder="0">
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
				<div class="card-body">
					<table class="table table-borderless">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">First</th>
					      <th scope="col">Last</th>
					      <th scope="col">Handle</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">1</th>
					      <td>Mark</td>
					      <td>Otto</td>
					      <td>@mdo</td>
					    </tr>
					    <tr>
					      <th scope="row">2</th>
					      <td>Jacob</td>
					      <td>Thornton</td>
					      <td>@fat</td>
					    </tr>
					    <tr>
					      <th scope="row">3</th>
					      <td>John</td>
					      <td>Doe</td>
					      <td>@social</td>
					    </tr>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_admin_footer(); ?>