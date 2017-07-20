<?php
class Models_MProduct extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata($where,$start,$numrow){
		if($where != ''){
			$this->where($where);
		}
	
		$this->getdata(TBL_PRODUCT,"id desc,group_id asc, sort asc","$start,$numrow");
		return $this->fetchall();
	}
	
	/*
	 * insert id
	 */
	
	function getinsertid(){
		return $this->insertid();
	}
	
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_PRODUCT);
		return $this->num_rows();
	}
	
	/*
	 * tic lock mot tin
	 */
	function ticlockactive($data,$id){
		$this->where('id = '.$id);
		$this->update(TBL_PRODUCT,$data);	
	}
	
	/*
	 * them mot tin
	 */
	function addProduct($data){
		$this->insert(TBL_PRODUCT,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneProduct($id){
		$this->where("id = $id");
		$this->getdata(TBL_PRODUCT);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editProduct($data,$id){
		$this->where("id = $id");
		$this->update(TBL_PRODUCT,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_PRODUCT,'id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_PRODUCT,'id = '.$id);
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("id = $key");
			$this->update(TBL_PRODUCT,"sort = $value");
		}
	}
	
	/*
	 * cap nhat giá
	 */
	function editPrice($data){
		foreach($data as $key => $value){
			$this->where("id = $key");
			settype($value,"int");
			$this->update(TBL_PRODUCT,"team_price = $value");
		}
	}
	
	function editPriceOld($data){
		foreach($data as $key => $value){
			$this->where("id = $key");
			settype($value,"int");
			$this->update(TBL_PRODUCT,"team_priceold = $value");
		}
	}
	
	/*
	 * bat la tin moi
	 */
	function hideshow($data,$id){
		$this->where('id = '.$id);
		$this->update(TBL_PRODUCT,$data);	
	}
	
	/*tic lock chu de*/
	function delFile($data,$id){
		$this->where('id = '.$id);
		$this->update(TBL_PRODUCT,$data);	
	}
	
}
?>