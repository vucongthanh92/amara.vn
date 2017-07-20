<?php
include ('header.php');
$dt = new Models_MTinmoi;
$id = $_GET['id'];
$row = $dt->getOneNews($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$row['TieuDe'] ?></title>
<style type="text/css">
body {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
.div_body {
	width:520px;
	height:500px;
	overflow:auto;
}
</style>
</head>
<body>
<div class="div_body">
<h2><?=$row['TieuDe'] ?></h2>
<h4><?=$row['TomTat'] ?></h4>
<p><?=$row['Content'] ?></p>
</div>
</body>
</html>