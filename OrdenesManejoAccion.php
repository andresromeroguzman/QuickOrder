<?php
	require 'Connection.php';
	$ID = $_GET["id"];
	$sql = "Delete from ordenes where OrderID = $ID";
	$res = mysqli_query($Conn,$sql);
	if($res){
		echo '<script>window.open("OrdenesManejo.php","_self",null,true);</script>';
	}
	
?>