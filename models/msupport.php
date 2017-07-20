<?php
class Models_Msupport extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata(){
		$this->getdata(TBL_SUPPORT,"sort asc, id desc");
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		$this->getdata(TBL_SUPPORT);
		return $this->num_rows();
	}
	
	
	//lay thong tin mot chu de
	function getOnesupport($id){
		$this->where("Id = $id");
		$this->getdata(TBL_SUPPORT);
		return $this->fetchone();
	}
	
}
?>