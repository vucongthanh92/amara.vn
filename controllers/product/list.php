<?php

	$id = varGet("id");
	//$id = (int)(substr($val,0,strpos($val, '-')));
	
	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	$pg = new Paging;
	$mflash = new Models_MFlash();

	$subid = $mcatelog->getSubId($id);
	if($subid != ""){
		$subid = $id.",".substr($subid,0,-1);
		$where = " group_id in ($subid) and ticlock = '0'";
	}else{
		$where = " group_id = '$id' and ticlock = '0' ";
	}
	
	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 24;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;

	$select = "*";

	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	
	$sp['info'] = $db->listdata($select,$where,$orderby,$limit);

	$sp['cat'] = $info_cat = $mcatelog->getOneCatelog($id);
	$title_cat = strtoseo($info_cat['name']);
	$sp['name_cat']=$info_cat['name'];
	$sp['name_cat_id']=$info_cat['id'];
	if($info_cat['parentid']==0)
	   $sp['id_cat']=$info_cat['id'];
	else
	{
		$t=$info_cat['parentid'];
		$info_cat2 = $mcatelog->getOneCatelog($t);
		$sp['id_cat']=$info_cat2['id'];
		$sp['parent_cat']=$info_cat2['name'];
	}
	
	$idcat=$info_cat['id'];
	$idpa=$info_cat['parentid'];
	while($idpa>0)
	{
		$sql2="select * from category where id='$idpa'";
		$ds2=mysql_query($sql2) or die(mysql_error());
		$row2=mysql_fetch_assoc($ds2);
		$idpa=$row2['parentid'];
		$idcat=$row2['id'];
	}
	$_SESSION['id_listprod']=$idcat;
	
	//$tinh =  $mcatelog->getOneCity($info_cat['parentid']);
	$sp['tinh'] = "hcm";
	
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL.$title_cat."-".$info_cat['id'].".html");

	/* tieu de */
	if($info_cat['parentid'] !=0){
		$subcat = $mcatelog ->getOneCatelog($info_cat['parentid']);
		if($subcat['parentid'] != 0 ){
			$subcat2 = $mcatelog ->getOneCatelog($subcat['parentid']);
			
			$sp['title_pro'] = $subcat2['name'];
			$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.BASE_URL.strtoseo($subcat2['name'])."-".$subcat2['Id'].'.html" title="'.$subcat2['title_'.lang].'">'.$subcat2['name'].'</a>' 
				. $arrowmap . '<a href = "'.BASE_URL.strtoseo($subcat['name']).$subcat['id'].'.html" title="'.$subcat['name'].'">'.$subcat['name'].'</a>'
				. $arrowmap . '<a href = "'.BASE_URL.strtoseo($info_cat['name'])."-".$info_cat['id'].'.html" title="'.$info_cat['name'].'">'.$info_cat['name'].'</a>';
		}else{
			$sp['title_pro'] = $subcat['title_'.lang]; 
			$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.BASE_URL.strtoseo($subcat['name'])."-".$subcat['id'].'.html" title="'.$subcat['name'].'">'.$subcat['name'].'</a>' 
				. $arrowmap . '<a href = "'.BASE_URL.strtoseo($info_cat['name'])."-".$info_cat['id'].'.html" title="'.$info_cat['name'].'">'.$info_cat['name'].'</a>';
		}
	}else{
		$sp['title_pro'] = $info_cat['name']; 
		$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.BASE_URL.strtoseo($info_cat['name'])."-".$info_cat['id'].'.html">'.$info_cat['name'].'</a>';
	}
	
	$sql="select * from mn_catnews where ticlock='0' order by sort asc, Id desc";
	$ds=mysql_query($sql) or die(mysql_error());
	$sp['catnews']=$ds;
	
	$sp['banner'] = $mflash->getOneflashLocation(4);
	
	$sp['support'] = $title;
	loadview("product/list_view",$sp);

?>