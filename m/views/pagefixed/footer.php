<div class="space_10"></div>
<div class="menu_footer">

    <div class="calogue">
        <span class="calogue_L"></span>
        <span class="calogue_M">Ngành</span>
        <span class="calogue_R"></span>
    </div>
    <ul class="list_calogue">
    	<?php
		$mcat = new Models_MCatelog;
		$cat = $mcat ->listdata(""," ticlock = '0'",' sort_order ASC',"");
		if(!empty($cat)){
			foreach($cat as $rw){
		?>
            <a href="<?=strtoseo($rw['name'])."-".$rw['id'].".html" ?>">
                <li><span class="icon_chosi"></span><span class="list_calogue_text"><?=$rw['name'] ?></span></li>
            </a>   
         <?php } }?>  
    </ul>

</div>
<div class="copy-right">
	<p id="back-top">
	<a href="#top" id="scroll-top"><span class="icon-all top"></span> Về đầu trang</a></p>
   </div>
<div class="info-footer">
<?=stripslashes($data['info']['content_vn']); ?>
</div>
<div class="index_footer">
	<div style="width: 49%;" class="footer_item">
        <p class="footer_name">Hotline</p>
        <p class="footer_nur">0962.200.400</p>
    </div>
    <div style="width: 49%; border:none" class="footer_item">
        <p class="footer_name">&nbsp;</p>
        <p class="footer_nur">Designed by <b>Thiết kế 247 ® </b></p>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() { 
	$('#lendau').click(function () {
	$('body,html').animate({
	scrollTop: 0
	},"slow");
	return false;
});
})
</script>