<div class="clear"></div>
<div class="index_middle">
<div class="content">
	<h2 class="title_main">Deal nổi bật</h2>
    <div class="div_content_deal">
   	<?php
		if(!empty($data['hot'])){
			
			foreach($data['hot'] as $item){
				$i++;
				$time = $item['end_time']-time();
	?>
    <div class="span3  product-item">
    <div class="meta">
    <div class="buy_number"><span><?=$item['pre_number']?></span><em> đã mua</em></div>
    <div class="time">                    
    <span class="key hasCountdown">
    	       	<script type="text/javascript">

                            countdown_time(

                                <?=$time ?>,

                                "<?php echo "gio_".$item['id']; ?>",

                                "<?php echo "phut_".$item['id'] ; ?>",

                                "<?php echo "giay_".$item['id'] ; ?>"

                            );

                        </script>
                        <?php   	 echo "<span class='number_time'>";

							echo "<span  id='gio_".$item['id']."''>";

								echo "00";

						

							echo "</span>";	echo" : ";

						echo "</span>";

						echo "<span class='number_time'>";

							echo "<span   id= 'phut_".$item['id']."'>";

								echo "00";

								

							echo "</span>";echo " : ";

						echo "</span>";

						echo "<span class='number_time'>";

							echo "<span   id= 'giay_".$item['id']."'>";

								echo "00";

								

							echo "</span>";

						echo "</span>";?>
    </span>
    </div>
    </div>
    <?php
		if($item['delivery']=="express"){
	?>
    <div class="type-product sp_01" > <img src="<?=BASE_URL.USER_PATH_IMG."sp.png" ?>" /></div>
    <?php } else { ?>
    <div class="type-product sp_01" > <img src="<?=BASE_URL.USER_PATH_IMG."vc.png" ?>" /></div>
    <?php } ?>
    <div class="thumb">
    <a rel="nofollow" href="<?=BASE_URL.$data['tinh'] ?>/<?=substr(strtoseo($item['title']),0,-1)."_".$item['id'].".html" ?>">
    <img width="240" border="0" height="240" alt="<?=$item['title'] ?>"  src="<?=BASE_URL.PATH_IMG_PRODUCT.$item['image'] ?>"  title="<?=$item['product'] ?>" style="display: inline; visibility: visible;">                                            </a>
    </div>
    <div class="meta-icon-deal-new"></div>
    <div class="title">
    <h2><a title="<?=$item['product'] ?>" href="<?=BASE_URL.$data['tinh'] ?>/<?=substr(strtoseo($item['title']),0,-1)."_".$item['id'].".html" ?>"><?=$item['product'] ?></a></h2>
    <span class="sell-price"><?=bsVndDot($item['team_price']) ?><sup>đ</sup></span>
    <span class="original-price"><?=bsVndDot($item['market_price']) ?><sup>đ</sup></span>
    	<a rel="nofollow" class="view" href="<?=BASE_URL.$data['tinh'] ?>/<?=substr(strtoseo($item['title']),0,-1)."_".$item['id'].".html" ?>"></a>
    </div>
    </div>
    <?php }} ?>
    
   </div>
   	<h2 class="title_main">Deal gần đây</h2>
   <div class="div_content_deal" id="div_content_deal">
   	<?php
	
		if(!empty($data['info'])){
			foreach($data['info'] as $item){
				$i++;
				
				//echo date('d-m-y H:i:s',$item['end_time']);
				$time = $item['end_time']-time();
	?>
    <div class="span3  product-item">
    <div class="meta">
    <div class="buy_number"><span><?=$item['pre_number'].$item['hot']?></span><em> đã mua</em></div>
    <div class="time">                    
    <span class="key hasCountdown">
    	       	<script type="text/javascript">

                            countdown_time(

                                <?=$time ?>,

                                "<?php echo "gio_".$item['id']; ?>",

                                "<?php echo "phut_".$item['id'] ; ?>",

                                "<?php echo "giay_".$item['id'] ; ?>"

                            );

                        </script>
                        <?php   	 echo "<span class='number_time'>";

							echo "<span  id='gio_".$item['id']."''>";

								echo "00";

						

							echo "</span>";	echo" : ";

						echo "</span>";

						echo "<span class='number_time'>";

							echo "<span   id= 'phut_".$item['id']."'>";

								echo "00";

								

							echo "</span>";echo " : ";

						echo "</span>";

						echo "<span class='number_time'>";

							echo "<span   id= 'giay_".$item['id']."'>";

								echo "00";

								

							echo "</span>";

						echo "</span>";?>
    </span>
    </div>
    </div>
    <?php
		if($item['delivery']=="express"){
	?>
    <div class="type-product sp_01" > <img src="<?=BASE_URL.USER_PATH_IMG."sp.png" ?>" /></div>
    <?php } else { ?>
    <div class="type-product sp_01" > <img src="<?=BASE_URL.USER_PATH_IMG."vc.png" ?>" /></div>
    <?php } ?>
    <div class="thumb">
    <a rel="nofollow" href="<?=BASE_URL.$data['tinh'] ?>/<?=substr(strtoseo($item['title']),0,-1)."_".$item['id'].".html" ?>">
    <img width="240" border="0" height="240" alt="<?=$item['title'] ?>"  src="<?=BASE_URL.PATH_IMG_PRODUCT.$item['image'] ?>"  title="<?=$item['product'] ?>" style="display: inline; visibility: visible;">                                            </a>
    </div>
    <div class="meta-icon-deal-new"></div>
    <div class="title">
    <h2><a title="<?=$item['product'] ?>" href="<?=BASE_URL.$data['tinh'] ?>/<?=substr(strtoseo($item['title']),0,-1)."_".$item['id'].".html" ?>"><?=$item['product'] ?></a></h2>
    <span class="sell-price"><?=bsVndDot($item['team_price']) ?><sup>đ</sup></span>
    <span class="original-price"><?=bsVndDot($item['market_price']) ?><sup>đ</sup></span>
    	<a rel="nofollow" class="view" href="<?=BASE_URL.$data['tinh'] ?>/<?=substr(strtoseo($item['title']),0,-1)."_".$item['id'].".html" ?>"></a>
    </div>
    </div>
    <?php }} ?>
    
   </div>
   <div  id="loadsp"  idpage='9'>Xem thêm sản phẩm</div>
</div>
</div>