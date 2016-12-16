var ajaxku;

function buatajax(){
	if(window.XMLHttpRequest){
		return new XMLHttpRequest();
	}
	if(window.ActiveXObject){
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
}

function jenis(jenis){
	ajaxku = buatajax();
	var url= "ajax/jenisbuku.php";
	url = url + "?jenis=" + jenis;
	url = url + "&sid=" + Math.random();
	ajaxku.onreadystatechange = filtjenis;
	ajaxku.ontimeout = timeo;
	ajaxku.open("GET", url, true);
	ajaxku.send(null);
}

function filtjenis(){
	var data;
	if(ajaxku.readyState == 4){
		data = ajaxku.responseText;
		if(data.length > 0){
			document.getElementById("tabel").innerHTML = data;
		}
	}
}

function judul(){
	ajaxku = buatajax();
	var url = "ajax/searchjudul.php";
	var judul = document.getElementById("judul").value;
	url = url + "?judul=" + judul;
	url = url + "&sid=" + Math.random();
	ajaxku.onreadystatechange = searchjudul;
	ajaxku.ontimeout = timeo;
	ajaxku.open("GET", url, true);
	ajaxku.send(null);
}

function searchjudul(){
	var data;
	if(ajaxku.readyState == 4){
		data = ajaxku.responseText;
		if(data.length > 0){
			document.getElementById("tabel").innerHTML = data;
		} else {
			document.getElementById("tabel").innerHTML = "Hehe gaada.";
		}
	}
}

function timeo(){
	alert("Response Time Out");
}