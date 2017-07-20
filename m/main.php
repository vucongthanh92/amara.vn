<?php
$mod = varGetPost('mod');
switch ($mod)
{
	case "bao-gia":			include ("controllers/baogia/baogia.php"); break;
	case "partners":		include ("controllers/partners/partners.php"); break;
	case "thanhtoan":			include ("controllers/contact/thanhtoan.php"); break;
	case "payment":			include ("controllers/payment/paymentcontroller.php"); break;
	case "comment":			include ("controllers/comment/controllers.php"); break;
	case "lien-he":			include ("controllers/contact/contact.php"); break;
	case "bai-viet":		include ("controllers/pagehtml/pagehtmlcontroller.php"); break;
	case "tin-tuc":			include ("controllers/news/newscontroller.php"); break;
	case "sanpham":		    include ("controllers/product/productcontroller.php"); break;
	case "thanhvien":			include ("controllers/thanhvien/thanhviencontroller.php"); break;
	default:
							include ("controllers/default/default.php"); break;
}
?>

