<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body style="color:white;
  font-family: Ebrima ;font-size: 15px; padding: 0px;
    margin: 20px;background: url(fondo.jpg);background-size: cover; ">
	<br>
	<br>
	<br>
	<br>
	
	<div class="container-fluid">
         <div class="row g-0">
                <div class="col-md-4"></div>
                     <div class="col-md-4 p-3 rounded" style="background-color: rgba(0,0,0,0.7); ">
                      <br> 
                     <div>
                    <center>
                         <img src="logo.svg" width="20%" height="20%";>
                    </center>
                      </div>
                   <div>
                      <h2 class="font-weight-bold mb-4" style="text-align: center; color:white;">LOGIN</h2>
                    </div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<form action="Index.php" method="post">
					<div class="form-group">	
						<label for="usu">Usuario:</label>
						<input placeholder="Ingrese su Usuario" class="form-control" id="usu" type="text" name="txtlogin" required="true">
					</div>

					<div class="form-group">
						<label for="pass">Password:</label>
						<input placeholder="Ingrese su Password" class="form-control" id="pass" type="password" name="txtpass" required="true">
					</div>
					
					<input type="submit" class="btn btn-info" value="Ingresar">
				</form>
				<br>
				<div class="msg" id="msg">
					
				</div>
			</div>
		</div>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/metodos.js"></script>
</body>
</html>

<?php
	if(isset($_POST['txtpass'])) 
	{
		session_start();
		//variable de conexion: recibe dirección del host , usuario, contraseña y el nombre base de datos
		$mysqli = new mysqli("localhost", "root", "", "bdpersona") or die ("Error de conexion porque: ".$mysqli->connect_errno);
		// comprobar la conexión 
		if (mysqli_connect_errno()) 
		{
	    	printf("Falló la conexión: %s\n", mysqli_connect_error());
	   		exit();
		}

		$login = $mysqli->real_escape_string($_POST['txtlogin']);	
		$pass = $mysqli->real_escape_string($_POST['txtpass']);
		
		$resultado = $mysqli->query("SELECT * FROM tbusuario where login='$login' and pass='$pass' and activo!=0");
		$valida=$resultado->num_rows;
		if($valida != 0)
		{
			$datosUsu = $resultado->fetch_row();
			$_SESSION['nombreusu'] = $datosUsu[3];
			$_SESSION['perfil'] = $datosUsu[4];				
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=Index1.php'>";
		}
		else
		{
			echo 
			"<script> 
				var textnode = document.createTextNode('Usuario ó Password Incorrecto');
				document.getElementById('msg').appendChild(textnode);
			</script>";
			
		}	
	}
	
	
?>

		