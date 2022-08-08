<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
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
        <div class="container-fluid bg-dark text-dark ">
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
                    <!-- <li><a href="productos.php">Productos</a></li> -->
                    <li><a href="about.php">Quienes somos</a></li>
                    <li><a href="#" onclick="ManagementOnclick();">Administrador</a></li>
                    <?php if($Username == null){echo '<li><a href="register.php?ActionType=Register">Registrarse</a></li>';} ?>
                    <?php if($Username == null){echo '<li><a href="Login.php?Role=User">Ingresar</a></li>';} else {echo '<li><a href="Logout.php">Logout</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>
       <div class="container-fluid">

        

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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script>
		
		function ManagementOnclick(){
			if(confirm("Solo los administradores tienen permitido acceder a esta página. Inicie sesión como administrador.") == true)
			{
				window.open("Login.php?Role=Admin","_self",null,true);
			}
		}
		
    </script>

</body>

</html>
