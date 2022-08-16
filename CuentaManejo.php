<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administra Tu Cuenta y Pedidos</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	<?php
		require 'Connection.php';
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{
			$Username = $_SESSION["Username"];
		}
		$sql = "select * from usuarios where Username = '".$Username."' and Password = '".$_SESSION['Password']."'";
		$Res = mysqli_query($Conn,$sql);
		while($Rows = mysqli_fetch_array($Res))
		{
			$C_ID = $Rows[0];
			$C_Username = $Rows[1];
			$C_Password = $Rows[3];
			$C_nombres = $Rows[4];
			$C_apellidos = $Rows[5];			
			$C_direccion = $Rows[6];
			$C_correo = $Rows[7];
		}
	?>
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
					<li><a href="productos.php">Productos</a></li>
                    <li><a href="about.php">Quienes Somos</a></li>
					<?php if($Username == null){echo '<li><a href="register.php?ActionType=Register">Register</a></li>';} ?>
					<?php if($Username == null){echo '<li><a href="Login.php?Role=User">Login</a></li>';} else {echo '<li><a href="Logout.php">Logout</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
						<hr>
						<h2 class="intro-text text-center">Administrar Cuenta</h2>
						<hr>
					<div class="col-md-4">	
							<form role="form" action="Register.php?ActionType=Edit&Loc=MA&ID=<?php echo $C_ID; ?>" method="POST">
							<h4 style="text-align: center">Informacion De Perfil</h4>
							<div class="form-group">
							  <label for="username">Usuario:</label>
							  <input type="text" name="Username" class="form-control" id="Username" value="<?php echo $C_Username; ?>" disabled>
							</div>
							
							<div class="form-group">
							  <label for="Password">Contraseña:</label>
							  <input type="Password" name="Password" class="form-control" id="Password" value="<?php echo $C_Password; ?>" disabled>
							</div>

							<div class="form-group">
							  <label for="nombres">Nombres:</label>
							  <input type="text" name="nombres" class="form-control" id="nombres" value="<?php echo $C_nombres; ?>" disabled>
							</div>
							
							<div class="form-group">
							  <label for="apellidos">Primer Apellido:</label>
							  <input type="text" name="apellidos" class="form-control" id="apellidos" value="<?php echo $C_apellidos; ?>" disabled>
							</div>							
							
							
							<div class="form-group">
							  <label for="direccion">Direccion:</label>
							  <input type="text" name="direccion" class="form-control" id="direccion" value="<?php echo $C_direccion; ?>" disabled>
							</div>
							
							<div class="form-group">
							  <label for="correo">Correo:</label>
							  <input type="correo" name="correo" class="form-control" id="correo" value="<?php echo $C_correo; ?>" disabled>
							</div>
							
							<button type="submit" class="btn btn-primary">Editar</button>
						</form>
					</div>
					<!-- Menu Derecho Administrar Ordenes -->
					<div class="col-md-8">	
						<h4 style="text-align: center">Mis Ordenes</h4>
						<div class="table-responsive">
							<table border="5px" class="table">
								<tr style="text-align: center; color: Black; font-weight: bold;">
									<td># Orden</td>
									<td>Nombre</td>
									<td>Marca</td>
									<td>Cantidad</td>
									<td>Tamaño</td>
									<td>Precio</td>
									<td>Fecha Orden</td>
									<td>Accion</td>
								</tr>
								<!-- Imprimir resultados traerlos de la base de datos mediante Query -->
								<?php 
								$sqlI = "SELECT ordenes.OrderID, productos.nombre, productos.marca, ordenes.adicionales, " .
								" ordenes.detalle, productos.precio, ordenes.fechapedido FROM productos RIGHT JOIN " .
								" ordenes on ordenes.ProductID = productos.ProductID WHERE ordenes.CustomerID = $C_ID ORDER BY ordenes.OrderID";
								$Resulta = mysqli_query($Conn,$sqlI);
								while($Rows = mysqli_fetch_array($Resulta)):; 
								?>
								<tr style="color: black">
								<td><?php echo $Rows[0]; ?></td>
								<td><?php echo $Rows[1]; ?></td>
								<td><?php echo $Rows[2]; ?></td>
								<td><?php echo $Rows[3]; ?></td>
								<td><?php echo $Rows[4]; ?></td>
								<td><?php echo $Rows[5]; ?></td>
								<td><?php echo $Rows[6]; ?></td>
								<td>
								<a href="#" onclick="OrderOnclick(<?php echo $Rows[0]; ?>);">Cancel</a>
								</td>
								<?php endwhile; ?>
								</tr>
							</table>
						</div>
					</div>
					<button type="button" class="btn btn-primary""><a href="ticket.php" style="color:white; text-decoration:none;">Imprime tu ticket</a></button>
                </div>
				
            </div>			
        </div>
    </div>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="footer col-lg-12 text-center">
                    <p>
                    <?php echo '<strong>'.$Username.'</strong>'; ?>
                    <br>
                    <strong>
                    <?php if($Username != null){echo '<a href="CuentaManejo.php?Role=User">Administrar Cuenta</a> |';} ?> 
                    <?php if($Username == null){echo '<a href="Login.php?Role=User">Ingresar</a>';} else {echo '<a href="Logout.php">Logout</a>';} ?> | 
                    <a href="#">Volver al inicio</a>
                    </strong><br>
                    DESARROLLO DE APLICACIONES Y SERVICIOS PARA LA NUBE 2022
                    </p>
                    
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
		function OrderOnclick(OrderID)
		{
			if(confirm("¿Seguro quieres cancelar la orden?") == true)
			{
				window.open("CuentaAccion.php?oID="+OrderID,"_self",null,true);
			}
		}
	</script>
</body>
</html>














