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
					<!-- <li><a href="bestseller.php">Productos más Populares</a></li> -->
					<li><a href="productos.php">Productos</a></li>
                    <li><a href="about.php">Quienes somos</a></li>					
					<?php if($Username == null){echo '<li><a href="register.php?ActionType=Register">Registrarse</a></li>';} ?>
					<?php if($Username == null){echo '<li><a href="Login.php?Role=User">Ingresar</a></li>';} else {echo '<li><a href="Logout.php">Logout</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
		<?php 
			$conn = mysqli_connect("localhost","root","","quickorder");
			$sql = "SELECT * FROM `productos` order by precio";
			$Resulta = mysqli_query($conn,$sql);
		?>		
		<?php while($Rows = mysqli_fetch_array($Resulta)){	
		echo '
		
		<div class="card-group col-sm-4 col-md-4 col-lg-4">
             <div class="card">
				<h4 style="text-align: justify;">'.$Rows[2].'</h4>
                <img style="border: 1px solid gray;height: 229px; width: 298px;" class="card-img-top" src="data:image;base64,'.$Rows[8].'" alt="">
				<div class="caption">
				<p><strong>Nombre Producto:</strong> '.$Rows[1].'</p>
				<p><strong>Dimensiones:</strong> '.$Rows[3].'</p>
				<p><strong>detalle:</strong> '.$Rows[4].'</p>
				<p><strong>Precio: $ '.$Rows[5].'</strong></p>
			</div>
				<div class="text-center"><a onclick="addToCartOnclick('.$Rows[0].');" href="#"  style="margin-bottom: 5px;" class="btn btn-primary">Agregar al Carrito</a></div>
            </div>
        </div> 		     
		';
		}?>		
	</div>
    <footer>
        <div class="container-fluid">            
                <div class="footer titles">
                    <p>
					<?php echo '<strong>Bienvenido '.$Username.'</strong>'; ?>
					<br>					
					<?php if($Username != null){echo '<a href="CuentaManejo.php?Role=User">Administrar Cuenta</a> |';} ?> 
					<?php if($Username == null){echo '<a href="Login.php?Role=User"></a>';} else {echo '<a href="Logout.php">CERRAR SESION | </a>';} ?>  
					<a href="#" onclick="ManagementOnclick();">Ingresar Como Administrador</a> |
					<a href="#">Volver al inicio</a> 
					<br>
					 DESARROLLO DE APLICACIONES Y SERVICIOS PARA LA NUBE <br> SENA 2022
					</p>             
            </div>
        </div>
    </footer>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
		function ManagementOnclick(){
			if(confirm("Solo los administradores tienen permitido acceder a esta página. Inicie sesión como administrador.") == true)
			{
				window.open("Login.php?Role=Admin","_self",null,true);
			}
		}
		
		function addToCartOnclick(ProductID)
		{	
			if(confirm("¿Quieres agregar este producto al carro de compras?") == true){
			window.open("Order.php?ProductID="+ProductID,"_self",null,true);
			}
		}
    </script>
</body>
</html>
