//dinh nghia duong dan 

var base_url = "http://localhost/thang_311/carmen/";

function createObject() {
var request_type;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer"){
request_type = new ActiveXObject("Microsoft.XMLHTTP");
}else{
request_type = new XMLHttpRequest();
}
return request_type;
}

var http = createObject();
var nocache = 0;