<?php
class Models_MEmail extends Project
{
	public function __construct(){
		parent::__construct();
	}
	
	
	//them mot user
	public function add_email($data){	
		$this->insert(TBL_EMAIL,$data);
	}
	
}
?>