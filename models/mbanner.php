<?php
#####################################
#									
# class model banner  			
# Author: Tran Minh Nhat
# email	: cubiminhnhat@yahoo.com 	
# date	: 06/2010						
#									
#####################################

class Models_MBanner extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	//liet ke danh sach du lieu
	function listdata($select = "",$where = "", $order = "",$limit = ""){
		if($select != ""){
			$this->select($select);
		}
		if($where != ""){
			$this->where($where);
		}
		$this->getdata(TBL_BANNER,"Id asc");
		$row = $this->num_rows();
		return $this->fetchall();
	}

	//lay thong tin mot tin
	function getOneBanner($id){
		$this->where("Id = $id");
		$this->getdata(TBL_BANNER);
		return $this->fetchone();
	}
	
	//lay banner theo vi tri
	function getOneLocation($vitri){
		$this->where("location = '$vitri'");
		$this->getdata(TBL_BANNER);
		return $this->fetchone();
	}

}
?>
