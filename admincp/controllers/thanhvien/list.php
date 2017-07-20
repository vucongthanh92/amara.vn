<?php

$db = new Models_MThanhvien;

$data['info'] = $db->listdata();

loadview("thanhvien/list_view",$data);


?>