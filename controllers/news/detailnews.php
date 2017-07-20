<?php

if(isset($_GET['id']))
{	
	$id = varGet("id");
	$mnews = new Models_MNews;
    $mflash = new Models_MFlash();
	/*
	 * lay tin tuc
	 */
	$arr['news'] = $mnews -> getOneNews($id,"*");
	
	$idcat = $arr['news']['idcat']; 
	$mcat = new Models_MCatNews;
	$arr['cat'] = $mcat->getOneCatnews($idcat);
	
	$arr['listcat'] = $mcat -> listdata("Id,title_vn","ticlock ='0'","Id desc",100);
	$arr['support'] = $title;
	
	if($idcat==1) $arr['banner'] = $mflash->getOneflashLocation(8);
	if($idcat==2) $arr['banner'] = $mflash->getOneflashLocation(9);
	if($idcat==3) $arr['banner'] = $mflash->getOneflashLocation(10);
	
	$sql2="select * from mn_news where ticlock='0' and idcat='$idcat' order by Id desc limit 5";
	$ds2=mysql_query($sql2);
	$arr['tincungloai']=$ds2;
	
	$sql="select * from team where ticlock='0' order by id desc limit 5";
	$ds=mysql_query($sql);
	$arr['prod_moi']=$ds;
	
	
	$sql2="select * from team where ticlock='0' and hot='1' order by sort asc,Id desc limit 6";
	$ds2=mysql_query($sql2);
	$arr['prod_hot']=$ds2;
	
	$ds3=mysql_query($sql2);
	$arr['prod_hot_mobi']=$ds3;
	
	
	$_SESSION['id_cmt']=$id;
	$_SESSION['loai_cmt']=2;
	//gởi comment
	if(isset($_POST['cmt_goi']))
	{
		$hoten=$_POST['cmt_hoten'];
		$email=$_POST['cmt_email'];
		$noidung=$_POST['cmt_noidung'];
		$phone=$_POST['cmt_phone'];
		$date=date("d/m/Y");
		$idpa=2;
		$idcat=$id;
		$idrep=0;
		$sql="insert into mn_comment(hoten,email,phone,content,date,idpa,idcat,idrep,ticlock) 
		      values('$hoten','$email','$phone','$noidung','$date','$idpa','$idcat','$idrep','1')";
		mysql_query($sql);
		unset($_POST['cmt_goi']);
	}
	//reply comment
	if(isset($_POST['rep_goi']))
	{
		$hoten=$_POST['rep_hoten'];
		$email=$_POST['rep_email'];
		$noidung=$_POST['rep_noidung'];
		$phone=$_POST['rep_phone'];
		$date=date("d/m/Y");
		$idpa=2;
		$idcat=$id;
		$idrep=$_POST['idrep'];
		$sql="insert into mn_comment(hoten,email,phone,content,date,idpa,idcat,idrep,ticlock) 
		      values('$hoten','$email','$phone','$noidung','$date','$idpa','$idcat','$idrep','1')";
		mysql_query($sql);
		unset($_POST['rep_goi']);
	}
	
	loadview("news/view_detailnews",$arr);
}
?>