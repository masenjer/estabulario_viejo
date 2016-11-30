<?php
function MostraNewEspaiAnimals()
{
?>	
<div id="DIVNewEspaiAnimals" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td bgcolor="#FFFFFF" valign="top">
                    	<?php CarregaNewEspaiAnimals(); ?>
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

function CarregaNewEspaiAnimals()
{
?>	
<table  cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td colspan="2" height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">
        	Nova línia d' animals que arribaran
        </td>    
	</tr>
    <tr>
    	<td>
            <table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >
                <tr>
                   <td align="left" width="50%"><?php MostraNewEspaiAnimalsI();?></td>
                   <td align="left"><?php MostraNewEspaiAnimalsD();?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right">
        	<input type="button" id="SaveNewEspaiAnimals" value="Guardar" />
            <input type="button" value="Cerrar" onclick="TancaFitxaNewEspaiAnimals();" />
        </td>
    </tr>
</table>	
<?php
}

function MostraNewEspaiAnimalsI()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left" width="55px">Esp&egrave;cie</td>
            <td align="left" width="400px">
				<select id="Especie0NewEspaiAnimals" onchange="OmpleCepas(0,'NewEspaiAnimals');" class="fuenteForm"></select>
            </td>
        </tr>          	
    	<tr>
        	<td align="left" width="45px">Soca</td>
            <td align="left">
            	<select id="Cepa0NewEspaiAnimals" class="fuenteForm"></select>				
            </td>
        </tr>
        <tr>
        	<td align="left" width="45px">Sexe</td>
            <td align="left">
            	<select id="SexoNewEspaiAnimals" class="fuenteForm"></select>				
            </td>
        </tr>
    </table>
<?php
}

function MostraNewEspaiAnimalsD()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left">Quantitat</td>
            <td align="left"><input type="text" id="Cantidad0NewEspaiAnimals"  class="fuenteForm"/></td>
        </tr>
    	<tr>
        	<td align="left">Edat/Pes</td>
            <td align="left">
            	<input type="text" id="EdadNewEspaiAnimals"  class="fuenteForm" style="width:50px">
            	<select id="SemGramNewEspaiAnimals" class="fuenteForm"/></select>
            </td>
       </tr>
    	<tr>
         	<td align="left">Anim/G&Agrave;bia</td>
            <td align="left"><input type="text" id="AnimJaulaNewEspaiAnimals" class="fuenteForm"/></td>
        </tr>
    </table>
<?php
}
?>
