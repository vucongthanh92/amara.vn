<?php			
switch($mod)
{
	case 'comment': 	include ('controllers/comment/controller.php');break;
	case 'support':		include ('controllers/support/controller.php');break;
	case 'flash': 		include ('controllers/flash/controller.php');break;
	//download
	case 'download': 	include ('controllers/download/controller.php');break;	
	case 'contact': 	include ('controllers/contact/controller.php');break;
	case 'website': 	include ('controllers/website/controller.php');break;
	case 'video': 	include ('controllers/video/controller.php');break;	
	case 'thanhvien': 	include ('controllers/thanhvien/thanhviencontroller.php');break;
	//picture
	case 'picture': 	include ('controllers/picture/controller.php');break;	
	//email
	case 'email': 	include ('controllers/email/controller.php');
		break;	
	//email
	case 'commentnew': 	include ('controllers/commentnew/controller.php');
		break;	
	//forum
	case 'hoidap': 
		include ('controllers/hoidap/controller.php');
		break;	
	
	//payment
	case 'payment': 
		include ('controllers/payment/paymentcontroller.php');
		break;
	case 'folder': 
		include ('controllers/folder/foldercontroller.php');
		break;	
		
	
	//configuration
	case 'titlepage': 
		include ('controllers/titlepage/list.php');
		break;	
		
	//pagehtml
	case 'pagehtml': 
		include ('controllers/pagehtml/pagehtmlcontroller.php');
		break;	
	
	//san pham
	case 'manufacturer': 
		include ('controllers/manufacturer/manufacturercontroller.php');
		break;
	case 'city': 
		include ('controllers/city/controller.php');
		break;
	case 'catelog': 
		include ('controllers/catelog/catelogcontroller.php');
		break;
	case 'product': 
		include ('controllers/product/productcontroller.php');
		break;
	case 'styleproduct': 
		include ('controllers/styleproduct/controller.php');
		break;
		
	//tin tuc	
	case 'news': 
		include ('controllers/news/newscontroller.php');
		break;
	case 'catnews': 
		include ('controllers/catnews/catnewscontroller.php');
		break;
		
	//khach hang
	case 'guest': 
		include ('controllers/guest/guestcontroller.php');
		break;
	
	//partners (doi tac)
	case 'partners': 
		include ('controllers/partners/partnerscontroller.php');
		break;
	
	//weblink
	case 'weblink': 
		include ('controllers/weblink/weblinkcontroller.php');
		break;
		
	//	hinh banner
	case 'banner': 
		include ('controllers/banner/bannercontroller.php');
		break;
		
	//	user admin
	case 'user': 
		include ('controllers/user/usercontroller.php'); 
		break;
	case 'logout':
		include ('logout.php');
		break;
		
	default:
		include('general.php');
		break;
}
?>