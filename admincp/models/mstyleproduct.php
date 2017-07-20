<?php
class Models_MStyleProduct extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		$this->getdata(TBL_STYLEPRODUCT,"Id asc");
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		$this->getdata(TBL_STYLEPRODUCT);
		return $this->num_rows();
	}
	
	/*
	 * tic lock chu de
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_STYLEPRODUCT,$data);	
	}
	
	/*
	 * them mot chu de
	 */
	function addCatelog($data){
		$this->insert(TBL_STYLEPRODUCT,$data);
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
		$this->where("Id = $id");
		$this->getdata(TBL_STYLEPRODUCT);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editCatelog($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_STYLEPRODUCT,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_STYLEPRODUCT,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_CATELOG,'Id = '.$id);
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_CATELOG,"sort = $value");
		}
	}
}
?>