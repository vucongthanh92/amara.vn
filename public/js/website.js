$(document).ready(function(){
	$('.menu_wap ul li:last').css('background-image','none');
	$(function() {
		$('a.lightbox').lightBox();
	});
	
	$('#searchDropdownBox').change(function(){
		id = $(this).val();
		obj = $("#searchDropdownBox option[value="+ id+"]") ;
		//alert(html);
		html = obj.html();
		$('#nav-search-in-content').html(html);
		w = $('#nav-search-in-content').innerWidth();
		$('#nav-iss-attach').css('padding-left',w);
		
	});
})


/*jquery menu left mobi*/
$(document).ready(function(){
	$('.bar_dm').click(function(){
		if($(this).hasClass('active')){
			$('.slidebarmenu').animate({'left':-260},90);
			$('.bar_dm').removeClass('active');
			$('.overlay-open-menu').hide();
		}else{
			$('.slidebarmenu').animate({'left':0},90);
			$('.bar_dm').addClass('active');
			$('.overlay-open-menu').show();
		}
	});	
	$('.overlay-open-menu').click(function(){
		$('.slidebarmenu').animate({'left':-260},90);
		$('.bar_dm').removeClass('active');
		$('.overlay-open-menu').hide();
	});
	$('.iconx').click(function(){
		$('.slidebarmenu').animate({'left':-260},90);
		$('.bar_dm').removeClass('active');
		$('.overlay-open-menu').hide();
	});
	$('.nav-toggle-subarrow').click(function(){
		$(this).parent('li').find('ul').toggle(400);
	});
})