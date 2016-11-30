<?php
function CompruebaPermisosEdicion()
{
	if ($_SESSION["Edicio"]=="1")
	{
?>
		<script>
			$('#DIVButtonEditContingut').show();
        </script>
<?php
	}
}
?>
