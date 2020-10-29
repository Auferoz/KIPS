<?php
	include_once 'conexionpdo.php';

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$edad = $_POST["edad"];
$rut = $_POST["rut"];
$telefono = $_POST["telefono"];
$genero = $_POST["genero"];
$region = $_POST["region"];
$comuna = $_POST["comuna"];
$email = $_POST["email"];
$descripcion = $_POST["descripcion"];


$sql_update = "UPDATE usuarios SET nombre='$nombre' WHERE id=$id";
$gsent2 = $pdo->prepare($sql_update);
$gsent2->execute();

$sql_update = "UPDATE usuarios SET apellido='$apellido' WHERE id=$id";
$gsent2 = $pdo->prepare($sql_update);
$gsent2->execute();

$sql_update = "UPDATE usuarios SET edad='$edad' WHERE id=$id";
$gsent2 = $pdo->prepare($sql_update);
$gsent2->execute();

$sql_update = "UPDATE usuarios SET rut='$rut' WHERE id=$id";
$gsent2 = $pdo->prepare($sql_update);
$gsent2->execute();

$sql_update = "UPDATE usuarios SET telefono='$telefono' WHERE id=$id";
$gsent2 = $pdo->prepare($sql_update);
$gsent2->execute();

$sql_update = "UPDATE usuarios SET genero='$genero' WHERE id=$id";
$gsent2 = $pdo->prepare($sql_update);
$gsent2->execute();

$sql_update = "UPDATE usuarios SET email='$email' WHERE id=$id";
$gsent2 = $pdo->prepare($sql_update);
$gsent2->execute();

$sql_update = "UPDATE usuarios SET descripcion='$descripcion' WHERE id=$id";
$gsent2 = $pdo->prepare($sql_update);
$gsent2->execute();

$sql_update = "UPDATE usuarios SET region='$region' WHERE id=$id";


if ($region === 'sin-region') 
	{
    	    echo "<script>
                    alert('Datos Actualizado');
                    window.location= '../home.php'
                </script>";
	}
	else{
		$gsent2 = $pdo->prepare($sql_update);
        $gsent2->execute();
	}

$sql_update = "UPDATE usuarios SET comuna='$comuna' WHERE id=$id";


if ($comuna === 'sin-region') 
	{
    	    echo "<script>
                    alert('Datos Actualizado');
                    window.location= '../home.php'
                </script>";
	}
	else{
		$gsent2 = $pdo->prepare($sql_update);
        $gsent2->execute();
	}


    echo "<script>
                alert('Perfil Actualizado!');
              window.location= '../home.php'
		  </script>";
	
	



?>