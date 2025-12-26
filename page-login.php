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

<div class="container-fluid d-flex auth-wp p-lg-0">
	<div class="w-100 left d-none d-lg-flex align-items-center justify-content-center position-relative">
		<p class="mb-0 text-black fs-14 fw-semibold">크리스 서비스에 대한 셀링 크레딧 및 서비스소개 스크롤로 제공 →모든 작업 마무리 후</p>
		<a href="#" id="downloadBrochure">
			<img width="24" height="24" src="<?= IMAGES_URL; ?>/icons/document-white.svg" alt="Document White Icon">
			<span>서비스 소개서 다운로드</span>
		</a>
	</div>
	<div class="w-100 right d-flex align-items-center justify-content-center">
		<div class="content-box text-center w-mb-100">
			<img src="<?= IMAGES_URL; ?>/logo.svg" alt="" class="mb-3">
			<span class="fs-18 fw-semibold text-primary d-block mb-32">로그인</span>
			<form id="loginForm" class="form-data text-start" method="post">
				<div class="form-floating-custom mb-3">
				    <label class="required form-label">이메일</label>
				    <input type="email" class="form-control" name="email" placeholder="이메일을 입력해주세요." required>
					<div class="invalid-feedback">이메일을 입력해주세요</div>
				</div>
				<div class="mb-32">
					<div class="form-floating-custom password-div">
					    <label class="required form-label">비밀번호</label>
					    <div class="d-flex">
					  	    <input type="password" class="form-control" name="password" placeholder="비밀번호를 입력해주세요." required>
                            <button class="btn p-0 border-0 lh-1" type="button">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0007 5.41667C11.5329 5.41157 13.0355 5.83899 14.3358 6.64977C15.636 7.46056 16.681 8.6218 17.3507 10C15.9757 12.8083 13.1673 14.5833 10.0007 14.5833C6.83398 14.5833 4.02565 12.8083 2.65065 10C3.32033 8.6218 4.36535 7.46056 5.66555 6.64977C6.96576 5.83899 8.46837 5.41157 10.0007 5.41667ZM10.0007 3.75C5.83398 3.75 2.27565 6.34167 0.833984 10C2.27565 13.6583 5.83398 16.25 10.0007 16.25C14.1673 16.25 17.7257 13.6583 19.1673 10C17.7257 6.34167 14.1673 3.75 10.0007 3.75ZM10.0007 7.91667C10.5532 7.91667 11.0831 8.13616 11.4738 8.52686C11.8645 8.91756 12.084 9.44747 12.084 10C12.084 10.5525 11.8645 11.0824 11.4738 11.4731C11.0831 11.8638 10.5532 12.0833 10.0007 12.0833C9.44812 12.0833 8.91821 11.8638 8.52751 11.4731C8.13681 11.0824 7.91732 10.5525 7.91732 10C7.91732 9.44747 8.13681 8.91756 8.52751 8.52686C8.91821 8.13616 9.44812 7.91667 10.0007 7.91667ZM10.0007 6.25C7.93398 6.25 6.25065 7.93333 6.25065 10C6.25065 12.0667 7.93398 13.75 10.0007 13.75C12.0673 13.75 13.7507 12.0667 13.7507 10C13.7507 7.93333 12.0673 6.25 10.0007 6.25Z" fill="#373739"/>
                                </svg>
                            </button>
					    </div>
					</div>
				</div>			
				<ul class="list-unstyled list-url d-flex align-items-center column-gap-2 justify-content-center mb-32">
					<li><a href="?action=register">회원가입</a></li>
					<li class="dot"></li>
					<li><a href="#">이메일 찾기</a></li>
					<li class="dot"></li>
					<li><a href="#">비밀번호 찾기</a></li>
				</ul>
				<button class="btn btn-lg btn-dark w-100" type="submit">로그인</button>
				<?php wp_nonce_field('action_nonce', 'user_login_nonce'); ?>
				<input type="hidden" name="action" value="user_login">
			</form>
		</div>
	</div>
</div>

<?php get_template_part('template-parts/modals/alert-modal'); ?>

<?php wp_footer(); ?>
</body>
</html>