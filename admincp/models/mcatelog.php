<?php
class Models_MCatelog extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		
		$this->select('*');
		$this->getdata(TBL_CATELOG,"zone asc,sort_order asc, id desc");
		return $this->fetchall();
	}
	function listdata_where($where){
		$this->where($where);
		$this->select('*');
		$this->getdata(TBL_CATELOG,"zone asc,sort_order asc, id desc");
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		$this->getdata(TBL_CATELOG);
		return $this->num_rows();
	}
	
	/*
	 * tic lock chu de
	 */
	function ticlockactive($data,$id){
		$this->where('id = '.$id);
		$this->update(TBL_CATELOG,$data);	
	}
	
	function hideshow($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_CATELOG,$data);	
	}
	
	/*
	 * them mot chu de
	 */
	function addCatelog($data){
		$this->insert(TBL_CATELOG,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot chu de
	 */
	function getOneCatelog($id){
		$this->where("id = $id");
		$this->getdata(TBL_CATELOG);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editCatelog($data,$id){
		$this->where("id = $id");
		$this->update(TBL_CATELOG,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			if($this->checkDataDelete($item)<=0){
				$this->delete(TBL_CATELOG,'id = '.$item);
			}
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){

			$this->delete(TBL_CATELOG,'id = '.$id);

	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("id = $key");
			$this->update(TBL_CATELOG,"sort_order = $value");
		}
	}
	/*-----------------------check datadelte--------------*/
	function checkDataDelete($id){
		
		$sql2 = "select * from ".TBL_CATELOG." WHERE parentid = ".$id;
		$fa = mysql_query($sql2)or die(mysql_error());
		$bg = mysql_num_rows($fa);
		if($bg>0){
			return 10;
		}
		$sql = "select * from ".TBL_PRODUCT." where idcat in (".$id.")";
		$kq = mysql_query($sql) or die(mysql_error());
		$rs = mysql_fetch_row($kq);
		return $rs[0];
	}
}
?>