<?php

class Models_MConfiguration extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		$this->getdata(TBL_CONFIGURATION,"Id asc");
		$row = $this->num_rows();
		return $this->fetchone();
	}
	
	
	/*
	 * edit thong tin
	 */
	function editConfig($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_CONFIGURATION,$data);
	}	
	
}
?>
