<style>
	.camp-nav{margin-bottom: 0}
</style>
<div class="admin-section bg-white" style="border-bottom: 2px solid #DFE5EF">
	<div class="d-flex align-items-center justify-content-between p-10 px-0">
		<div class="d-flex align-items-center gap-15">
			<select class="form-select max-content">
				<option>인플루언서 전체</option>
				<option>2</option>
				<option>3</option>
			</select>
			<select class="form-select max-content">
				<option>등급 전체</option>
				<option>2</option>
				<option>3</option>
			</select>
		</div>
		<div class="d-flex gap-15 justify-content-end align-items-center">
			<span class="fs-14">마감 기한 ~2025.11.11</span>
			<button class="btn btn-outline-primary" type="button" disabled>인플루언서 확정</button>
			<button class="btn btn-primary" type="button" disabled>인원 추가</button>
		</div>
	</div>
</div>
<div class="admin-section p-10 d-flex gap-10 align-items-center influencer-filter">
	<button class="btn btn-outline-light" type="button">
		<span>전체</span>
		<span class="text-primary">0 / 0</span>
	</button>
	<?php  
	$type_arr = ["Seed","Starter","Newbie","Active","Core","Lead","Prime"];
	foreach ($type_arr as $key => $value) { 
		 $isActive   = rand(1, 5) === 1 ? 'active' : '';
    	$isDisabled = rand(1, 10) <= 3 ? 'disabled' : '';
	?>
		<button class="btn btn-outline-light <?= $isActive ?>" type="button" <?= $isDisabled ?>>
			<span><?= $value ?></span>
			<span class="text-primary">0 / 0</span>
		</button>
	<?php
	}
	?>
	<button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#add-modal">+ 인원추가</button>
</div>
<div class="admin-section mb-12">
	<div class="custom-table influencer fs-12">
		<div class="table-row table-head table-section">
			<span>인플루언서</span>
			<span>카테고리</span>
			<span>등급</span>
			<span>Fit-Score</span>
			<span>예상 CPV</span>
			<span>팔로워 수</span>
			<span>2차활용 동의</span>
			<span class="text-center">캠페인 진행 선정</span>
		</div>
		<div class="table-body">
		<?php  
		for ($i=0; $i < 10; $i++) { ?>
			<div class="table-section influencer-item">
				<div class="table-row">
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
					<div class="d-flex align-items-center column-gap-2">
						<span class="badge text-bg-warning">뷰티</span>
						<span class="badge text-bg-info">푸드</span>
					</div>
					<div class="d-flex gap-05 align-items-center">
						<svg width="8" height="8"><use href="#icon-leaf"></use></svg>
						<span>Seed</span>
					</div>
					<div class="d-flex align-items-center">80%</div>
					<div class="d-flex align-items-center">120</div>
					<div class="d-flex align-items-center">1.9만</div>
					<div class="d-flex align-items-center">동의</div>
					<div class="d-flex align-items-center justify-content-center">
						<div class="form-check">
					  	<input class="form-check-input" type="checkbox" value="">
						</div>
					</div>
				</div>
				<?php  
				if($i == 0){ ?>
				<div class="influencer-detail">
					<div class="flex-shrink-0" style="width: 23%;">
						<div class="image">
							<img src="<?= IMAGES_URL ?>/demo/product-1.png" alt="">
							<img src="<?= IMAGES_URL ?>/demo/product-2.png" alt="">
							<img src="<?= IMAGES_URL ?>/demo/product-3.png" alt="">
							<img src="<?= IMAGES_URL ?>/demo/product-4.png" alt="">
						</div>
					</div>				
					<div class="content w-100">
						<div class="box d-flex gap-15">
							<?php  
							$arr = [
								["예상 평균 도달 수","156,938명"],
								["평균 동영상 조회 수","938,212회"],
								["평균 좋아요 수","400개"],
								["평균 댓글 수","400개"],
								["참여율 (ER)","0.23%"]
							];
							foreach ($arr as $value) { ?>
								<div class="item w-100 fs-14 d-flex flex-column justify-content-between">
									<div class="d-flex align-items-center gap-05">
										<span><?= $value[0] ?></span>
										<button class="btn p-0 border-0" type="button">
											<svg width="13" height="13"><use href="#icon-i"></use></svg>
										</button>
									</div>
									<span class="fw-semibold"><?= $value[1] ?></span>
								</div>
							<?php
							}
							?>
						</div>			
						<div class="char-row d-flex" style="column-gap:20px">
							<div class="gender-age-chart flex-shrink-0">
						    <div class="chart-header">
						        <span class="fw-semibold">팔로워 성별 및 연령대 비율</span>
						        <svg width="13" height="13"><use href="#icon-i"></use></svg>
						        <div class="legend">
						            <span class="male"></span> 남성
						            <span class="female"></span> 여성
						        </div>
						    </div>
						    <div class="chart-body">
						        <div class="chart-item">
						            <div class="bars">
						                <div class="bar-wrap">
						                    <div class="bar male" style="height:10%"></div>
						                </div>
						                <div class="bar-wrap">
						                    <div class="bar female" style="height:30%"></div>
						                </div>
						            </div>
						            <div class="label">~17</div>
						        </div>
						        <div class="chart-item">
						            <div class="bars">
						                <div class="bar-wrap">
						                    <div class="bar male" style="height:40%"></div>
						                </div>
						                <div class="bar-wrap">
						                    <div class="bar female" style="height:20%"></div>
						                </div>
						            </div>
						            <div class="label">17~25</div>
						        </div>
						        <div class="chart-item">
						            <div class="bars">
						                <div class="bar-wrap">
						                    <div class="bar male" style="height:40%"></div>
						                </div>
						                <div class="bar-wrap">
						                    <div class="bar female" style="height:55%"></div>
						                </div>
						            </div>
						            <div class="label">25~35</div>
						        </div>
						        <div class="chart-item">
						            <div class="bars">
						                <div class="bar-wrap">
						                    <div class="bar male" style="height:10%"></div>
						                </div>
						                <div class="bar-wrap">
						                    <div class="bar female" style="height:30%"></div>
						                </div>
						            </div>
						            <div class="label">~35~45</div>
						        </div>
						        <div class="chart-item">
						            <div class="bars">
						                <div class="bar-wrap">
						                    <div class="bar male" style="height:40%"></div>
						                </div>
						                <div class="bar-wrap">
						                    <div class="bar female" style="height:35%"></div>
						                </div>
						            </div>
						            <div class="label">45~55</div>
						        </div>
						        <div class="chart-item">
						            <div class="bars">
						                <div class="bar-wrap">
						                    <div class="bar male" style="height:32%"></div>
						                </div>
						                <div class="bar-wrap">
						                    <div class="bar female" style="height:42%"></div>
						                </div>
						            </div>
						            <div class="label">55~</div>
						        </div>
						    </div>
							</div>
							<div class="d-flex flex-column w-100" style="row-gap:10px">
								<span class="fw-semibold">자기 소개 및 강점 </span>
								<div>팔로워와 진솔하게 소통하며 직접 써보고 느낀 점을 솔직하게 전달합니다. 광고성 문구보다는 진짜 사용 후기를 중심으로 콘텐츠를 제작합니다.</div>
							</div>
						</div>			
						
					</div>
				</div>
				<?php
				}
				?>
			</div>
		<?php
		}
		?>			
		</div>
	</div>
</div>
<div class="modal fade admin-modal" id="add-modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<div class="modal-body text-center">
    		<strong class="fw-semibold fs-18 mb-3 d-block">인원 추가 </strong>
    		<table class="table table-borderless mb-0">
    			<thead>
    				<tr>					      
    					<th scope="col">등급</th>
    					<th scope="col">현재인원</th>
    					<th scope="col">추가인원</th>
    					<th scope="col">총인원</th>
    				</tr>
    			</thead>
    			<tbody>
    			<?php  
    			foreach ($type_arr as $key => $value) { ?>
    				<tr>					      
    					<td><?= $value ?></td>
    					<td>1</td>
    					<td class="d-flex justify-content-center">
    						<input class="numberstyle" type="number" min="1" step="1" max="6" name="" placeholder="0" readonly>
    					</td>
    					<td class="text-primary">1</td>
    				</tr>
    			<?php
    			}
    			?>    				
    			</tbody>
    		</table>
    	</div>
    	<div class="modal-footer">
    		<button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">취소</button>
    		<button type="button" class="btn btn-primary" disabled>확인</button>
    	</div>
    </div>
  </div>
</div>
<div class="d-none">
<svg id="icon-blue-star" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.01515 1.28734L8.85648 1.06512C8.19173 0.134544 6.80873 0.134544 6.14398 1.06512L5.98532 1.28734C5.63433 1.77867 5.0451 2.04177 4.44501 1.97509L3.73749 1.89648C2.67597 1.77853 1.77902 2.67548 1.89697 3.737L1.97557 4.44452C2.04226 5.04461 1.77916 5.63384 1.28783 5.98483L1.06561 6.14349C0.135032 6.80824 0.135032 8.19124 1.06561 8.85599L1.28783 9.01466C1.77916 9.36566 2.04226 9.95491 1.97557 10.555L1.89697 11.2625C1.77902 12.324 2.67597 13.221 3.73749 13.103L4.44501 13.0244C5.0451 12.9577 5.63433 13.2208 5.98532 13.7122L6.14398 13.9343C6.80873 14.8649 8.19173 14.8649 8.85648 13.9343L9.01515 13.7122C9.36615 13.2208 9.9554 12.9577 10.5555 13.0244L11.263 13.103C12.3245 13.221 13.2215 12.324 13.1035 11.2625L13.0249 10.555C12.9582 9.95491 13.2213 9.36566 13.7127 9.01466L13.9348 8.85599C14.8654 8.19124 14.8654 6.80824 13.9348 6.14349L13.7127 5.98483C13.2213 5.63384 12.9582 5.04461 13.0249 4.44452L13.1035 3.737C13.2215 2.67548 12.3245 1.77853 11.263 1.89648L10.5555 1.97509C9.9554 2.04177 9.36615 1.77867 9.01515 1.28734Z" fill="#3B6FFF"/>
<path d="M5 7.66667L6.51575 9.18242C6.59908 9.26575 6.73425 9.26575 6.81758 9.18242L10 6" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
<svg id="icon-leaf" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_157_24990)">
<path d="M7.20405 0.72702C5.17635 -0.18573 2.88114 0.0555046 1.40572 1.53104C-0.0144497 2.95116 -0.2907 5.13038 0.504207 7.09954C0.366832 7.2345 0.2403 7.35966 0.129628 7.47038L0.460691 7.80144C0.571363 7.69071 0.696503 7.56424 0.831488 7.4268C2.8006 8.22177 4.97982 7.94546 6.39992 6.52535C7.87546 5.04982 8.1168 2.75463 7.20405 0.72702Z" fill="#75A874"/>
<path d="M0.272899 7.98926C0.256524 8.00555 0.260931 8.00121 0.272899 7.98926V7.98926Z" fill="#5AA25A"/>
<path d="M0.331102 7.93066C0.318477 7.94329 0.308586 7.95312 0.299805 7.96195C0.315961 7.94587 0.331102 7.93066 0.331102 7.93066Z" fill="#5AA25A"/>
<path d="M0.290141 7.97168C0.284 7.97782 0.278187 7.98363 0.273438 7.98845C0.277562 7.9843 0.283375 7.97851 0.290141 7.97168Z" fill="#5AA25A"/>
<path d="M1.40564 1.34061C-0.070016 2.81614 -0.31125 5.11134 0.601609 7.13893L7.20395 0.53659C5.17627 -0.37616 2.88106 -0.134925 1.40564 1.34061Z" fill="#79C17A"/>
<path d="M6.39978 6.33446C4.92425 7.80999 2.62905 8.05134 0.601562 7.13848L7.20391 0.536133C8.11667 2.56373 7.87533 4.85893 6.39978 6.33446Z" fill="#67B765"/>
<path d="M0.331062 7.74034C0.380562 7.70928 0.380563 7.70928 0.460438 7.61095C2.04961 6.02167 6.38191 1.42445 6.52548 1.21484C6.31577 1.35831 1.71855 5.69072 0.129391 7.27989C0.037875 7.37139 0 7.40916 0 7.40916L0.331062 7.74034Z" fill="#5AA25A"/>
<path d="M4.1724 3.69263C4.1724 3.69263 4.1724 3.69263 4.1724 3.54715C4.1724 2.89274 4.04692 1.05407 4.01576 0.981445C3.98437 1.05407 3.859 2.89274 3.859 3.54715C3.85889 3.69263 3.85889 3.69263 3.85889 3.69263H4.1724Z" fill="#5AA25A"/>
<path d="M2.50738 5.35766C2.50738 5.35766 2.50738 5.35766 2.50738 5.21219C2.50738 4.55777 2.38191 2.71911 2.35061 2.64648C2.31922 2.71909 2.19385 4.55788 2.19385 5.21219C2.19385 5.35766 2.19385 5.35766 2.19385 5.35766H2.50738Z" fill="#5AA25A"/>
<path d="M4.0752 3.5957C4.0752 3.5957 4.0752 3.5957 4.22066 3.5957C4.87507 3.5957 6.71374 3.72106 6.78637 3.75247C6.71374 3.78386 4.87507 3.90923 4.22066 3.90923C4.0752 3.90923 4.0752 3.90923 4.0752 3.90923V3.5957Z" fill="#5AA25A"/>
<path d="M2.41016 5.26074C2.41016 5.26074 2.41016 5.26074 2.55564 5.26074C3.20994 5.26074 5.04872 5.38623 5.12134 5.41751C5.04872 5.44891 3.20994 5.57427 2.55564 5.57427C2.41016 5.57438 2.41016 5.57438 2.41016 5.57438V5.26074Z" fill="#5AA25A"/>
</g>
<defs>
<clipPath id="clip0_157_24990">
<rect width="8" height="8" fill="white"/>
</clipPath>
</defs>
</svg>
<svg id="icon-i" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_797_23167)">
<path d="M6.49968 1.08301C5.42836 1.08301 4.3811 1.40069 3.49034 1.99588C2.59957 2.59107 1.9053 3.43704 1.49533 4.42681C1.08535 5.41657 0.978087 6.50568 1.18709 7.55641C1.39609 8.60714 1.91198 9.5723 2.66952 10.3298C3.42705 11.0874 4.39221 11.6033 5.44294 11.8123C6.49367 12.0213 7.58278 11.914 8.57255 11.504C9.56231 11.094 10.4083 10.3998 11.0035 9.50901C11.5987 8.61825 11.9163 7.57099 11.9163 6.49967C11.9163 5.78835 11.7762 5.08399 11.504 4.42681C11.2318 3.76963 10.8328 3.1725 10.3298 2.66951C9.82685 2.16653 9.22973 1.76754 8.57255 1.49533C7.91537 1.22311 7.211 1.08301 6.49968 1.08301ZM7.04134 8.66634C7.04134 8.81 6.98428 8.94778 6.88269 9.04936C6.78111 9.15094 6.64334 9.20801 6.49968 9.20801C6.35602 9.20801 6.21824 9.15094 6.11666 9.04936C6.01508 8.94778 5.95801 8.81 5.95801 8.66634V5.95801C5.95801 5.81435 6.01508 5.67657 6.11666 5.57499C6.21824 5.47341 6.35602 5.41634 6.49968 5.41634C6.64334 5.41634 6.78111 5.47341 6.88269 5.57499C6.98428 5.67657 7.04134 5.81435 7.04134 5.95801V8.66634ZM6.49968 4.87467C6.39255 4.87467 6.28782 4.84291 6.19874 4.78339C6.10967 4.72387 6.04024 4.63927 5.99924 4.54029C5.95824 4.44132 5.94752 4.33241 5.96842 4.22733C5.98932 4.12226 6.04091 4.02575 6.11666 3.94999C6.19241 3.87424 6.28893 3.82265 6.394 3.80175C6.49908 3.78085 6.60799 3.79158 6.70696 3.83257C6.80594 3.87357 6.89054 3.943 6.95006 4.03207C7.00958 4.12115 7.04134 4.22588 7.04134 4.33301C7.04134 4.47667 6.98428 4.61444 6.88269 4.71602C6.78111 4.81761 6.64334 4.87467 6.49968 4.87467Z" fill="#69696B"/>
</g>
<defs>
<clipPath id="clip0_797_23167">
<rect width="13" height="13" fill="white"/>
</clipPath>
</defs>
</svg>

</div>