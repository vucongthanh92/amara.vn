<?php

$mpayment = new Models_MPayment;
$pg = new Paging;
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 40;
$div = 30;
$total = $mpayment->countdata($where);
$start = $p * $numrow;

$data['info'] = $mpayment->listCustomer($where,$start,$numrow);
$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."payment/list$link");

loadview("payment/list_view",$data);
?>