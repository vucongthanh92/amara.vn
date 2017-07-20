<?php
#####################################
#								    #	
# class model user		  		    #	
# Author: Phan Văn  Quyền           #
# email	: vquyen2790@gmail.com      #
# date	: 10/12/2012		        #
#									#
#####################################

class Models_Muser extends Project{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function checklogin($data)
	{
		foreach($data as $k => $v)
		{
			$arr[$k] = $this->sqlQuote($v); 
		}
		$this->where($arr);
		$this->getdata(TBL_ADMIN);
		if($this->num_rows() == 1)
		{
			$rows = $this->fetchone();
			$info = array(
				"user" 	=> $rows['username'],
				"level" => $rows['level'],
			);
			return $info;
		}
		else
		{
			return 0;
		}
	}
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_ADMIN,$data);	
	}
	public function list_user()
	{	$this->where('Id != 5');
		$this->getdata(TBL_ADMIN);
		return $this->fetchall();
	}
	
	public function check_user($data,$id = "")
	{
		if($id != "")
		{
			$where=array(
					"username =" => $data['username'],
					"Id !="		 => $id
			);
		}
		else
		{
			$where = "username = '".$data['username']."'";
		}
		
		$this->where($where);
		$this->getdata(TBL_ADMIN);
		if($this->num_rows() == 1)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	public function create_user($data)
	{	
		if($this->check_user($data) == 0)
		{
			return 0;
		}
		else
		{
			$this->insert(TBL_ADMIN,$data);
			return 1;
		}
	}
	
	public function del_user($data)
	{
		$this->delete(TBL_ADMIN,"Id = '$data' and Id != '1'");
	}
	
	public function del_more_user($data)
	{
		foreach($data as $item)
		{
			$this->delete(TBL_ADMIN,"Id = '$item' and Id != '1'");
		}
	}
	
	public function get_user($id)
	{
		$this->where("Id = '$id'");
		$this->getdata(TBL_ADMIN);
		return $this->fetchone();
	}
	
	public function update_user($arr,$id)
	{
		//if($this->check_user($arr,$id) == 0)
		//{
		//	return 0;
		//}
		//else
		//{
			$this->where("Id = '$id'");
			$this->update(TBL_ADMIN,$arr);
			return 1;
		//}
	}
}

?>