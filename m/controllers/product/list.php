<?php

	$id = varGet("id");

	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	$pg = new Paging;

	$subid = $mcatelog->getSubId($id);
	if($subid != ""){
		$subid = $id.",".substr($subid,0,-1);
		$where = " group_id in ($subid) and ticlock = '0'";
	}else{
		$where = " group_id = '$id' and ticlock = '0' ";
	}
	$where .= " AND ticlock = 0";

	
	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 15;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;

	$select = "*";

	$orderby = "id desc";
	$limit = "$start,$numrow";	
	
	$sp['total_pro_1'] = $db->countdata($where);
	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);

	$sp['cat'] = $info_cat = $mcatelog->getOneCatelog($id);
	$title_cat = strtoseo($info_cat['name']);
	
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL.$title_cat."-".$id.".html");
	
	
		
	loadview("product/list_view",$sp);

?>