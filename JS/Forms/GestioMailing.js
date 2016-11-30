function MostraGestioMailing()
{
	$("#DIVGestioMailing").fadeIn("slow");	
	InicialitzaGestioMailing();
}

function InicialitzaGestioMailing()
{
	$("#AssumpteGestioMail").val("");
	$("#CosGestioEmail").val("");
	
	var config1 = {
        toolbar: [
            ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
            ['Maximize']
        ],
     	filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : 'PHP/UploadFiles.php?op=1'
    };

	
	var ua = navigator.userAgent.toLowerCase();
	var isAndroid = ua.indexOf("android") > -1; 
	var isiPad = navigator.userAgent.match(/iPad/i) != null;
    var isiPhone = navigator.userAgent.match(/iPhone/i) != null;
	
	
	if ((!isiPad)&&(!isiPad)&&(!isAndroid))
	{
		$('#CosGestioEmail').ckeditor(config1);
	}

	
}

function TancaGestioMailing()
{
	$("#DIVGestioMailing").fadeOut("slow");
}


function EnviarGestioEmail()
{
	A = $("#AssumpteGestioMail").val();
	C = $("#CosGestioEmail").val();

	$.post("PHPForm/EnviarGestioEmail.php",{A:A,C:C},LlegadaEnviarGestioEmail)	
}

function LlegadaEnviarGestioEmail(data)
{
	alert("El seu email s' ha enviat correctament");	
}
