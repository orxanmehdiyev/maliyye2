function yeni(){
	document.getElementById('bolmeler').style.display='none';
	document.getElementById('yeni').style.display='block';
	document.getElementById('imtinabutton').removeAttribute("disabled");
	document.getElementById('silbutton').setAttribute("disabled", "");
	document.getElementById('yenibutton').setAttribute("disabled", "");
}
function imtina(){
	document.getElementById('bolmeler').style.display='block';
	document.getElementById('yeni').style.display='none';
	document.getElementById('imtinabutton').setAttribute("disabled", "");
	document.getElementById('silbutton').removeAttribute("disabled");
	document.getElementById('yenibutton').removeAttribute("disabled");	
	document.getElementById("yeniform").reset();
	CKEDITOR.instances.editor1.setData("")	
}



function toplusil() {
document.frmUser.action = "nedmin/islem.php";
document.frmUser.submit();
}

