<?php

if(isset($_GET['id']))
{
	$val = $_GET['id'];
	$id =  $mproduct->getAlias($val);
	
	$db = new Models_MProduct;
	$pg = new Paging;
	$numrow = 6;
	$div = 10;
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$start = $p * $numrow;
	
	/*lay thong tin san pham*/
	$sp['prod'] = $db->getOneProduct($id);

	$idcat = $sp['prod']['group_id']; 
	
	/*san pham cung loai*/
	$select = "*";
	$orderby = "id asc";
	$where = "ticlock = '0'";
	$limit = "$start,$numrow";	
	
	$sp['prod_cl'] = $db->listdata($select,$where,$orderby,$limit);
	
	//lay tieu de cua cat
	$mcat = new Models_MCatelog;
	$sp['cat'] = $mcat->getOneCatelog($idcat);
	
	
	
	loadview("product/detail_view",$sp);
}
?>