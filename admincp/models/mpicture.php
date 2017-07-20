<?php
class Models_MPicture extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata($where = "",$start,$numrow){
		if($where != "")
			$this->where($where);	
		$this->getdata(TBL_ALBUMIMAGE,"Id asc","$start,$numrow");
		$row = $this->num_rows();
		return $this->fetchall();
	}
	
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_ALBUMIMAGE);
		return $this->num_rows();
	}
	
	/*
	 * them mot tin
	 */
	function addNew($data){
		$this->insert(TBL_ALBUMIMAGE,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneNews($id){
		$this->where("Id = $id");
		$this->getdata(TBL_ALBUMIMAGE);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editNews($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_ALBUMIMAGE,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_ALBUMIMAGE,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_ALBUMIMAGE,'Id = '.$id);
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_ALBUMIMAGE,"sort = $value");
		}
	}
}
?>