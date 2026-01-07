<?php 
    $mode = get_query_var('mode');
    $details_id = get_query_var('details_id');
    $edit_id = get_query_var('edit_id');
    if ( !$details_id ) {
        $details_id = $edit_id;
    }
?>

<nav class="camp-nav bg-white d-flex">
    <?php  
        $arr = [
            "details" => "캠페인 정보",
            "influencers" => "인플루언서 리스트",
            "seeding" => "시딩 진행 관리",
            "result" => "캠페인 결과",
            "#" => "정산관리",
            "##" => "계약 관리"
        ];

        foreach ($arr as $key => $value) { 
    ?>
        <a class="<?php echo $mode === $key ? 'active' : '' ?>" href="<?php echo home_url('creq-admin/campaigns/'.$key.'/'.$details_id) ?>">
            <?= $value ?>
        </a>
    <?php } ?>  
</nav>