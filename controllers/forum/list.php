<?php

//tieu de trang
$map_title = "<a href = 'y-kien-khach-hang.htm'>Ý kiến khách hàng</a>";
$infonews['map_title'] =  $map_title;

$db = new Models_MForum;
$pg = new Paging;

$where = "ticlock = '0' and lang = '".lang."'";
	
//paging
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 8; 
$div = 10;
$total = $db->countdata($where);
$start = $p * $numrow;

$select = "Id, title, question, fullname, email";
$orderby = "date asc";
$limit = "$start,$numrow";	

$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);
	
$infonews['page']=$pg->divPage($total,$p,$div,$numrow,"y-kien-khach-hang.htm");
	
loadview("forum/list_view",$infonews);

?>