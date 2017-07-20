<?php
    if(isset($_SESSION['cart2']))
	{
       loadview("payment/order",$cart);
	   
	}
	else
	{
		redirect(BASE_URL);
	}
?>