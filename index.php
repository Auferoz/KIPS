<?php
    session_start();
	require 'php/conexion.php';
	require 'php/funcs.php';

    $errors = array();

    if(!empty($_POST))
    {
        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $password = $mysqli->real_escape_string($_POST['password']);
        
        if(isNullLogin($usuario, $password))
        {
            $errors[] = "Debe llenar todos los campos";
        }
        
        $errors[] = login($usuario, $password);
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
                    <form id="loginform" class="form-horizontal text-center p-4" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="on">
                        <div class="form-group d-flex justify-content-center align-items-center">
                            <div class="col-md-12 LoginLogo">
                                <img src="img/Logo_SVG_PMT.svg" alt="">
                                <h3>Iniciar Sesi&oacute;n</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <!-- Email -->
                                <input id="usuario" type="text" class="form-control mb-1" name="usuario" value="" placeholder="Usuario" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <!-- Password -->
                                <input id="password" type="password" class="form-control mb-4" name="password" placeholder="Password" required>
                                <p><a href="recupera.php">Recuperar Contrase&ntilde;a</a></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <p>No tienes una cuenta? <a href="registro.php">Registrate</a></p>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <!-- Sign in button -->
                                <button class="btn btn-login" type="submit">Entrar</button>
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