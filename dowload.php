<?php
include ("libraries/class_db.php");
include ("config/config.php");


$sql = " SELECT * FROM mn_download WHERE Id = 5";
$rw = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($rw);
$filename = $row['file_vn'];
 $url = "data/download/".$filename;

$mimetype="application/force-download";//mime_content_type($url);
$filesize = filesize($url);
header("Content-Description: File Transfer");
header("Content-Type: $mimetype");// kieu du lieu tra ve
header("Content-Disposition: attachment; filename=\"$filename\"");// luu voi ten file
header("Content-Transfer-Encoding: binary");
header("Content-Length: " . $filesize);
set_time_limit(0);
$file = fopen($url,"rb");
if ($file) {
	while(!feof($file)) {	
	print(fread($file, 1024*8));
	flush();
	//if(isset($_SESSION["kt_login_id"])==false) sleep(0);//kim ham toc do dow
}
	fclose($file);
}

?>