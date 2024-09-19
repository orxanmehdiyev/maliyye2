/* buccə xərclərinin iqtisadi təsnifatı maddə ativ və passiv etmə kodu buradan başlayır*/
function kontrol() { 

	var iqtisadi_tesnifat_bolme_status_id=event.target.id;
	var iqtisadi_tesnifat_bolme_status_xhttp=new XMLHttpRequest();
	iqtisadi_tesnifat_bolme_status_xhttp.open("POST","nedmin/islem.php",true);
	iqtisadi_tesnifat_bolme_status_xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	iqtisadi_tesnifat_bolme_status_xhttp.send("iqtisadi_tesnifat_bolme_status_id="+iqtisadi_tesnifat_bolme_status_id);
	
};
/* buccə xərclərinin iqtisadi təsnifatı maddə ativ və passiv etmə kodu burada bitir*/


/* buccə xərclərinin iqtisadi təsnifatı maddə ativ və passiv etmə kodu buradan başlayır*/
function kb_kontrol() { 

	var iqtisaditesnifat_kb_status_id=event.target.id;
	var iqtisaditesnifat_kb_status_xhttp=new XMLHttpRequest();
	iqtisaditesnifat_kb_status_xhttp.open("POST","nedmin/islem.php",true);
	iqtisaditesnifat_kb_status_xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	iqtisaditesnifat_kb_status_xhttp.send("iqtisaditesnifat_kb_status_id="+iqtisaditesnifat_kb_status_id);	
};
/* buccə xərclərinin iqtisadi təsnifatı maddə ativ və passiv etmə kodu burada bitir*/


/* buccə xərclərinin iqtisadi təsnifatı paragraf kativ və passiv etmə kodu buradan başlayır*/
function paragraf_kontrol() { 
	var iqtisaditesnifat_paragraf_status_id=event.target.id;
	var iqtisaditesnifat_paragraf_status_xhttp=new XMLHttpRequest();
	iqtisaditesnifat_paragraf_status_xhttp.open("POST","nedmin/islem.php",true);
	iqtisaditesnifat_paragraf_status_xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	iqtisaditesnifat_paragraf_status_xhttp.send("iqtisaditesnifat_paragraf_status_id="+iqtisaditesnifat_paragraf_status_id);
};
/* buccə xərclərinin iqtisadi təsnifatı paragraf kativ və passiv etmə kodu burada bitir*/

/* buccə xərclərinin iqtisadi təsnifatı maddə kativ və passiv etmə kodu buradan başlayır*/
function madde_status() { 
	var iqtisaditesnifat_madde_status_id=event.target.id;
	var iqtisaditesnifat_madde_status_xhttp=new XMLHttpRequest();
	iqtisaditesnifat_madde_status_xhttp.open("POST","nedmin/islem.php",true);
	iqtisaditesnifat_madde_status_xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	iqtisaditesnifat_madde_status_xhttp.send("iqtisaditesnifat_madde_status_id="+iqtisaditesnifat_madde_status_id);
};
/* buccə xərclərinin iqtisadi təsnifatı maddə kativ və passiv etmə kodu burada bitir*/

/* buccə xərclərinin iqtisadi təsnifatı maddə kativ və passiv etmə kodu buradan başlayır*/
function yarimmadde_status() { 
	var iqtisaditesnifat_yarim_madde_status_id=event.target.id;
	var iqtisaditesnifat_yarim_madde_status_xhttp=new XMLHttpRequest();
	iqtisaditesnifat_yarim_madde_status_xhttp.open("POST","nedmin/islem.php",true);
	iqtisaditesnifat_yarim_madde_status_xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	iqtisaditesnifat_yarim_madde_status_xhttp.send("iqtisaditesnifat_yarim_madde_status_id="+iqtisaditesnifat_yarim_madde_status_id);
};
/* buccə xərclərinin iqtisadi təsnifatı maddə kativ və passiv etmə kodu burada bitir*/



/* buccə xərclərinin iqtisadi təsnifatı yarım maddə kativ və passiv etmə kodu buradan başlayır*/
function iqtisaditesnifatedit() { 
	var yar_madde_input_id=event.target.id;	
	var yar_madde_input_xhttp=new XMLHttpRequest();
	yar_madde_input_xhttp.open("POST","nedmin/islem.php",true);
	yar_madde_input_xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	yar_madde_input_xhttp.send("yar_madde_input_id="+yar_madde_input_id);
};
/* buccə xərclərinin iqtisadi təsnifatı yarım maddə kativ və passiv etmə kodu burada bitir*/












