<?php 
    $uid = isset($_GET['uid']) ? absint($_GET['uid']) : 0;
    $token = isset($_GET['token']) ? sanitize_text_field($_GET['token']) : '';
    $token_data = $uid ? get_user_meta($uid, 'reset_password_token', true) : null; // Lấy token từ user meta

	// Nếu đã đăng nhập hoặc thiếu uid/token thì chuyển hướng về trang chủ
	if ( 
        is_user_logged_in() || empty($uid) || empty($token) || !$token_data || 
        !is_array($token_data) || $token_data['token'] !== $token || $token_data['expires'] < time()
    ) {
		wp_redirect( home_url() );
		exit;
	}

    $user = get_user_by('ID', $uid);
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
    <div class="header-mobile-title">비밀번호 재설정</div>
    <button type="button" class="btn-header-mobile btn-back" onclick="window.history.back();">
        <img width="24" height="24" src="<?= IMAGES_URL; ?>/icons/chev-back.svg" alt="Arrow Left Icon">
    </button>
</div>

<div class="container-fluid d-flex auth-wp p-0">
    <div class="w-100 right d-flex align-items-center justify-content-center">
		<div id="resetPasswordFormWrap" class="content-box">
            <img width="96" height="28" src="<?= IMAGES_URL; ?>/logo.svg" alt="Logo" class="d-block img-fluid mx-auto mb-3">
            <h1 class="headline text-black">비밀번호를 재설정해주세요</h1>
            <form id="resetPasswordForm" class="reset-password-form" method="post">
                <div class="row g-3">
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
                </div>
                <div class="btn-mobi-fixed-bottom">
                    <button type="submit" class="btn-submit" disabled>확인</button>
                </div>
				<?php wp_nonce_field('user_reset_password_nonce', 'action_nonce'); ?>
				<input type="hidden" name="action" value="user_reset_password">
                <input type="hidden" name="uid" value="<?php echo esc_attr($uid); ?>">
                <input type="hidden" name="token" value="<?php echo esc_attr($token); ?>">
            </form>
        </div>
        <div id="successWrap" class="content-box d-none">
            <div class="d-flex h-100 flex-column align-items-center justify-content-center">
                <img width="96" height="28" src="<?= IMAGES_URL; ?>/logo.svg" alt="Logo" class="d-block img-fluid mx-auto mb-3">
                <h1 class="headline text-black">비밀번호 재설정이 완료되었습니다.</h1>
                <p class="subhead">새 비밀번호로 다시 로그인해주세요.</p>
                <div class="btn-mobi-fixed-bottom">
                    <a type="button" class="btn-submit" href="<?php echo esc_url(home_url('/login')); ?>">로그인으로 이동</a>
                </div>
            </div>
		</div>
    </div>
</div>

<?php get_template_part('template-parts/modals/alert-modal'); ?>

<?php wp_footer(); ?>
</body>
</html>