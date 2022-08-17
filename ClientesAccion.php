<!-- Eliminar usuario generando conexion a la base de datos interviniendo la tabla usuarios -->
<?php
	require 'Connection.php';
	$CustomerID = $_GET["ID"];
	
	$sql = "DELETE FROM `usuarios` WHERE CustomerID = " . $CustomerID;
	$res = mysqli_query($Conn,$sql);
	if($res)
	{
		echo '<script>window.open("ClientesManejo.php","_self",null,true)</script>';
	}
?>