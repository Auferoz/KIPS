<?php
	$mysqli=new mysqli("localhost","kips45_admin","kipschile2020A","kips45_usuarios"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
?>