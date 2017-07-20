<?php
$mpayment = new Models_MPayment;
$mthanhvien = new Models_MThanhvien;
$id = varGet("id");

if(isset($_POST['editnew']))
{
   $data = array
   (
		'view' => 1,
		'note' => $_POST['note'],
   );
   $mpayment ->editCustomer($data,$id);
   redirect(BASE_URL."/admincp/payment/list");
}

$data['cus'] = $mpayment->OneCustomer($id);
$data['cart'] = $mpayment->listCustomerCart($id);

loadview("payment/detail",$data);
?>