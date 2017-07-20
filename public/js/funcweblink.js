function weblink(value){
	if(value != ""){
		window.open(value);
	}
}

function getsubcat(div,base_url,id){
	http.open("get",base_url+"action.php?act=getsubcat&id="+id,true);
	http.onreadystatechange=function(){
			if(http.readyState==4 && http.status==200){
				var kq = http.responseText;
				if(kq == 0){
					document.getElementById(div).innerHTML = "Error";
				}else{
					document.getElementById(div).innerHTML = kq;
				}
			}
		};
	http.send("null");
}





