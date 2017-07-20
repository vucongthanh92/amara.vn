<?php
$db = new Models_MHoidap();
$pg = new Paging;

//paging
$p = isset($_GET['p'])?varGetPost('p'):0;
$numrow = 15;
$div = 10;
$total = $db->countdata();
$start = $p * $numrow;
$where = "parentid='0' and ticlock ='0'";
$limit = "$start,$numrow";	
$select = "*";
$order = "Id desc";
$data['info'] = $db->listdata($select,$where,$order,$limit);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."hoidap/list");

$data["map_title"] = $map_title.$arrowmap."<a href='hoi-dap-suc-khoe.html'> Hỏi đáp sức khỏe</a>";
loadview("hoidap/view_list",$data);
?>