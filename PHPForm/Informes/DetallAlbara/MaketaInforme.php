<?php
function MaketaInforme($fecha)
{
	$hoy = date("d/m/Y");
	
return '
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<title>Header and Footer example</title>
<style type="text/css">

@page {
	margin: 2cm;
}

body {
  font-family: sans-serif;
	margin: 0.5cm 0;
	text-align: justify;
}

p{
	padding:20px;
	padding-left:0px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:11pt;
	font-weight:bold;
}

.titolForm{
	width:100%;
	text-align:center;
	color: #000;
	background-color:#ddd;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12pt;
	font-weight:bold;
	padding:20px;

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
	border-bottom: 0.1pt solid #aaa;
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

.GridLine0{
	font-family:Verdana, Geneva, sans-serif;
	font-size:11pt;
	padding-left:5px;
	padding-right:5px;
	height:15px;
	vertical-align:middle;
	text-align:left;
	background-color:#FFF;
}

.GridLine1{
	font-family:Verdana, Geneva, sans-serif;
	font-size:11pt;
	background-color:#eee;
	padding-left:5px;
	padding-right:5px;
	height:15px;
	vertical-align:middle;
	text-align:left;
	
}

.CapcaGrid{
	background-color:#999;
	border-style:solid;
	border-width:1px;
	border-color:#999;
	border-top:none;
	border-left:none;
	font-family:Verdana, Geneva, sans-serif;
	font-size:11pt;
	font-weight:bold;
	color:#FFF;
	vertical-align:middle;
	height:15px;
	text-align:center;
}


hr {
  page-break-after: always;
  border: 0;
}

</style>
  
</head>

<body>

<div id="header">
  <table>
    <tbody><tr>
      <td>Servei d\'estabulari</td>
      <td style="text-align: center; font-size:12pt;">'.$fecha.'</td>
	  <td style="text-align: right;">Impr&egrave;s el dia '.$hoy.'</td>
    </tr>
  </tbody></table>
</div>

<div id="footer">
  <div class="page-number"></div>
</div>



';
}
?>