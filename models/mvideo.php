<?php
class Models_MVideo extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*liet ke danh sach du lieu*/
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if(isset($where) && $where != ""){
			$this->where($where);
		}
		
		$this->getdata(TBL_VIDEO,$orderby,$limit);
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		$this->getdata(TBL_VIDEO);
		return $this->num_rows();
	}
	
	
	/*lay thong tin mot chu de*/
	function getOneflash($id){
		$this->where("Id = $id");
		$this->getdata(TBL_VIDEO);
		return $this->fetchone();
	}
	
}
?>