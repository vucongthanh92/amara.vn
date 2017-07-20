<?php
$db = new Models_MRequestprice;
$id = varGetPost("id");

$data['info'] = $db -> getOneNew($id);

$data['tb'] = $db -> getListTb($id);

loadview("requestprice/edit_view",$data);
?>