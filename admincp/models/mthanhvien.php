<?php
class Models_MThanhvien extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){

	
		$this->getdata(TBL_THANHVIEN,"id asc");
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
		$this->getdata(TBL_THANHVIEN);
		return $this->num_rows();
	}
	
	/*
	 * tic lock mot tin
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_THANHVIEN,$data);	
	}
	
	/*
	 * them mot tin
	 */
	function addUser($data){
		$this->insert(TBL_THANHVIEN,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneUser($id){
		$this->where("id = $id");
		$this->getdata(TBL_THANHVIEN);
		return $this->fetchone();
	}
	 
	function CheckUsername($username) {
		$sql = "SELECT * FROM ".TBL_THANHVIEN." WHERE username = '".$username."'";
		$kq = mysql_query($sql) or die(mysql_error());
		$sq = mysql_fetch_row($kq);
		return $sq[0];
	}
	function CheckEmailUser($email) {
		$sql = "SELECT * FROM ".TBL_THANHVIEN." WHERE email = '".$email."'";
		$kq = mysql_query($sql) or die(mysql_error());
		$sq2 = mysql_fetch_row($kq);
		return $sq2[0];
	}
	/*
	 * edit thong tin
	 */
	function editThanhVIenUser($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_THANHVIEN,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_THANHVIEN,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_THANHVIEN,'Id = '.$id);
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_THANHVIEN,"sort = $value");
		}
	}
	
	/*
	 * cap nhat giá
	 */
	function editPrice($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
		
			settype($value,"int");
			$this->update(TBL_THANHVIEN,"price = $value");
		}
	}
	
	/*
	 * bat la tin moi
	 */
	function hideshow($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_THANHVIEN,$data);	
	}
	
	/*tic lock chu de*/
	function delFile($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_THANHVIEN,$data);	
	}
	
}
?>