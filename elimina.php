
<?php

session_start();
if(isset($_SESSION['nombreusu']))
{
	$dni = $_GET['codigo'];
	echo "<input type=hidden name='codigo' id='codigo' value='$codigo'>";
	$mysqli = new mysqli("localhost", "root", "", "minimarket");		

	echo "
	<script>
		let sino=confirm('¿Desea eliminar? $codigo');
		if(sino==true)
		{
			 
			document.location.href='borra.php?codigo=$codigo';
			
		}

	</script>
		";
	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=libreria.php'>";
}
else
	{
			echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=Index1.php'>";
	}		 

?>