<?php 
session_start();
include('../libraries/session.php');
$session_user = new session();

include ('../libraries/class_db.php');
//include ('../config/config.php');
include ('../config/config_site.php');
include ('../libraries/project.php');
include ('../libraries/controls.php');
include ('models/muser.php');
unset($message);
if(isset($_POST['user'])){
	$data = array(
		'Username ='	=> $_POST['user'],
		'Password ='	=> md5(md5($_POST['pass'])),
		'Email ='		=> $_POST['email'],
	);
	
	$muser = new Models_Muser;
	$check = $muser->checklogin($data);
	if($check != 0)
	{
		$session_user->set_var('user_log',$check['user']);
		$session_user->set_var('level',$check['level']);
		redirect(BASE_URL_ADMIN);
	}
	else {
		$message = "Tài khoản hoặc mật khẩu không chính xác";
	}
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="public/css/style_login.css" />
<link rel="shortcut icon" type="image/x-icon" href="<?=ADMIN_PATH_IMG ?>favication.png">
<title>Quản trị admin</title>
<meta http-equiv = "Content-Type" Content = 'text/html;charset=utf-8' />
</head>
<body>
<div class="container">

<table width="100%" cellspacing="0" cellpadding="0" height="100%" border="0">
<tr>
	<td width="350px" valign="top">
		<form action = '' method = 'post'>
        <table width="98%" border="0" cellspacing="0" cellpadding="5" style="margin:0 auto;">
          <tr height="100">
            <td colspan="2" class="title"  valign="middle">
             <img src="<?=ADMIN_PATH_IMG ?>logo.png" height="60" />
            </td>
          </tr>
          <?php 
		  	
            //$message = "mesage";
            if ( isset($message))
            {
                echo "<tr><td colspan='3' align='center'>";
                echo "<div class='message'>". $message . "</div>";
                echo "<td></tr>";
            }
            
          ?>
          <tr>
            <td align="right" width="100">Username</td>
            <td>
            		<input type = 'text' name = 'user' id = 'user' >
            </td>
          </tr>
          
          <tr>
            <td align="right">Email</td>
            <td><input type = 'text' name = 'email' id = 'email'></td>
          </tr>
           <tr>
            <td align="right">Password</td>
            <td><input type = 'password' name = 'pass' id = 'pass'></td>
          </tr>
    
          <tr>
            <td></td>
            <td>
            	<input type="submit" name="submit" value="Sign in" id="submit" class="button" />
            </td>
          </tr>
        </table>
        </form>
    </td>
  	
    <td>
    	
    </td>
    
</tr>
</table>
		


</div>
</body>
</html>