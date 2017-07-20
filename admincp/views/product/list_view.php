<div class="wrapper_submenu">

	 <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>catelog/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-folder.png">
        </div>
        <div class="text">Danh mục</div>
        </div>
        </a>
	</div>
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>product/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png">
        </div>
        <div class="text">Sản Phẩm</div>
        </div>
        </a>
	</div>

  	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>payment/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-checklist.png">
        </div>
        <div class="text">Đơn hàng</div>
        </div>
        </a>
	</div>
    
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>manufacturer/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-nguoilienhe.png">
        </div>
        <div class="text">Hãng Sản Xuất</div>
        </div>
        </a>
	</div>
</div>


<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý Shop / Deal </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN?>product/add' class="button"><img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'> Thêm mới</a>
<a href = '<?php echo BASE_URL_ADMIN?>product/dealdangchay' class="button <?php if($_GET['act']=='dealdangchay') echo 'active'; ?>">Deal đang chạy</a>
<a href = '<?php echo BASE_URL_ADMIN?>product/dealhethan' class="button <?php if($_GET['act']=='dealhethan') echo 'active'; ?>">Deal đã hết hạn</a>
<form method = 'post' action = "<?php echo BASE_URL_ADMIN;?>product/list" id="formtim">
<table style="float:right; margin-right:10px;">
	<tr>

		<td>
			<select name = 'id' id="idcat">
				<option value = ''>- - Chọn chủ đề - -</option>
			<?php
				echo $tmenu = TreeCat($data['cat'],0,"","","--",'name');
			?>
			</select>
            <script type="text/javascript">
			$(document).ready(function(){
				$('#idcat').change(function(){
					$('#formtim').submit();
				});
			})
			</script>
            <? if(isset($_POST['id'])) { ?> 
            <script type="text/javascript">
			$(document).ready(function(){
				$('#idcat').val(<?=$_POST['id'] ?>)
			})
			</script>
            <?php } ?>
		</td>
		
	</tr>
</table>
</form>

</div>

<form action = '<?php echo BASE_URL_ADMIN;?>product/del' method = 'post'  name="rowsForm" id="rowsForm">
<table class="view">
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>id</th>
		<th><?php echo TITLE; ?></th>
		<th><?php echo IMAGES; ?></th> 
        <th width="180">Giá gốc</th>
		<th width="180"><?php echo PRICE; ?></th>
		<th width="70"><?php echo SORT; ?></th>
		<th>Quà Tặng</th>
        <th>Trang Chủ</th>
        <th>Hot</th>
		<th><?php echo G_LOCK; ?></th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	</tr>
	<?php
	if(empty($data['info'])){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '12' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
		foreach($data['info'] as $item)
		{
		?>
		<tr>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['id'];?>"><br></td>
			<td><?php echo $item['id']; ?></td>
			<td align="left"><a href = '<?php echo BASE_URL_ADMIN;?>product/edit/<?php echo $item['id'];?>' title = 'Sửa'><?php echo $item['product']; ?></a></td>
			<td><img src = '<?php echo BASE_URL;?>/data/Product/<?php echo $item['image']; ?>' width = '60'></td>
            	<td align = 'center'><input type = 'text' size = '15' name = 'team_priceold[<?php echo $item['id'];?>]' value = "<?php echo bsVndDot($item['team_priceold']); ?>" onkeyup="this.value = FormatNumber(this.value);"   /> VNĐ</td>
			<td align = 'center'><input type = 'text' size = '15' name = 'team_price[<?php echo $item['id'];?>]' value = "<?php echo bsVndDot($item['team_price']); ?>" onkeyup="this.value = FormatNumber(this.value);"   /> VNĐ</td>
			<td align = 'center'><input type = 'text' size = '5' name = 'sort[<?php echo $item['id'];?>]' value = "<?php echo $item['sort'];?>" style = 'text-align:center;' /></td>		
			<td align = 'center'>
			<?php 
			if($item['hot'] == "1"){
				echo "<div id = 'hot".$item['id']."'><a href = 'javascript: hideshow(\"".TBL_PRODUCT."\",\"hot\",\"".$item['id']."\",\"0\",\"hot".$item['id']."\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-default.png'></a></div>";
			}else{
				echo "<div id = 'hot".$item['id']."'><a href = 'javascript: hideshow(\"".TBL_PRODUCT."\",\"hot\",\"".$item['id']."\",\"1\",\"hot".$item['id']."\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-nondefault.png'></a></div>"; 
			}
			?>
			</td>
            
            <td align = 'center'>
			<?php 
			if($item['home'] == "1"){
				echo "<div id = 'home".$item['id']."'><a href = 'javascript: hideshow(\"".TBL_PRODUCT."\",\"home\",\"".$item['id']."\",\"0\",\"home".$item['id']."\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-default.png'></a></div>";
			}else{
				echo "<div id = 'home".$item['id']."'><a href = 'javascript: hideshow(\"".TBL_PRODUCT."\",\"home\",\"".$item['id']."\",\"1\",\"home".$item['id']."\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-nondefault.png'></a></div>"; 
			}
			?>
			</td>
            
            <td align = 'center'>
			<?php 
			if($item['ticnew'] == "1"){
				echo "<div id = 'ticnew".$item['id']."'><a href = 'javascript: hideshow(\"".TBL_PRODUCT."\",\"ticnew\",\"".$item['id']."\",\"0\",\"ticnew".$item['id']."\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-default.png'></a></div>";
			}else{
				echo "<div id = 'ticnew".$item['id']."'><a href = 'javascript: hideshow(\"".TBL_PRODUCT."\",\"ticnew\",\"".$item['id']."\",\"1\",\"ticnew".$item['id']."\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-nondefault.png'></a></div>"; 
			}
			?>
			</td>
			
			<td align = 'center'>
				<?php 
			if($item['ticlock'] == "1"){
				echo "<div id = '".$item['id']."'><a href = 'javascript:ticlockactive(\"".TBL_PRODUCT."\",\"ticlock\",\"".$item['id']."\",\"0\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
			}else{
				echo "<div id = '".$item['id']."'><a href = 'javascript:ticlockactive(\"".TBL_PRODUCT."\",\"ticlock\",\"".$item['id']."\",\"1\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
			}
			?>
			</td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>product/edit/<?php echo $item['id'];?>' title = 'Sửa'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."product/del/".$item['id'];?>' title = 'Xóa' onclick = 'javascript:thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
		</tr>
		<?php
		}
	}
	?>
</table>
<?php 
echo "<p style = 'color:blue;font-weight:bold; text-align:left; margin-left:10px; '>Tổng số:&nbsp;".$data['total'] . "</p> ";
if(isset($data['page']) && $data['page'] != "")
{
	echo "<div class='page'>";
	echo "<span>Trang : </span> ";
	echo $data['page'];
	echo "</div>";
}
?>
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>product/add' class="button"><span class = 'them'> <img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'> <?php echo G_ADD; ?></span></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button">Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /> Delete</A>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>product/save')" class="button" ><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /> Save</A>
</div>
</form>
</div>