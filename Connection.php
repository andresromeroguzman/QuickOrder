<!-- Se definen las variables basicas para establecer la conexion a la base de datos mediante el phpmyadmin -->
<?php
	$Host = "localhost";
	$Username = "root";
	$Password = "";
	$Db = "quickorder";	
	$Conn = mysqli_connect($Host,$Username,$Password,$Db);
?>
