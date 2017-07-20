<?php
$db = new Models_Mconfig;
$data['info'] = $db->list_support();

loadview("config/list_support",$data);
?>