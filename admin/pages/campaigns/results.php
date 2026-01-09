<?php get_admin_header(); ?>

<style>
	.camp-nav {
        margin-bottom: 0
    }
</style>

<?php get_admin_part("layouts/topbar", "", ["title" => "캠페인 관리"]); ?>
<?php get_admin_part("components/campaigns/campaign-header"); ?>
<?php get_admin_part("components/campaigns/campaign-navbar"); ?>

<div class="admin-section bg-white" style="border-bottom: 2px solid #DFE5EF">
	<div class="d-flex align-items-center justify-content-between p-10 px-0">
		<div class="d-flex align-items-center gap-15">
			<button class="btn btn-primary" type="button" disabled>데이터 다운로드</button>
			<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#confirm-download-modal">미디어 다운로드</button>			
		</div>
		<div class="d-flex gap-15 justify-content-end align-items-center">
			<div class="input-group">
				<select class="form-select max-content flex-grow-0" name="">
					<option>기간 전체</option>
				</select>
			  	<input type="text" class="form-control" placeholder="2025.01.01~2025.01.30">
			</div>
			<div class="input-group" style="max-width:196px">
			  	<span class="input-group-text bg-white pe-0">
				  	<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.2918 17.1458L11.0418 11.9167C10.6252 12.2639 10.146 12.5347 9.60433 12.7292C9.06266 12.9236 8.50711 13.0208 7.93766 13.0208C6.50711 13.0208 5.29877 12.5278 4.31266 11.5417C3.32655 10.5556 2.8335 9.34722 2.8335 7.91667C2.8335 6.5 3.32655 5.295 4.31266 4.30167C5.29877 3.30889 6.50711 2.8125 7.93766 2.8125C9.35433 2.8125 10.5557 3.30556 11.5418 4.29167C12.5279 5.27778 13.021 6.48611 13.021 7.91667C13.021 8.51389 12.9238 9.08333 12.7293 9.625C12.5349 10.1667 12.271 10.6389 11.9377 11.0417L17.1668 16.2708L16.2918 17.1458ZM7.93766 11.7708C9.00711 11.7708 9.9135 11.3958 10.6568 10.6458C11.3996 9.89583 11.771 8.98611 11.771 7.91667C11.771 6.84722 11.3996 5.9375 10.6568 5.1875C9.9135 4.4375 9.00711 4.0625 7.93766 4.0625C6.85433 4.0625 5.94127 4.4375 5.1985 5.1875C4.45516 5.9375 4.0835 6.84722 4.0835 7.91667C4.0835 8.98611 4.45516 9.89583 5.1985 10.6458C5.94127 11.3958 6.85433 11.7708 7.93766 11.7708Z" fill="#373739"></path>
					</svg>
			  	</span>
			  	<input type="text" class="form-control border-start-0" placeholder="캠페인명으로 검색">
			</div>
		</div>
	</div>
</div>
<div class="admin-section bg-white p-15 mb-12">
	<div class="chart-wp campaign resutls d-flex column-gap-3">
		<div class="chart-card w-100">
	        <div class="fs-12 fw-semibold mb-2 text-dark">일별 데이터 추이</div>
	        <div class="d-flex align-items-center justify-content-center text-dark fs-10 gap-10">
	        	<div class="d-flex align-items-center gap-05">
	        		<svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="10" cy="5.5" r="2.5" fill="#24A768" stroke="#24A768" stroke-width="2"/>
					<line x1="4.37114e-08" y1="5.5" x2="20" y2="5.5" stroke="#24A768"/>
					</svg>
					<span>도달</span>
	        	</div>
	        	<div class="d-flex align-items-center gap-05">
	        		<svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="10" cy="5.5" r="2.5" fill="#FE9742" stroke="#FE9742" stroke-width="2"/>
					<line x1="4.37114e-08" y1="5.5" x2="20" y2="5.5" stroke="#FE9742"/>
					</svg>
					<span>조회</span>
	        	</div>
	        </div>
	        <canvas id="dailyChart" class="w-100" style="height: 175px;"></canvas>
	    </div>
	    <div class="right flex-shrink-0" style="width: 532px;">
	    	<div class="stats w-100">
	    		<?php  
	    		$arr = [
	    			['width="15" height="15"',"평균 좋아요 수","1,323,000"],
	    			['width="15" height="15"',"평균 도달 수","31,233,004"],
	    			['width="13" height="15"',"평균 공유 수","63,263"],
	    			['width="15" height="15"',"평균 댓글 수","6,621"],
	    			['width="11" height="15"',"평균 저장 수","1,520"],
	    			['width="15" height="15"',"평균 참여율","21%"]
	    		];
	    		foreach ($arr as $key => $value) { ?>
	    			<div class="bg-gray rounded-3 p-15 fs-14 fw-semibold">
			            <div class="d-flex align-items-center mb-2 column-gap-2">
			            	<svg <?= $value[0] ?>><use href="#icon-stat-<?= $key ?>"></use></svg>
			            	<span><?= $value[1] ?></span>
			            </div>
			            <div class="text-end fs-18"><?= $value[2] ?></div>
			        </div>
	    		<?php
	    		}
	    		?>
		        
		    </div>
	    </div>	    
	</div>
</div>
<div class="admin-section mb-12 table-responsive">
	<table class="table align-middle custom-table">
	  <thead>
	    <tr>
		    <th style="width: 20px;">
		    	<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				</div>
		    </th>
		    <th>인플루언서/콘텐츠</th>
			<th style="width: 95px;">도달수</th>
			<th style="width: 95px;">좋아요</th>
			<th style="width: 95px;">공유 수</th>
			<th style="width: 95px;">댓글수</th>
			<th style="width: 95px;">저장 수</th>
			<th style="width: 95px;">참여율</th>
			<th style="width: 95px;">노출수(조회)</th>
			<th style="width: 95px;" class="text-center">성과 점수</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<tr>
	  		<td class="align-top">
	  			<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				</div>
	  		</td>
	  		<td>
	  			<div class="user d-flex align-items-center gap-15 mb-15">
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
				</div>
				<div class="d-flex flex-column gap-10">
					<div class="d-flex gap-1 flex-wrap">
						<?php  
						for ($i=0; $i < 10; $i++) { ?>
							<img class="object-fit-cover rounded-1" src="<?= IMAGES_URL ?>/demo/product-2.png" alt="" style="width:60px;height: 60px;">
						<?php
						}
						?>
					</div>
					<div>
						온라인으로 스페셜 크리에이터 밋업까지 참여완료오✌🏻 오프라인 밋업에 함께하지 못해 조금 아쉬웠지만, 온라인으로라도 프로그램 전반을 알 수 있어서 뜻깊은 시간이었어요😌 앞으로 어떤 활동들이 이어질지 더 궁금해지고, 기대...
					</div>
					<strong>#오늘의집 #스페셜크리에이터 #스페셜오프닝밋업</strong>
				</div>
	  		</td>
	  		<td>33,000</td>
	  		<td>33,000</td>
	  		<td>33,000</td>
	  		<td>33,000</td>
	  		<td>33,000</td>
	  		<td>21%</td>
	  		<td>33,000</td>
	  		<td class="text-center">87점</td>
	  	</tr>
	  </tbody>
	</table>
</div>

<div class="d-none">
	<svg id="icon-stat-0" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M10.9091 1.25C9.47727 1.25 8.21591 1.97917 7.5 3.125C6.78409 1.97917 5.52273 1.25 4.09091 1.25C1.84091 1.25 0 3.125 0 5.41667C0 9.54861 7.5 13.75 7.5 13.75C7.5 13.75 15 9.58333 15 5.41667C15 3.125 13.1591 1.25 10.9091 1.25Z" fill="#FF383C"/>
	</svg>
	<svg id="icon-stat-1" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<g clip-path="url(#clip0_292_30203)">
	<path d="M0.988352 13.5111C0.746547 13.5177 0.528516 13.4642 0.346762 13.3366C0.114325 13.1734 0.0044578 12.9174 0.0024263 12.6218L0.00438518 7.12958C-0.0212723 6.83681 0.0654904 6.56822 0.269167 6.36881C0.460193 6.18179 0.709984 6.09278 0.974573 6.09892H2.61307C3.28696 5.88257 3.91316 5.58712 4.4928 5.21228C5.2785 4.7042 5.8572 3.97569 6.07862 3.31764C6.1548 3.09126 6.19491 2.9043 6.27178 2.46295C6.37479 1.87149 6.43962 1.59604 6.58764 1.24232C6.89601 0.505426 7.29869 0.14546 7.8551 0.0248437C8.40274 -0.0938703 9.19997 0.221844 9.70447 0.779966C10.2631 1.39798 10.5095 2.17119 10.4184 3.12673C10.3792 3.5375 10.2653 3.99761 10.078 4.50953C10.7267 4.41608 11.3714 4.40196 12.0114 4.4675C13.5167 4.62168 14.3614 5.60187 14.2381 6.84047C14.185 7.37467 13.9911 7.82831 13.6622 8.18457C13.9386 8.71827 14.0487 9.24499 13.9799 9.75937C13.9007 10.3518 13.5704 10.8455 13.0212 11.2288C12.9788 11.7487 12.8593 12.1632 12.6481 12.4745C12.4723 12.7337 12.2587 12.9432 12.0098 13.0993C11.9288 13.6127 11.7582 14.0136 11.4806 14.2959C11.0191 14.7652 10.1945 15.045 9.44175 14.9941C8.72735 14.9457 8.30426 14.8588 7.30669 14.5441C6.64838 14.3365 5.28661 13.9909 3.23349 13.5113L0.988352 13.5111ZM2.26462 6.88764C2.26462 6.60538 2.49256 6.37656 2.77373 6.37656C3.05491 6.37656 3.28285 6.60538 3.28285 6.88764V12.6464C3.28285 12.9287 3.05491 13.1575 2.77373 13.1575C2.49256 13.1575 2.26462 12.9287 2.26462 12.6464V6.88764Z" fill="#FFBF00"/>
	</g>
	<defs>
	<clipPath id="clip0_292_30203">
	<rect width="15" height="15" fill="white"/>
	</clipPath>
	</defs>
	</svg>
	<svg id="icon-stat-2" width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path fill-rule="evenodd" clip-rule="evenodd" d="M7.87877 2.5C7.87877 1.11929 9.02521 0 10.4394 0C11.8536 0 13 1.11929 13 2.5C13 3.88071 11.8536 5 10.4394 5C9.7253 5 9.07997 4.71447 8.61602 4.2551L5.0713 6.62213C5.10403 6.78188 5.12123 6.94687 5.12123 7.1154C5.12123 7.44915 5.05394 7.7682 4.93204 8.0598L8.81882 10.5644C9.25998 10.2121 9.82441 9.99998 10.4394 9.99998C11.8536 9.99998 13 11.1193 13 12.5C13 13.8807 11.8536 15 10.4394 15C9.02521 15 7.87877 13.8807 7.87877 12.5C7.87877 12.1384 7.95768 11.7941 8.09953 11.4833L4.24417 8.99903C3.79444 9.38235 3.20534 9.61538 2.5606 9.61538C1.14642 9.61538 0 8.49607 0 7.1154C0 5.73467 1.14642 4.61539 2.5606 4.61539C3.37381 4.61539 4.0977 4.98544 4.5664 5.56139L8.00181 3.26731C7.92189 3.02519 7.87877 2.7672 7.87877 2.5Z" fill="#705CFF"/>
	</svg>
	<svg id="icon-stat-3" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 7.5C10.7325 7.5 10.3125 7.08 10.3125 6.5625C10.3125 6.045 10.7325 5.625 11.25 5.625C11.7675 5.625 12.1875 6.045 12.1875 6.5625C12.1875 7.08 11.7675 7.5 11.25 7.5ZM7.5 7.5C6.9825 7.5 6.5625 7.08 6.5625 6.5625C6.5625 6.045 6.9825 5.625 7.5 5.625C8.0175 5.625 8.4375 6.045 8.4375 6.5625C8.4375 7.08 8.0175 7.5 7.5 7.5ZM3.75 7.5C3.2325 7.5 2.8125 7.08 2.8125 6.5625C2.8125 6.045 3.2325 5.625 3.75 5.625C4.2675 5.625 4.6875 6.045 4.6875 6.5625C4.6875 7.08 4.2675 7.5 3.75 7.5ZM7.5 0C3.35812 0 0 2.93859 0 6.5625C0 8.63391 1.09922 10.4784 2.8125 11.6808V15L6.09797 13.0064C6.55266 13.0814 7.02047 13.125 7.5 13.125C11.6419 13.125 15 10.1869 15 6.5625C15 2.93859 11.6419 0 7.5 0Z" fill="#006FFF"/>
	</svg>
	<svg id="icon-stat-4" width="11" height="15" viewBox="0 0 11 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.79979L0.785714 0H10.2143L11 0.79979V15L5.5 11.6824L0 15V0.79979ZM1.57143 1.59958V12.1928L5.5 9.82302L9.42857 12.1928V6.89621V1.59958H1.57143Z" fill="#373739"/>
	</svg>
	<svg id="icon-stat-5" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<g clip-path="url(#clip0_292_30232)">
	<path fill-rule="evenodd" clip-rule="evenodd" d="M15 14.375C15 14.5408 14.9342 14.6997 14.8169 14.8169C14.6997 14.9342 14.5408 15 14.375 15H0.625C0.45924 15 0.300269 14.9342 0.183058 14.8169C0.065848 14.6997 0 14.5408 0 14.375V0.625C0 0.45924 0.065848 0.300269 0.183058 0.183058C0.300269 0.065848 0.45924 0 0.625 0C0.79076 0 0.949732 0.065848 1.06694 0.183058C1.18415 0.300269 1.25 0.45924 1.25 0.625V13.75H14.375C14.5408 13.75 14.6997 13.8158 14.8169 13.9331C14.9342 14.0503 15 14.2092 15 14.375Z" fill="#028B0B"/>
	<path fill-rule="evenodd" clip-rule="evenodd" d="M14.7501 1.125L13.1126 2.35563C13.123 2.40491 13.1272 2.4553 13.1251 2.50562C13.1241 2.83684 12.9921 3.15421 12.7579 3.38842C12.5237 3.62262 12.2063 3.75464 11.8751 3.75562C11.8481 3.75682 11.8211 3.75493 11.7945 3.75L11.1445 4.72437L10.4945 5.69875C10.582 5.86938 10.6264 6.05875 10.6251 6.25C10.6248 6.568 10.503 6.87387 10.2846 7.10498C10.0661 7.33609 9.76759 7.47494 9.45011 7.49312L8.54386 9.30562C8.65092 9.4681 8.71857 9.65332 8.74143 9.84654C8.76429 10.0398 8.74173 10.2357 8.67554 10.4186C8.60935 10.6016 8.50137 10.7666 8.36018 10.9005C8.21899 11.0343 8.04849 11.1334 7.86226 11.1898C7.67604 11.2462 7.47922 11.2583 7.28748 11.2252C7.09575 11.1921 6.91438 11.1147 6.75783 10.9992C6.60127 10.8836 6.47385 10.7331 6.38571 10.5597C6.29757 10.3862 6.25113 10.1946 6.25011 10V9.98125L4.98136 9.22C4.87073 9.2825 4.75011 9.3275 4.62511 9.35125L3.71886 12.075C3.67693 12.1991 3.59705 12.307 3.4905 12.3832C3.38396 12.4595 3.25614 12.5003 3.12511 12.5C3.05737 12.4983 2.99014 12.4878 2.92511 12.4688C2.76854 12.4147 2.6395 12.3012 2.56584 12.1528C2.49218 12.0044 2.4798 11.833 2.53136 11.6756L3.43761 8.95187C3.30383 8.80019 3.20886 8.61831 3.16085 8.42184C3.11283 8.22538 3.1132 8.0202 3.16193 7.82391C3.21066 7.62762 3.30629 7.44608 3.44062 7.29488C3.57494 7.14368 3.74395 7.02733 3.93313 6.95582C4.12231 6.88431 4.32602 6.85977 4.52678 6.88431C4.72753 6.90885 4.91933 6.98174 5.08572 7.09671C5.25211 7.21169 5.38811 7.36532 5.48206 7.54442C5.57601 7.72353 5.6251 7.92275 5.62511 8.125V8.14375L6.89386 8.90562C7.05636 8.81375 7.23886 8.76188 7.42511 8.75562L8.33136 6.94313C8.20791 6.75438 8.13766 6.53584 8.12801 6.31052C8.11836 6.0852 8.16966 5.86145 8.27652 5.66284C8.38337 5.46424 8.54181 5.29813 8.73516 5.18202C8.9285 5.06592 9.14958 5.00412 9.37511 5.00313C9.40234 5.00209 9.4296 5.00419 9.45636 5.00938L10.1064 4.035L10.757 3.0625C10.6435 2.83393 10.6027 2.5761 10.6401 2.32366C10.6774 2.07121 10.7911 1.83625 10.966 1.65035C11.1408 1.46444 11.3683 1.33649 11.618 1.28369C11.8676 1.23089 12.1275 1.25578 12.3626 1.355L14.0001 0.125C14.0658 0.0757543 14.1405 0.0399237 14.22 0.019554C14.2995 -0.00081578 14.3822 -0.00532574 14.4635 0.00628158C14.5447 0.0178889 14.6229 0.0453862 14.6935 0.0872035C14.7642 0.129021 14.8259 0.184339 14.8751 0.25C14.9244 0.315661 14.9602 0.390379 14.9806 0.469887C15.0009 0.549395 15.0054 0.632137 14.9938 0.713388C14.9822 0.79464 14.9547 0.872809 14.9129 0.943434C14.8711 1.01406 14.8158 1.07575 14.7501 1.125Z" fill="#028B0B"/>
	</g>
	<defs>
	<clipPath id="clip0_292_30232">
	<rect width="15" height="15" fill="white"/>
	</clipPath>
	</defs>
	</svg>
	<svg id="icon-blue-star" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M9.01515 1.28734L8.85648 1.06512C8.19173 0.134544 6.80873 0.134544 6.14398 1.06512L5.98532 1.28734C5.63433 1.77867 5.0451 2.04177 4.44501 1.97509L3.73749 1.89648C2.67597 1.77853 1.77902 2.67548 1.89697 3.737L1.97557 4.44452C2.04226 5.04461 1.77916 5.63384 1.28783 5.98483L1.06561 6.14349C0.135032 6.80824 0.135032 8.19124 1.06561 8.85599L1.28783 9.01466C1.77916 9.36566 2.04226 9.95491 1.97557 10.555L1.89697 11.2625C1.77902 12.324 2.67597 13.221 3.73749 13.103L4.44501 13.0244C5.0451 12.9577 5.63433 13.2208 5.98532 13.7122L6.14398 13.9343C6.80873 14.8649 8.19173 14.8649 8.85648 13.9343L9.01515 13.7122C9.36615 13.2208 9.9554 12.9577 10.5555 13.0244L11.263 13.103C12.3245 13.221 13.2215 12.324 13.1035 11.2625L13.0249 10.555C12.9582 9.95491 13.2213 9.36566 13.7127 9.01466L13.9348 8.85599C14.8654 8.19124 14.8654 6.80824 13.9348 6.14349L13.7127 5.98483C13.2213 5.63384 12.9582 5.04461 13.0249 4.44452L13.1035 3.737C13.2215 2.67548 12.3245 1.77853 11.263 1.89648L10.5555 1.97509C9.9554 2.04177 9.36615 1.77867 9.01515 1.28734Z" fill="#3B6FFF"/>
	<path d="M5 7.66667L6.51575 9.18242C6.59908 9.26575 6.73425 9.26575 6.81758 9.18242L10 6" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>
</div>
<div class="modal fade admin-modal" id="confirm-download-modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<div class="modal-body text-center">
    		<strong class="fw-semibold fs-18 d-block">2개의 데이터를 다운로드 하시겠어요?</strong>
    	</div>
    	<div class="modal-footer">
    		<button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">취소</button>
    		<button type="button" class="btn btn-primary">확인</button>
    	</div>
    </div>
  </div>
</div>
<script>
	jQuery(document).ready(function($) {
		const ctx = document.getElementById('dailyChart');

		// Dữ liệu cho mỗi ngày và mỗi dataset
		const tooltipData = {
			'1/1': {
				'도달': { likes: '1,323,000', reach: '31,233,004', share: '63,263', comment: '6,621', save: '1,520', engagement: '21%' },
				'조회': { likes: '1,200,000', reach: '28,500,000', share: '60,000', comment: '6,200', save: '1,450', engagement: '19%' }
			},
			'1/2': {
				'도달': { likes: '1,250,000', reach: '30,100,000', share: '60,000', comment: '6,400', save: '1,450', engagement: '20%' },
				'조회': { likes: '1,100,000', reach: '27,000,000', share: '55,000', comment: '6,000', save: '1,350', engagement: '18%' }
			},
			'1/3': {
				'도달': { likes: '1,400,000', reach: '32,000,000', share: '65,000', comment: '6,800', save: '1,600', engagement: '22%' },
				'조회': { likes: '1,300,000', reach: '29,500,000', share: '62,000', comment: '6,500', save: '1,550', engagement: '20.5%' }
			},
			'1/4': {
				'도달': { likes: '1,380,000', reach: '31,800,000', share: '64,500', comment: '6,750', save: '1,580', engagement: '21.5%' },
				'조회': { likes: '1,280,000', reach: '29,200,000', share: '61,000', comment: '6,450', save: '1,520', engagement: '20%' }
			},
			'1/5': {
				'도달': { likes: '1,100,000', reach: '28,500,000', share: '58,000', comment: '6,200', save: '1,400', engagement: '19%' },
				'조회': { likes: '980,000', reach: '25,500,000', share: '52,000', comment: '5,800', save: '1,280', engagement: '17%' }
			},
			'1/6': {
				'도달': { likes: '1,350,000', reach: '31,500,000', share: '63,500', comment: '6,650', save: '1,550', engagement: '21.2%' },
				'조회': { likes: '1,250,000', reach: '28,800,000', share: '60,500', comment: '6,350', save: '1,480', engagement: '19.5%' }
			},
			'1/7': {
				'도달': { likes: '1,150,000', reach: '29,000,000', share: '59,000', comment: '6,300', save: '1,420', engagement: '19.5%' },
				'조회': { likes: '1,050,000', reach: '26,500,000', share: '54,000', comment: '5,950', save: '1,320', engagement: '17.8%' }
			},
			'1/8': {
				'도달': { likes: '1,390,000', reach: '31,900,000', share: '64,800', comment: '6,780', save: '1,590', engagement: '21.8%' },
				'조회': { likes: '1,290,000', reach: '29,300,000', share: '61,500', comment: '6,480', save: '1,530', engagement: '20.2%' }
			},
			'1/9': {
				'도달': { likes: '1,180,000', reach: '29,500,000', share: '60,500', comment: '6,450', save: '1,480', engagement: '20.2%' },
				'조회': { likes: '1,080,000', reach: '27,000,000', share: '56,000', comment: '6,050', save: '1,380', engagement: '18.5%' }
			},
			'1/10': {
				'도달': { likes: '1,500,000', reach: '33,000,000', share: '67,000', comment: '7,000', save: '1,650', engagement: '23%' },
				'조회': { likes: '1,400,000', reach: '30,500,000', share: '63,500', comment: '6,700', save: '1,580', engagement: '21%' }
			}
		};

		new Chart(ctx, {
		    type: 'line',
		    data: {
		        labels: ['1/1','1/2','1/3','1/4','1/5','1/6','1/7','1/8','1/9','1/10'],
		        datasets: [
		            {
		                label: '도달',
		                data: [900, 1000, 950, 940, 700, 950, 700, 960, 720, 1000],
		                borderColor: '#24A768',
		                backgroundColor: '#24A768',
		                borderWidth: 2,
		                tension: 0,
		                pointRadius: 6
		            },
		            {
		                label: '조회',
		                data: [780, 650, 770, 780, 580, 770, 560, 780, 570, 630],
		                borderColor: '#FE9742',
		                backgroundColor: '#FE9742',
		                borderWidth: 2,
		                tension: 0,
		                pointRadius: 6
		            }
		        ]
		    },
		    options: {
		        responsive: true,
		        plugins: {
		            tooltip: {
		                enabled: false,
		                external: function(context) {
		                    // Tooltip Element
		                    let tooltipEl = document.getElementById('chartjs-tooltip');

		                    // Create element on first render
		                    if (!tooltipEl) {
		                        tooltipEl = document.createElement('div');
		                        tooltipEl.id = 'chartjs-tooltip';
		                        tooltipEl.style.background = '#373739';
		                        tooltipEl.style.borderRadius = '5px';
		                        tooltipEl.style.color = 'white';
		                        tooltipEl.style.opacity = 1;
		                        tooltipEl.style.pointerEvents = 'none';
		                        tooltipEl.style.position = 'absolute';
		                        tooltipEl.style.transform = 'translate(-50%, 0)';
		                        tooltipEl.style.transition = 'all .1s ease';
		                        tooltipEl.style.padding = '10px';
		                        tooltipEl.style.fontSize = '8px';
		                        tooltipEl.style.minWidth = '115px';
		                        tooltipEl.style.zIndex = '1000';
		                        document.body.appendChild(tooltipEl);
		                    }

		                    // Hide if no tooltip
		                    const tooltipModel = context.tooltip;
		                    if (tooltipModel.opacity === 0) {
		                        tooltipEl.style.opacity = 0;
		                        return;
		                    }

		                    // Set Text
		                    if (tooltipModel.body) {
		                        const dataPoints = tooltipModel.dataPoints[0];
		                        const label = dataPoints.label;
		                        const datasetLabel = dataPoints.dataset.label;
		                        const data = tooltipData[label] && tooltipData[label][datasetLabel];

		                        let innerHtml = '';
		                        if (data) {
		                            const items = [
		                                { label: '좋아요 수', value: data.likes },
		                                { label: '도달 수', value: data.reach },
		                                { label: '공유 수', value: data.share },
		                                { label: '댓글 수', value: data.comment },
		                                { label: '저장 수', value: data.save },
		                                { label: '참여율', value: data.engagement }
		                            ];

		                            items.forEach((item, index) => {
		                                const marginBottom = index < items.length - 1 ? 'margin-bottom: 8px;' : '';
		                                innerHtml += '<div style="display: flex; justify-content: space-between; align-items: center; ' + marginBottom + '">';
		                                innerHtml += '<span style="color: #ffffff;">' + item.label + '</span>';
		                                innerHtml += '<span style="font-weight: 600; color: #ffffff;">' + item.value + '</span>';
		                                innerHtml += '</div>';
		                            });
		                        }

		                        tooltipEl.innerHTML = innerHtml;
		                    }

		                    const position = context.chart.canvas.getBoundingClientRect();

		                    // Display, position, and set styles for font
		                    tooltipEl.style.opacity = 1;
		                    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
		                    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
		                }
		            },
		            legend: {
		                display: false
		            }
		        },
		        scales: {
		            y: {
		                beginAtZero: true,
		                grid: {
		                    color: '#D5D5D7'
		                },
		                ticks: {
		                    font: {
		                        size: 10
		                    },
		                    color: '#373739'
		                }
		            },
		            x: {
		                grid: {
		                    display: false
		                },
		                ticks: {
		                    font: {
		                        size: 10
		                    },
		                    color: '#373739'
		                }
		            }
		        }
		    }
		});

}) //end jquery
</script>
<?php get_admin_footer(); ?>