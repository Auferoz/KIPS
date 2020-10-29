<?php
    session_start();
	require 'php/conexion.php';
	require 'php/funcs.php';

    if(empty($_GET['user_id'])){
        header('location: index.php');
    }

    if(empty($_GET['token'])){
        header('location: index.php');
    }

    $user_id = $mysqli->real_escape_string($_GET['user_id']);
    $token = $mysqli->real_escape_string($_GET['token']);

    if(!verificaTokenPass($user_id, $token))
    {
        echo 'No se pudo verificar los Datos';
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
</head>

<body>

    <!-- Start your project here-->

    <section class="LoginStyle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 text-center titulokips mb-5">
                    <h1>KIPS.CL</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-left align-items-center">
                <div class="col-xs-12 col-md-4">
                    <!-- Default form login -->
                    <form id="loginform" class="form-horizontal text-center p-4" role="form" action="guarda_pass.php" method="POST" autocomplete="on">
                        <div class="form-group d-flex justify-content-center align-items-center">
                            <div class="col-md-12 LoginLogo">
                                <img src="img/Logo_SVG_PMT.svg" alt="">
                                <h3>Cambiar Contraseña</h3>
                            </div>
                        </div>

                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />
                        <input type="hidden" id="token" name="token" value="<?php echo $token; ?>" />

                        <div class="col-md-12 text-center">
                            <label for="" class="textlabel">Contrase&ntilde;a:</label>
                            <input type="password" class="form-control" name="password" placeholder="" required>
                        </div>
                        <div class="col-md-12 text-center">
                            <label for="" class="textlabel">Confirmar Contrase&ntilde;a:</label>
                            <input type="password" class="form-control" name="con_password" placeholder="" required>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <p>Ya tienes una cuenta? <a href="index.php">Inicia Sesi&oacute;n</a></p>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <!-- Sign in button -->
                                <button class="btn btn-login" type="submit">Modificar</button>
                            </div>
                        </div>

                    </form>
                    <!-- Default form login -->
                    <?php echo resultBlock($errors); ?>
                </div>
            </div>
        </div>

    </section>

    <?php
    require_once('footer.php');
?>