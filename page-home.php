<?php 
get_header(); ?>
<header class="header-mobile">
    <img src="<?= IMAGES_URL; ?>/logo.svg" alt="Logo" style="height: 25px;">
    <button class="btn border-0 p-0 open-notif-btn position-relative h-auto active">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.62196 19.4706C7.92609 19.4706 5.75808 19.4706 4.15183 19.4706C3.296 19.4706 2.74042 18.5502 3.12315 17.768L4.10643 15.7584C4.42615 15.1049 4.59259 14.3852 4.59259 13.6546C4.59259 12.7491 4.59259 11.404 4.59259 10.0588C4.59259 7.70588 5.74384 3 11.5001 3C17.2563 3 18.4076 7.70588 18.4076 10.0588C18.4076 11.404 18.4076 12.7491 18.4076 13.6546C18.4076 14.3852 18.574 15.1049 18.8937 15.7584L19.877 17.768C20.2597 18.5502 19.7031 19.4706 18.8473 19.4706H14.3782M8.62196 19.4706C8.62196 21.8235 9.7732 23 11.5001 23C13.2269 23 14.3782 21.8235 14.3782 19.4706M8.62196 19.4706C10.4203 19.4706 14.3782 19.4706 14.3782 19.4706" stroke="#373739" stroke-width="1.5" stroke-linejoin="round"/>
        <path d="M11.7 3V2V1" stroke="#373739" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
</header>
<div class="p-3">
    <p class="mb-0 fs-18 fw-semibold">안녕하세요, <span class="text-primary">홍길동</span>님!</p>
    <p class="fs-14">크리크와 함께 더 많은 기회를 만들어보세요.</p>
    <div class="bg-primary p-15 rounded-3 gap-12 text-white d-flex flex-column home-box-1">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex flex-column fw-semibold">
                <span class="fs-12">이번달 수익</span>
                <p class="mb-0"><span class="fs-18">0</span> <span class="fs-13">원</span></p>
            </div>
            <button class="btn btn-outline-primary border-0 fs-12" data-bs-toggle="modal" data-bs-target="#pv-alert-modal">환전 신청</button>
        </div>
        <hr class="m-0">
        <div class="d-flex align-items-center gap-32 fs-12">
            <div class="w-100 d-flex align-items-center justify-content-between">
                <span>기본급</span>
                <span class="fw-semibold">0원</span>
            </div>
            <div class="w-100 d-flex align-items-center justify-content-between">
                <span>성과급</span>
                <span class="fw-semibold">0원</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-10 action-btn-box">
            <button class="btn border-0" type="button">
                <svg width="19" height="16"><use href="#icon-link"></use></svg>
                <div class="icon"><img src="<?= IMAGES_URL; ?>/icons/youtube-2.svg" alt=""></div>
            </button>
            <button class="btn border-0" type="button">
                <span>Seed</span>
                <div class="icon"><img src="<?= IMAGES_URL; ?>/icons/instagram.svg" alt=""></div>
            </button>
            <button class="btn border-0" type="button">
                <svg width="19" height="16"><use href="#icon-link"></use></svg>
                <div class="icon"><img src="<?= IMAGES_URL; ?>/icons/tiktok.svg" alt=""></div>
            </button>
        </div>
    </div>
</div>
<section class="fe-section">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <span class="fw-semibold fs-18">최신 알림</span>
        <a href="#" class="fs-14 text-gray">더보기</a>
    </div>
    <div class="p-3 bg-white rounded-9 home-box-2" style="border: 1px solid #F8F8FA">
    <?php  
    for ($i=0; $i < 3; $i++) { ?>
        <a href="#" class="d-flex flex-column row-gap-1 text-black">
            <span class="fw-semibold fs-13">캠페인에 참여할 인플루언서로 선정되셨습니다.</span>
            <div class="d-flex justify-content-between column-gap-2 fs-10 text-gray">
                <div class="d-flex column-gap-1 align-items-center">
                    <img class="object-fit-cover rounded-1" src="<?= IMAGES_URL; ?>/demo/demo-1.jpg" alt="" style="width: 14px;height: 14px;">
                    <span>[삼미푸드] 초코칩 아이스크림 쿠키 샌드위치 </span>
                </div>
                <span>30분 전</span>
            </div>
        </a>
    <?php
    }
    ?>
    </div>
</section>
<section class="fe-section">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <span class="fw-semibold fs-18">제안 받은 캠페인</span>
        <a href="#" class="fs-14 text-gray">더보기</a>
    </div>
    <div class="swiper campaign-carousel">
        <div class="swiper-wrapper">
            <?php  
            for ($i=0; $i < 5; $i++) { 
                echo '<div class="swiper-slide">';
                    get_template_part('template-parts/items/campaign');
                echo '</div>';
            }
            ?>                      
        </div>          
    </div>
</section>

<section class="fe-section bg-white">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <span class="fw-semibold fs-18">제안 받은 캠페인</span>
        <a href="#" class="fs-14 text-gray">더보기</a>
    </div>
    <div class="swiper campaign-carousel">
        <div class="swiper-wrapper">
            <?php  
            for ($i=0; $i < 5; $i++) { 
                echo '<div class="swiper-slide">';
                    get_template_part('template-parts/items/campaign');
                echo '</div>';
            }
            ?>                      
        </div>          
    </div>
</section>

<div class="modal fade pv-modal" id="pv-alert-modal" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-3">
                <div class="text-end mb-2">
                    <button type="button" class="btn h-auto p-0 border-0" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_195_26092)">
                        <path d="M13.4099 12L17.7099 7.71C17.8982 7.5217 18.004 7.2663 18.004 7C18.004 6.7337 17.8982 6.47831 17.7099 6.29C17.5216 6.1017 17.2662 5.99591 16.9999 5.99591C16.7336 5.99591 16.4782 6.1017 16.2899 6.29L11.9999 10.59L7.70994 6.29C7.52164 6.1017 7.26624 5.99591 6.99994 5.99591C6.73364 5.99591 6.47824 6.1017 6.28994 6.29C6.10164 6.47831 5.99585 6.7337 5.99585 7C5.99585 7.2663 6.10164 7.5217 6.28994 7.71L10.5899 12L6.28994 16.29C6.19621 16.383 6.12182 16.4936 6.07105 16.6154C6.02028 16.7373 5.99414 16.868 5.99414 17C5.99414 17.132 6.02028 17.2627 6.07105 17.3846C6.12182 17.5064 6.19621 17.617 6.28994 17.71C6.3829 17.8037 6.4935 17.8781 6.61536 17.9289C6.73722 17.9797 6.86793 18.0058 6.99994 18.0058C7.13195 18.0058 7.26266 17.9797 7.38452 17.9289C7.50638 17.8781 7.61698 17.8037 7.70994 17.71L11.9999 13.41L16.2899 17.71C16.3829 17.8037 16.4935 17.8781 16.6154 17.9289C16.7372 17.9797 16.8679 18.0058 16.9999 18.0058C17.132 18.0058 17.2627 17.9797 17.3845 17.9289C17.5064 17.8781 17.617 17.8037 17.7099 17.71C17.8037 17.617 17.8781 17.5064 17.9288 17.3846C17.9796 17.2627 18.0057 17.132 18.0057 17C18.0057 16.868 17.9796 16.7373 17.9288 16.6154C17.8781 16.4936 17.8037 16.383 17.7099 16.29L13.4099 12Z" fill="#373739"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_195_26092">
                        <rect width="24" height="24" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>
                    </button>
                </div>
                <div class="d-flex flex-column row-gap-3"></div>
            </div>
        </div>
    </div>
</div>


<div class="d-none">
    <svg id="icon-link" width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect width="19" height="16" rx="4" fill="white" fill-opacity="0.3"/>
    <path d="M7.83495 11.4583C7.69413 11.5953 7.58515 11.687 7.47377 11.754C6.92858 12.082 6.25688 12.082 5.71169 11.754C5.51079 11.6331 5.31767 11.4319 4.93143 11.0295C4.54518 10.627 4.35206 10.4258 4.23607 10.2164C3.92131 9.64828 3.92131 8.94836 4.23607 8.38026C4.35206 8.17094 4.54518 7.9697 4.93143 7.56723L6.59273 5.83612C6.97897 5.43365 7.17209 5.23241 7.37299 5.11155C7.91818 4.78356 8.5899 4.78356 9.13508 5.11155C9.33596 5.23241 9.52908 5.43365 9.91533 5.83612C10.3016 6.23859 10.4947 6.43983 10.6107 6.64917C10.9255 7.21726 10.9255 7.91719 10.6107 8.48529C10.5464 8.60133 10.4584 8.71492 10.3269 8.86163M8.67312 7.13837C8.54161 7.28508 8.45363 7.39867 8.38931 7.51471C8.07457 8.08281 8.07457 8.78274 8.38931 9.35083C8.50532 9.56021 8.69844 9.76145 9.08469 10.1639C9.47093 10.5663 9.66406 10.7676 9.86494 10.8885C10.4101 11.2165 11.0818 11.2165 11.627 10.8885C11.828 10.7676 12.0211 10.5663 12.4073 10.1639L14.0686 8.43277C14.4549 8.0303 14.648 7.82906 14.7639 7.61974C15.0787 7.05164 15.0787 6.35171 14.7639 5.78361C14.648 5.57427 14.4549 5.37303 14.0686 4.97056C13.6824 4.56809 13.4892 4.36686 13.2884 4.24599C12.7431 3.918 12.0715 3.918 11.5263 4.24599C11.4149 4.313 11.3059 4.4047 11.1651 4.5417" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
    </svg>
</div>

<script>
jQuery( document ).ready(function($) {
    
    $('.campaign-carousel').each(function (index, element) {
        new Swiper(element, {
            loop: false,
            slidesPerView: "auto",
            spaceBetween: 16,
        });
    });
})//end jquery
</script>
<?php
get_template_part("template-parts/components/mobile-tab-bottom");
get_footer(); 
?>