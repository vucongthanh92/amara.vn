<?php
require("header.php");
$encoding="UTF-8";
$dom = new DOMDocument('1.0','UTF-8');
$dom->encoding=$encoding;
$rss = $dom->createElement("rss");
$rss->setAttribute("version","2.0");
$dom->appendChild($rss);
// begin channel
$channel = $dom->createElement("channel");
$rss->appendChild($channel);
// Begin title
$titlepage  = $dom->createElement("title");
$channel -> appendChild($titlepage);
$titlepage_txt = $dom->createTextNode("Sacyte.com - Cẩm nang sức khỏe cuộc sống");
$titlepage -> appendChild($titlepage_txt);
// Begin description
$descriptionpage  = $dom->createElement("description");
$channel -> appendChild($descriptionpage);
$descriptionpage_txt = $dom->createTextNode($meta['description']);
$descriptionpage -> appendChild($descriptionpage_txt);
// Begin Link
$link  = $dom->createElement("link");
$channel -> appendChild($link);
$link_txt = $dom->createTextNode(BASE_URL);
$link -> appendChild($link_txt);
// Begin copyright
$copyright  = $dom->createElement("copyright");
$channel -> appendChild($copyright);
$copyright_txt = $dom->createTextNode("Sachyte.com");
$copyright-> appendChild($copyright_txt);
// Begin generator
$generator  = $dom->createElement("generator");
$channel -> appendChild($generator);
$generator_txt = $dom->createTextNode("sachyte.com:http//sachyte.com/trang-chu.rss");
$generator-> appendChild($generator_txt);
// Begin pubDate
$pubDate  = $dom->createElement("pubDate");
$channel -> appendChild($pubDate);
$pubDate_txt = $dom->createTextNode(date("M/d/Y H:i:s")." GMT");
$pubDate-> appendChild($pubDate_txt);
// Begin pubDate
$lastBuildDate  = $dom->createElement("lastBuildDate");
$channel -> appendChild($lastBuildDate);
$lastBuildDate_txt = $dom->createTextNode(date("M/d/Y H:i:s")." GMT");
$lastBuildDate-> appendChild($lastBuildDate_txt);

$db = new Models_MNews;
$select = "*";
$orderby = "sort asc, Id desc";
$where = "ticlock='0'";	
$infonews = $db->listdata($select,$where,$orderby,99999); 
foreach($infonews as $row){

//Begin item
$item = $dom->createElement("item");
$channel->appendChild($item);
	// Begin title item
	$title = $dom->createElement("title");
	$item -> appendChild($title);
	$title_txt = $dom->createTextNode(OutText_Alt($row['title_vn']));
	$title -> appendChild($title_txt);
	// Begin description 
	$description = $dom->createElement("description");
	$item -> appendChild($description);
	$vn_desc = OutText_Alt($row['description_vn']);
	$vn_desc = '<a href="'.BASE_URL.unicode_convert2(stripslashes($row['title_'.lang])).'-n'.$row['Id'].'.html" ><img src="'.BASE_URL.PATH_IMG_NEWS.$row['images'].'" alt="Sachyte.com" width="130" border="0"  /></a>'.$vn_desc;
	$des_txt = $dom->createCDATASection($vn_desc);
	$description -> appendChild($des_txt);
	// Begin Link item 
	$lk = $dom->createElement("link");
	$item -> appendChild($lk);
	$lk_txt = $dom->createTextNode(BASE_URL.unicode_convert2(stripslashes($row['title_vn']))."-n".$row['Id'].".html");
	$lk -> appendChild($lk_txt);
	// Begin description 
	$pd = $dom->createElement("pubDate");
	$item -> appendChild($pd);
	$pd_txt = $dom->createTextNode(date("M/d/Y",strtotime($row["date"])));
	$pd -> appendChild($pd_txt);
//end item
}

$dom->formatOutput = true;
$dom->save("sachyterss.xml");
header("location: http://sachyte.com/trang-chu.rss");
?>