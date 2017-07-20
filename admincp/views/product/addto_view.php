<script type = 'text/javascript'>
function multipleselect(){
	frm = document.frm1;
	for(i=0; i<(frm.idapp).length;i++){
		frm.idapp[i].selected = true;
	}

	for(i=0; i<(frm.idnhan).length;i++){
		frm.idnhan[i].selected = true;
	}
}
</script>
<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo PRODUCT_ADD_TITLE; ?></h1>
<br/>
<hr/>
<form name = "frm1" action = '<?php echo BASE_URL_ADMIN;?>product/addto' method = 'post' enctype = "multipart/form-data" onsubmit = "javascript: multipleselect();">
<table>
	<tr>
		<td class = 'title_td'><?php echo PARENTID;?></td>
		<td>
			<select name = 'idcat'>
				<option value = ''>- - Chọn nhóm sản phẩm - -</option>
			<?php
			$mcatelog = new Models_MCatelog;
			$ldata = $mcatelog->listdata();
			echo $tmenu = TreeCat($ldata,0,"",$data['info']['idcat'],"--");
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>Tình trạng </td>
		<td><input type = 'text' name = 'status' size = '50' value = '<?php echo $data['info']['status'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Bảo hành </td>
		<td><input type = 'text' name = 'warranty' size = '50' value = '<?php echo $data['info']['warranty'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo PRICE;?></td>
		<td><input type = 'text' name = 'price' value = '<?php echo bsVndDot($data['info']['price']);?>' onkeyup="this.value = FormatNumber(this.value);"> VNĐ</td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo CODEPRO;?> </td>
		<td><input type = 'text' name = 'codepro' size = '50' value = '<?php echo $data['info']['codepro'];?>'></td>
	</tr>
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'>Tên sản phẩm </td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' value = '<?php echo $data['info']['title_'.$vlang];?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Cấu hình sản phẩm</td>
		<td><?php getFCKeditor("description_".$vlang,stripslashes($data['info']["description_".$vlang])); ?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Bài viết</td>
		<td><?php getFCKeditor("content_".$vlang,stripslashes($data['info']["content_".$vlang])); ?></td>
	</tr>
<?php
}
?>
	<tr>
		<td class = 'title_td'>Video </td>
		<td><input type = 'text' name = 'video' size = '50' value = '<?php echo $data['info']['video'];?>'> <i>Nếu nhiều video, mỗi video cách bởi dấu (,)</i></td>
	</tr>
	<tr>
		<td class = 'title_td'>SP Khuyến mãi</td>
		<td><input type = 'checkbox' name = 'ticpromotion' value = '1' <?php if($data['info']['ticpromotion'] == 1) echo "checked";?>></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo PRICE;?> Khuyến mãi</td>
		<td><input type = 'text' name = 'price_promotion'  value = '<?php echo bsVndDot($data['info']['price_promotion']);?>' onkeyup="this.value = FormatNumber(this.value);"> VNĐ</td>
	</tr>
	<tr>
		<td class = 'title_td'>Thông tin khuyến mãi</td>
		<td><?php getFCKeditor("info_promotion",$data['info']['info_promotion'],250); ?></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo IMAGES;?></td>
		<td><input type = 'file' name = 'images' size = "50"></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo IMAGES;?> 1</td>
		<td><input type = 'file' name = 'images1' size = "50"></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo IMAGES;?> 2</td>
		<td><input type = 'file' name = 'images2' size = "50"></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo IMAGES;?> 3</td>
		<td><input type = 'file' name = 'images3' size = "50"></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo IMAGES;?> 4</td>
		<td><input type = 'file' name = 'images4' size = "50"></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo IMAGES;?> 5</td>
		<td><input type = 'file' name = 'images5' size = "50"></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>SP hot</td>
		<td><input type = 'checkbox' name = 'hot' value = '1' <?php if($data['info']['hot'] == 1) echo "checked";?>></td>
	</tr>
	<tr>
		<td class = 'title_td'>SP mới</td>
		<td><input type = 'checkbox' name = 'ticnew' value = '1' <?php if($data['info']['ticnew'] == 1) echo "checked";?>></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock'] == 1) echo "checked";?>></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
