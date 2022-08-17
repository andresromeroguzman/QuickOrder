<?php
	require 'Connection.php';
	$orderID = $_GET["oID"];
	
	$sql = "DELETE FROM `ordenes` WHERE OrderID = " . $orderID;
	$res = mysqli_query($Conn,$sql);
	if($res)
	{
		echo '<script>window.open("CuentaManejo.php","_self",null,true)</script>';
	}
?>