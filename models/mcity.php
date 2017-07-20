<?php
class Models_MCity extends Project
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
			
		$this->getdata(TBL_CITY,$orderby,$limit);
		return $this->fetchall();
	}
	function getAlias($id){
		$sql = "select id from ".TBL_CITY." where alias = '".$id."'";
		$kq = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_assoc($kq);
		return $row['id'];
	}
	//lay thong tin mot chu de
	function getOneCity($id)
	{
		$this->select('*');
		$this->where("id = $id");
		$this->getdata(TBL_CITY);
		return $this->fetchone();
	}

	//lay tat ca cac id cua idgoc
	function getSubId($id)
	{
		$this->where("parentid = $id");
		$this->getdata(TBL_CITY);
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
	function getParent()
	{
		$this->where("parentid = '0'");
		$this->getdata(TBL_CITY);
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