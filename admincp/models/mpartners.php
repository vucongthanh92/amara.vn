<?php
class Models_MPartners extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		$this->getdata(TBL_PARTNERS,"Id asc");
		return $this->fetchall();
	}
	
	/*
	 * tic lock mot tin
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_PARTNERS,$data);	
	}
	
	/*
	 * them mot chu de
	 */
	function addPartners($data){
		$this->insert(TBL_PARTNERS,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot chu de
	 */
	function getOnePartners($id){
		$this->where("Id = $id");
		$this->getdata(TBL_PARTNERS);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editPartners($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_PARTNERS,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_PARTNERS,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_PARTNERS,'Id = '.$id);
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_PARTNERS,"sort = $value");
		}
	}
}
?>