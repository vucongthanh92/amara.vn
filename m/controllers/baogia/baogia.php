<?php
$db = new Models_MDownload();

/*
 * tieu de trang
 */
$map_title = "Bảng báo giá";
$ct['map_title'] =  $map_title;
$ct["baogia"] = $db->getOnedownload(5);
loadview("baogia/view_baogia",$ct);
?>