<?php

$db = new Models_MCity;

$data['info'] = $db->listdata();

loadview("city/list_view",$data);


?>