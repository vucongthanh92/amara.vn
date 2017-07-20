<?php
class Models_MNews extends Project
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
		
		$this->getdata(TBL_NEWS,$orderby,$limit);
		return $this->fetchall();
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneNewsToCat($idcat,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("idcat = '$idcat'");
		$this->getdata(TBL_NEWS);
		return $this->fetchone();
	}
	
	/*function countView($id){
		$row = $this->getOneNews($id);
		$visit = $row['visit']+1;
		$data = array(
			"visit"=>$visit,
		);
		$this->where('Id = '.$id);
		$this->update(TBL_NEWS,$data);	
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneNews($id,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("Id = '$id'");
		$this->getdata(TBL_NEWS);
		return $this->fetchone();
	}
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_NEWS);
		return $this->num_rows();
	}

	function countView($id){
		$this->where("Id = '".$id."'");
		$this->update(TBL_NEWS, " 	visit = (visit+1)");
	}
}
?>