<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=no">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<style>
	.message p{margin-bottom: 30px;font-size: 12px;letter-spacing: -0.01em}
</style>
<div class="container-fluid d-flex auth-wp p-lg-0">
	<div class="w-100 left d-none d-lg-flex align-items-center justify-content-center position-relative">
		<svg width="310" height="102" viewBox="0 0 310 102" fill="none" xmlns="http://www.w3.org/2000/svg">
		<g filter="url(#filter0_d_2010_49080)">
		<path d="M122.315 12C133.764 12.0001 143.049 21.2475 143.049 32.6504C143.049 42.2448 136.475 50.3111 127.57 52.6289L146 81.999H129.42L111.344 53.2998H104.253V82H90.1963V12H122.315ZM205.023 24.5996H172.707V40.7002H203.751V53.2998H172.707V68H204.861L206.443 82H158.65V12H206.443L205.023 24.5996ZM258.449 12C277.854 12.0003 293.59 27.6732 293.59 47H279.533C279.533 35.4012 270.095 26.0003 258.449 26C246.803 26 237.364 35.933 237.364 47C237.364 58.0669 245.966 67.1314 256.867 67.9365L258.449 82C239.044 82 223.308 66.327 223.308 47C223.308 27.673 239.037 12 258.449 12ZM272.291 45.4248C272.256 45.9428 272.228 46.468 272.228 47C272.228 58.5989 281.667 67.9999 293.312 68V82C273.908 81.9999 258.171 66.3269 258.171 47L272.291 45.4248ZM26.2939 22.248C40.0202 8.58406 62.272 8.58409 75.9912 22.248L66.0537 32.1465C57.8166 23.9425 44.4696 23.9425 36.2324 32.1465C27.9956 40.3505 28.375 54.0207 36.2324 61.8467C44.09 69.6727 56.6004 70.023 64.8867 62.918L75.9912 71.7451C62.265 85.416 40.0201 85.4161 26.2939 71.7451C12.568 58.0742 12.568 35.919 26.2939 22.248ZM104.253 40.7002H122.315C126.771 40.7001 130.397 37.0881 130.397 32.6504C130.397 28.2125 126.771 24.5997 122.315 24.5996H104.253V40.7002Z" fill="white"/>
		</g>
		<defs>
		<filter id="filter0_d_2010_49080" x="0" y="0" width="309.594" height="102" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
		<feFlood flood-opacity="0" result="BackgroundImageFix"/>
		<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
		<feOffset dy="4"/>
		<feGaussianBlur stdDeviation="8"/>
		<feComposite in2="hardAlpha" operator="out"/>
		<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
		<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2010_49080"/>
		<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2010_49080" result="shape"/>
		</filter>
		</defs>
		</svg>

	</div>
	<div class="w-100 right d-flex align-items-center justify-content-center">
		<div class="content-box text-center" style="width: 500px;max-width: 100%;">
			<span class="fw-semibold text-primary d-block mb-2" style="font-size: 30px;line-height: 40px;">ADMIN</span>
			<span class="fw-semibold fs-18 d-block" style="margin-bottom:30px;">LOG IN</span>
			<form class=" text-start" method="post">
				<div class="mb-3 d-flex column-gap-1 align-items-center">
					<label class="form-label flex-shrink-0 fs-14" style="width: 140px;">이메일</label>
    				<input type="email" class="form-control" placeholder="이메일 입력">
				</div>			
				<div class="d-flex column-gap-1 align-items-center" style="margin-bottom:30px;">
					<label class="form-label flex-shrink-0 fs-14" style="width: 140px;">비밀번호</label>
					<div class="input-group">
					  	<input type="password" class="form-control border-end-0" placeholder="비밀번호 입력">
					  	<button class="btn lh-1 input-group-text" type="button">
		                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
		                        <path d="M10.0007 5.41667C11.5329 5.41157 13.0355 5.83899 14.3358 6.64977C15.636 7.46056 16.681 8.6218 17.3507 10C15.9757 12.8083 13.1673 14.5833 10.0007 14.5833C6.83398 14.5833 4.02565 12.8083 2.65065 10C3.32033 8.6218 4.36535 7.46056 5.66555 6.64977C6.96576 5.83899 8.46837 5.41157 10.0007 5.41667ZM10.0007 3.75C5.83398 3.75 2.27565 6.34167 0.833984 10C2.27565 13.6583 5.83398 16.25 10.0007 16.25C14.1673 16.25 17.7257 13.6583 19.1673 10C17.7257 6.34167 14.1673 3.75 10.0007 3.75ZM10.0007 7.91667C10.5532 7.91667 11.0831 8.13616 11.4738 8.52686C11.8645 8.91756 12.084 9.44747 12.084 10C12.084 10.5525 11.8645 11.0824 11.4738 11.4731C11.0831 11.8638 10.5532 12.0833 10.0007 12.0833C9.44812 12.0833 8.91821 11.8638 8.52751 11.4731C8.13681 11.0824 7.91732 10.5525 7.91732 10C7.91732 9.44747 8.13681 8.91756 8.52751 8.52686C8.91821 8.13616 9.44812 7.91667 10.0007 7.91667ZM10.0007 6.25C7.93398 6.25 6.25065 7.93333 6.25065 10C6.25065 12.0667 7.93398 13.75 10.0007 13.75C12.0673 13.75 13.7507 12.0667 13.7507 10C13.7507 7.93333 12.0673 6.25 10.0007 6.25Z" fill="#373739"/>
		                    </svg>
	                	</button>
					</div>   				
				</div>
				<div class="message">
					<p class="text-danger">아이디 혹은 비밀번호를 다시 확인해주세요.</p>
				</div>	
				<button class="btn btn-primary w-100 rounded-3" type="submit">로그인</button>
			</form>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>