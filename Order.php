<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Orden</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" 
	rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" 
	rel="stylesheet" type="text/css">	
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
	<?php
		require 'Connection.php';
		$UN = $_SESSION['Username'];
		$PASS = $_SESSION['Password'];
		$ProductID = $_GET['ProductID'];
		
		if(empty($UN)){echo '<script>window.open("Login.php?Role=User","_self",null,true);</script>';}
		
		$sql = "SELECT * FROM `usuarios` WHERE `Username` = '".$UN."' and `password` = '".$PASS."' and `Role` = 'User'";
		$res = mysqli_query($Conn,$sql);
		while($Rows = mysqli_fetch_array($res)){
			$CustomerID = $Rows[0];
		}
	?>
    <div class="container">        
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Completa tu orden</h2>
                    <hr><br>
                </div>

                <div class="col-md-6">
                 <form role="form" action="OrdenAccion.php?ProductID=<?php echo $ProductID; ?>&CustomerID=<?php echo $CustomerID; ?>" method="POST">
					<div class="form-group">
					  <!-- <label for="ProductID">Product ID:</label> -->
					  <input type="hidden" name="ProductID" class="form-control" id="ProductID" value="<?php echo $ProductID; ?>" disabled>
					</div>
					<div class="form-group">
					  <!-- <label for="CustomerID">Customer ID:</label> -->
					  <input type="hidden" name="CustomerID" class="form-control" id="CustomerID" value="<?php echo $CustomerID; ?>" disabled>
					</div>
				
					<div class="form-group">
						<label for="adicional">Tamaño:</label>
						<input type="text" name="adicional" class="form-control" id="adicional">
					</div>
					<div class="form-group">
						<label for="tamano">Adicional:</label>
						<input type="text" name="tamano" class="form-control" id="tamano">
					</div>
                    <div class="form-group">
						<label for="tamano">Cantidad:</label>
						<input type="text" name="tamano" class="form-control" id="tamano">
					</div>
						<button type="submit" class="btn btn-primary">Registrar Orden</button>
					</form>
				</div>                
                <div class="clearfix"></div> 
             </div>
    </div>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="footer col-lg-12 text-center">
                    <p>
					<?php echo '<strong>Bienvenido</strong>'; ?>
					<br>
					<strong>
					<?php if($Username != null){echo '<a href="ManageAccount.php?Role=User">Administrar Cuenta</a> |';} ?> 
					<?php if($Username == null){echo '<a href="Login.php?Role=User">Ingresar</a>';} else {echo '<a href="Logout.php">CERRAR SESION</a>';} ?> | 
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
