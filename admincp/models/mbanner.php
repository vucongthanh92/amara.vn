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
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		$this->getdata(TBL_BANNER,"Id asc");
		$row = $this->num_rows();
		return $this->fetchall();
	}
	
	/*
	 * tic lock mot tin
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_BANNER,$data);	
	}
	
	/*
	 * them mot tin
	 */
	function addBanner($data){
		$this->insert(TBL_BANNER,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneBanner($id){
		$this->where("Id = $id");
		$this->getdata(TBL_BANNER);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editBanner($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_BANNER,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_BANNER,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_BANNER,'Id = '.$id);
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_BANNER,"sort = $value");
		}
	}
}
?>
