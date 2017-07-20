<?php
	$mnproduct = new Models_MProduct;
	$mcity = new Models_MCity;
	
	$val = varGet("id");
	 $id = $mcity->getAlias($val);
	$city = $mcity ->getOneCity($id);
	
	$_SESSION['city']= $id;
	
	$default['tinh'] = $city['alias'];
	
	$select = "*";
	$orderby = "sort asc, id desc";
	$limit = "$start,$numrow";	
	$where = "end_time >= '".time()."' AND begin_time <= '".time()."' AND ticlock = '0'  AND city_id ='$id'";
	$where1 = $where." AND hot !='1'";
	
	
	$default['info'] = $mnproduct->listdata($select,$where1,$orderby,20);
	$where3 = $where." AND hot = '1'";
	$default['hot'] = $mnproduct -> listdata("*",$where3,"id desc",8);


	loadview("deal/view_city",$default);

?>