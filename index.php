<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>QuickOrder</title>
	<link rel="icon" href="img/faviconOrder.PNG">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <!-- own carousel min.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- own carousel -->
    <!-- Own Carousel Theme Min.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Own Carousel Theme -->
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
   
	<!-- Se crea la sesion y por parametro se pasa el valor Username correspondiente al nombre de usuario -->
	<?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{
			$Username = $_SESSION["Username"];
		}
	?>
</head>
<body>
   <div class="container-fluid">
	<!-- Inicio de la barra de navegacion -->
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

<!-- Inicio seccion de productos -->
    <section>
    	<div class="container-fluid my-5">
    		<h1 class="text-center fw-bold display-2 mb-3">Productos en
    			<span class="text-danger">Promocion solo por HOY</span>
    		</h1>
		<!-- Inicio del Carousel owl -->
    		<div class="row mt-5">
    			<div class="owl-carousel owl-theme">
				    <div class="item mb-4">
				    	<div class="card border-0 shadow">
				    		<img src="img/hamburguesas.jpg" class="img-card-top" alt="Hamburguesa">
				    		<div class="card-body">
				    			<h4>Hamburguesa</h4>
				    		</div>
				    	</div>
				    </div>				   
				    <div class="item">
				    	<div class="card">
				    		<img src="img/pollo.jpg" class="img-card-top" alt="Hamburguesa">
				    		<div class="card-body">
				    			<h4>Pollo Apanado</h4>
				    		</div>
				    	</div>
				    </div>
				    <div class="item">
				    	<div class="card">
				    		<img src="img/pizza.jpg" class="img-card-top" alt="Hamburguesa">
				    		<div class="card-body">
				    			<h4>Pizza Italiana</h4>
				    		</div>
				    	</div>
				    </div>
				    <div class="item">
				    	<div class="card">
				    		<img src="img/lasagna.jpg" class="img-card-top" alt="Hamburguesa">
				    		<div class="card-body">
				    			<h4>Lasagna</h4>
				    		</div>
				    	</div>
				    </div>
				    <div class="item">
				    	<div class="card">
				    		<img src="img/salchipapa.jpg" class="img-card-top" alt="Hamburguesa">
				    		<div class="card-body">
				    			<h4>Salchipapa</h4>
				    		</div>
				    	</div>
				    </div>
				    <div class="item">
				    	<div class="card">
				    		<img src="img/sandwich.jpg" class="img-card-top" alt="Hamburguesa">
				    		<div class="card-body">
				    			<h4>Sandwich Cubano</h4>
				    		</div>
				    	</div>
				    </div>
				    <div class="item">
				    	<div class="card">
				    		<img src="img/Hotdog.jpg" class="img-card-top" alt="Hamburguesa">
				    		<div class="card-body">
				    			<h4>HotDog Americano</h4>
				    		</div>
				    	</div>
				    </div>
				    <div class="item">
				    	<div class="card">
				    		<img src="img/Churrasco.png" class="img-card-top" alt="Hamburguesa">
				    		<div class="card-body">
				    			<h4>Churrasco</h4>
				    		</div>
				    	</div>
				    </div>				   
				</div>
    			<!-- Fin del Carousel -->
    		</div>
    	</div>
    </section>    

    <!-- Imprimir los productos -->
		<div class="container-fluid">
			<h2 class="text-center">selecciona tu producto y realiza la orden</h2>
		<!-- Establecer conexion para llamar los productos -->
		<?php 
			$conn = mysqli_connect("localhost","root","","quickorder");
			$sql = "SELECT * FROM `productos` Limit 10";
			$Resulta = mysqli_query($conn,$sql);
		?>
		<!-- Imprimir los productos -->
		
		<?php while($Rows = mysqli_fetch_array($Resulta)){
		echo '
		
		<div class="card-group col-sm-4 col-lg-4 col-md-4">
             <div class="card">
				<h4 style="text-align: justify;">'.$Rows[1].'</h4>
                <img style="border: 1px solid gray;height: 229px; width: 298px;" class="card-img-top" src="data:image;base64,'.$Rows[8].'" alt="">
                <div class="card-body">
					<p><strong>Vendedor:</strong> '.$Rows[2].'</p>					
					<p><strong>$ '.$Rows[5].'</strong></p>
                </div>
				<div class="text-center"><a onclick="addToCartOnclick('.$Rows[0].');" href="#"  style="margin-bottom: 5px;" class="btn btn-primary">Agregar al Carrito</a></div>
            </div>
        </div>        
		';
		}?>
		
	</div>
	</div>
<!-- Pie de pagina -->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="footer text-center">
                    <p>
					<?php echo '<strong>Bienvenido '.$Username.'</strong>'; ?>
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
</div>
<!-- Scripts Librerias -->
<script src="js/main.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:6
        }
    }
})			
</script>
</body>
</html>
