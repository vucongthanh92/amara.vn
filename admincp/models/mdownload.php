<?php
class Models_MDownload extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		$this->select('Id,title_vn,file_vn,file_en');
		$this->getdata(TBL_DOWNLOAD,"id desc");
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		$this->getdata(TBL_DOWNLOAD);
		return $this->num_rows();
	}
	
	/*
	 * tic lock chu de
	 */
	function delFile($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_DOWNLOAD,$data);	
	}
	
	/*
	 * them mot chu de
	 */
	function adddownload($data){
		$this->insert(TBL_DOWNLOAD,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot chu de
	 */
	function getOnedownload($id){
		$this->where("Id = $id");
		$this->getdata(TBL_DOWNLOAD);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editdownload($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_DOWNLOAD,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$row = $this->getOnedownload($item);
			if(file_exists('../data/download/'.$row['file_vn']))
				unlink('../data/download/'.$row['file_vn']);
			if(file_exists('../data/download/'.$row['file_en']))
				unlink('../data/download/'.$row['file_en']);
			$this->delete(TBL_DOWNLOAD,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_DOWNLOAD,'Id = '.$id);
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_DOWNLOAD,"sort = $value");
		}
	}
}
?>