	<?php
	

			$mysqli = new mysqli("localhost", "root", "", "minimarket");
			$codigo = $_GET['codigo'];
			$nombre = $_GET['nombre'];						
			$stock = $_GET['stock'];						
			$precio = $_GET['precio'];						
			$sql = $mysqli->query("INSERT INTO bebidaslic (codigo,nombre,stock,precio) values ('$codigo','$nombre','$stock','$precio') ");			
			
	?>	

		    <SCRIPT LANGUAGE="javascript"> 
            alert("Producto registrado"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=bebidas.php">
