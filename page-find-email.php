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
<body <?php body_class('page-find-email'); ?>>

<?php if(wp_is_mobile()) { ?>
    <div class="header-mobile">
        <div class="header-mobile-title">이메일 찾기</div>
        <button type="button" class="btn-header-mobile btn-back" onclick="window.history.back();">
            <img width="24" height="24" src="<?= IMAGES_URL; ?>/icons/chev-back.svg" alt="Arrow Left Icon">
        </button>
    </div>
<?php } ?>

<div class="container-fluid d-flex auth-wp p-0">
    <div class="w-100 right d-flex align-items-lg-center justify-content-center">
		<div id="findEmailFormWrap" class="content-box">
            <h1 class="headline text-black d-none d-lg-block">이메일 찾기</h1>
            <form id="findEmailForm" class="find-email-form" method="post">
                <div class="row g-3">
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
                </div>
                <div class="btn-mobi-fixed-bottom">
                    <button type="submit" class="btn-submit" disabled>다음</button>
                </div>
				<?php wp_nonce_field('user_find_email_nonce', 'action_nonce'); ?>
				<input type="hidden" name="action" value="user_find_email">
            </form>
        </div>
        <div id="successWrap" class="content-box d-none">
			<img width="96" height="28" src="<?= IMAGES_URL; ?>/logo.svg" alt="Logo" class="d-block img-fluid mx-auto mb-3">
			<h1 class="headline text-black">이메일 찾기가 완료되었습니다.</h1>
			<div class="result-text">
                <div>가입 이메일</div>
				<div id="foundEmail">influe***@gmail.com</div>
			</div>
            <div class="btn-mobi-fixed-bottom">
			    <a type="button" class="btn-submit" href="<?php echo esc_url(home_url('/login')); ?>">로그인으로 이동</a>
            </div>
		</div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>