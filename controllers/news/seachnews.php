<?php
	$db = new Models_MNews;
	$pg = new Paging;
	$mcat = new Models_MCatNews;
	$tukhoa = $_POST['tukhoa'];
	if($tukhoa==""){
		$tukhoa = $_GET['tukhoa'];
	}
	$where = "ticlock = '0' AND title_vn like '%".$tukhoa."%'";
	$total = $db->countdata($where);
	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$p= str_replace("/","",$p);
	$numrow = 11; 
	$div = 5;
	$start = $p * $numrow;

	$select = "Id, title_".lang.", description_".lang.",images,date,visit";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);
	
	$infonews['page']=$pg->divPage($total,$p,$div,$numrow,"index.php?mod=tin-tuc&act=timkiem&tukhoa=".$tukhoa."&p=");
	
	
	$infonews['map_title'] = $map_title.$arrowmap." <a href='#'>Tìm Kiếm </a>";
	loadview("news/view_seachnews",$infonews);

?>