<?php
$db = new Models_MCatelog;

if(isset($_POST['addnew'])){

	
	$data = array(
		'name' 		    => varPost('name'),
		'parentid'		=> varPost('parentid'),
		'sort_order'	=> varPost('sort'),
		'zone'			=> varPost('zone'),
		'ticlock'		=> varPost('ticlock','0'),
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('name'));
	}else {$data['alias'] = varPost('alias'); }

	if($db-> addCatelog($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
	
		redirect(BASE_URL_ADMIN."catelog/list");
		return;
	}
}else{
	$data = '';
}

loadview('catelog/add_view',$data);
?>