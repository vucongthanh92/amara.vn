<?php
	unset($_SESSION['login_id']);
	unset($_SESSION['login_user_id']);
	unset($_SESSION['login_username']);
	unset($_SESSION['cart2']);
	redirect(BASE_URL);

?>