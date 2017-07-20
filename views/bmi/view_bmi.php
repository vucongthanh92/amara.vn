<style type="text/css">
.left_bmi {
	width:320px;
	float:left;
	overflow:hidden;
	padding-top:10px;
	border-right: solid 1px #999;
	margin-top:10px;
}
.left_bmi input[type=text] {
	border:solid 1px #CCC;
	height:24px;
	
}
.left_bmi td {
	padding:5px;
}
.btn {
	padding:3px;
	font-size:12px;
	cursor:pointer;
}
.right_bmi {
	width:350px;
	float:left;
	overflow:hidden;
	margin-left:10px;
	display:table-cell;
	vertical-align:middle;
	margin-top:10px;
}
.title {
	font-size:12px;
	color:#2b63b7;
	border-bottom: 1px solid #CCC;
	margin-left:0px;
	padding-bottom:5px;
	margin-bottom:10px;
}
.feace {
	padding-top:10px;
}
.info_bmi  td { padding:5px;}
.noidung td { 
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
</style>
<?php
$vitri = 2;
if($_POST['batevent']==1){
		$weight = $_POST["weight"];
		$height = $_POST['height'];
		$vitri = $_POST['vitri'];
		 $hi = $height/100;
		 $he = $hi*$hi;
		//number_format($he,0,"","");
		$bmi = $weight/$he;
		$bmi = number_format($bmi,2,",",".");
		if($vitri == 2) {
			if($bmi< 18.5){
				$message = "Bạn bị thiếu cân";
			}
			elseif($bmi>= 15.5 && $bmi < 22.9){
				$message = "Cơ thể bạn bình thường";
			}
			elseif($bmi== 23){
				$message = "Bạn hơi thừa cân";
			}

			elseif($bmi> 23 && $bmi < 24.9){
				$message = "Cơ thể bạn hơi béo";
			}
			elseif($bmi>= 25 && $bmi < 29.9){
				$message = "Bạn bi béo phì cấp độ I";
			}
			elseif($bmi>= 30 && $bmi < 39.9){
				$message = "Bạn bi béo phì cấp độ II";
			}
			elseif($bmi>= 40){
				$message = "Bạn bi béo phì cấp độ III";
			}
			
		} else {
			if($bmi< 18.5){
				$message = "Bạn bị thiếu cân";
			}
			elseif($bmi>= 15.5 && $bmi < 24.9){
				$message = "Cơ thể bạn bình thường";
			}
			elseif($bmi== 25){
				$message = "Bạn hơi thừa cân";
			}

			elseif($bmi> 25 && $bmi < 29.9){
				$message = "Cơ thể bạn hơi béo";
			}
			elseif($bmi>= 30 && $bmi < 24.9){
				$message = "Bạn bi béo phì cấp độ I";
			}
			elseif($bmi>= 35 && $bmi < 39.9){
				$message = "Bạn bi béo phì cấp độ II";
			}
			elseif($bmi>= 40){
				$message = "Bạn bi béo phì cấp độ III";
			}
		}
		
	}
	if($vitri < 0) {
		$vitricup = 2;
	}
	else {
		$vitricup = $vitri;
	}
?>
<div class="main">
<div class ='noidung'>
<h2 class="title"><?=$data["map_title"] ?></h2>


<div class="left_bmi">
<h2 style="font-weight:bold; margin-bottom:10px; font-size:11px;">TÍNH CHỈ SỐ BMI = Cân nặng (kg) / ( Chiều cao(m))<sup>2</sup></h2>
<form action="" method="post" id="tinhbmi">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">Người Châu Âu: <input type="radio" name="vitri" value="1" <?  if($vitricup == 1) echo 'checked="checked"'; ?> /></td>
    <td align="center">Người Châu Á: <input type="radio" name="vitri" value="2" <? if($vitricup == 2) echo 'checked="checked"'; ?> /></td>
  </tr>
  <tr>
    <td>Chiều cao (cm)</td>
    <td><input type="text" value="<?=$height ?>" name="height" onkeyup="this.value = GetNumber2(this.value);"  id="height"/></td>
  </tr>
  <tr>
    <td>Cân nặng (kg)</td>
    <td><input type="text" value="<?=$weight ?>" name="weight"  onkeyup="this.value = GetNumber2(this.value);" id="weight" /></td>
  </tr>
  <tr>
    <td align="center" colspan="2">
    <input type="hidden" value="1" name="batevent" />
    <input type="button" value="Tính BMI" name="btntinh" class="btn" id="tinhBMI2" />
    </td>
  </tr>
</table>
</form>
<script type="text/javascript">
function GetNumber2(str)
{
    for(var i = 0; i < str.length; i++)
    {	
        var temp = str.substring(i, i + 1);		
        if(!(temp == "," || temp == "." || (temp >= 0 && temp <=9)))
        {
            alert("Chỉ được nhập vào là số từ 0-9");
            return str.substring(0, i);
        }
        if(temp == " ")
            return str.substring(0, i);
    }
    return str;
}
$(document).ready(function(){
	$("#tinhBMI2").click(function(){
		if($('#height').val()=="" || $('#weight').val()==""){
			alert("Vui lòng nhập chỉ số chiều cao và cân nặng!");
		}
		else {
			$("#tinhbmi").submit();
		}
	});
})
</script>
</div>
<div class="right_bmi">
 <h2 style="font-weight:bold; margin-bottom:10px; margin-top:10px; font-size:11px;">Kết quả </h2>
 <div style="min-height:120px;">
<p><h1 style="font-size:28px; color:#2b63b7;">BMI = <span style="color:#F00"><?=$bmi ?></span></h1></p>
<p style="color:#F00; padding-left:50px; font-size:16px; font-style:italic"><?=$message ?></p>
</div>
<Div class="feace">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-509dcc870a392555"></script>
<!-- AddThis Button END -->
</Div>
</div>
<div style="float:left; margin-top:10px; width:98%;" class="info_bmi">
<p class="title"><strong> Theo khuyến nghị của tổ chức Y tế thế giới (WHO), trừ người có thai, nếu BMI:</strong></p>
<Div style="padding-left:20px;">
  <p>- Dưới 18.5 là thiếu cân, thiếu năng lượng trường diễn <br />
          - Từ 18.5 đến 24.99 là bình thường <br />
          - Từ 25 đến 29.99 là thừa cân <br />
          - &gt;= 30 là béo phì</p>
  
<table cellspacing="0" cellpadding="0" align="center" border="1" width="98%">
  <tbody>
    <tr>
      <td colspan="3"> Bảng đánh giá theo chuẩn của Tổ chức Y tế thế giới(WHO) và dành riêng cho người châu Á ( IDI&amp;WPRO): <br /></td>
    </tr>
    <tr>
      <td><strong> Phân loại</strong></td>
      <td><strong> Tiêu chuẩn của tổ chức y tế thế giới(kg/m2)</strong></td>
      <td><strong> Tiêu chuẩn dành riêng cho người Châu Á(kg/m2)</strong></td>
    </tr>
    <tr>
      <td> Cân nặng thấp (gầy)</td>
      <td> &lt;18.5</td>
      <td> &lt;18.5</td>
    </tr>
    <tr>
      <td> Bình thường</td>
      <td> 18.5 - 24.9</td>
      <td> 18.5 - 22.9</td>
    </tr>
    <tr>
      <td> Thừa cân</td>
      <td> 25</td>
      <td> 23</td>
    </tr>
    <tr>
      <td> Tiền béo phì</td>
      <td> 25 - 29.9</td>
      <td> 23 - 24.9</td>
    </tr>
    <tr>
      <td> Béo phì độ I</td>
      <td> 30 - 34.9</td>
      <td> 25 - 29.9</td>
    </tr>
    <tr>
      <td> Béo phì độ II</td>
      <td> 35 - 39.9</td>
      <td> 30</td>
    </tr>
    <tr>
      <td> Béo phì độ III</td>
      <td> 40</td>
      <td> 40</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</Div>


</div>
</div>
</div>