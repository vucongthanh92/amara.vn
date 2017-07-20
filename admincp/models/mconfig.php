<?php
#####################################
#									
# class model config	  			
# Author: Tran Minh Nhat
# email	: cubiminhnhat@yahoo.com 	
# date	: 06/2010						
#									
#####################################

class Models_Mconfig extends project{

	public function __construct()
	{
		parent::__construct();
	}
	
	/*
	 * phan config
	 */
	public function getdata_cf()
	{
		$this->getdata(PREFIX."configuration");
		return $this->fetchall();
	}
	
	public function edit_config($data,$id)
	{
		$this->update(PREFIX."configuration",$data,"ID = '$id'");
	}
	
	/*
	 * phan support
	 */
	public function list_support()
	{
		$this->getdata(PREFIX."support");
		return $this->fetchall();
	}
	
	public function create_support($data)
	{
		if($this->insert(PREFIX."support",$data))
		{
			return 1;
		}
		else
		{
			return 0;
		}
		
	}
	
	public function getid_support($id)
	{
		$this->where("ID = '$id'");
		$this->getdata(PREFIX."support");
		return $this->fetchone();
	}
	
	public function edit_support($data, $id)
	{
		if($this->update(PREFIX."support",$data,"ID = '$id'"))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function del_support($data)
	{
		if(is_array($data))
		{
			foreach($data as $item)
			{
				$this->delete(PREFIX."support","ID = '$item'");
			}
		}
		else
		{
			$this->delete(PREFIX."support","ID = '$data'");
		}
	}
}

?>