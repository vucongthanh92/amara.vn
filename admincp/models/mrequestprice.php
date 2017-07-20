<?php
class Models_MRequestprice extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if(isset($where) && $where != ""){
			$this->where($where);
		}
		
		$this->getdata(TBL_REQUESTPRICE,$orderby,$limit);
		return $this->fetchall();
	}
	
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_REQUESTPRICE);
		return $this->num_rows();
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneNew($id,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("Id = '$id'");
		$this->getdata(TBL_REQUESTPRICE);
		return $this->fetchone();
	}
	
	/*
	 * lay thong tin thiet bi
	 */
	function getListTb($id){
		$this->where("idrq = '$id'");
		$this->getdata(TBL_REQUESTPRICETB);
		return $this->fetchall();
	}
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_REQUESTPRICE,'Id = '.$item);
			$this->delete(TBL_REQUESTPRICETB,'idrq = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_REQUESTPRICE,'Id = '.$id);
		$this->delete(TBL_REQUESTPRICETB,'idrq = '.$id);
	}	
}
?>