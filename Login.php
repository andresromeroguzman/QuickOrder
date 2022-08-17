<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ingresa</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	<?php
		$Username = null;
		$Role = $_GET["Role"];
		if(!empty($_SESSION["Username"]))
		{
			$Username = $_SESSION["Username"];
		}
	?>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>            
                <a class="navbar-brand" href="index.html"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                	<li><a href="#">Quick⏱rder</a></li>
                	<li><a href="index.php">Inicio</a></li>		
					<li><a href="productos.php">Productos</a></li>
                    <li><a href="about.php">Quienes somos</a></li>					
					<?php if($Username == null){echo '<li><a href="register.php?ActionType=Register">Registrarse</a></li>';} ?>
					<?php if($Username == null){echo '<li><a href="Login.php?Role=User">Ingresar</a></li>';} else {echo '<li><a href="Logout.php">Logout</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">		
                <div class="col-lg-6">
                    <hr>
                    <h2 class="intro-text text-center">Inicia Sesion Para Realizar Tu Pedido</h2>
                    <hr>
                </div>
                <div class="col-md-6 justify-content-center">
                 <form role="form" action="loginDestino.php?Role=<?php echo $Role; ?>" method="POST">
				 
					<div class="form-group">
					  <label for="Username">Usuario:</label>
					  <input type="text" name="Username" class="form-control" id="Username" placeholder="Ingrese su usuario" required>
					</div>
					
					<div class="form-group">
					  <label for="Password">Contraseña:</label>
					  <input type="password" name="Password" class="form-control" id="Password" placeholder="Ingrese su contraseña" required>
					</div>					
					<button type="submit" class="btn btn-primary">Enviar</button>					
				  </form>
                </div>                 
        </div>
    </div>
    <footer>
        <div class="container-fluid">            
                <div class="footer titles">
                    <p>
					<?php echo '<strong>Bienvenido '.$Username.'</strong>'; ?>
					<br>					
					<?php if($Username != null){echo '<a href="CuentaManejo.php?Role=User">Administrar Cuenta</a> |';} ?> 
					<?php if($Username == null){echo '<a href="Login.php?Role=User"></a>';} else {echo '<a href="Logout.php">Logout</a>';} ?>  
					<a href="Login.php?Role=Admin" onclick="ManagementOnclick();">Ingresar Como Administrador</a> |
					<a href="#">Volver al inicio</a> 
					<br>
					 DESARROLLO DE APLICACIONES Y SERVICIOS PARA LA NUBE <br> SENA 2022
					</p>             
            </div>
        </div>
    </footer>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
