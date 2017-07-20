<?php

$db = new Models_MComment();
$pg = new Paging;

if($_POST['id']=="")
{
	$where="";
}
else if(isset($_POST['tim']))
{
	$val = $_POST["id"];
	$nhom = (substr($val,0,strpos($val, '_')));
	$id = str_replace( $nhom."_",'',$val);
	if($nhom=='fr') $idpa=1;
	else if($nhom=='sp') $idpa=2;
	$where=" idpa='$idpa' and idcat='$id' ";
}
else $where="";

//paging
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 15;
$div = 10;
$total = $db->countdata();
$start = $p * $numrow;

$data['info'] = $db->listdata($where,$start,$numrow);
$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."comment/list");

loadview("comment/list_view",$data);

?>