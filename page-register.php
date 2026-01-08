<?php 
	// Nếu người dùng đã đăng nhập, chuyển hướng họ đến trang chủ
	if ( is_user_logged_in() ) {
		wp_redirect( home_url() );
		exit;
	}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=no">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class('page-auth page-register'); ?>>

<div class="auth-header-mobile">
    <div class="header-mobile-title">회원가입</div>
    <button type="button" class="btn-header-mobile btn-back">
        <img width="24" height="24" src="<?= IMAGES_URL; ?>/icons/chev-back.svg" alt="Arrow Left Icon">
    </button>
</div>

<div class="container-fluid d-flex auth-wp p-0">
	<div class="w-100 left d-none d-lg-flex align-items-center justify-content-center position-sticky vh-100 top-0 start-0">
		<div>
			<p class="intro-text">크리스 서비스에 대한 셀링 크레딧 및 서비스소개 스크롤로 제공 → 모든 작업 마무리 후</p>
			<a href="#" id="downloadBrochure">
				<img width="24" height="24" src="<?= IMAGES_URL; ?>/icons/document-white.svg" alt="Document White Icon">
				<span>서비스 소개서 다운로드</span>
			</a>
		</div>
	</div>
	<div class="w-100 right d-flex align-items-lg-center justify-content-center">
		<div id="registerFormWrap" class="content-box">
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
			<h1 class="headline step-title text-black d-none d-lg-block">로그인</h1>
			<form id="registerForm" class="register-form" method="post">
				<fieldset id="step1" class="form-fieldset">
					<div class="row g-3">
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required" for="email">이메일 (로그인용 ID)</label>
								<input type="text" class="field-control" id="email" name="email" autocomplete="off" placeholder="" required>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required" for="password">비밀번호</label>
								<div class="d-flex align-items-center gap-2">
									<input type="password" class="field-control flex-grow-1" id="password" name="password" autocomplete="new-password" placeholder="영문, 숫자 조합 6자리 이상" required>
									<button type="button" class="btn-icon-input btn-show-password flex-shrink-0">
										<span class="icon hide-password"></span>
									</button>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required" for="confirm_password">비밀번호 확인</label>
								<div class="d-flex align-items-center gap-2">
									<input type="password" class="field-control flex-grow-1" id="confirm_password" name="confirm_password" autocomplete="new-password" placeholder="" required>
									<button type="button" class="btn-icon-input btn-show-password flex-shrink-0">
										<span class="icon hide-password"></span>
									</button>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required" for="nickname">닉네임</label>
								<input type="text" class="field-control" id="nickname" name="nickname" placeholder="" required>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required" for="full_name">이름</label>
								<input type="text" class="field-control" id="full_name" name="full_name" placeholder="" required>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required" for="phone_number">핸드폰번호</label>
								<input type="tel" inputmode="numeric" class="field-control" id="phone_number" name="phone_number" maxlength="13" autocomplete="off" placeholder="" required>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group field-datepicker">
								<label class="field-label required" for="birth_date">생년월일</label>
								<div class="d-flex align-items-center gap-2">
									<input type="text" class="field-control" id="birth_date" name="birth_date" autocomplete="off" placeholder="" readonly required>
									<button type="button" class="btn-icon-input btn-select-date flex-shrink-0">
										<img width="20" height="20" src="<?= IMAGES_URL; ?>/icons/calendar.svg" alt="Calendar Icon">
									</button>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label" for="referral_code">추천인 코드</label>
								<input type="text" class="field-control" id="referral_code" name="referral_code" autocomplete="off" placeholder="">
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
					<div class="btn-mobi-fixed-bottom">
						<button type="button" class="btn-submit btn-next-step" disabled>다음</button>
					</div>
				</fieldset>
				<fieldset id="step2" class="form-fieldset d-none">
					<div class="btn-mobi-fixed-bottom">
						<button type="button" class="btn-submit btn-next-step" disabled>다음</button>
					</div>
				</fieldset>
				<fieldset id="step3" class="form-fieldset d-none">
					<div class="row g-3">
						<div class="col-12">
							<div class="channel-item" data-channel="youtube">
								<div class="connect-box">
									<img width="30" height="30" src="<?= IMAGES_URL; ?>/youtube.svg" class="channel-icon" alt="YouTube Icon">
									<div class="channel-name">YouTube</div>
									<button type="button" class="btn-channel-connect">
										<img width="19" height="13" src="<?= IMAGES_URL; ?>/icons/linked.svg" alt="Linked Icon">
									</button>
								</div>
								<input type="hidden" name="connected_channels[youtube][categories]" value="">
								<input type="hidden" name="connected_channels[youtube][other_category]" value="">
								<input type="hidden" name="connected_channels[youtube][styles]" value="">
								<input type="hidden" name="connected_channels[youtube][other_style]" value="">
							</div>
						</div>
						<div class="col-12">
							<div class="channel-item" data-channel="instagram">
								<div class="connect-box">
									<img width="30" height="31" src="<?= IMAGES_URL; ?>/instagram.svg" class="channel-icon" alt="Instagram Icon">
									<div class="channel-name">Instagram</div>
									<button type="button" class="btn-channel-connect">
										<img width="19" height="13" src="<?= IMAGES_URL; ?>/icons/linked.svg" alt="Linked Icon">
									</button>
								</div>
								<input type="hidden" name="connected_channels[instagram][categories]" value="">
								<input type="hidden" name="connected_channels[instagram][other_category]" value="">
								<input type="hidden" name="connected_channels[instagram][styles]" value="">
								<input type="hidden" name="connected_channels[instagram][other_style]" value="">
							</div>
						</div>
						<div class="col-12">
							<div class="channel-item" data-channel="tiktok">
								<div class="connect-box">
									<img width="30" height="30" src="<?= IMAGES_URL; ?>/tiktok.svg" class="channel-icon" alt="TikTok Icon">
									<div class="channel-name">TikTok</div>
									<button type="button" class="btn-channel-connect">
										<img width="19" height="13" src="<?= IMAGES_URL; ?>/icons/linked.svg" alt="Linked Icon">
									</button>
								</div>
								<input type="hidden" name="connected_channels[tiktok][categories]" value="">
								<input type="hidden" name="connected_channels[tiktok][other_category]" value="">
								<input type="hidden" name="connected_channels[tiktok][styles]" value="">
								<input type="hidden" name="connected_channels[tiktok][other_style]" value="">
							</div>
						</div>
					</div>
					<div class="btn-mobi-fixed-bottom">
						<button type="button" class="btn-submit btn-next-step" disabled>다음</button>
					</div>
				</fieldset>
				<fieldset id="step4" class="form-fieldset d-none">
					<div class="field-group border-0 p-0 rounded-0 d-flex align-items-center gap-2">
						<div class="group-label flex-grow-1">환전주체</div>
						<label for="exchange_entity_individual" class="radio-box flex-shrink-0">
							<input type="radio" name="exchange_entity" id="exchange_entity_individual" value="individual" checked>
							<span class="radio-label">개인</span>
						</label>
						<label for="exchange_entity_business" class="radio-box flex-shrink-0">
							<input type="radio" name="exchange_entity" id="exchange_entity_business" value="business">
							<span class="radio-label">사업자</span>
						</label>
					</div>
					<div class="notice-wrap my-3">
						<p class="mb-2">
							관계법령(전자상거래법 및 정보통신망법)에 따라<br/>
							요금정산을 위해 계좌정보를 수집하며<br/>
							수집된 계좌정보는 안전하게 보관됩니다.
						</p>
						<p class="mb-0">
							또한 크레딧 적립 완료를 위해서<br/>
							주민등록번호 인증이 필요합니다.
						</p>
					</div>
					<div class="group-label mb-3">계좌정보</div>
					<div class="row g-3">
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required" for="bank_id">입금은행</label>
								<select class="field-select" id="bank_id" name="bank_id" required>
									<option value="" disabled selected></option>
									<option value="1">OO은행</option>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required" for="account_number">계좌번호</label>
								<input type="text" inputmode="numeric" class="field-control" id="account_number" name="account_number" autocomplete="off" placeholder="" required>
							</div>
						</div>
						<div class="col-12">
							<div class="field-group">
								<label class="field-label required" for="account_holder">예금주</label>
								<input type="text" class="field-control" id="account_holder" name="account_holder" autocomplete="off" placeholder="" required>
							</div>
						</div>
						<div class="col-12">
							<div class="file-wrap d-flex align-items-center gap-3">
								<div class="group-label flex-shrink-0 required">신분증 사본</div>
								<div class="field-group flex-grow-1 p-0 border-0">
									<input type="text" id="id_card_file_display" class="field-control text-end" placeholder="파일을 선택해주세요" readonly required>
								</div>
								<input type="file" id="id_card_file" name="id_card_file" accept=".jpg,.jpeg,.png,.heic,.webp,.pdf" hidden required>
								<label for="id_card_file" class="btn-upload-file flex-shrink-0">파일 선택</label>
							</div>
						</div>
						<div class="col-12">
							<div class="file-wrap d-flex align-items-center gap-3">
								<div class="group-label flex-shrink-0 required">통장 사본</div>
								<div class="field-group flex-grow-1 p-0 border-0">
									<input type="text" id="bankbook_file_display" class="field-control text-end" placeholder="파일을 선택해주세요" readonly required>
								</div>
								<input type="file" id="bankbook_file" name="bankbook_file" accept=".jpg,.jpeg,.png,.heic,.webp,.pdf" hidden required>
								<label for="bankbook_file" class="btn-upload-file flex-shrink-0">파일 선택</label>
							</div>
						</div>
					</div>
					<div id="tax-info-wrap" class="d-flex align-items-center gap-3 mt-3 d-none">
						<div class="group-label flex-grow-1">세금계산서 발행 정보</div>
						<button type="button" class="btn-tax-info flex-shrink-0" data-bs-toggle="modal" data-bs-target="#tax-info-modal">
							<img width="16" height="16" src="<?= IMAGES_URL; ?>/icons/file-white.svg" alt="File Icon">
							<span>정보 확인</span>
						</button>
					</div>
					<div class="btn-mobi-fixed-bottom">
						<button type="button" class="btn-submit btn-next-step" disabled>확인</button>
					</div>
				</fieldset>
				<?php wp_nonce_field('user_register_nonce', 'action_nonce'); ?>
			</form>
		</div>
		<div id="successWrap" class="content-box d-none">
			<div class="d-flex h-100 flex-column align-items-center justify-content-center">
				<img width="96" height="28" src="<?= IMAGES_URL; ?>/logo.svg" alt="Logo" class="d-block img-fluid mx-auto mb-3">
				<h1 class="headline text-black">성공적으로 가입이 완료되었습니다.</h1>
				<p class="subhead">
					3시간 내로 계정 분석 완료될 예정입니다.<br/>
					계정 분석 후 등급 선정이 완료되면 알림이 발송됩니다.
				</p>
				<div class="btn-mobi-fixed-bottom">
					<a type="button" class="btn-submit" href="<?php echo esc_url(home_url('')); ?>">홈으로 이동</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_template_part('template-parts/modals/alert-modal'); ?>
<?php get_template_part('template-parts/modals/privacy-policy-modal'); ?>
<?php get_template_part('template-parts/modals/terms-conditions-modal'); ?>
<?php get_template_part('template-parts/modals/channel-category-modal'); ?>
<?php get_template_part('template-parts/modals/channel-style-modal'); ?>
<?php get_template_part('template-parts/modals/tax-info-modal'); ?>

<?php wp_footer(); ?>
</body>
</html>