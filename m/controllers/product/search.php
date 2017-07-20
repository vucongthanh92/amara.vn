<?php	
	$db = new Models_MProduct;
	$pg = new Paging;
	$daytime = strtotime(date('Y-m-d H:i:s'));
	$where = "ticlock = '0' ";
	$tukhoa =varGetPost("tukhoa");
	$tukhoa =  str_replace('-',' ',$tukhoa);
	//echo $tukhoa;
	 if($tukhoa==""){
		$where = "ticlock = '0'";
		
	}
	
	else {
		$where = "ticlock = '0'";
		$where .= " AND  title like '%".$tukhoa."%'";
	}
	//echo $where;
	//paging
	//echo $_GET['p'];
	 $p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 15;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;

	$select = "*";
	$orderby = "id desc";
	$limit = "$start,$numrow";	
	$title = strtoseo($tukhoa);
	$sp['prod'] = $db->listdata($select,$where,$orderby,$limit);
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,"tim-kiem-f.html/".$title);
	
	$sp['title_pro'] = "Tìm kiếm";
	$sp['total'] = $total;
	loadview("product/searchnc_view",$sp);

	


?>