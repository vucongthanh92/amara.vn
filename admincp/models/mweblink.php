<?php
class Models_MWeblink extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		$this->getdata(TBL_WEBLINK,"id asc");
		return $this->fetchall();
	}
	
	/*
	 * tic lock mot tin
	 */
	function ticlockactive($data,$id){
		$this->where('id = '.$id);
		$this->update(TBL_WEBLINK,$data);	
	}
	
	/*
	 * them mot chu de
	 */
	function addWeblink($data){
		$this->insert(TBL_WEBLINK,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot chu de
	 */
	function getOneWeblink($id){
		$this->where("id = $id");
		$this->getdata(TBL_WEBLINK);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editWeblink($data,$id){
		$this->where("id = $id");
		$this->update(TBL_WEBLINK,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_WEBLINK,'id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_WEBLINK,'id = '.$id);
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("id = $key");
			$this->update(TBL_WEBLINK,"sort = $value");
		}
	}
}
?>