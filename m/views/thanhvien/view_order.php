<div class="main">
<div class="menu_theloaideal ">
    <a class="a_menudeal" href="#">
         <span class="spn_dealcat">Chào, <?=$_SESSION['login_username']; ?> !</span>
    </a>
</div>
<div class="space_10"></div>
<div class="index_middle">


<div class="index_header1">
    <div class="header">
        <p class="logo">
            <input type="button" onclick="window.location='<?=BASE_URL ?>thong-tin-tai-khoan.html';" class="btn_back"></p>
        <p class="text_top">LƯỢC SỬ GIAO DỊCH</p>
    </div>
</div>

<div id="divlistOrder" class="index_middle">
        <table cellspacing="0" cellpadding="0" border="0" class="order">
        <tbody>
        	<tr>
            	<th>STT</th>
                <th>Họ tên</th>
                <th>Ngày đặt hàng</th>
                <th width="10%">Số lượng</th>
                <th width="15%">Thanh toán</th>
                <th width="20%">Trạng thái</th>
                <th width="15%">Xem</th>
            </tr>
            <?php
			$sql = 'select * from  `order` where user_id = '.$_SESSION['login_user_id'].' order by id desc';
			$kq = mysql_query($sql) or die(mysql_error());
			if(!empty($kq)){
				while($item = mysql_fetch_assoc($kq)){
					$i++;
			?>
            <tr>
            	<td align="center"><?=$i ?></td>
                <td><?=$item['realname'] ?></td>
                <td><?=date('d-m-Y g:i',$item['create_time']) ?></td>
                <td align="center"><?=$item['quantity'] ?></td>
                <td align="center" style="color:#F00"><?=bsVndDot($item['origin']) ?> Vnđ</td>
                <td>
                	 <?php
                     	if($item['status']==0) echo '<span  style="color:#9c9a82"> Chưa  xác nhận </span>';
                        if($item['status']==1) echo '<span  style="color:#2373f7">Đã xác nhận </span>';
                        if($item['status']==2) echo '<span  style="color:#0bae07">Đã hoàn thành </span>';
                        if($item['status']==3) echo '<span  style="color:#F00">Đơn hàng không thành công </span>';
					?>
                </td>
                <td align="center"><a href="<?=BASE_URL."thanhvien/chitiet/".$item['id'].".htm" ?>" >Chi tiết</a></td>
            </tr>
          	<?php }} ?>

        </tbody>
    </table>

</div>

</div>
</div>
	