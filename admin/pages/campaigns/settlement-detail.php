<?php get_admin_header(); ?>
<?php get_admin_part("layouts/topbar", "", ["title" => "정산 관리"]); ?>

<div class="admin-form-page admin-section mb-12">
	<div class="d-flex align-items-center justify-content-between">
		<strong class="fs-18">정산 상세</strong>
		<button class="btn btn-primary" type="button">승인</button>
	</div>
	<div class="d-flex gap-15">
		<div class="card w-100">
			<div class="card-header"><span class="title">인플루언서 정보</span></div>
			<div class="card-body d-flex gap-15">
				<ul class="list-unstyled info-list w-100">
					<li>
						<span class="label">소셜채널</span>
						<span>인스타그램</span>
					</li>
					<li>
						<span class="label">환전주체</span>
						<span>개인</span>
					</li>
					<li>
						<span class="label">등급</span>
						<span>Seed</span>
					</li>
				</ul>
				<ul class="list-unstyled info-list w-100">
					<li>
						<span class="label">이메일</span>
						<div class="d-flex align-items-center gap-10">
							<span>Leo messi</span>
							<svg width="24" height="20"><use href="#icon-arrow"></use></svg>
						</div>
					</li>
					<li>
						<span class="label">캠페인명</span>
						<span>influence@gmail.com</span>
					</li>
				</ul>
			</div>
		</div>
		<div class="card w-100">
			<div class="card-header"><span class="title">캠페인 정보</span></div>
			<div class="card-body">
				<ul class="list-unstyled info-list w-100">
					<li>
						<span class="label">캠페인명</span>
						<div class="d-flex align-items-center gap-10">
							<span>캠페인명</span>
							<svg width="24" height="20"><use href="#icon-arrow"></use></svg>
						</div>
					</li>
					<li>
						<span class="label">제품명</span>
						<span>제품명</span>
					</li>
					<li>
						<span class="label">제품명</span>
						<span>제품명</span>
					</li>
				</ul>
			</div>		
		</div>
	</div>
	<div class="card w-100">
		<div class="card-header"><span class="title">진행 정보</span></div>
		<div class="card-body">
			<ul class="list-unstyled info-list flex-row">
				<li class="w-100">
					<span class="label">진행단계</span>
					<span>정산 요청</span>
				</li>
				<li class="w-100">
					<span class="label">승인요청일</span>
					<span>2025.10.29</span>
				</li>
				<li class="w-100">
					<span class="label">이의제기일</span>
					<span>-</span>
				</li>
				<li class="w-100">
					<span class="label">최종승인일</span>
					<span>-</span>
				</li>
			</ul>
		</div>
	</div>
	<div class="card w-100">
		<div class="card-header"><span class="title">정산금 산출 정보</span></div>
		<div class="card-body d-flex gap-15 flex-column">
			<div><span class="badge text-bg-primary">인플루언서</span></div>
			<ul class="list-unstyled info-list flex-row flex-wrap column-gap-0">
				<li class="w-25">
					<span class="label">기본급</span>
					<span>0원</span>
				</li>
				<li class="w-25">
					<span class="label">성과급</span>
					<span>9,455원 (18.91점x500원)</span>
				</li>
				<li class="w-25">
					<span class="label">총 정산금액</span>
					<span>9,455원</span>
				</li>
				<li class="w-25">
					<span class="label">원천징수세</span>
					<span>312원</span>
				</li>
				<li class="w-25">
					<span class="label">실지급 금액</span>
					<span><strong class="text-primary">9,143</strong>원</span>
				</li>
			</ul>
		</div>
		<div class="card-body d-flex gap-15 flex-column">
			<div><span class="badge text-bg-primary">Referral</span></div>
			<ul class="list-unstyled info-list flex-row ">
				<li class="w-100">
					<span class="label">이메일</span>
					<div class="d-flex align-items-center gap-10">
						<span>influence@gmail.com</span>
						<svg width="24" height="20"><use href="#icon-arrow"></use></svg>
					</div>
				</li>
				<li class="w-100">
					<span class="label">Referral 금액</span>
					<span>914원</span>
				</li>
				<li class="w-100">
					<span class="label">부가세</span>
					<span>91원</span>
				</li>
				<li class="w-100">
					<span class="label">실지급 금액</span>
					<span>1005원</span>
				</li>
			</ul>
		</div> 
	</div>
	<div class="card w-100">
		<div class="card-header">
			<div class="title">성과 점수 산출 정보 <span class="text-primary ps-3">18.91점</span></div>
		</div>
		<div class="card-body">
			<table class="table table-bordered mb-0 rounded-3">
				<thead>
					<tr class="table-primary">
						<th class="border-end-0" style="width: 70px;"></th>
						<th>조회수</th>
						<th>좋아요 수</th>
						<th>댓글 수</th>
						<th>저장 수</th>
						<th>공유 수</th>
						<th>팔로우 수</th>
						<th>평균 시청시간</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="bg-gray text-center">횟수</td>
						<td>705</td>
						<td>100</td>
						<td>15</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
					<tr>
						<td class="bg-gray text-center">횟수</td>
						<td>705</td>
						<td>100</td>
						<td>15</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="d-none">
	<svg id="icon-arrow" width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	<rect width="24" height="20" rx="4" fill="#705CFF" fill-opacity="0.15"/>
	<path d="M16 6.69966C16 6.52294 15.9298 6.35345 15.8048 6.22849C15.6799 6.10352 15.5104 6.03332 15.3337 6.03332L10.0029 6C9.82617 6 9.65668 6.0702 9.53172 6.19517C9.40676 6.32013 9.33655 6.48962 9.33655 6.66634C9.33655 6.84307 9.40676 7.01256 9.53172 7.13752C9.65668 7.26249 9.82617 7.33269 10.0029 7.33269H13.7078L8.1971 12.8567C8.13465 12.9186 8.08508 12.9923 8.05125 13.0735C8.01742 13.1547 8 13.2418 8 13.3298C8 13.4178 8.01742 13.5049 8.05125 13.5861C8.08508 13.6673 8.13465 13.741 8.1971 13.8029C8.25905 13.8654 8.33275 13.9149 8.41395 13.9488C8.49515 13.9826 8.58224 14 8.67021 14C8.75817 14 8.84527 13.9826 8.92647 13.9488C9.00767 13.9149 9.08137 13.8654 9.14331 13.8029L14.6673 8.2789V11.9971C14.6673 12.1738 14.7375 12.3433 14.8625 12.4683C14.9874 12.5932 15.1569 12.6634 15.3337 12.6634C15.5104 12.6634 15.6799 12.5932 15.8048 12.4683C15.9298 12.3433 16 12.1738 16 11.9971V6.69966Z" fill="#705CFF"/>
	</svg>
</div>
<?php get_admin_footer(); ?>