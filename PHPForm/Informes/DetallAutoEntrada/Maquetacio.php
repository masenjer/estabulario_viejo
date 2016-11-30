<?php
function MaketacioAutoEntrada($id,$tipus)
{
	
return '
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<title>Header and Footer example</title>
<style type="text/css">

@page {
	margin: 1cm;
	margin-top:0cm;
}

body {
	font-family:Verdana, Geneva, sans-serif;
	margin: 0 0;
	text-align: justify;
	text-size:9pt;
	
}

p{
	padding:20px;
	padding-left:0px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10pt;
	font-weight:bold;
}

.titolForm{
	width:100%;
	text-align:left;
	color:purple;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12pt;
	font-weight:bold;
	font-style:italic;
	padding:20px;

}

.fuenteForm{
	text-align:left;
	color:#000;
	font-family:Verdana, Geneva, sans-serif;
	font-size:11pt;
}

td{
	border:none;
}

#header,
#footer {
  position: fixed;
  left: 0;
	right: 0;
	color: #aaa;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10pt;
}

#header {
  top: 0;
	
}

#footer {
  bottom: 0;
  border-top: 0.1pt solid #aaa;
}

#header table,
#footer table {
	width: 100%;
	border-collapse: collapse;
	border: none;
}

#header td,
#footer td {
  padding: 0;
	width: 50%;
}

.page-number {
  text-align: center;
}

.page-number:before {
  content: "Page " counter(page);
}

#EspaiTextDadesGrupRecerca{
	width:350pt;
	border-bottom: 0.1pt solid #aaa;
}

#EspaiEmailDadesGrupRecerca{
	width:200pt;
	border-bottom: 0.1pt solid #aaa;
}

#EspaiTelefonDadesGrupRecerca{
	width:100pt;
	border-bottom: 0.1pt solid #aaa;
	text-align:left;
}



hr {
  page-break-after: always;
  border: 0;
}


.HeaderFormulari{
	width:165.5pt;
	border:solid white 1.0pt;
	background:purple;
	padding:0cm 3.5pt 0cm 3.5pt;
	height:16.8pt; 
	color:#FFF;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10pt;
}

.HeaderSE{
	width:81.0pt;
	border-top:none;
	border-left:none;
	border-bottom:solid white 1.0pt;
	border-right:solid white 1.0pt;
	mso-border-top-alt:solid white 1.0pt;
	mso-border-left-alt:solid white .5pt;
	background:#E2C5FF;
	padding:0cm 3.5pt 0cm 3.5pt;
	height:34.9pt; 
	color:#000;	
	font-family:Verdana, Geneva, sans-serif;
	font-size:7pt;
	text-align:center;
}

.HeaderAutoritzacio{
	width:330.0pt;
	border:solid white 1.0pt;
 	border-left:none;
	mso-border-left-alt:solid white 1.0pt;
	background:#F0E1FF;
 	padding:0cm 3.5pt 0cm 3.5pt;
	height:16.8pt; 
	color:#000;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10pt;
	text-align:center;
	font-weight:bold;
}


</style>
  
</head>

<body>

  <table width="100%">
    <tbody>
		<tr>
      		<td colspan="2" class="HeaderFormulari">CQ094: Formulari</td>
      		<td rowspan="2" class="HeaderAutoritzacio">
  				SE002: Autoritzaci&oacute; d\'entrada d\'usuaris al Servei d\'Estabulari (UAB)
			</td>
    	</tr>
		<tr>
			<td align="center">
				<img src="DetallAutoEntrada/img/LogoUABInforme.jpg" width="84" height="54" />
			</td>
			<td class="HeaderSE">
				SERVEI ESTABULARI
			</td>
		</tr>
  	</tbody>
  </table>

<div id="footer">
  <div class="page-number"></div>
</div>

';
}
?>