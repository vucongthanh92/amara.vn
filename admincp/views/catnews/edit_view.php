<div class="wrapper_submenu">
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>catnews/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-square.png">
        </div>
        <div class="text">Chủ đề</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>news/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-write.png">
        </div>
        <div class="text">Bài viết</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>pagehtml/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-paper.png">
        </div>
        <div class="text">Mở Rộng</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>weblink/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-paper.png">
        </div>
        <div class="text">Phụ Lục</div>
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
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-square.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý nội dung / Chủ đề bài viết / Sửa</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="content_i">
<form action = '<?php echo BASE_URL_ADMIN;?>catnews/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>
<tr>
		<td class = 'title_td'><?php echo PARENTID;?></td>
		<td>
			<select name = 'parentid'>
				<option value = '0'>- - - Là chủ đề gốc - - -</option>
			<?php
			    $sql="select * from mn_catnews where parentid='0' and ticlock='0' order by Id asc";
				$ds=mysql_query($sql) or die(mysql_error());
				while($row=mysql_fetch_assoc($ds)) {
			?>
                <option <?php if($data['info']['parentid']==$row['Id']) echo "selected"; ?> value="<?=$row['Id']?>"><?=$row['title_vn'];?></option>
                <?php
				     $idpa=$row['Id'];
					 $sql2="select * from mn_catnews where parentid='$idpa' and ticlock='0' order by Id asc";
					 $ds2=mysql_query($sql2) or die(mysql_error());
					 while($row2=mysql_fetch_assoc($ds2)) {
				?>
                     <option <?php if($data['info']['parentid']==$row2['Id']) echo "selected"; ?> value="<?=$row2['Id'] ?>" >
                          ---<?=$row2['title_vn'];?>---</option>
                <?php } ?>
            <?php } ?>
			</select>&nbsp;<i style = 'color:red;'>(<?php echo LUUYCHUDE;?>)</i>
		</td>
	</tr>
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50' value = '<?php echo $data['info']['title_'.$vlang];?>'></td>
	</tr>
    <tr>
		<td class = 'title_td'>Bí danh (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'alias' size = '50' value = '<?php echo $data['info']['alias'];?>'></td>
	</tr>
<?php
}
?>

    <tr>
		<td class = 'title_td'> Mô tả </td>
		<td><textarea name="description_vn" style="width:400px; height:100px;" ><?php echo $data['info']['description_vn'] ?></textarea></td>
	</tr>
    	
	<tr>
		<td class = 'title_td'><?php echo SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'] ?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock'] == 1) echo 'Checked';?>></td>
	</tr>
       <tr>
		<td class = 'title_td'> Meta Keyword</td>
		<td><textarea name="keyword" style="width:400px; height:100px;" ><?php echo $data['info']['meta_keyword'] ?></textarea></td>
	</tr>
    <tr>
		<td class = 'title_td'> Meta Description</td>
		<td><textarea name="description" style="width:400px; height:100px;"  ><?php echo $data['info']['meta_description'] ?></textarea></td>
	</tr>
	<tr>
    	<th></th>
		<th align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'  class="button">
		</th>
	</tr>	
</table>
</form>
</div>
</div>