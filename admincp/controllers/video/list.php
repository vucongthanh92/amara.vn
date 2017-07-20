<?php

$db = new Models_MVideo();

$data['info'] = $db->listdata();

loadview("video/list_view",$data);


?>