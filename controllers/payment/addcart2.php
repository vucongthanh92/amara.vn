<?php
$mpayment = new Models_MPayment;

$id = varGetPost("idproduct");
$soluong = varGetPost('soluong');

$mpayment->addcartqty($id,$soluong);

echo 0;
return;
?>