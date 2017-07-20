<?php
$db = new Models_MBanner;
$data = $db->listdata();

loadview("banner/list_view",$data);
?>