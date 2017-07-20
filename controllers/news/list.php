<?php
	$id = varGet("id");
	
	$db = new Models_MNews;
	$pg = new Paging;
	$mcat = new Models_MCatNews;
	$mflash = new Models_MFlash();
	$id = $mcat-> getidtoalia($id);
	
	$subid = $mcat->getSubId($id);
	if($subid != ""){
		$subid = substr($subid,0,-1);
		$where = "idcat in ($subid) and ticlock = '0'";
	}else{
		$where = "idcat = '$id' and ticlock = '0'";
	}
	$total = $db->countdata($where);
	
	
	$infonews['xemnhieu'] = $db->listdata("*",$where,"visit DESC,sort asc,Id desc","1,4");
	$randcat = $mcat->getOneCatnewsRand($id);
	$infonews["pro_randcat"] = $db->listdata("title_vn,Id","ticlock ='0' AND idcat='".$randcat["Id"]."'","rand()",100);
	$infonews["randcat"] = $randcat;
	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 12; 
	$div = 10;
	$start = $p * $numrow;

	$select = "*";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);

	
	$info_cat = $mcat->getOneCatnews($id);
	$title_cat = strtoseo($info_cat['title_'.lang]);
	$link=BASE_URL."c".$id."-".$title_cat.".html";
	$infonews['page']=$pg->divPage($total,$p,$div,$numrow,$link);
	
	$infonews['listcat'] = $mcat -> listdata("Id,title_vn","ticlock ='0'","Id desc",100);
	$infonews["info_cat"] = $info_cat;
	
	if($id==1) $infonews['banner'] = $mflash->getOneflashLocation(8);
	if($id==2) $infonews['banner'] = $mflash->getOneflashLocation(9);
	if($id==3) $infonews['banner'] = $mflash->getOneflashLocation(10);
	
	$sql="select * from team where ticlock='0' order by id desc limit 5";
	$ds=mysql_query($sql);
	$infonews['prod_moi']=$ds;
	
	$sql2="select * from team where ticlock='0' and hot='1' order by id desc limit 4";
	$ds2=mysql_query($sql2);
	$infonews['prod_hot']=$ds2;
	
	loadview("news/view_listnews",$infonews);

?>