<?php

$db = new Models_MProduct;
$pg = new Paging;

//cat
$mcat = new Models_MCatelog;
$data['cat'] = $mcat->listdata();

if(isset($_POST['id']) || isset($_GET['id']))
{
	$idcat = varGetPost("id");
	$where = "group_id  = '$idcat'";
	$link = "/$idcat";
}else{
	$where = '';
	$link = '';
}

//paging
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 30;
$div = 15;
$total = $db->countdata($where);
$start = $p * $numrow;

$data['info'] = $db->listdata($where,$start,$numrow);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."product/list$link");
$data['total'] = $total;

loadview("product/list_view",$data);

?>