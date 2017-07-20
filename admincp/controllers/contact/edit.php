<?php
$db = new Models_Mcontact;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	redirect(BASE_URL_ADMIN."contact/list");
	return;
}

$data['info'] = $db -> getOnecontact($id);
loadview("contact/edit_view",$data);
?>