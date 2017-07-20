<?php
	
	
	$db = new Models_MNews;
	$pg = new Paging;

	$where = "ticlock = '0' AND special = '1'";
	$total = $db->countdata($where);

	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 12; 
	$div = 7;
	$start = $p * $numrow;

	$select = "Id, title_".lang.", description_".lang.",images,date,visit";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);
	$infonews['page']=$pg->divPage($total,$p,$div,$numrow,"nhung-nguoi-tre-dac-biet.html");

	$infonews['map_title'] =  $map_title . $arrowmap . '<a href = "nhung-nguoi-tre-dac-biet.html" title="Những người trẻ đặc biệt">Những người trẻ đặc biệt</a>';
	
	loadview("news/view_listnew2",$infonews);

?>