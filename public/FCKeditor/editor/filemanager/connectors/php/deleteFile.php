<?
	$file = $_GET['FileDelete'];
	unlink($_SERVER['DOCUMENT_ROOT'].$file);
?>
