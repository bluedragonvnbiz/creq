<?php get_admin_header(); ?>
<?php get_template_part("admin/template-parts/layouts/topbar","",["title" => "캠페인 관리"]) ?>
<div class="border bg-white d-flex align-items-center justify-content-between camp-header">
	<div class="d-flex gap-15">
		<img class="object-fit-cover" src="<?= IMAGES_URL ?>/demo/demo-1.jpg" alt="" style="width:45px;height: 45px;border-radius: 5px;">
		<div class="d-flex flex-column fs-12 justify-content-center">
			<strong class="fw-semibold">캠페인명</strong>
			<span>제품명</span>
		</div>
	</div>
	<div class="d-flex column-gap-3 justify-content-end align-items-center">
		<span class="badge text-bg-secondary">임시저장</span>
		<span class="badge text-bg-white">진행 전</span>
		<span class="badge text-bg-primary">진행 중</span>
		<span class="badge text-bg-light">진행 완료</span>
	</div>
</div>
<nav class="camp-nav bg-white d-flex">
<?php  
$arr = [
	["info","캠페인 정보"],
	["influencer-list","인플루언서 리스트"],
	["seeding","시딩 진행 관리"],
	["result","캠페인 결과"],
	["#","정산관리"],
	["#","계약 관리"]
];
$page = isset($_GET["tab"]) ? $_GET['tab'] : "info";
foreach ($arr as $key => $value) { 
	$class = $value[0] == $page ? "class='active' " : "";
?>
<a <?= $class ?>href="?edit_id=<?= $_GET['edit_id']."&tab=".$value[0] ?>"><?= $value[1] ?></a>
<?php	
}
?>	
</nav>
<?php include_once("templates/".$page.".php") ?>
<?php get_admin_footer(); ?>