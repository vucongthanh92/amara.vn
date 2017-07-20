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
    <td> Quản lý Hãng Sản Xuất / Danh Mục / Sửa </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<form action = '<?php echo BASE_URL_ADMIN;?>manufacturer/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>

<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50' value = '<?php echo $data['info']['title_'.$vlang];?>'></td>
	</tr>
<?php
}
?>

    <tr>
		<td class = 'title_td'><?php echo IMAGES;?></td>
		<td><input type = 'file' name = 'image' size = "50"></td>
	</tr>
    <?php if($data['info']['images'] != ""){?>
	<tr>
		<td>&nbsp;</td>
		<td>
			<div id = "image">
			<img src = "<?=BASE_URL ?>/data/Manufacturer/<?=$data['info']['images']?>" height = "50">
			<a href = "javascript: delFlash('<?php echo TBL_PRODUCT?>','image',<?php echo $data['info']['id']?>,'<?php echo $data['info']['image'];?>','image','<?=BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a>
			</div>
		</td>
	</tr>
	<?php } ?>
    

	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock'] == 1) echo 'Checked';?>></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input class="button" type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input class="button" type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
</div>
</div>