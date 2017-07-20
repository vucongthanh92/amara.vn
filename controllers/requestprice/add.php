<?php

$title_page .= "-"."Yêu cầu báo giá";
$map_title .= $arrowmap."<a href = '".BASE_URL."requestprice/form/yeu-cau-bao-gia.htm' class = 'linkred'>".YEUCAUBAOGIA."</a>";
$rqprice['map_title'] =  $map_title;

$db = new Models_MRequestprice;

if(isset($_POST['addnew'])){
	
	$id = idMax(TBL_REQUESTPRICE) + 1;
	$datainfo = array(
		'Id'			=> $id,
		'fullname' 		=> addslashes(varPost('fullname')),
		'address' 		=> addslashes(varPost('address')),
		'tel'			=> addslashes(varPost('tel','',1)),
		'fax'			=> addslashes(varPost('fax','',1)),
		'email'			=> addslashes(varPost('email','',1)),
		'note'			=> addslashes(varPost('note','',1)),
	);
	
	if(!empty($_POST['sp']))
	{
		$i=0;
		$datainfotb=array();
		foreach($_POST['sp'] as $item)
		{
			if($item != "")
			{
				$datainfotb[] = array(
					'idrq'		=> $id,	
					'nametb'	=> addslashes($item),
					'numbers'	=> addslashes($_POST['sl'][$i]),
				);
			}
			$i++;
		}
	}
	
	$db-> addNew($datainfo);
	$db-> addNewTb($datainfotb);
	
	//gui mail bao gia cho khách.
	$mconfigpage = new Models_MConfiguration;
	$configpage = $mconfigpage->listdata();
	
	if($_POST['email'] != "")
	{
		$email = trim($_POST['email']);
		$header = "Content-type: text/html\r\nFrom: ".$configpage['email']."\r\nReply-to:".$configpage['email']."";
		$content .= "Cám ơn bạn đã gửi báo giá cho chúng tôi. Chúng tôi sẽ hồi đáp trong thời gian sớm nhất.";
		$content .= "".BG_HOTEN.": $_POST[fullname] <br/>
					".BG_DIACHI.": $_POST[address] <br/>
					Tel: $_POST[tel] <br/>
					Fax: $_POST[fax] <br/>
					Email: $_POST[email] <br/>
					".GHICHU.": $_POST[note] <br/>
					";
		$content .= "<table width = '88%' border = '1' cellpadding = '0' cellspacing = '0'>
					<tr>
						<th>STT</th>
						<th><?php echo BG_TENTB;?></th>
						<th><?php echo BG_SL;?></th>
					</tr>";
					$i=0;
					foreach($datainfotb as $item)
					{
						$i++;
						$content .= "<tr>
								<td align ='center'>$i</td>
								<td>$item[nametb]</td> 
								<td align ='center'>$item[numbers]</td>
							</tr>
						";
					}
		$content .= "</table>";
				
		//gui mail
			include ("public/smtp/phpmailer.class.php");
			include ("phpmailer.class.php");
			$title_email = "Bao gia tai VIET CATHY";
			$content_email = "
				Thân chào ".$username."<br/>
				Cám ơn quý khách đã gửi báo giá tại VIỆT CATHY .<br/>
			";
			smtpmailer($email,'kythuat2@gmail.com', 'CÔNG TY TNHH DV VIỆT CATHY', $header,$content2);
	}
	
	redirect(BASE_URL."requestprice/formtc/yeu-cau-bao-gia.htm");
}

?>