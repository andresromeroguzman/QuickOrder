<!-- Configuracion del producto despues de haberse creado, editar o eliminar-->
<?php
	session_start();
	$ProductAction = $_GET["ProductAction"];	
	require 'Connection.php';	
	if($ProductAction == "Add")
	{
		$_nombre = $_POST["nombre"];
		$_marca = $_POST["marca"];
		$_tamano = $_POST["tamano"];
		$_adicional = $_POST["adicional"];
		$_categoria = $_POST["categoria"];
		$_precio = $_POST["precio"];
		
		$image = addslashes($_FILES['imagen']['tmp_name']);
		$name = addslashes($_FILES['imagen']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		
		$sql = "INSERT INTO `productos`(`nombre`, `marca`, `tamano`, `adicional`,`precio`, `categoria`, `nombimagen`, `imagen`)" . 
		"VALUES ('$_nombre','$_marca','$_tamano','$_adicional','$_precio','$_categoria','$name','$image')";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.open("ProductosLista.php","_self",null,true);</script>';
		}
		else
		{
			echo '<script>alert("FAILED!")</script>';
		}
	}else if($ProductAction == "Edit")
	{
		$_nombre = $_POST["nombre"];
		$_marca = $_POST["marca"];
		$_tamano = $_POST["tamano"];
		$_adicional = $_POST["adicional"];
		$_categoria = $_POST["categoria"];
		$_precio = $_POST["precio"];
		
		$image = addslashes($_FILES['imagen']['tmp_name']); //devuelve cadena con barras invertidas delante de los caracteres
		$name = addslashes($_FILES['imagen']['name']);
		$image = file_get_contents($image); //Transmite la info del fichero a la cadena
		$image = base64_encode($image); //Codifica datos de la imagen para que puedan ser almacenados en la BD
		
		$_ProductID = $_GET["ProductID"];
		if(empty($_FILES['imagen']['tmp_name'])){
			$sql = "UPDATE `productos` SET `nombre`='$_nombre',`marca`='$_marca',`tamano`='$_tamano'," .
				   "`adicional`='$_adicional',`precio`='$_precio',`categoria`='$_categoria' WHERE `ProductID` =  $_ProductID";
			$res = mysqli_query($Conn,$sql);
			if($res)
			{

				echo '<script>window.alert("Producto ha sido actualizado correctamente!"); window.open("ProductosLista.php","_self",null,true)</script>';

				echo '<script>window.alert("El producto ha sido actualizado!"); window.open("ProductosLista.php","_self",null,true)</script>';

			}
		}
		$sql = "UPDATE `productos` SET `nombre`='$_nombre',`marca`='$_marca',`tamano`='$_tamano'," .
			   "`adicional`='$_adicional',`precio`='$_precio',`categoria`='$_categoria'," .
			   "`nombimagen`='$name',`imagen`='$image' WHERE `ProductID` = $_ProductID";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.alert("Producto ha sido actualizado correctamente!"); window.open("ProductosLista.php","_self",null,true)</script>';

			echo '<script>window.alert("El producto ha sido actualizado!"); window.open("ProductosLista.php","_self",null,true)</script>';

		}
	}else if($ProductAction == "Delete")
	{
		$_ProductID = $_GET["ProdID"];
		$sql = "Delete from `productos` where `ProductID` = $_ProductID";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.alert("El Producto ha sido eliminado correctamente!"); window.open("ProductosLista.php","_self",null,true)</script>';

			echo '<script>window.alert("El Producto ha sido Borrado!"); window.open("ProductosLista.php","_self",null,true)</script>';

		}
	}

?>













