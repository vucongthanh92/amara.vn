<?php
class Models_MForum extends Project
{
	function __construct()
	{
		parent:: __construct();
	}
	
	//liet ke danh sach du lieu
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if(isset($where) && $where != ""){
			$this->where($where);
		}
		
		$this->getdata(TBL_FORUM,$orderby,$limit);
		return $this->fetchall();
	}
	
	//lay thong tin mot tin
	function getOneNews($id,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("Id = '$id'");
		$this->getdata(TBL_FORUM);
		return $this->fetchone();
	}
	//lay tong so dong
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_FORUM);
		return $this->num_rows();
	}
	
	function addNew($data)
	{
		$this->insert(TBL_FORUM,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
}
?>