<?php
include ('header.php');

$table = varGet('table');
$colum = varGet('colum');
$id = varGet('id');
$value = varGet('value');

switch($table){ //kiem tra update thuoc bang nao
			
	case ''.TBL_PRODUCT.'':			$db = new Models_MProduct(); $dir = 'Product'; break;
	case ''.TBL_FLASH.'':			$db = new Models_MFlash(); $dir = 'Flash'; break;
}

if(file_exists('../data/'.$dir.'/'.$value))
	unlink('../data/'.$dir.'/'.$value);

$data = array($colum=>'');
$db->delFile($data,$id);

echo 'thanh cong';
?>