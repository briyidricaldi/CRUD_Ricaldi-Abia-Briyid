<?php
session_start();
if(isset($_SESSION['nombreusu']))
{
	$dni = $_GET['codigo'];
	$mysqli = new mysqli("localhost", "root", "", "minimarket");		
	$sql = $mysqli->query("delete from libreria where codigo='$codigo'");
	echo "
	<script>
	alert('Registro eliminado');
	</script>";

	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=libreria.php'>";
}
else
	{
			echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=Index1.php'>";
	}		 

?>