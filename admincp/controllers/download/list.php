<?php

$db = new Models_MDownload();

$data['info'] = $db->listdata();

loadview("download/list_view",$data);


?>