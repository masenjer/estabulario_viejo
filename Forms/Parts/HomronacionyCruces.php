<?php 
function MostraHomronacionyCruces($form)
{
?>
<table width="100%" border="0" class="fuenteForm">
    <tr>
    	<td class="fuenteFormTitol" align="left" colspan="2">
        
  <?php
  	$Titol = "Mascles";
	
      if ($form == "IntTecHormoyCruce") 
	  {
		  $Titol = "Encreuament";
  ?>
              Hormonaci&oacute; i 
  <?php
		} 
  ?>
			Encreuaments
        </td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
    	<td>
            <table cellpadding="2" width="100%" cellspacing="0" border="0" class="fuenteForm" >
                <tr>
                    <td class="fuenteFormTitol" colspan="2" align="left">Femelles</td>
                </tr>
                <tr valign="top">
                    <td align="left"><?php MostraHembrasHormoyCrucesI($form); ?></td>
                    <td align="left"><?php MostraHembrasHormoyCrucesD($form); ?></td>
                </tr>
                <tr>
                	<td colspan="2" align="left"><b><?php echo $Titol; ?></b></td>
                </tr>
                <tr valign="top">
                    <td align="left"><?php MostraMachosHormoyCrucesI($form); ?></td>
                    <td align="left"><?php MostraMachosHormoyCrucesD($form); ?></td>
                </tr>
                <tr>
                	<td colspan="2"><input type="radio" name="radioVasec<?php echo $form; ?>" id="radioVasec<?php echo $form; ?>" value="1"/>Vasectomitzat
                        <input type="radio" name="radioVasec<?php echo $form; ?>" id="radioVasec<?php echo $form; ?>" value="0"/>Sencer</td>
                </tr>
                <tr>
                	<td height="5px"></td>
                </tr>               
  <?php
      if ($form == "IntTecHormoyCruce") 
	  {
  ?>
                <tr valign="top">
                    <td align="left"><?php MostraCrucesHormoyCrucesI($form); ?></td>
                    <td align="left"><?php MostraCrucesHormoyCrucesD($form); ?></td>
                </tr>
   <?php
	  }
  ?>
  <?php
      if ($form == "IntTecCruce") 
	  {
  ?>
                <tr>
                    <td align="left" colspan="2"><?php MostraCrucesIntTecCruce($form); ?></td>
                </tr>
   <?php
	  }
  ?>
                <tr>
                	<td height="5px"></td>
                </tr>
                <tr>
                	<td colspan="2" align="left"><b>Mirar taps vaginals</b></td>
                </tr>
                <tr>
                    <td align="left" colspan="2"><?php MostraTaponesHormoyCruces($form); ?></td>
                </tr>
                <tr>
                	<td height="5px"></td>
                </tr>
                <tr>
                	<td colspan="2" align="left"><b>&iquest;Separar?</b></td>
                </tr>
                <tr>
                    <td align="left" colspan="2"><?php MostraSepararHormoyCruces($form); ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php
}

function MostraHembrasHormoyCrucesI($form)
{
//	if ($form == "IntTecCruce" )$Accio = "OmpleCepas('','Hembra". $form."');";
//	else $Accio = "CubreCepasHormoyCruce('". $form."');";
	$Accio = "CubreCepasHormoyCruce('".$form."');";
?>

	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left">Esp&egrave;cie</td>
            <td align="left"><select id="EspecieHembra<?php echo $form; ?>" onchange="<?php echo $Accio; ?>" class="fuenteForm">
            	</select>
            </td>
        </tr>
    	<tr>
        	<td align="left">Soca</td>
            <td align="left"><select id="CepaHembra<?php echo $form; ?>" class="fuenteForm"></select><!--onchange="MuestraExistencias(<?php //echo $form; ?>);"--> 
            </td>
        </tr>
  <?php
      if ($form == "IntTecHormoyCruce") 
	  {
  ?>
        <tr>
        	<td height="12px"></td>
        </tr>
        <tr>
        	<td colspan="2" align="left"><b>Hormona 1(PMSG)</b></td>
        </tr>
        <tr>
        	<td height="8px"></td>
        </tr>
        <tr>
        	<td align="left">Volum</td>
            <td align="left"><input type="text" id="VolumenHormo1<?php echo $form; ?>"  class="fuenteForm" style="width:50px"/> ml</td>
        </tr>
    	<tr>
        	<td align="left">Data</td>
            <td align="left">
            	<input type="text" id="FechaHormo1<?php echo $form; ?>" class="fuenteForm"  style="width:120px" readonly >
            </td>
        </tr>
    	<tr>
        	<td align="left">Hora</td>
            <td align="left">
            	<select id="HoraHormo1<?php echo $form; ?>" class="fuenteForm">
               		<?php CargaSelectHoras(); ?>
               	</select>
            </td>
        </tr>
  <?php
		} 
  ?>
    </table>
<?php
}

function MostraHembrasHormoyCrucesD($form)
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left" width="100px">Edat/Pes</td>
            <td align="left">
            	<table>
                	<tr>
                    	<td>
                        	<input type="text" id="EdadHembra<?php echo $form; ?>"  class="fuenteForm" style="width:30px">
                        </td>
                        <td>            	
                        	<select id="SemGramHembra<?php echo $form; ?>" class="fuenteForm"/>
                                <option value="0">Setmanes</option>
                                <option value="1">Grams</option>
                                <option value="2">Dies</option>
                            </select>
                       	</td>
                    </tr>
                </table>
            	
            </td>
        </tr>
<?php
	if ($form == "IntTecHormoyCruce") 
	{
?>
      	<tr>
        	<td align="left">Quantitat</td>
            <td align="left"><input type="text" id="CantidadHembra<?php echo $form; ?>"  class="fuenteForm"></td>
        </tr>

        <tr>
        	<td height="12px"></td>
        </tr>
        <tr>
        	<td colspan="2" align="left"><b>Hormona 2 (HCG)</b></td>
        </tr>
        <tr>
        	<td height="8px"></td>
        </tr>
        <tr>
        	<td align="left">Volum</td>
            <td align="left"><input type="text" id="VolumenHormo2<?php echo $form; ?>"  class="fuenteForm" style="width:50px"/> ml</td>
        </tr>
    	<tr>
        	<td align="left">Data</td>
            <td align="left"><input type="text" id="FechaHormo2<?php echo $form; ?>" class="fuenteForm" style="width:120px"  readonly="readonly"  ></td>
        </tr>
    	<tr>
        	<td align="left">Hora</td>
            <td align="left">
            	<select id="HoraHormo2<?php echo $form; ?>" class="fuenteForm">
               		<?php CargaSelectHoras(); ?>
               	</select>
            </td>
        </tr>
  <?php
		} 
  ?>
    </table>
<?php
}	

function MostraMachosHormoyCrucesI($form)
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
        <tr>
        	<td align="left">Esp&egrave;cie</td>
            <td align="left"><select id="EspecieMacho<?php echo $form; ?>" onchange="OmpleCepas('','Macho<?php echo $form; ?>');" class="fuenteForm" disabled="disabled" ></select>
            </td>
        </tr>
      
    	<tr>
        	<td align="left">Soca</td>
            <td align="left"><select id="CepaMacho<?php echo $form; ?>" class="fuenteForm" ></select>
            </td>
        </tr>
    </table>
<?php 
}

function MostraMachosHormoyCrucesD($form)
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left" width="100px">Edat/Pes</td>
            <td align="left">
            	<table>
                	<tr>
                    	<td>
	                        <input type="text" id="EdadMacho<?php echo $form; ?>"  class="fuenteForm" style="width:30px">
                        </td>
                        <td>
                            <select id="SemGramMacho<?php echo $form; ?>" class="fuenteForm"/>
                                <option value="0">Setmanes</option>
                                <option value="1">Grams</option>
                                <option value="2">Dies</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
  <?php
      if ($form == "IntTecHormoyCruce") 
	  {
  ?>    	
  		<tr>
        	<td align="left" width="100px">N&deg; femelles <br /> per mascle</td>
            <td align="left"><input type="text" id="CantidadHxM<?php echo $form; ?>"  class="fuenteForm"></td>
        </tr>
   <?php
	  }
   ?>
      
    </table>
<?php 
}
function MostraCrucesHormoyCrucesI($form)
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left">Data Encreuament</td>
            <td align="left"><input type="text" id="FechaCruce<?php echo $form; ?>" class="fuenteForm" readonly  style="width:80px"></td>        
        </tr>
    </table>
<?php 
}

function MostraCrucesHormoyCrucesD($form)
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left">Hora</td>
            <td align="left">
            	<select id="HoraCruce<?php echo $form; ?>" class="fuenteForm">
               		<?php CargaSelectHoras(); ?>
               	</select>
            </td>
        </tr>
    </table>
<?php 
}

function MostraTaponesHormoyCruces($form)
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left">
            	<input type="radio" name="Tapones<?php echo $form; ?>" value="0" onclick="OcultaTapones('<?php echo $form; ?>');" />No
            	<input type="radio" name="Tapones<?php echo $form; ?>" value="1" onclick="$('#FechasTapones<?php echo $form; ?>').show('slow');" />S&iacute;</td>
            <td align="right">
            	<div id="FechasTapones<?php echo $form; ?>" style="display:none;">
                <table>
                	<tr>
                    	<td>Des de</td>
                        <td><input type="text" id="FechaTaponesDesde<?php echo $form; ?>" class="fuenteForm" style="width:80px" readonly  ></td>                   
                    	<td>Fins</td>
                        <td><input type="text" id="FechaTaponesHasta<?php echo $form; ?>" class="fuenteForm" style="width:80px" readonly  ></td>
                    </tr>
                </table>
                </div>
            </td>
        </tr>
    </table>
<?php 
}

function MostraSepararHormoyCruces($form)
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left">
            	<input type="radio" name="Separar<?php echo $form; ?>" value="0" onclick="OcultaSeparar('<?php echo $form; ?>');" />No
            	<input type="radio" name="Separar<?php echo $form; ?>" value="1" onclick="$('#FechasSeparar<?php echo $form; ?>').show('slow');" />S&iacute;</td>
            <td align="left">
            	<div id="FechasSeparar<?php echo $form; ?>" style="display:none;">
                <table>
                	<tr> 
                    	<td>Data</td>
                        <td><input type="text" id="FechaFechasSeparar<?php echo $form; ?>" class="fuenteForm" style="width:80px" readonly  ></td>                   
                    </tr>
                </table>
                </div>
            </td>
        </tr>
    </table>
<?php 
}

function MostraCrucesIntTecCruce($form)
{
?>	
	<table id="table<?php echo $form;?>" cellspacing="0" cellpadding="2" border="0">
        <tr>
            <td></td>
        </tr>    
    </table>
    <div align="right"><input type="button" id="PlusCruceButton" class="ButtonPlus" onclick="CreaFilaCruces(1,'<?php echo $form; ?>');" title="Afegir nova l&iacute;nia d'encreuament"/></div>
<?php
}
?>