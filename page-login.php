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
<body <?php body_class('page-auth page-login'); ?>>

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
			<img width="96" height="28" src="<?= IMAGES_URL; ?>/logo.svg" alt="Logo" class="d-block img-fluid mx-auto mb-3">
			<h1 class="headline">로그인</h1>
			<form id="loginForm" class="login-form" method="post">
				<div class="row g-3">
					<div class="col-12">
						<div class="field-group">
							<label class="field-label required" for="email">이메일</label>
							<input type="text" class="field-control" id="email" name="email" placeholder="이메일을 입력해주세요." required>
						</div>
					</div>
					<div class="col-12">
						<div class="field-group">
							<label class="field-label required" for="password">비밀번호</label>
							<div class="d-flex align-items-center gap-2">
								<input type="password" class="field-control flex-grow-1" id="password" name="password" placeholder="비밀번호를 입력해주세요." required>
								<button type="button" class="btn-icon-input btn-show-password flex-shrink-0">
									<span class="icon hide-password"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
				<ul class="list-url">
					<li><a href="<?php echo esc_url(home_url('/register')); ?>">회원가입</a></li>
					<li><a href="<?php echo esc_url(home_url('/find-email')); ?>">이메일 찾기</a></li>
					<li><a href="<?php echo esc_url(home_url('/find-password')); ?>">비밀번호 찾기</a></li>
				</ul>
				<button type="submit" class="btn-submit" disabled>로그인</button>
				<?php wp_nonce_field('user_login_nonce', 'action_nonce'); ?>
				<input type="hidden" name="action" value="user_login">
			</form>
		</div>
	</div>
</div>

<?php get_template_part('template-parts/modals/alert-modal'); ?>
<?php get_template_part("template-parts/components/mobile-tab-bottom"); ?>

<?php wp_footer(); ?>
</body>
</html>