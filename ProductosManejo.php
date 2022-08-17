<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Productos</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{$Username = $_SESSION["Username"];}
		$ProductAction = $_GET["ProductAction"];
		if(empty($_SESSION['Admin'])){echo '<script>window.open("index.php","_self",null,true);</script>';}
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
					<li><a href="OrdenesManejo.php">Ordenes</a></li>
					<li><a href="ProductosManejo.php?ProductAction=Add">Crear Producto</a></li>
					<li><a href="ProductosLista.php">Lista de Productos</a></li>
                    <li><a href="ClientesManejo.php">Clientes</a></li>
					
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        
            <div class="box">
                <div class="col-lg-12">
						<hr>
						<h2 class="intro-text text-center">Productos</h2>
						<hr>

					<div class="col-md-12">	
						<div class="col-md-6">	
							<form role="form" action="ProductosAccion.php?ProductAction=
							<?php echo $ProductAction; if($ProductAction=="Edit"){ echo "&ProductID=" . $_GET['ProdID'];} ?>" 
							method="POST" enctype = "multipart/form-data">
							
							<div class="form-group">
							  <label for="nombre">Nombre:</label>
							  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresa el nombre de tu producto" required>
							</div>
							
							<div class="form-group">
							  <label for="marca">Marca:</label>
							  <input type="text" name="marca" class="form-control" id="marca" placeholder="Ingresa la marca del producto" required>
							</div>
							
							<div class="form-group">
							  <label for="precio">Precio:</label>
							  <input type="text" name="precio" class="form-control" id="precio" placeholder="Ingrese el precio del producto" required>
							</div>
						</div>
						<div class="col-md-6">	
							<div class="form-group">
							  <label for="tamano">Dimensiones:</label>
							  <input type="text" name="tamano" class="form-control" id="tamano" placeholder="Dimensiones" required>
							</div>
						
							<div class="form-group">
							  <label for="adicional">Detalles:</label>
							  <input type="text" name="adicional" class="form-control" id="adicional" placeholder="Ingrese los detalles de su producto" required>
							</div>
							
							<div class="form-group">
							  <label for="categoria">Categoría:</label>
							  <input type="text" name="categoria" class="form-control" id="categoria" placeholder="Ingrese la categoría del producto" required>
							</div>
							
							<div class="form-group">
								<label for="imagen">Imagen:</label>
								<input type="file" name="imagen">
							</div>
							
							<div class="form-group">
							<button type="submit" style="float: right;" class="btn btn-primary">Enviar</button>
							</div>
						</div>
						</form>
				
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

	<footer>
        <div class="container-fluid">            
                <div class="footer titles">
                    <p>
					<?php echo '<strong>Bienvenido Admin</strong>'; ?>
					<br>										
					<?php if($Username == null){echo '<a href="Login.php?Role=User">Logout</a>';} else {echo '<a href="Logout.php">Logout</a>';} ?> | 
					<a href="#">Volver al inicio</a>
					<br>
					DESARROLLO DE APLICACIONES Y SERVICIOS PARA LA NUBE 2022
					</p>             
            </div>
        </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			
		});
	</script>

</body>

</html>
