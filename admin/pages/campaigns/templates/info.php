<div class="admin-form-page admin-section mb-12">
	<div class="d-flex gap-15">
		<div class="card w-100">
			<div class="card-header"><span class="title">캠페인 정보</span></div>
			<div class="card-body">
				<ul class="list-unstyled info-list">
					<li>
						<span class="label">캠페인 채널</span>
						<div class="d-flex align-items-center gap-05">
							<img src="<?= IMAGES_URL ?>/icons/instagram.svg" alt="" style="width: 18px;height: 18px;" class="object-fit-cover">
							<span>인스타그램</span>
						</div>
					</li>
					<li>
						<span class="label">노출여부</span>
						<span>노출</span>
					</li>
					<li>
						<span class="label">캠페인명</span>
						<span>캠페인명입니다.</span>
					</li>
					<li>
						<span class="label">캠페인 개요</span>
						<span>캠페인 개요입니다.</span>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<ul class="list-unstyled info-list">
					<li>
						<span class="label">모집기간</span>
						<span>2025-01-02 ~ 2025-01-02</span>
					</li>
					<li>
						<span class="label">업로드 기간</span>
						<span>2025-01-02 ~ 2025-01-02</span>
					</li>
					<li>
						<span class="label">업로드 인원수 제한</span>
						<span>일일 <span class="text-primary">5</span> <span class="fw-semibold">명</span></span>
					</li>
				</ul>
			</div>
		</div>
		<div class="card w-100">
			<div class="card-header"><span class="title">인플루언서 구성</span></div>
			<div class="card-body d-flex gap-15 flex-grow-0">
				<div class="d-flex align-items-center justify-content-between fs-14 w-100 bg-gray p-10 rounded-1">
					<span>예상광고비</span>
					<span class="text-primary fw-semibold">0 ~ 600,000</span>
				</div>
				<div class="d-flex align-items-center justify-content-between fs-14 w-100 bg-gray p-10 rounded-1">
					<span>총인원</span>
					<span class="text-primary fw-semibold">6</span>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-borderless text-center mb-0">
					<thead>
						<tr>					      
							<th scope="col" style="width:20%">등급</th>
							<th scope="col">기본급</th>
							<th scope="col" style="width:20%">인원 수</th>
						</tr>
					</thead>
					<tbody>
					<?php  
					for ($i=0; $i < 7; $i++) { ?>
						<tr>					      
							<td>Core</td>
							<td>100,000</td>
							<td>2</td>
						</tr>
					<?php
					}
					?>
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
	<div class="card w-100">
		<div class="card-header"><span class="title">제품 정보</span></div>
		<div class="card-body">
			<ul class="list-unstyled info-list">
				<li>
					<span class="label">제품 이미지 (썸네일)</span>
				</li>
				<li>
					<span class="label">제품 카테고리</span>
					<span>카테고리 선택</span>
				</li>
				<li>
					<span class="label">제품명</span>
					<span>제품 A</span>
				</li>
				<li>
					<span class="label">제품판매링크</span>
					<span class="text-decoration-underline">http://shop.com</span>
				</li>
				<li>
					<span class="label align-items-start">제품설명</span>
					<span>제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. 제품에 대한 설명입니다. </span>
				</li>
			</ul>
		</div>
	</div>
	<div class="card w-100">
		<div class="card-header"><span class="title">콘텐츠 정보</span></div>
		<div class="card-body d-flex column-gap-3">
			<div class="d-flex w-100 column-gap-3 px-0 p-10">
				<span class="fw-semibold fs-14">콘텐츠 검수 유무</span>
				<span class="fw-semibold fs-13 text-primary">검수 진행</span>
			</div>
			<div class="d-flex w-100 column-gap-3 px-0 p-10">
				<span class="fw-semibold fs-14">콘텐츠 2차 활용 여부</span>
				<span class="fw-semibold fs-13 text-primary">필수</span>
			</div>
			<div class="d-flex w-100 column-gap-3 px-0 p-10">
				<span class="fw-semibold fs-14">프로필 제품 링크 업로드</span>
				<span class="fw-semibold fs-13 text-primary">필수</span>
			</div>
		</div>
		<div class="card-body fs-14">
			<span class="fw-semibold d-block mb-1">콘텐츠 가이드 (필수)</span>
			<div>콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.</div>
		</div>
		<div class="card-body fs-14">
			<span class="fw-semibold d-block mb-1">콘텐츠 가이드 (권장 및 안내사항)</span>
			<div>콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.콘텐츠 가이드 내용입니다.</div>
		</div>
		<div class="card-body fs-14">
			<span class="fw-semibold d-block mb-1">필수 해시태그</span>
			<div>#해시태그   #해시태그  #해시태그  #해시태그</div>
		</div>
	</div>
	<div class="text-end">
		<a href="?edit_id=1&tab=edit" class="btn btn-primary">수정</a>
	</div>
</div>