<?php

class Models_MConfiguration extends Project
{
	function __construct(){
		parent::__construct();
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
		
		$this->getdata(TBL_CONFIGURATION,$orderby,$limit);
		return $this->fetchone();
	}	
	
}
?>
