<?php
    session_start();
	require 'php/conexion.php';
	require 'php/funcs.php';

    $errors = array();

    if(!empty($_POST))
    {
        $email = $mysqli->real_escape_string($_POST['email']);
        
        if(!isEmail($email))
        {
            $errors[] = "Debe ingresar un correo electronico valido";
        }
            
            if(emailExiste($email))
            {
                $user_id = getValor('id', 'correo', $email);
                $nombre = getValor('nombre', 'correo', $email);
                
                $token = generaTokenPass($user_id);
                
                $url = 'http://'.$_SERVER["SERVER_NAME"].'/cambia_pass.php?user_id='.$user_id.'&token='.$token;
                $asunto = "Recuperar Contraseña - KIPS.CL";
                $cuerpo = "Hola $nombre:<br/>Se ha solicitado un reinicio de contrase&ntilde;a.<br/>Para restaurar la contrase&ntilde;a,
                visita el siguiente enlace <a href='$url'>Cambiar Contraseña</a>";
                
                if(enviarEmail($email, $nombre, $asunto, $cuerpo))
                {
                    echo "Hola $nombre, Hemos enviado un correo electronico a la direccion $email para restablecer tu password.<br />";
                    echo "<a href='index.php' >Iniciar Sesion</a>";
                    exit;
                    
                } else {
                    $errors[] = "Error al enviar Email";
                }
            } else {
                    $errors[] = "No existe el correo electronico";
            }
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
                                <h3>Recuperar Contraseña</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <!-- Email -->
                                <input id="email" type="text" class="form-control mb-1" name="email" value="" placeholder="Email" required>
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
                                <button class="btn btn-login" type="submit">Enviar</button>
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