<!-- Gestion del logeo de sesion Roles User y Admin -->
<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","quickorder");
		if(!$conn)
			{
				die("Connection Failed" . mysqli_connect_error());
			}
	$_un = $_POST['Username'];
	$_pass = $_POST['Password'];
	$_Role = $_GET['Role'];
	
		$query = "SELECT * FROM `usuarios` WHERE `Username` = '".$_un."' and `Password` = '".$_pass."' and `Role` = '".$_Role."'";
		$res = mysqli_query($conn,$query);
			if($res===false)
				{
					die("Error" . mysqli_error($conn));
				}
		$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
			if($row)
				{
					if($_Role == "User")
					{
					$_SESSION["Username"] = $_un;
					$_SESSION["Password"] = $_pass;
					echo "<script>window.open('index.php','_self',null,true)</script>";
					die("Logged in");
					}
					else if($_Role == "Admin")
					{	$_SESSION['Admin'] = "Logged";
						echo "<script>window.open('OrdenesManejo.php','_self',null,true)</script>";
					}
				}
			else
				{
					die("Usuario o contraseña mal ingresada");
				}
?>
















