<?php

if(isset($_GET['id']))
{	
	$val = varGet("id");
	$id = substr($val,0,strpos($val, '-'));
	
	$mnews = new Models_MNews;
	/*
	 * dem so len doc len 1
	 */
	$mnews->countView($id);
	/*
	 * lay tin tuc
	 */
	$arr['news'] = $mnews -> getOneNews($id,"Id,idcat,title_".lang.",content_".lang.",images");
	
	$idcat = $arr['news']['idcat']; 
	/*
	 * lay tieu de nhom tin 
	 */
	$mcat = new Models_MCatNews;
	$info_cat = $mcat->getOneCatnews($idcat);
	$title_cat = unicode_convert($info_cat['title_'.lang]);	
	$arr['map_title'] = "<a href='bai-viet-san-pham.html'>".SANPHAM . "</a>";
	/*
	 * cac tin khac
	 */
	$arr['othernews'] = $mnews -> listdata("Id,title_".lang,"idcat = '".$arr['news']['idcat']."' and Id != '$id' and ticlock ='0'","Id desc","10");
	loadview("news/view_detailnews",$arr);
}
?>