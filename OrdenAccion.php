<?php
	session_start();
	require 'Connection.php';
	$ProductID = $_GET['ProductID'];
	$CustomerID = $_GET['CustomerID'];
	$tamano = $_POST['tamano'];
	$adicional = $_POST['adicional'];
	$DateOrder = date("Y/m/d");	
	if($_SESSION['Username'] == null || $_SESSION['Password'] == null)
	{
		echo "<script>window.open('Login.php?Role=User','_self',null,true); window.alert('Por Favor Ingresa Para Tomar Tu Orden');</script>";
	}
	
	$sql2 = "INSERT INTO `ordenes`(`ProductID`, `CustomerID`,`adicionales`, `detalle`, `fechapedido`) ".
			"VALUES ('$ProductID','$CustomerID','$tamano','$adicional','$DateOrder')";
	$res2 = mysqli_query($Conn,$sql2);
	if($res2){
		echo "<script>window.alert('Orden Procesada Con Éxito'); window.open('CuentaManejo.php','_self',null,true);</script>";
	}
?>