<?php
class Models_Mcontact extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata(){
		$this->getdata(TBL_CONTACT,"sort  asc, Id desc");
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		$this->getdata(TBL_CONTACT);
		return $this->num_rows();
	}
	
	//tic lock chu de
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_CONTACT,$data);	
	}
	
	//them mot chu de
	function addcontact($data){
		$this->insert(TBL_CONTACT,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	//lay thong tin mot chu de
	function getOnecontact($id){
		$this->where("Id = $id");
		$this->getdata(TBL_CONTACT);
		return $this->fetchone();
	}
	
	//edit thong tin
	function editcontact($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_CONTACT,$data);
	}	
	
	//delete nhieu dong
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_CONTACT,'Id = '.$item);
		}
	}
	
	//delete mot dong
	function del_onecheck($id){
		$this->delete(TBL_CONTACT,'Id = '.$id);
	}
	
	//cap nhat sap xep thu tu (sort)
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_CONTACT,"sort = $value");
		}
	}
}
?>