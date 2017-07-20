<?php
class Models_MHoidap extends Project
{
	function __construct()
	{
		parent:: __construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata($where = "",$start,$numrow){
		if($where != "")
			$this->where($where);	
		$this->getdata(TBL_HOIDAP,"Id DESC","$start,$numrow");
		$row = $this->num_rows();
		return $this->fetchall();
	}
	/*
	 * tic lock mot tin
	 */
	function hideshow($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_HOIDAP,$data);	
	}
	
	/*
	 * tic lock mot tin
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_HOIDAP,$data);	
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneNew($id,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("Id = '$id'");
		$this->getdata(TBL_HOIDAP);
		return $this->fetchone();
	}
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_HOIDAP);
		return $this->num_rows();
	}
	
	/*
	 * them mot tin
	 */
	function addNew($data){
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
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_HOIDAP,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_HOIDAP,'Id = '.$id);
	}
}
?>