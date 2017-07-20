<?php
	
	
	$db = new Models_MNews;
	$pg = new Paging;

	$where = "ticlock = '0'";
	$total = $db->countdata($where);

	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 12; 
	$div = 7;
	$start = $p * $numrow;

	$select = "Id, title_".lang.", description_".lang.",images,date,visit";
	$orderby = "visit desc,sort asc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);
	$infonews['page']=$pg->divPage($total,$p,$div,$numrow,"xem-nhieu.html");
	
	
	$infonews['title_pro'] = "Bài viết được quan tâm nhiều nhất."; 
	$infonews['map_title'] =  $map_title . $arrowmap . '<a href = "xem-nhieu.html" title="Bài viết được xem nhiều nhất">Bài viết được xem nhiều nhất</a>';
	
	loadview("news/view_listnew2",$infonews);

?>