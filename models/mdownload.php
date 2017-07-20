<?php
class Models_MDownload extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata(){
		$this->select('Id,title_vn,file_vn,file_en,title_en');
		$this->getdata(TBL_DOWNLOAD,"id desc");
		return $this->fetchall();
	}
	
	
	//lay thong tin mot chu de
	function getOnedownload($id){
		$this->where("Id = $id");
		$this->getdata(TBL_DOWNLOAD);
		return $this->fetchone();
	}
	//lay thong tin mot chu de
	function getOnedownload2(){
		$this->getdata(TBL_DOWNLOAD);
		return $this->fetchone();
	}
}
?>