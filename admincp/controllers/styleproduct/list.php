<?php

$db = new Models_MStyleProduct;

$data['info'] = $db->listdata();

loadview("styleproduct/list_view",$data);


?>