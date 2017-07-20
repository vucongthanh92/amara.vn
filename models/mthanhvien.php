<?php
class Models_MThanhvien extends Project
{
	function __construct(){
		parent::__construct();
	}
	const SECRET_KEY = '@4!@#$%@';

	 function GenPassword($p) {
		return md5($p . self::SECRET_KEY);
	}
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_THANHVIEN,"id asc");
		return $this->fetchall();
	}
	
	function checklogin($username,$password){
		$pass =  $this->GenPassword($password);
		$sql = "SELECT * FROM user WHERE email= '$username' AND password = '$pass'";
		$kq = mysql_query($sql) or die(mysql_error());
		return $kq; 
	}
	function checkEmail($email){
		$sql = "SELECT * FROM user WHERE email= '$email'";
		$kq = mysql_query($sql) or die(mysql_error());
		return $kq; 
	}
	function checkEmailTT($email){
		$sql = "SELECT * FROM user WHERE email= '$email'";
		$kq = mysql_query($sql) or die(mysql_error());
		$ks = mysql_fetch_row($kq);
		return $ks[0]; 
	}
	function checkUSername($username){
		$sql = "SELECT * FROM user WHERE email= '$username'";
		$kq = mysql_query($sql) or die(mysql_error());
		$ks = mysql_fetch_row($kq);
		return $ks[0]; 
	}
	function checkEmailEdit($email,$id){
		$sql = "SELECT * FROM user WHERE email= '$email' AND id <>'$id'";
		$kq = mysql_query($sql) or die(mysql_error());
		return $kq; 
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
	 * them mot tin
	 */
	function addThanhvien($data){
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
	
	/*
	 * edit thong tin
	 */
	function editUser($data,$id){
		$this->where("id = $id");
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
	
	
	
}
?>