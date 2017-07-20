<?php

class Models_MPayment extends Project
{
	function __construct()
	{
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */

	function listCustomer($where = "",$start,$numrow){
		if($where != "")
			$this->where($where);	
		$this->getdata(TBL_CUSTOMER,"id DESC","$start,$numrow");
		$row = $this->num_rows();
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_CUSTOMER);
		return $this->num_rows();
	}
	
	/*
	 * thông tin mot khach hang
	 */
	function OneCustomer($id)
	{
		$this->where("id = '$id'");
		$this->getdata(TBL_CUSTOMER);
		return $this->fetchone();
	}
	
	/*
	 * liet ke danh sach gio hang
	 */
	function listCustomerCart($id)
	{
		$this->where = "idcustomer = '$id'";			
		$this->getdata(TBL_CUSTOMER_CART);
		return $this->fetchall();
	}
	/*
	 * bat la tin moi
	 */
	function hideshow($data,$id){
		$this->where('id = '.$id);
		$this->update(TBL_CUSTOMER,$data);	
	}
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_CUSTOMER,'id = '.$item);
			$sql = "delete mn_customer_cart where idcustomer = '".$item."'";
			mysql_query($sql);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_CUSTOMER,'id = '.$id);
		/*$sql = "delete mn_customer_cart where idcustomer = '".$id."'";
		mysql_query($sql);*/

	}
	function editCustomer($data,$id){
		$this->where("id = $id");
		$this->update(TBL_CUSTOMER,$data);
		//echo $id;
	}	
	
}

?>