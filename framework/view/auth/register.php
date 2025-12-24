<div class="container-fluid d-flex auth-wp">
	<div class="w-100 left d-none d-lg-flex align-items-center justify-content-center position-relative">
		<p class="mb-0 text-black fs-14 fw-semibold">크리스 서비스에 대한 셀링 크레딧 및 서비스소개 스크롤로 제공 →모든 작업 마무리 후</p>
		<div class="position-absolute w-100 bottom-0 d-flex justify-content-center">
			<a href="#" class="btn btn-primary btn-lg btn-custom rounded-3 mb-32 fs-14">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M15 16H9C8.73478 16 8.48043 16.1054 8.29289 16.2929C8.10536 16.4804 8 16.7348 8 17C8 17.2652 8.10536 17.5196 8.29289 17.7071C8.48043 17.8946 8.73478 18 9 18H15C15.2652 18 15.5196 17.8946 15.7071 17.7071C15.8946 17.5196 16 17.2652 16 17C16 16.7348 15.8946 16.4804 15.7071 16.2929C15.5196 16.1054 15.2652 16 15 16Z" fill="white"/>
				<path d="M9 14H12C12.2652 14 12.5196 13.8946 12.7071 13.7071C12.8946 13.5196 13 13.2652 13 13C13 12.7348 12.8946 12.4804 12.7071 12.2929C12.5196 12.1054 12.2652 12 12 12H9C8.73478 12 8.48043 12.1054 8.29289 12.2929C8.10536 12.4804 8 12.7348 8 13C8 13.2652 8.10536 13.5196 8.29289 13.7071C8.48043 13.8946 8.73478 14 9 14Z" fill="white"/>
				<path d="M19.74 8.33018L14.3 2.33018C14.2065 2.22659 14.0924 2.14371 13.9649 2.08688C13.8375 2.03004 13.6995 2.00051 13.56 2.00018H6.56C6.22775 1.99622 5.89797 2.05774 5.5895 2.18124C5.28103 2.30473 4.9999 2.48778 4.76218 2.71993C4.52446 2.95209 4.33479 3.22879 4.20402 3.53425C4.07324 3.8397 4.00392 4.16793 4 4.50018V19.5002C4.00392 19.8324 4.07324 20.1607 4.20402 20.4661C4.33479 20.7716 4.52446 21.0483 4.76218 21.2804C4.9999 21.5126 5.28103 21.6956 5.5895 21.8191C5.89797 21.9426 6.22775 22.0041 6.56 22.0002H17.44C17.7723 22.0041 18.102 21.9426 18.4105 21.8191C18.719 21.6956 19.0001 21.5126 19.2378 21.2804C19.4755 21.0483 19.6652 20.7716 19.796 20.4661C19.9268 20.1607 19.9961 19.8324 20 19.5002V9.00018C19.9994 8.75234 19.9067 8.51358 19.74 8.33018ZM14 5.00018L16.74 8.00018H14.74C14.6353 7.99386 14.5329 7.96674 14.4387 7.92041C14.3446 7.87408 14.2607 7.80947 14.1918 7.73034C14.1229 7.65122 14.0704 7.55916 14.0375 7.45955C14.0046 7.35994 13.9918 7.25477 14 7.15018V5.00018ZM17.44 20.0002H6.56C6.49037 20.0042 6.42063 19.9945 6.35477 19.9715C6.28892 19.9486 6.22824 19.9129 6.17621 19.8664C6.12419 19.82 6.08184 19.7637 6.0516 19.7009C6.02137 19.638 6.00383 19.5698 6 19.5002V4.50018C6.00383 4.43054 6.02137 4.36234 6.0516 4.2995C6.08184 4.23665 6.12419 4.18039 6.17621 4.13394C6.22824 4.08749 6.28892 4.05176 6.35477 4.02881C6.42063 4.00586 6.49037 3.99613 6.56 4.00018H12V7.15018C11.9839 7.8868 12.2598 8.59991 12.7675 9.13385C13.2752 9.6678 13.9735 9.97923 14.71 10.0002H18V19.5002C17.9962 19.5698 17.9786 19.638 17.9484 19.7009C17.9182 19.7637 17.8758 19.82 17.8238 19.8664C17.7718 19.9129 17.7111 19.9486 17.6452 19.9715C17.5794 19.9945 17.5096 20.0042 17.44 20.0002Z" fill="white"/>
				</svg>
				<span>서비스 소개서 다운로드</span>
			</a>
		</div>
	</div>
	<div class="w-100 right d-flex align-items-center justify-content-center">
		<div class="content-box text-center w-mb-100">
			<form class="form-data text-start user-register-form" action="">
				<div class="status-box d-flex">
					<?php  
					foreach (["정보 입력","본인인증","채널 연동","가입완료"] as $key => $value) { 
						$current = $key == 0 ? " current" : "";
					?>
						<div class="item w-100<?= $current ?>">
							<div class="line d-flex"><span></span><span></span></div>
							<div class="dot">
								<span></span>
								<strong><?= $value ?></strong>
							</div>
						</div>
					<?php
					}
					?>
					
				</div>
				<div class="form-step">
					<div class="step-1">
						<div class="mb-32 text-center"><strong class="step-title fs-18">회원가입</strong></div>	
						<?php  
						$arr = [
							["name" => "username","type" => "text","label" => "이메일 (로그인용 ID)", "require" => "required"],
							["name" => "password","type" => "password","label" => "비밀번호", "require" => "required"],
							["name" => "password_c","type" => "password","label" => "비밀번호 확인", "require" => "required"],
							["name" => "nick_name","type" => "text","label" => "닉네임", "require" => "required"],
							["name" => "display_name","type" => "text","label" => "이름", "require" => "required"],
							["name" => "phone","type" => "tel","label" => "핸드폰번호", "require" => "required"],
							["name" => "birthday","type" => "date","label" => "생년월일", "require" => "required"],
							["name" => "referral_code","type" => "text","label" => "추천인 코드", "require" => ""]						
						];
						foreach ($arr as $value) { ?>
							<div class="mb-3">
								<div class="form-floating-custom">
								  <label class="<?= $value["require"] ?> form-label" for="input-<?= $value["name"] ?>"><?= $value["label"] ?></label>
								  <input type="text" class="form-control" id="input-<?= $value["name"] ?>" name="<?= $value["name"] ?>" placeholder="" <?= $value["require"] ?>>
								</div>
							</div>
						<?php
						}
						?>					
						<div class="check-list" style="margin-bottom: 62px;">
							<div class="d-flex align-items-center justify-content-between" data-bs-toggle="modal" data-bs-target="#term-modal" style="margin-bottom:12px;cursor: pointer;">
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" disabled>
								  <label class="form-check-label">개인정보 처리방침에 동의합니다.</label>
								</div>
								<svg  width="16" height="16"><use href="#icon-arrow-right-black"></use></svg>
							</div>
							<div class="d-flex align-items-center justify-content-between" style="cursor: pointer;">
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" readonly>
								  <label class="form-check-label">서비스 이용약관에 동의합니다.</label>
								</div>
								<svg  width="16" height="16"><use href="#icon-arrow-right-black"></use></svg>
							</div>
						</div>
						
					</div>
				</div>			

				<button class="btn btn-lg btn-primary w-100" type="button" disabled>다음</button>
				<input type="hidden" name="action" value="user_register">
			</form>
		</div>
	</div>
</div>


<div class="modal fade pv-modal" id="term-modal" tabindex="-1" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
	  	<div class="modal-body">
	    	<h6 class="modal-title">개인정보 처리방침</h6>
	    	<div class="modal-btn"></div>
	  	</div>
    </div>
  </div>
</div>