<?php
class Models_MTinmoi extends Project
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
		$this->getdata(TBL_TINMOI,"idTin asc","$start,$numrow");
		$row = $this->num_rows();
		return $this->fetchall();
	}
	
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_TINMOI);
		return $this->num_rows();
	}
	
	/*
	 * tic lock mot tin
	 */
	function ticlockactive($data,$idTin){
		$this->where('idTin = '.$idTin);
		$this->update(TBL_TINMOI,$data);	
	}
	
	/*
	 * tic lock mot tin
	 */
	function hidTineshow($data,$idTin){
		$this->where('idTin = '.$idTin);
		$this->update(TBL_TINMOI,$data);	
	}
	
	/*
	 * them mot tin
	 */
	function addNews($data){
		$this->insert(TBL_TINMOI,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneNews($idTin){
		$this->where("idTin = $idTin");
		$this->getdata(TBL_TINMOI);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editNews($data,$idTin){
		$this->where("idTin = $idTin");
		$this->update(TBL_TINMOI,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_TINMOI,'idTin = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($idTin){
		$this->delete(TBL_TINMOI,'idTin = '.$idTin);
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("idTin = $key");
			$this->update(TBL_TINMOI,"sort = $value");
		}
	}
}
?>