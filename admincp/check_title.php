<?php
include ('header.php');
$title = $_POST["id"];
$sql = "select title_vn from mn_news where title_vn='".$title."'";
$kq = mysql_query($sql) or die(mysql_error());
$total = mysql_num_rows($kq);
if($total>0){
	echo "false";
}
?>