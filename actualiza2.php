<?php

session_start();

	$mysqli = new mysqli("localhost", "root", "", "minimarket");	
	
	$codigo = $_POST['codigo'];
	$nombre = $_POST['nombre'];
	$stock =  $_POST['stock'];
	$precio =  $_POST['precio'];	

	$sql = $mysqli->query("UPDATE abarrotes set codigo='$codigo', nombre='$nombre',stock='$stock',precio='$precio' WHERE codigo='$codigo'");
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Registro actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=abarrotes.php">


