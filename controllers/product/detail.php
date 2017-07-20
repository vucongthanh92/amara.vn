<?php

if(isset($_GET['id']))
{
	$val = varGet("id");
	//$id = (int)(substr($val,0,strpos($val, '-')));
	
	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	$id = $mproduct->getAlias($val);
	$_SESSION['id_cmt']=$id;
	$_SESSION['loai_cmt']=1;
	$pg = new Paging;
	$numrow = 10;
	$div = 10;
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$start = $p * $numrow;
	
	//gởi comment
	if(isset($_POST['cmt_goi']))
	{
		$hoten=$_POST['cmt_hoten'];
		$email=$_POST['cmt_email'];
		$noidung=$_POST['cmt_noidung'];
		$phone=$_POST['cmt_phone'];
		$date=date("d/m/Y");
		$idpa=1;
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
		$idpa=1;
		$idcat=$id;
		$idrep=$_POST['idrep'];
		$sql="insert into mn_comment(hoten,email,phone,content,date,idpa,idcat,idrep,ticlock) 
		      values('$hoten','$email','$phone','$noidung','$date','$idpa','$idcat','$idrep','1')";
		mysql_query($sql);
		unset($_POST['rep_goi']);
	}
	
	
	/*lay thong tin san pham*/
	$sp['prod'] = $db->getOneProduct($id);

	$idcat = $sp['prod']['group_id']; 
	$sp['tinh']= "hcm";
	
	//lay tieu de cua cat
	$mcatelog = new Models_MCatelog;
	$info_cat = $mcatelog->getOneCatelog($idcat);
	
	$sp['child_catname']=$info_cat['name'];
	$sp['child_catid']=$info_cat['id'];
	
	if($info_cat['parentid']==0)
	   $sp['id_cat']=$info_cat['id'];
	else
	{
		$t=$info_cat['parentid'];
		$info_cat2 = $mcatelog->getOneCatelog($t);
		$sp['id_cat']=$info_cat2['id'];
		$sp['parent_cat']=$info_cat2['name'];
	}
	
	/*san pham cung loai*/
	if(isset($t)) $parentid=$t;
	else $parentid=$idcat;
	$subid = $mcatelog->getSubId($parentid);
	if($subid != ""){
		$subid = $parentid.",".substr($subid,0,-1);
		$where = " group_id = '$idcat' and Id != '$id' AND ticlock='0' ";
	}else{
		$where = " group_id = '$idcat' and Id != '$id' AND ticlock='0' ";
	}
	$sp['prod_cl'] = $db->listdata("*",$where,"sort asc","10");
	//-------------------------
	
	$sp["support"] = $title;
	$mpagehtml = new Models_MPagehtml;
	$sp['pagehtml'] = $mpagehtml -> getpagehtmlid('1');
	$sp['giaosanpham'] = $mpagehtml -> getpagehtmlid('2');
	loadview("product/detail_view",$sp);
}
?>