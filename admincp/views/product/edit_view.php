<script type="text/javascript">
	//tinymce_image("hinh_anh");
	//tinymce_advanced("khuyenmai");
	//tinymce_advanced("info");
	//tinymce_advanced("cont");
</script>
<script type = 'text/javascript'>
function checkform(){

	var frm = document.frm1;

	
	if(frm.groupid.value == 0){

		alert("Vui lòng chọn danh mục");
		return false;

	}

	if(frm.product.value == ""){

		alert("Vui lòng nhận tên sản phẩm");

		frm.product.focus();
		return false;
	}
}
$(document).ready(function(){
	$('#city_id').change(function(){
		url = "<?=BASE_URL_ADMIN ?>loadcidcat.php?id="+$(this).val();
		$('#groupid').load(url);
	});
	url = "<?=BASE_URL_ADMIN ?>loadcidcat.php?id=<?=$data['info']['city_id']?>";
	$('#groupid').load(url,null,Gandanhmuc);
	
	
});
function Gandanhmuc() { $('#groupid').val(<?=$data['info']["group_id"] ?>);  }
</script>
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
    <td> Quản lý Shop / Sản phẩm / Sửa </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>


<div class="content">
<div class="content_i">
<form name = "frm1" action = '<?php echo BASE_URL_ADMIN;?>product/edit/<?php echo $data['info']['id'];?>' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();" >
<table>
<tbody>
<tr>
   <td width="700" valign="top">
      <h2>
    <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
    Thông tin sản phẩm
    </h2>
<table>
	<tr>
    <td colspan="2" valign="top">
    	<table>
        	<tr>
               <td><strong>Danh mục</strong></td>
               <td><strong>Hãng sản xuất</strong></td>
            </tr>
            <tr>
                <td>
                  <select name = 'groupid'>
					 <option value = '0'>- - Chọn danh mục - -</option>
					 <?php
                        $mcatelog = new Models_MCatelog;
                        $ldata = $mcatelog->listdata();
                        echo $tmenu = TreeCat($ldata,0,"",$data['info']['group_id'],"--",'name');
                     ?>
                  </select>
                </td>
                
                <td>
                    <select name="hangsx" id="">
                            <option>- - Chọn hãng sản xuất - -</option>
                            <?php
							     $sql="select * from mn_manufacturer where ticlock='0' order by Id asc";
								 $ds=mysql_query($sql) or die(mysql_error());
								 while($row=mysql_fetch_assoc($ds)) {
							?>
                                 <option <?php if($data['info']['hangsx']==$row['Id']) echo "selected"; ?> value="<?=$row['Id']?>">
								 <?=$row['title_vn']?></option>
                            <?php } ?>
                    </select>
                </td>
                
            </tr>
        </table>
    
    </td>
    </tr>

         <tr>

           <td><strong>Giá gốc</strong></td>
        </tr>
        <tr>
        	
           <td><input type = 'text' name = 'team_priceold' value = '<?php echo bsVndDot($data['info']['team_priceold']);?>'  onkeyup="this.value = FormatNumber(this.value);" size="40"> VNĐ</td>
        </tr>	
        <tr>

           <td><strong>Giá</strong></td>
        </tr>
        <tr>
        	
           <td><input type = 'text' name = 'team_price' value = '<?php echo bsVndDot($data['info']['team_price']);?>'  onkeyup="this.value = FormatNumber(this.value);" size="40"> VNĐ</td>
        </tr>	

<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
    	<td><strong>Tên sản phẩm ( <?=$vlang ?>)</strong></td>
    </tr>
    <tr>
		<td><input type = 'text' name = 'product' value = '<?php echo $data['info']['product'];?>' size = '100'></td>
	</tr>
    
	<tr>
    	<td><strong>Alias</strong></td>
    </tr>
    <tr>
		<td><input type = 'text' name = 'alias' value = '<?php echo $data['info']['alias'];?>' size = '100'></td>
	</tr>
    <tr>
    	<td><strong>Xuất xứ( <?=$vlang ?>)</strong></td>
    </tr>
    <tr>
		<td><input type = 'text' name = 'xuatxu' value = '<?php echo $data['info']['xuatxu'];?>' size = '100'></td>
	</tr>
     <tr>
    	<td><strong>Quy cách( <?=$vlang ?>)</strong></td>
    </tr>
    <tr>
		<td><input type = 'text' name = 'quycach' value = '<?php echo $data['info']['quycach'];?>' size = '100'></td>
	</tr>
   
     <tr>
    	<td><strong>Khuyến mãi( <?=$vlang ?>)</strong></td>
    </tr>
	<tr>
		<td><?php getFCKeditor("khuyenmai",stripslashes($data['info']["khuyenmai"]),500); ?></td>
	</tr>
    <tr>
    	<td><strong>Thông tin deal ( <?=$vlang ?>)</strong></td>
    </tr>
	<tr>
		<td><?php getFCKeditor("detail",stripslashes($data['info']["detail"]),500); ?></td>
	</tr>
<?php
}
?>

	<tr>
		<th align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button" style="margin-left:250px;">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button">
		</th>
	</tr>	
</table>
</td>
<td valign="top">
<h2>
<img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
Thông tin thiết lập
</h2>
	<table class="right_new" >
   	  	<tr>
		<td class = 'title_td'><?php echo IMAGES;?></td>
		<td><input type = 'file' name = 'image' size = "50"></td>
	</tr>
	<?php if($data['info']['image'] != ""){?>
	<tr>
		<td>&nbsp;</td>
		<td>
			<div id = "image">
			<img src = "<?=BASE_URL ?>/data/Product/<?=$data['info']['image']?>" height = "50">
			<a href = "javascript: delFlash('<?php echo TBL_PRODUCT?>','image',<?php echo $data['info']['id']?>,'<?php echo $data['info']['image'];?>','image','<?=BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a>
			</div>
		</td>
	</tr>
	<?php } ?>
		<tr>
			<td class = 'title_td'><?php echo IMAGES;?> 1</td>
			<td><input type = 'file' name = 'image1' size = "50"></td>
		</tr>
		<?php  if($data['info']['image1'] != ""){?>
		<tr>
			<td>&nbsp;</td>
			<td>
				<div id = "image1">
				<img src = "<?=BASE_URL ?>/data/Product/<?=$data['info']['image1']?>"  height = "50">
				<a href = "javascript: delFlash('<?php echo TBL_PRODUCT?>','image1',<?php echo $data['info']['id']?>,'<?php echo $data['info']['image1'];?>','image1','<?=BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a>
				</div>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td class = 'title_td'><?php echo IMAGES;?> 2</td>
			<td><input type = 'file' name = 'image2' size = "50"></td>
		</tr>
		<?php if($data['info']['image2'] != ""){?>
		<tr>
			<td>&nbsp;</td>
			<td>
				<div id = "image2">
				<img src = "<?=BASE_URL ?>/data/Product/<?=$data['info']['image2']?>"  height = "50">
				<a href = "javascript: delFlash('<?php echo TBL_PRODUCT?>','image2',<?php echo $data['info']['id']?>,'<?php echo $data['info']['image2'];?>','image2','<?=BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a>
				</div>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td class = 'title_td'><?php echo IMAGES;?> 3</td>
			<td><input type = 'file' name = 'image3' size = "50"></td>
		</tr>
		<?php if($data['info']['image3'] != ""){?>
		<tr>
			<td>&nbsp;</td>
			<td>
				<div id = "image3">
				<img src = "<?=BASE_URL ?>/data/Product/<?=$data['info']['image3']?>"  height = "50">
				<a href = "javascript: delFlash('<?php echo TBL_PRODUCT?>','image3',<?php echo $data['info']['id']?>,'<?php echo $data['info']['image3'];?>','image3','<?=BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a>
				</div>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td class = 'title_td'><?php echo IMAGES;?> 4</td>
			<td><input type = 'file' name = 'image4' size = "50"></td>
		</tr>
		<?php if($data['info']['image4'] != ""){?>
		<tr>
			<td>&nbsp;</td>
			<td>
				<div id = "image4">
				<img src = "<?=BASE_URL ?>/data/Product/<?=$data['info']['image4']?>"  height = "50">
				<a href = "javascript: delFlash('<?php echo TBL_PRODUCT?>','image4',<?php echo $data['info']['id']?>,'<?php echo $data['info']['image4'];?>','image4','<?=BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a>
				</div>
			</td>
		</tr>
		<?php }?>
        
        <tr>
            <td class = 'title_td'><?php echo SORT;?></td>
            <td><input type = 'text' name = 'sort' size = '30' value="<?=$data['info']['sort'] ?>"></td>
        </tr>
        <tr>
            <td class = 'title_td'>Ngày đăng</td>
            <td><input type = 'text' name = 'date' size = '30' value="<?=$data['info']['date'] ?>" ></td>
        </tr>
        <tr>
            <td class = 'title_td'>Số lần xem</td>
            <td><input type = 'text' name = 'visit' size = '30' value="<?=$data['info']['visit'] ?>"></td>
        </tr>
         
        <tr>
            <td class = 'title_td'>Bật / Tắt</td>
            <td>
            	<select name="ticlock">
                	<option value="0" <? if($data['info']['ticlock']==0) echo 'selected="selected"'; ?> >Bật</option>
                    <option value="1" <? if($data['info']['ticlock']==1) echo 'selected="selected"'; ?>>Tắt</option>
            	</select>
            </td>
        </tr>
         <tr>
            <td class = 'title_td'>Nổi bật</td>
            <td>
            	<select name="hot">
              		<option value="0" <? if($data['info']['hot']==0) echo 'selected="selected"'; ?> >Tắt</option>
                	<option value="1"  <? if($data['info']['hot']==1) echo 'selected="selected"'; ?> >Bật</option>
                    
            	</select>
            </td>
        </tr>
        
        <tr>
            <td class = 'title_td'>Meta Title</td>
            <td><input type = 'text' name = 'seo_title' size = '30' value="<?=$data['info']['seo_title'] ?>" ></td>
        </tr>
        
        <tr>
            <td class = 'title_td'> Meta Keyword</td>
            <td>
            	<textarea name="seo_keyword" style="width:220px; height:100px;"> <?=$data['info']['seo_keyword'] ?></textarea>
            </td>
        </tr>
         <tr>
            <td class = 'title_td'> Meta Description</td>
            <td>
            	<textarea name="seo_description" style="width:220px; height:100px;"><?=$data['info']['seo_description'] ?></textarea>
            </td>
        </tr>
    </table>
</td>
</tr>
</tbody>
</table>
</form>
</div>
</div>