<?php


	$id = 2;
	$link = $_GET['mod'].".htm";
	
	$db = new Models_MNews;
	$pg = new Paging;

	$where = " ticlock = '0' AND idcat='8'";
	
	$total = $db->countdata($where);
	
	if($total == 1){
		$arr['news'] = $mnews -> getOneNewsToCat($id,"Id,idcat,title_".lang.",content_".lang.",images");
	
		loadview("news/view_detailnews",$arr);
	}else{
	
		//paging
		$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
		$numrow = 11; 
		$div = 10;
		$start = $p * $numrow;
	
		$select = "Id, title_".lang.", description_".lang.",images";
		$orderby = "sort asc, Id desc";
		$limit = "$start,$numrow";	
		
		$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);
	
		$mcat = new Models_MCatNews;
		$info_cat = $mcat->getOneCatnews($id);
		$title_cat = unicode_convert($info_cat['title_'.lang]);
		
		$infonews['page']=$pg->divPage($total,$p,$div,$numrow,"bai-viet-san-pham.html");
		
		//tieu de trang
		$map_title = "<a href = '".$link."' class = 'linkred' title='".$info_cat['title_'.lang]."'>".TINTUC."</a>";
		$infonews['map_title'] =  $map_title;
		
		loadview("news/view_listnews",$infonews);
	}
?>