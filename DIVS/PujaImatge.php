<?php
function MostraPujaImatge()
{
?>
    <table width="100%">                                            	
        <tr>
            <td width="100px">Imatge</td>
            <td width="100px">
                <form  ENCTYPE="multipart/form-data" id="FormPujaImatge" name="FormPujaImatge" method="post" action="PHP/UploadFiles.php?op=1"  target="IframePujaImatge">
                    <input type="file" id="Imatge" name="Imatge" onchange="CopiaNomImatge(this.value)" />
                </form>   
            </td>
            <td align="left"><div id="RutaImatge"></div></td>                                                
         </tr>                                                
    </table>  
    <iframe name="IframePujaImatge" style="display:none"></iframe>  
<?php 
}
?>