<?php
	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	$pg = new Paging;

	$where = "ticlock = '0'";

	
	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 40;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;

	$select = "*";
	$orderby = "id desc, sort asc";
	$limit = "$start,$numrow";	
	$sp['info'] = $db->listdata($select,$where,$orderby,$limit);
	$sp['tinh'] = "hcm";
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL."deal-hom-nay.html");

	/* tieu de */
	$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.BASE_URL.'deal-hom-nay.html">Deal Hôm Nay</a>';
	$sp['support'] = $title;
	loadview("product/deal_hot",$sp);
?>