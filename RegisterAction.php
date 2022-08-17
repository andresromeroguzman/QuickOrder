<?php	
	require 'Connection.php';
	$ActionType = $_GET['ActionType'];
	$Username = $_POST['Username'];		
	$Password = $_POST['Password'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$direccion = $_POST['direccion'];
	$correo = $_POST['correo'];
	
	if(empty($Username) || empty($Password) || empty($nombres) || empty($apellidos)  || empty($direccion) || empty($correo))
	{
		echo '<script>window.alert("Debe llenar todos los campos"); window.open("register.php","_self",null,true);</script>';
	}
	else
	{
		if($ActionType == "Register")
		{
			$sql = "INSERT INTO `usuarios`(`Username`,`Password`,`Role`,`nombres`, `apellidos`,`direccion`, `correo`)" .
					" VALUES ('$Username','$Password','User','$nombres','$apellidos','$direccion','$correo')";
			$res = mysqli_query($Conn,$sql);
			if(!$res)
			{
				echo "Failed " . mysqli_connect_error();
			}else
			{
				echo '<script>window.alert("Registro Completado Por favor Ingresar"); window.open("Login.php?Role=User","_self",null,true);</script>'; 
			}
		}
		else
		{
			$ID = $_GET['ID'];
			$sqlI = "UPDATE `usuarios` SET `Username`='$Username',`Password`='$Password',`nombres`='$nombres'," .
			"`apellidos`='$apellidos',`direccion`='$direccion',`correo`='$correo' WHERE CustomerID = $ID";
			$res = mysqli_query($Conn,$sqlI);
			if(!$res)
			{
				echo "Failed " . mysqli_connect_error();
			}else
			{	
				if($Location == "MA"){
				echo '<script>window.open("CuentaManejo.php","_self",null,true);</script>';}
				else if($Location == "MC"){
				echo '<script>window.open("ClientesManejo.php","_self",null,true);</script>';}
			}
		}		
	}
?>















