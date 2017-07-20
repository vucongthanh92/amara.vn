<?php

if(isset($_GET['id']))
{	
	$db = new Models_MHoidap();
	$val = $_GET['id'];
	$id = (int)(substr($val,0,strpos($val, '-')));
	$data['detail'] = $db->getOneNews($id);
	
	$where = "Id<>'$id' and ticlock ='0' and parentid = '0'";	
	$select = "*";
	$order = "date desc,id DESC";
	$data['other'] = $db->listdata($select,$where,$order,5);
	$where2 = "parentid = $id ";
	$data['traloi'] = $db->listdata($select,$where2,$order,10);
	$data['map_title'] = $map_title.$arrowmap."<a href='hoi-dap-suc-khoe.html'> Hỏi đáp sức khỏe</a>";
	
	loadview("hoidap/view_detail",$data);
}
?>