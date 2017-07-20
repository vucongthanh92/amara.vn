<?php
$mcatnews = new Models_MCatnews;

if(isset($_POST['check_list'])){
	$mcatnews -> del_allcheck($_POST['check_list']);
	redirect(BASE_URL_ADMIN."catnews/list");
}
else{
	$id = varGetPost('id');
	if($mcatnews->checkDataDelete($id) <=0) {
		$mcatnews -> del_onecheck($id);
	}
	
}
redirect(BASE_URL_ADMIN."catnews/list");
?>