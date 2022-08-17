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
	<?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{
			$Username = $_SESSION["Username"];
		}
	?>
</head>
<body">
    <div class="container-fluid">
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
					<li><a href="productos.php">Productos</a></li>
                    <li><a href="about.php">Quienes somos</a></li>
					<!-- Evento Js llama la funcion declarada desde el archivo Main.js-->
					<li><a href="#" onclick="ManagementOnclick();">Administrador</a></li>
					<?php if($Username == null){echo '<li><a href="register.php?ActionType=Register">Registrarse</a></li>';} ?>
					<?php if($Username == null){echo '<li><a href="Login.php?Role=User">Ingresar</a></li>';} else {echo '<li><a href="Logout.php">Logout</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>
       <div class="container">
        <div class="row">
            <div class="col-6">
                <h4><b>Quick⏱rder</b></h4>
                <p>Somos un equipo con un enfoque positivo y creativo para trabajar, que busca potenciar las habilidades de las empresas tanto en la parte funcional como en la estética. <br>
                    Nuestros clientes son personas que se benefician de las soluciones que nosotros les proveemos, por tal motivo para nosotros es muy importante brindarles un excelente 
                    servicio, por lo tanto, siempre estamos atentos a escuchar e investigar las necesidades del mercado.</p>
                <p>
                    <strong>VISIÓN</strong>
                    Desarrollar soluciones de software a niveles competitivos, con calidad, respaldo y cobertura, que permita a nuestros clientes prosperar, cubrir sus necesidades o facilitarles la realización de algunas labores. Generando confianza, estabilidad y compromiso.
                </p>
                <p>
                     <strong>MISIÓN </strong>
                Nuestra misión es ser reconocidos como una empresa líder en la prestación de servicios de ingeniería de software en el país.
                </p>
                </div>
            <div class="col-6">
            <h4><strong>Realiza tu pedido y reclama tu orden en tiempo exacto</strong></h4>
            <img src="img/Quienes.jpeg" alt="Quienes somos" class="QuienesImg">
            </div>
        </div>        
        </div>
    </div>    
    <footer class="container-fluid">                 
                <div class="footer col-lg-12 text-center">
                    <p>
                    <?php echo '<strong>Bienvenida' .' '.$Username.'</strong>'; ?>
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
