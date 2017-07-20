<?php
class Models_MStyleProduct extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata(){
		$this->getdata(TBL_STYLEPRODUCT,"Id asc");
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		$this->getdata(TBL_STYLEPRODUCT);
		return $this->num_rows();
	}
	
	
	function getOneRows($id){
		$this->where = "Id = '$id'";
		$this->getdata(TBL_STYLEPRODUCT);
		return $this->fetchone();
	}
	
	
}
?>