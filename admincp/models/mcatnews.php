<?php
class Models_MCatnews extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		$this->select('*');
		$this->getdata(TBL_CATNEWS,"Id asc");
		return $this->fetchall();
	}
	
	/*
	 * tic lock chu de
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_CATNEWS,$data);	
	}
	function hideshow($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_CATNEWS,$data);	
	}
	/*
	 * them mot chu de
	 */
	function addCatnews($data){
		$this->insert(TBL_CATNEWS,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot chu de
	 */
	function getOneCatnews($id){
		$this->where("Id = $id");
		$this->getdata(TBL_CATNEWS);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editCatnews($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_CATNEWS,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			if($this->checkDataDelete($item)<=0) {
				$this->delete(TBL_CATNEWS,'Id = '.$item);
			}
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_CATNEWS,"Id = $id");
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_CATNEWS,"sort = $value");
		}
	}
	/*--------------------check data-----------------*/
	function checkDataDelete($id){
		$info = $this->getOneCatnews($id);
		//echo $id;
		$sql2 = "select Id from ".TBL_CATNEWS." WHERE parentid = ".$id;
		$fa2 = mysql_query($sql2)or die(mysql_error());
		$bg = mysql_num_rows($fa2);

		if($bg > 0){
			return 10;
		}
		$sql = "select Id from ".TBL_NEWS." where idcat in(".$id.")";
		$kq = mysql_query($sql) or die(mysql_error());
		$rs = mysql_fetch_row($kq);
		return $rs[0];
	}
}
?>