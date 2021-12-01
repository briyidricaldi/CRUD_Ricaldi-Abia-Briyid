<?php
	session_start();
	if(isset($_SESSION['nombreusu']))
	{
?><?php require_once "vistas/parte_superior.php"?>
<!-- INICIO del contenido principal -->

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Lacteos</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">	
	<script src="js/metodos.js"></script>
</head>
<body>
<h3 style="font-family:ALEGRIAN; text-align:center;">LACTEOS</h3>
	<div class="container">
		<div class="row">	

			<a class="btn btn-primary" data-toggle="modal" data-target="#nuevoProd">Nuevo Producto <span class="glyphicon glyphicon-plus"></span></a><br><br>
			<table class="table table-hover" style="background-color: rgba(0,0,0,1.2);">
				<tr>
					<th>Codigo</th><th>Nombre</th><th>Stock</th><th>Precio</th><th>Herramientas</th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "", "minimarket");		
			if ($mysqli->connect_errno) 
			{
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM lacteos";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editProd' 
				    	data-codigo	='" .$fila[0] ."' 
				    	data-nombre	='" .$fila[1] ."' 
				    	data-stock	='" .$fila[2] ."' 
				    	data-precio	='" .$fila[3] ."' 
				    	class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></a> ";			
					echo "<a class='btn btn-danger' href='elimina6.php?codigo=" .$fila[0] ."'><span class='glyphicon glyphicon-trash'></span></a>";		
					echo "</td>";
					echo "</tr>";
				}
				$resultado->close();
			}
			$mysqli->close();			
			
	

?>
	        </table>
		</div> 



		<div class="modal" id="nuevoProd" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo Producto</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="insertar6.php" method="GET">              		
                       		<div class="form-group">
                       			<label for="dni">codigo:</label>
                       			<input class="form-control" id="codigo" name="codigo" type="text" placeholder="Codigo"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Nombre:</label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="stock">Stock:</label>
                       			<input class="form-control" id="stock" name="stock" type="text" placeholder="Stock"></input>
                       		</div>

                       		<div class="form-group">
                       			<label for="precio">Precio:</label>
                       			<input class="form-control" id="precio" name="precio" type="text" placeholder="Precio"></input>
                       		</div>


							<input type="submit" class="btn btn-primary" value="Grabar">

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                  
                       </form>
                    </div>
                    
                </div>
            </div>
        </div> 

        <div class="modal" id="editProd" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
					<h4>Modificar</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       
                    </div>
                    <div class="modal-body">                      
                       <form action="actualiza6.php" method="POST">                       		
                       		        
                      		<div class="form-group">
                       			<label for="codigo">Codigo:</label>
                       			<input class="form-control" id="codigo" name="codigo" type="text" placeholder="Codigo"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Nombre:</label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="stock">Stock:</label>
                       			<input class="form-control" id="stock" name="stock" type="text" placeholder="Stock"></input>
                       		</div>
                      		<div class="form-group">
                       			<label for="precio">Precio:</label>
                       			<input class="form-control" id="precio" name="precio" type="text" placeholder="Precio"></input>
                       		</div>
            
									<input type="submit" class="btn btn-primary" value="Grabar">                     
									<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>							
                       </form>
                    </div>
                    <div class="modal-footer">
 
                    </div>
                </div>
            </div>
        </div> 



	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	<script>			 
		  $('#editProd').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('codigo')
		  var recipient1 = button.data('nombre')
		  var recipient2 = button.data('stock')
		  var recipient3 = button.data('precio')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #codigo').val(recipient0)
		  modal.find('.modal-body #nombre').val(recipient1)
		  modal.find('.modal-body #stock').val(recipient2)
		  modal.find('.modal-body #precio').val(recipient3)		 	 	 
		});
		
	</script>
	
</body>
</html>

<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=Index1.php">
		 <?php
	}
?>
<!-- FIN del contenido principal -->
<?php require_once "vistas/parte_inferior.php"?>