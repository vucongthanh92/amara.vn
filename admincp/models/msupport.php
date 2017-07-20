<?php
class Models_Msupport extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata(){
		$this->getdata(TBL_SUPPORT,"sort  asc, Id desc");
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		$this->getdata(TBL_SUPPORT);
		return $this->num_rows();
	}
	
	//tic lock chu de
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_SUPPORT,$data);	
	}
	
	//them mot chu de
	function addsupport($data){
		$this->insert(TBL_SUPPORT,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	//lay thong tin mot chu de
	function getOnesupport($id){
		$this->where("Id = $id");
		$this->getdata(TBL_SUPPORT);
		return $this->fetchone();
	}
	
	//edit thong tin
	function editsupport($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_SUPPORT,$data);
	}	
	
	//delete nhieu dong
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_SUPPORT,'Id = '.$item);
		}
	}
	
	//delete mot dong
	function del_onecheck($id){
		$this->delete(TBL_SUPPORT,'Id = '.$id);
	}
	
	//cap nhat sap xep thu tu (sort)
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_SUPPORT,"sort = $value");
		}
	}
}
?>