<?php
$db = new Models_MHoidap;
$idsp = $_GET['p'];
$id = varGetPost('id');
$db -> del_onecheck($id);
redirect(BASE_URL_ADMIN."hoidap/edit/".$idsp);
return;

?>