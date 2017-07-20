<?php

if($_SESSION['level'] != 1){	redirect(BASE_URL_ADMIN);}$db = new Models_Muser;$data = $db->list_user();loadview("user/list_view",$data);?>