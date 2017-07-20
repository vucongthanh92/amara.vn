<?php
$_SESSION['tinh'] ='hcm';
$default['tinh'] = 'hcm';
$db = new Models_MProduct;
$mncatelog = new Models_MCatelog();

$default['cat'] = $mncatelog->listdata('id, ename,name', 'parentid = "0" AND display="1" AND ticlock = "0"','sort_order asc, Id desc');

$sql="select * from mn_catnews where ticlock='0' order by sort asc, Id desc";
$ds=mysql_query($sql) or die(mysql_error());
$default['catnews']=$ds;

loadview("default/view_default",$default);
?>