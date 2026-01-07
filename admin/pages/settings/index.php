<?php
    $base_salary_model = new BaseSalaryModel();
    $instagram_base_salaries = $base_salary_model->getBaseSalariesByChannel('instagram');
?>

<?php get_admin_header(); ?>
<?php get_admin_part("layouts/topbar", "", ["title" => "설정"]); ?>

<div class="admin-section">
    <button type="button" class="btn-open-modal-setting mb-12" data-bs-toggle="modal" data-bs-target="#faq-category-modal">
        <span>FAQ 카테고리 설정</span>
        <img width="18" height="19" src="<?= ASSETS_ADMIN_URL ?>/images/icons/chev-right.svg" alt="Arrow Right Icon">
    </button>

    <button type="button" class="btn-open-modal-setting mb-12" data-bs-toggle="modal" data-bs-target="#service-intro-modal">
        <span>서비스 소개서 링크 설정</span>
        <img width="18" height="19" src="<?= ASSETS_ADMIN_URL ?>/images/icons/chev-right.svg" alt="Arrow Right Icon">
    </button>

    <button type="button" class="btn-open-modal-setting mb-12" data-bs-toggle="modal" data-bs-target="#terms-modal">
        <span>약관 설정</span>
        <img width="18" height="19" src="<?= ASSETS_ADMIN_URL ?>/images/icons/chev-right.svg" alt="Arrow Right Icon">
    </button>

    <button type="button" class="btn-open-modal-setting mb-12" data-bs-toggle="modal" data-bs-target="#referral-code-type-modal">
        <span>레퍼럴 코드 유형 설정</span>
        <img width="18" height="19" src="<?= ASSETS_ADMIN_URL ?>/images/icons/chev-right.svg" alt="Arrow Right Icon">
    </button>

    <button type="button" class="btn-open-modal-setting mb-12" data-bs-toggle="modal" data-bs-target="#base-salary-modal">
        <span>기본급 설정</span>
        <img width="18" height="19" src="<?= ASSETS_ADMIN_URL ?>/images/icons/chev-right.svg" alt="Arrow Right Icon">
    </button>
</div>

<?php get_admin_part("modals/alert-modal"); ?>
<?php get_admin_part("modals/setting-base-salary-modal", null, ["instagram_base_salaries" => $instagram_base_salaries]); ?>

<?php get_admin_footer(); ?>