<?php
$mproduct = new Models_MProduct();
$daytime = strtotime(date('Y-m-d H:i:s'));
$pg = new Paging;

$mncatelog = new Models_MCatelog;
$default['danhmuc'] = $mncatelog->listdata('id, ename,name', 'ticlock = "0" AND parentid = "0"','sort_order asc, Id desc');
/*
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 15;
$div = 6;
$start = $p * $numrow;

$select = "*";
$orderby = "id desc";
$limit = "$start,$numrow";	

$where = "ticlock = '0'";

$total = $mproduct->countdata($where);
$default['pro'] = $mproduct->listdata($select,$where,$orderby,$limit);
$default['page']=$pg->divPage($total,$p,$div,$numrow,"home.html");
*/
loadview("default/view_default",$default);
?>