<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=no">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php get_template_part('template-parts/components/header-back'); ?>

<div class="container-fluid d-flex auth-wp p-0">
	<div class="w-100 left d-none d-lg-flex align-items-center justify-content-center position-relative">
		<p class="intro-text">크리스 서비스에 대한 셀링 크레딧 및 서비스소개 스크롤로 제공 → 모든 작업 마무리 후</p>
		<a href="#" id="downloadBrochure">
			<img width="24" height="24" src="<?= IMAGES_URL; ?>/icons/document-white.svg" alt="Document White Icon">
			<span>서비스 소개서 다운로드</span>
		</a>
	</div>
	<div class="w-100 right d-flex align-items-center justify-content-center">
		<div class="content-box">
			<div class="progess-bar">
				<div class="progress-step active" data-title="로그인">
					<span class="step-line">
						<span class="step-dot"></span>
					</span>
					<span class="step-label">정보 입력</span>
				</div>
				<div class="progress-step" data-title="본인인증">
					<span class="step-line">
						<span class="step-dot"></span>
					</span>
					<span class="step-label">본인인증</span>
				</div>
				<div class="progress-step" data-title="채널 유형 선택 및 연동">
					<span class="step-line">
						<span class="step-dot"></span>
					</span>
					<span class="step-label">채널 연동</span>
				</div>
				<div class="progress-step" data-title="환전 계좌 정보 관리">
					<span class="step-line">
						<span class="step-dot"></span>
					</span>
					<span class="step-label">계좌정보</span>
				</div>
				<div class="progress-step" data-title="가입완료">
					<span class="step-line">
						<span class="step-dot"></span>
					</span>
					<span class="step-label">가입완료</span>
				</div>
			</div>
			<h1 class="headline step-title text-black">로그인</h1>
			<form id="registerForm" class="register-form" method="post">
				<fieldset id="step1" class="form-fieldset d-none">
					<div class="row g-3">
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required">이메일 (로그인용 ID)</label>
								<input type="text" class="field-control" name="email" autocomplete="off" placeholder="" required>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required">비밀번호</label>
								<div class="d-flex align-items-center gap-2">
									<input type="password" class="field-control flex-grow-1" name="password" autocomplete="new-password" placeholder="영문, 숫자 조합 6자리 이상" required>
									<button type="button" class="btn-icon-input btn-show-password flex-shrink-0">
										<span class="icon hide-password"></span>
									</button>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required">비밀번호 확인</label>
								<div class="d-flex align-items-center gap-2">
									<input type="password" class="field-control flex-grow-1" name="confirm_password" autocomplete="new-password" placeholder="" required>
									<button type="button" class="btn-icon-input btn-show-password flex-shrink-0">
										<span class="icon hide-password"></span>
									</button>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required">닉네임</label>
								<input type="text" class="field-control" name="nickname" placeholder="" required>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required">이름</label>
								<input type="text" class="field-control" name="full_name" placeholder="" required>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required">핸드폰번호</label>
								<input type="tel" inputmode="numeric" class="field-control" name="phone_number" maxlength="13" autocomplete="off" placeholder="" required>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group field-datepicker">
								<label class="field-label required">생년월일</label>
								<div class="d-flex align-items-center gap-2">
									<input type="text" class="field-control" name="birth_date" autocomplete="off" placeholder="" readonly required>
									<button type="button" class="btn-icon-input btn-select-date flex-shrink-0">
										<img width="20" height="20" src="<?= IMAGES_URL; ?>/icons/calendar.svg" alt="Calendar Icon">
									</button>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label">추천인 코드</label>
								<input type="text" class="field-control" name="referral_code" autocomplete="off" placeholder="">
							</div>
						</div>
						<div class="col-12">
							<div class="field-check">
								<input class="field-check-input readonly-check" type="checkbox" value="1" id="agree_privacy" name="agree_privacy" required>
								<label class="field-check-label" for="agree_privacy">
									개인정보 처리방침에 동의합니다.
								</label>
								<button type="button" class="field-check-link" data-bs-toggle="modal" data-bs-target="#privacy-policy-modal">
									<img width="16" height="16" src="<?= IMAGES_URL; ?>/icons/chev-right.svg" alt="Chev Right Icon">
								</button>
							</div>
						</div>
						<div class="col-12">
							<div class="field-check">
								<input class="field-check-input readonly-check" type="checkbox" value="1" id="agree_terms" name="agree_terms" required>
								<label class="field-check-label" for="agree_terms">
									서비스 이용약관에 동의합니다.
								</label>
								<button type="button" class="field-check-link" data-bs-toggle="modal" data-bs-target="#terms-conditions-modal">
									<img width="16" height="16" src="<?= IMAGES_URL; ?>/icons/chev-right.svg" alt="Chev Right Icon">
								</button>
							</div>
						</div>
					</div>
					<button type="button" class="btn-submit btn-next-step" disabled>다음</button>
				</fieldset>
				<fieldset id="step2" class="form-fieldset d-none">
					<button type="button" class="btn-submit btn-next-step" disabled>다음</button>
				</fieldset>
				<fieldset id="step3" class="form-fieldset">
					<div class="row g-3">
						<div class="col-12">
							<div class="channel-item">
								<div class="connect-box">
									<img width="30" height="30" src="<?= IMAGES_URL; ?>/youtube.svg" class="channel-icon" alt="YouTube Icon">
									<div class="channel-name">YouTube</div>
									<button type="button" class="btn-channel-connect" data-bs-toggle="modal" data-bs-target="#select">
										<img width="19" height="13" src="<?= IMAGES_URL; ?>/icons/linked.svg" alt="Linked Icon">
									</button>
								</div>
								<input type="hidden" name="connected_channels[youtube][categories]" value="">
								<input type="hidden" name="connected_channels[youtube][styles]" value="">
							</div>
						</div>
						<div class="col-12">
							<div class="channel-item">
								<div class="connect-box">
									<img width="30" height="31" src="<?= IMAGES_URL; ?>/instagram.svg" class="channel-icon" alt="Instagram Icon">
									<div class="channel-name">Instagram</div>
									<button type="button" class="btn-channel-connect">
										<img width="19" height="13" src="<?= IMAGES_URL; ?>/icons/linked.svg" alt="Linked Icon">
									</button>
								</div>
								<input type="hidden" name="connected_channels[instagram][categories]" value="">
								<input type="hidden" name="connected_channels[instagram][styles]" value="">
							</div>
						</div>
						<div class="col-12">
							<div class="channel-item">
								<div class="connect-box">
									<img width="30" height="30" src="<?= IMAGES_URL; ?>/tiktok.svg" class="channel-icon" alt="TikTok Icon">
									<div class="channel-name">TikTok</div>
									<button type="button" class="btn-channel-connect">
										<img width="19" height="13" src="<?= IMAGES_URL; ?>/icons/linked.svg" alt="Linked Icon">
									</button>
								</div>
								<input type="hidden" name="connected_channels[tiktok][categories]" value="">
								<input type="hidden" name="connected_channels[tiktok][styles]" value="">
							</div>
						</div>
					</div>
					<button type="button" class="btn-submit btn-next-step" disabled>다음</button>
				</fieldset>
				<?php wp_nonce_field('user_register_nonce', 'action_nonce'); ?>
				<input type="hidden" name="action" value="user_register">
			</form>
		</div>
	</div>
</div>

<?php get_template_part('template-parts/modals/privacy-policy-modal'); ?>
<?php get_template_part('template-parts/modals/terms-conditions-modal'); ?>

<?php wp_footer(); ?>
</body>
</html>