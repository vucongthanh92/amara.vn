<?php

	$id = varGet("id");
	//$id = (int)(substr($val,0,strpos($val, '-')));
	
	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	$pg = new Paging;
	$mflash = new Models_MFlash();
	
	$where = " hangsx = '$id' and ticlock = '0'";	
	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 12;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;

	$select = "*";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	$link=BASE_URL.$_SERVER['REQUEST_URI'];
	
	$sp['info'] = $db->listdata($select,$where,$orderby,$limit);
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,$link);

	
	$sql="select * from mn_catnews where ticlock='0' order by sort asc, Id desc";
	$ds=mysql_query($sql) or die(mysql_error());
	$sp['catnews']=$ds;
	
	$sql2="select * from mn_manufacturer where ticlock='0' and Id='$id'";
	$ds2=mysql_query($sql2) or die(mysql_error());
	$ds2_row=mysql_fetch_assoc($ds2);
	$sp['hangsx_title']=$ds2_row['title_vn'];
	
	$sp['banner'] = $mflash->getOneflashLocation(4);
	
	$sp['support'] = $title;
	loadview("product/view_hangsx",$sp);

?>