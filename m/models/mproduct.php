<?php
class Models_MProduct extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	//liet ke danh sach du lieu
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if($select != "")
			$this->select($select);
		if($where != "")
			$this->where($where);
		
		$this->getdata(TBL_PRODUCT,$orderby,$limit);
		return $this->fetchall();
	}
	function getAlias($id){
		$sql = 'select id from '.TBL_PRODUCT.' where alias = "'.$id.'" limit 1';
		$kq = mysql_query($sql);
		$row = mysql_fetch_assoc($kq);
		return $row['id'];
	}
	//lay tong so dong
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_PRODUCT);
		return $this->num_rows();
	}
	
	function countView($id){
		$this->where("Id = '".$id."'");
		$this->update(TBL_PRODUCT, "now_number = (now_number+1)");
	}

	//lay thong tin mot tin
	function getOneProduct($id){
		$this->where("id = $id");
		$this->getdata(TBL_PRODUCT);
		return $this->fetchone();
	}

	//liet ke du lieu 2 table
	function listTwoTable($table1, $table2, $select = '', $on, $where = '',$order = '', $limit = ''){
		if($select != ''){
			$this->select($select);
		}
		if($where != ''){
			$this->where($where);
		}
		$this->getLeftJoinData($table1, $table2, $on, $order, $limit);
		return $this->fetchall();
	}
	
	//dem so dong du lieu 2 table
	function numberTwoTable($table1, $table2, $on,$where = ''){
		if($where != ''){
			$this->where($where);
		}
		$this->getLeftJoinData($table1, $table2, $on);
		return $this->num_rows();
	}
	function seach($lang = "vn",$tukhoa='',$tugia = 0,$dengia = 0,$idcat = 0){
		echo $sql = " SELECT * FROM mn_product WHERE ticlock = '0' AND ( idcat = '$idcat' OR '$idcat' ='0') AND (price >= '$tugia' OR '$tugia' = '0') AND (price <= '$dengia' OR '$dengia' = '0') AND title_".$lang." like '%".$tukhoa."%' ";
		$kq = mysql_query($sql) or die(mysql_error());
		return $kq;
	} 
}
?>