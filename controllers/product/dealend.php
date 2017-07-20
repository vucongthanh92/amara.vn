<?php
	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	$pg = new Paging;


	$new_date = strtotime ( '+7 day' , time()) ;
	
	//$where = "ticlock = '0' AND  end_time >= '".time()."' AND begin_time <= '".time()."' AND end_time <='$new_date'";

	$where = "ticlock = '0'  ";
	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 40;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;

	$select = "*";
	$orderby = "end_time asc,id desc, sort asc";
	$limit = "$start,$numrow";	
	$sp['info'] = $db->listdata($select,$where,$orderby,$limit);
	$sp['tinh'] = "hcm";
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL."deal-sap-het-han.html");

	/* tieu de */
	$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.BASE_URL.'deal-sap-het-han.html">Deal sắp hết hạn</a>';
	$sp['support'] = $title;
	loadview("product/deal_hot",$sp);
?>