// JavaScript Document
function countdown_time(time, id_gio, id_phut, id_giay)
{
	//alert(id_giay);
	
	var tam = time - 1;
	
	
	var gio = Math.floor(time/3600);
	time = time % 3600;
	var phut = Math.floor(time/60);
	time = time % 60;
	var giay = time;
	
	//alert(gio + ":" + phut + ":" + giay);
	//alert("countdown_time("+ tam + ",'" + id_gio + "','" + id_phut + "','" + id_giay + "')");
	
	if (tam > 0)
	{
		if( phut < 10)
			phut = "0" + phut;
		if(gio < 10)
			gio = "0" + gio;
		if(giay < 10)
			giay = "0" + giay;
			
		$(document).ready(function(){
			$("#" + id_giay).html(giay);
			$("#" + id_phut).html(phut);
			$("#" + id_gio).html(gio);
		});
		
		setTimeout(
			"countdown_time("+ tam + ",'" + id_gio + "','" + id_phut + "','" + id_giay + "')", 
			1000
		);
		
	}
	else
	{
		$("#" + id_giay).html("00");
		$("#" + id_phut).html("00");
		$("#" + id_gio).html("00");
	}
	
}


function runTime(time, id_gio, id_phut, id_giay)
{
	
	var gio;
	var phut;
	var giay;
	var tam;
	
	time = time-1;
	tam = time;
	gio = Math.floor(time/3600);
	time = time%3600;
	phut = Math.floor(time/60);
	time = time%60;
	giay = time;
	//alert(time);
	
	if(tam >=0 )
	{
		//alert(id_gio);	
		alert("runTime("+tam+", '" + id_gio + "','" + id_phut + "','"+ id_giay + "')");	
		if(phut<10)
			phut="0"+phut;
		if(gio<10)
			gio="0"+gio;
		if(giay<10)
			giay="0"+giay;
		
		document.getElementById("'" + id_gio + "'").innerHTML = gio;
		document.getElementById("'" + id_phut + "'").innerHTML = phut;
		document.getElementById("'" + id_giay + "'").innerHTML = giay;
		
		setTimeout("runTime("+tam+", '" + id_gio + "','" + id_phut + "','"+ id_giay + "')", 1000);	
		
	}	
	else
	{
		document.getElementById("'" + id_gio + "'").innerHTML = "00";
		document.getElementById("'" + id_phut + "'").innerHTML ="00";	
		document.getElementById("'" + id_giay + "'").innerHTML = "00";
		
		//document.getElementById("img_dangky").innerHTML="<img src='images/HetHan.jpg' />";
		return;		
	}
	
}
