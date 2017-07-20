<?php

$db = new Models_MRequestprice;
$pg = new Paging;

//paging
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 10;
$div = 10;
$total = $db->countdata();
$start = $p * $numrow;

$data['info'] = $db->listdata($start,$numrow);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."requestprice/list");

loadview("requestprice/list_view",$data);

?>