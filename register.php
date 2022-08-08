<?php 
	session_start(); 
	$ActionType = $_GET['ActionType'];
	if($ActionType == "Edit"){
		$ID = $_GET['ID'];
		$Loc = $_GET['Loc'];
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php if($ActionType == "Register"){echo "Register an Accout";}else echo "Edit Account Information"; ?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{
			$Username = $_SESSION["Username"];
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
                    <li><a href="index.php">Inicio</a></li>
					<li><a href="productos.php">Tienda</a></li>
                    <li><a href="about.php">Quienes somos</a></li>					
					<?php if($Username == null){echo '<li><a href="Login.php?Role=User">Ingresar</a></li>';} else {echo '<li><a href="Logout.php">Cerrar Sesión</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            
                <div class="col-md-6 ">
						<hr>
						<h2 class="intro-text text-center"><?php if($ActionType == "Register"){echo "Registro";}else echo "Edita la Información de tu Cuenta"; ?></h2>
						<hr>
                    </div>
					<div class="col-md-6">	
							<form role="form" action="RegisterAction.php?ActionType=<?php echo $ActionType; if($ActionType == "Edit"){ echo "&Loc=" . $Loc . "&ID=" .$ID;} ?>" 
							method="POST">
							
							<div class="form-group">
							  <label for="username">Usuario:</label>
							  <input type="text" name="Username" class="form-control" id="Username" placeholder="Ingresa tu usuario">
							</div>
							
							<div class="form-group">
							  <label for="Password">Contraseña:</label>
							  <input type="Password" name="Password" class="form-control" id="Password" placeholder="Ingresa tu contraseña">
							</div>

							<div class="form-group">
							  <label for="nombres">Primer Nombre:</label>
							  <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Ingresa tu primer nombre">
							</div>
							
							<div class="form-group">
							  <label for="apellidos">Primer Apellido:</label>
							  <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingresa tu primer apellido">
							</div>
							
							<div class="form-group">
							  <label for="Lastname">Segundo Apellido:</label>
							  <input type="text" name="Lastname" class="form-control" id="Lastname" placeholder="Ingresa tu segundo apellido">
							</div>
							
							<div class="form-group">
							  <label for="direccion">Dirección:</label>
							  <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Ingresa tu dirección">
							</div>
							
							<div class="form-group">
							  <label for="correo">Dirección de Correo:</label>
							  <input type="correo" name="correo" class="form-control" id="correo" placeholder="Ingresa tu dirección de correo">
							</div>
							
							<button type="submit" class="btn btn-default">Enviar</button><br><br>
						</form>
					</div>
                
            </div>
        </div>

    </div>
    <!-- /.container -->

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

</body>

</html>
