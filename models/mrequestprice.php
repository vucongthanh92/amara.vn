<?php
class Models_MRequestprice extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	//them mot tin
	function addNew($data){
		$this->insert(TBL_REQUESTPRICE,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	function addNewTb($data){
		if(!empty($data))
		{
			foreach($data as $item)
			{
				$this->insert(TBL_REQUESTPRICETB,$item);
			}
		}	
	}
	
}
?>