<?php
    session_start();
	require 'php/conexion.php';
	require 'php/conexioncrud.php';
	require 'php/conexionpdo.php';
	require 'php/funcs.php';

    if(!isset($_SESSION["id_usuario"])){
        header("Location: index.php");
    }
    
    $idUsuario = $_SESSION['id_usuario'];

    $sql = "SELECT * FROM usuarios WHERE id = '$idUsuario'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
	
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>KIPS</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jura&display=swap" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>

    <!-- Start your project here-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 text-center titulokips ">
                    <h1>KIPS.CL</h1>
                </div>
            </div>
        </div>
        <div>
            <nav class="navbar navbar-expand-lg navbar-light azul claro-5">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto textnav">
                        <li class="nav-item">
                            <a class="nav-link" href="#!"><?php echo 'Bienvenid@: '.utf8_decode($row['usuario']);?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php?id=<?php echo utf8_decode($row['id']);?>">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="php/logout.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>