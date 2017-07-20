<?php

$db = new Models_MWeblink;

$data = $db->listdata();

loadview("weblink/list_view",$data);

?>