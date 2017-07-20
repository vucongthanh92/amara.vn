<?php
$db = new Models_MTinmoi;
$pg = new Paging;

$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 15;
$div = 30;
$total = $db->countdata($where);
$start = $p * $numrow;
$data['info'] = $db->listdata($where,$start,$numrow);
$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."news/duyettin$link");

loadview("news/view_duyettin",$data);
?>