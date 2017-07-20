<?php
class Models_MManufacturer extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata($select = '', $where = '', $order = '', $limit = ''){
		if($select != ''){
			$this->select($select);
		}
		if($where != ''){
			$this->where($where);
		}
		$this->getdata(TBL_MANUFACTURER,"Id asc");
		return $this->fetchall();
	}
	
	function getOneRows($id){
		$this->where = "Id = '$id'";
		$this->getdata(TBL_MANUFACTURER);
		return $this->fetchone();
	}
	
	//lay tat ca cac id cua idgoc
	function getSubId($id)
	{
		$this->where("parentid = $id");
		$this->getdata(TBL_MANUFACTURER);
		$allid = "";
		$rows = $this->fetchall();
		if(!empty($rows)){
			foreach($rows as $item)
			{
				$allid .= $item['Id'].",";
			}
		}
		return $allid;
	}
}
?>