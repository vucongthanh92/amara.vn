<?php

$id = varGet("id");
	
	$db = new Models_MPicture;
	$pg = new Paging;

	$orderby = "sort asc";
	
	$infopic['info'] = $db->listdata("","",$orderby,"");

	//tieu de trang
	$title_page .= " - ".PT_TITLEPAGE;
	$map_title .= $arrowmap."<a href = '".BASE_URL."/picture/list/catalogue.html' class = 'linkred'>".PT_TITLEPAGE."</a>";
	$infopic['map_title'] =  $map_title;
	
	loadview("picture/view_list",$infopic);

?>