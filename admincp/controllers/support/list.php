<?php

$db = new Models_MSupport;

$data['info'] = $db->listdata();

loadview("support/list_view",$data);


?>