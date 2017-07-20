<?php

$title_page .= "-"."Yêu cầu báo giá";
$map_title .= $arrowmap."<a href = '".BASE_URL."requestprice/form/yeu-cau-bao-gia.htm' class = 'linkred'>".YEUCAUBAOGIA."</a>";
$rqprice['map_title'] =  $map_title;

if($act == "formtc")
{
	echo "<script language = 'javascript'>alert(".BGTC.")</script>";
}

loadview("requestprice/formpost",$rqprice);
?>

