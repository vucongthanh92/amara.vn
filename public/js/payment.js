function addcart(idtong,tong,divid,idpro)
{
	//document.getElementById(divid).innerHTML = "<img src = '"+base_url+"public/template/images/ajax-loader.gif'>";
	http.open("get","payment/addcart/"+idpro,true);
	http.onreadystatechange=function(){
			if(http.readyState==4 && http.status==200){
				var kq = http.responseText;
				if(kq == 0){
					document.getElementById(divid).innerHTML = "Error";
				}else{
					//alert("Sản phẩm đã được đưa vào giỏ hàng");
					//document.getElementById(divid).innerHTML = "";
					//tong = (parseInt(tong) + 1);
					//document.getElementById(idtong).innerHTML = tong;
					window.location = base_url+"payment/showcart/gio-hang.htm";
				}
			}
		};
	http.send("null");
}	

// chuyen tiep den trang xoa gio hang
function xoagiohang(base_url)
{
	window.location = base_url+"payment/delcart/all/xoa-gio-hang.htm";
}

//chuyen tiep dan trang san pham
function tieptucmuahang(base_url)
{
	window.location = base_url;
}

//sua thong tin lien lac
function suattll(base_url)
{
	window.location = base_url+"payment/info-customer.htm";
}

//dat hang
function dathang(base_url)
{
	window.location = base_url+"payment/order/dat-hang.htm";
}

/* xu ly gui comment */
function payment_post() {

	var soluong = encodeURI(document.getElementById('soluong').value);
	var idproduct = encodeURI(document.getElementById('idproduct').value);
	var base_url = encodeURI(document.getElementById('base_url').value);
	nocache = Math.random();
	http.open('post', base_url+'action.php?act=addcart&nocache='+nocache,true); 
	http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded;charset=UTF-8;');
	http.onreadystatechange = function(){
		if(http.readyState == 4 && http.status == 200){ 
			var response = http.responseText;
			if(response != 0){
				alert('Có lỗi xảy ra');
			} else {
				alert('Đã thêm sản phẩm vào giỏ hàng');
			}
		}
	};
	http.send('idproduct='+idproduct+'&soluong='+soluong);
}