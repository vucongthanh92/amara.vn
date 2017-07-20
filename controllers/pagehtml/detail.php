<?php

$id = varGet("id");
//$id = substr($val,0,strpos($val, '-'));
$mpagehtml = new Models_MPageHtml;
$pagehtml = $mpagehtml->getpagehtmlid($id);
$mflash = new Models_MFlash();

//tieu de trang
$map_title = $pagehtml['title_'.lang];
$pagehtml['map_title'] =  $map_title;
$pagehtml['banner'] = $mflash->getOneflashLocation(7);

$sql2="select * from team where ticlock='0' and hot='1' order by sort asc,Id desc limit 5";
$ds2=mysql_query($sql2);
$pagehtml['prod_hot']=$ds2;

loadview("pagehtml/detail_view",$pagehtml);
?>