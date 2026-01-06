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
<body <?php body_class('page-auth page-find-password'); ?>>

<div class="auth-header-mobile">
    <div class="header-mobile-title">비밀번호 찾기</div>
    <button type="button" class="btn-header-mobile btn-back" onclick="window.history.back();">
        <img width="24" height="24" src="<?= IMAGES_URL; ?>/icons/chev-back.svg" alt="Arrow Left Icon">
    </button>
</div>

<div class="container-fluid d-flex auth-wp p-0">
    <div class="w-100 right d-flex align-items-lg-center justify-content-center">
		<div id="findPasswordFormWrap" class="content-box">
            <h1 class="headline text-black d-none d-lg-block">비밀번호 찾기</h1>
            <form id="findPasswordForm" class="find-password-form" method="post">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="field-group">
                            <label class="field-label required" for="email">이메일 (로그인용 ID)</label>
                            <input type="text" class="field-control" id="email" name="email" autocomplete="off" placeholder="" required>
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
                </div>
                <div class="btn-mobi-fixed-bottom">
                    <button type="submit" class="btn-submit" disabled>다음</button>
                </div>
				<?php wp_nonce_field('user_find_password_nonce', 'action_nonce'); ?>
				<input type="hidden" name="action" value="user_find_password">
            </form>
        </div>
    </div>
</div>

<?php get_template_part('template-parts/modals/alert-modal'); ?>

<?php wp_footer(); ?>
</body>
</html>