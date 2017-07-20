<?php
class Models_MCatelog extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata($select = "",$where = "",$orderby = "",$limit = "")
	{
		if($select != "")
			$this->select($select);
		if($where != "")
			$this->where($where);
			
		$this->getdata(TBL_CATELOG,$orderby,$limit);
		return $this->fetchall();
	}
	
	//lay thong tin mot chu de
	function getOneCatelog($id)
	{
		$this->select('*');
		$this->where("id = $id");
		$this->getdata(TBL_CATELOG);
		return $this->fetchone();
	}
	
	//lay tat ca cac id cua idgoc
	function getSubid($id)
	{
		$this->where("parentid = $id");
		$this->getdata(TBL_CATELOG);
		$allid = "";
		$rows = $this->fetchall();
		if(!empty($rows)){
			foreach($rows as $item)
			{
				$allid .= $item['id'].",";
			}
		}
		return $allid;
	}
	function getParent()
	{
		$this->where("parentid = '0'");
		$this->getdata(TBL_CATELOG);
		$allid = "";
		$rows = $this->fetchall();
		if(!empty($rows)){
			foreach($rows as $item)
			{
				$allid .= $item['id'].",";
			}
		}
		return $allid;
	}
	
}
?>