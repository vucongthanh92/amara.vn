
<div class="wrapper_submenu">
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>contact/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-nhom.png">
        </div>
        <div class="text">Liên hệ</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>titlepage/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-support.png">
        </div>
        <div class="text">Support online</div>
        </div>
        </a>
	</div>
     <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>email/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-smtp.png">
        </div>
        <div class="text">Email</div>
        </div>
        </a>
	</div>
     <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>partners/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-employee.png">
        </div>
        <div class="text">Đối tác</div>
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
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý liên hệ / Danh sách  </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="space_10"></div>
<form action = '<?php echo BASE_URL_ADMIN;?>support/del' method = 'post'  name="rowsForm" id="rowsForm">
<table class="view">
	<tr>
		<th width="50"><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th width="50">ID</th>
		<th>Họ và Tên</th>
		<th>Email</th>
		<th>Điện thoại</th>
		<!-- <th>điện thoại</th> -->
		<th width="100">Ngày gửi</th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	</tr>
	<?php
	if(empty($data['info'])){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '8' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
	if(!empty($data['info'])){
			foreach($data['info'] as $item)
			{
			?>
				<tr>
					<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
					<td><?php echo $item['Id']; ?></td>
					<td align = 'center'>
						<a href = '<?php echo BASE_URL_ADMIN;?>contact/edit/<?php echo $item['Id'];?>' title = 'Sửa'><?=$item['name']  ?></a>
					</td>
					<td><?php echo $item['email']; ?></td>
					<td><?php echo $item['phone']; ?></td>
					<td align = 'center'><?=date("d-m-Y",strtotime($item["date"])) ?></td>
				
					<td align = 'center' width="40"><a href = '<?php echo BASE_URL_ADMIN;?>contact/edit/<?php echo $item['Id'];?>' title = 'Sửa'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
					<td align = 'center' width="40"><a href = '<?php echo BASE_URL_ADMIN."contact/del/".$item['Id'];?>' title = 'Xóa' onclick = 'javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
				</tr>
			<?php
			}
	}
	
	}
	?>
</table>
<div class="list_button">
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button">Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)'  class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)"  class="button" ><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /> Delete</a>

</div>
</form>
</div>