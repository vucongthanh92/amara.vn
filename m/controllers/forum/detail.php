<?php
$title_page .= " - ".FR_TITLEMAP;
$map_title .= $arrowmap."<a href = '".BASE_URL."forum/list/hoi-dap-ky-thuat.html'>".FR_TITLEMAP."</a>";
$arr['map_title'] =  $map_title;

//lay ra mot tin
if(isset($_GET['id']))
{	
	$id = varGet("id");
	//lay mot tin
	$mforum = new Models_Mforum;
	$arr['info'] = $mforum -> getOneNews($id);
	
	//cac tin khac
	$arr['othernews'] = $mforum -> listdata("","Id != '$id'","date desc",10);
	loadview("forum/detail_view",$arr);
}
?>