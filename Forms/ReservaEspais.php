<?php
function MostraReservaEspais()
{
?>
<div id="DIVFitxa1" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
    	<td align="center">
            <table cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td width="11px" background="img/MarcSupEsq.png"></td>
                    <td height="11px" background="img/MarcSupC.png"></td>
                    <td width="11px" background="img/MarcSupDret.png"></td>
                </tr>
                <tr>
                    <td width="11px" background="img/MarcCEsq.png"></td>
                    <td bgcolor="#FFFFFF" align="center">
                    	<?php CarregaDIVReservaEspaisT(); ?>
                    </td>
                    <td width="11px" background="img/MarcCDret.png"></td>
                </tr>
                <tr>
                    <td width="11px" background="img/MarcInfEsq.png"></td>
                    <td height="10px" background="img/MarcInfC.png"></td>
                    <td width="11px" background="img/MarcInfDret.png"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>
<?php
}

function CarregaDIVReservaEspaisT()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
    	<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">RESERVA D'ESPAIS I EQUIPS DEL SERVEI ESTABULARI</td>
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaReservaEspais();">
        </td>  
  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" colspan="2">
        	<div id="DIVContReservaEspais" style=" overflow:auto;">
                <table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                    <tr>
                        <td bgcolor="#FFFFFF" colspan="2" align="left" style="padding-left:10px"><b>Instruccions</b></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" colspan="2" align="left">
                            <ol>
                                <li value="1">Consulteu la disponibilitat dels equips o espais que volgueu reservar, en <a href="http://tolkien.uab.es/documentos/reservesest/" target="_blank"><font color="#000099">aquest enlla&ccedil;</font></a>.</li>
                                <li value="2">Complimenteu un formulari diferent per a cadescun dels equips o espais a reservar. 
                                <li value="3">Realitzeu les reserves amb un m&iacute;nim de 2 dies h&agrave;bils d'antelaci&oacute;
                            </ol>
                        
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" valign="top"><?php CarregaDIVReservaEspaisE(); ?></td>
                        <td bgcolor="#FFFFFF" valign="top"><?php CarregaDIVReservaEspaisD(); ?></td>
                    </tr>
                </table>
            </div>        	
        </td>
    </tr>   
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContReservaEspais").css('max-width', x - 100);
	$("#DIVContReservaEspais").css('max-height', y - 100);
</script>
<?php  
}

function CarregaDIVReservaEspaisE()
{
?>
<table width="500px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','ResEsp'); ?> </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
<!--    <tr>
    	<td align="center"><?php //MontaCuadreVerd('MostraDadesEcon','ResEsp'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
--><tr>
    	<td align="center"><?php MontaCuadreVerd('MostraReservaEquips',''); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td style="padding:10px"><font class="ast">Es facturar&agrave; per temps reservat</font></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraFranjaHoraria','ResEsp'); ?></td>
    </tr>    
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td style="padding-left:10px"><font class="ast">*</font>Camps Obligatoris</td>
    </tr>
</table>
<?php  
}
function CarregaDIVReservaEspaisD()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','ResEsp|200|345'); ?></td>
    </tr>
    
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaReservaEspais('ResEsp');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
