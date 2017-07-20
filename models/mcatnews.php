<?php
class Models_MCatnews extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	function getOneCatnewsRand($id){
		$this->where("Id != $id AND ticlock='0' AND parentid!=0");
		$this->getdata(TBL_CATNEWS,"rand()",1);
		return $this->fetchone();
	}
	//liet ke danh sach du lieu
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if($where != "")
			$this->where = ($where);
		$orderby = ($orderby != "")?$orderby:"Id desc";
		
		$this->select('Id,title_vn,title_en,sort,ticlock,parentid');
		$this->getdata(TBL_CATNEWS,$orderby,$limit);
		return $this->fetchall();
	}
	
	//lay thong tin mot chu de
	function getOneCatnews($id){
		$this->where("Id = $id");
		$this->getdata(TBL_CATNEWS);
		return $this->fetchone();
	}
	function getSubId($id)
	{
		$this->where("parentid = $id");
		$this->getdata(TBL_CATNEWS);
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
	function countdata($where){
		$sql="Select * from ".TBL_CATNEWS."  where ".$where." limit 0,4";
		$kq = mysql_query($sql) or die(mysql_error());
		$rw = mysql_num_rows($kq);
		return $rw;	
	}
	
	//lay tat ca cac id cung mot id goc tao thanh chuoi
	function getallcatidstr($id)
	{
		$allid = "";
		$sql =  mysql_query("select Id from ".TBL_CATNEWS." where ".parentid." = '$id'");
		while($rows = mysql_fetch_assoc($sql))
		{
			$allid .= ",".$rows['ID'];
		}
		
		$strid = substr($allid ,strstr($allid ,",")+1);
		if($strid == ""){
			$strid = $id;
		}
		return $strid;
	}
	function getidtoalia($alia){
		$sql = "select Id from ".TBL_CATNEWS." where alias='".$alia."' limit 0,1";
		$kq = mysql_query($sql) or die(mysql_error());
		$rw = mysql_fetch_assoc($kq);
		return $rw['Id'];
	}
	
	
}
?>