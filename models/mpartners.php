<?php
class Models_MPartners extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	function listdata(){
		$this->getdata(TBL_PARTNERS);
		return $this->fetchall();
	}
	function listdata_limit($orderby = "",$limit = ""){
	
		$this->getdata(TBL_PARTNERS,$orderby,$limit);
		return $this->fetchall();
	}
}
?>