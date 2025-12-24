<?php 
get_header();
$class = new Pv_Class();
if(is_page("auth")){
    $class->Controller("auth");
}
get_footer(); 
?>