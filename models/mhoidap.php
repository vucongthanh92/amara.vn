<?php
class Models_MHoidap extends Project
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
		
		$this->getdata(TBL_HOIDAP,$orderby,$limit);
		return $this->fetchall();
	}
	
	function returnIdinsert(){
		return $this->insertid();
	}
	
	//lay thong tin mot tin
	function getOneNews($id,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("Id = '$id'");
		$this->getdata(TBL_HOIDAP);
		return $this->fetchone();
	}
	//lay tong so dong
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_HOIDAP);
		return $this->num_rows();
	}
	
	function addNew($data)
	{
		$this->insert(TBL_HOIDAP,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * edit thong tin
	 */
	function editNew($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_HOIDAP,$data);
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_HOIDAP,'Id = '.$id);
	}
}
?>