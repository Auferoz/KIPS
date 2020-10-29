<?php
	require 'php/conexion.php';
	require 'php/funcs.php';
	
    $errors = array();

    if (!empty($_POST))
    {
        $nombre = $mysqli->real_escape_string($_POST['nombre']);
        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $password = $mysqli->real_escape_string($_POST['password']);
        $con_password = $mysqli->real_escape_string($_POST['con_password']);
        $email = $mysqli->real_escape_string($_POST['email']);
        
		$activo = 0;
		$tipo_usuario = 2;
        
        
        if (isNull($nombre, $usuario, $password, $con_password, $email)){
            $errors[] = "Debe llenar todo los campos";
        }
        
        if (!isEmail($email)){
            $errors[] = "DireciÛn de correo inv·lida";
        }
        
        if (!ValidaPassword($password, $con_password)){
            $errors[] = "Las contraseÒas no coinciden";
        }
        
        if (usuarioExiste($usuario)){
            $errors[] = "El nombre de usuario $usuario ya existe";
        }
        
        if (emailExiste($email)){
            $errors[] = "El correo electronico $email ya existe";
        }
        
        if (count($errors) == 0)
        {
                
                $pass_hash = hashPassword($password);
                $token = generateToken();
                
                $registro = registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);
				
                if($registro > 0 ){
                    
                    $url = 'https://'.$_SERVER["SERVER_NAME"].'/php/activar.php?id='.$registro.'&val='.$token;
                    
                    $asunto = 'Activar Cuenta - KIPS.CL';
                    $cuerpo = "Estimad@ $nombre: <br /><br />Para continuar con el proceso de registro, es indispensable dar click en el siguiente enlace <a href='$url'>Activar Cuenta</a>";
                    
                    if (enviarEmail($email, $nombre, $asunto, $cuerpo)){
                        
                        echo "Para terinar el proceso de registro siga las instrucciones que le hemos enviado a la direccion de correo electronico: $email";
                        echo "<br><a href='index.php' > Iniciar Sesion</a>";
                        exit;
                        
                    } else {
                        $errors[] = "Error al enviar Email";
                    }
                
                } else {
                    $errors[] = "Error al Registrar";
                }
            
            
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
                    <form id="loginform" class="form-horizontal text-center pr-4 pb-4 pl-4" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                        <div class="form-group d-flex justify-content-center align-items-center">
                            <div class="col-md-12 LoginLogo text-center">
                                <img src="img/Logo_SVG_PMT.svg" alt="">
                                <h3>Registrate !</h3>
                            </div>

                            <div id="signupalert" style="display:none" class="alert alert-danger">
                                <p>Error:</p>
                                <span></span>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center align-items-center">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <label for="" class="textlabel">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="" value="<?php if(isset($nombre)) echo $nombre; ?>" required>
                                </div>
                                <div class="col-md-12 text-center">
                                    <label for="" class="textlabel">Usuario:</label>
                                    <input type="text" class="form-control" name="usuario" placeholder="" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
                                </div>
                                <div class="col-md-12 text-center">
                                    <label for="" class="textlabel">Contrase√±a:</label>
                                    <input type="password" class="form-control" name="password" placeholder="" required>
                                </div>
                                <div class="col-md-12 text-center">
                                    <label for="" class="textlabel">Confirmar Contrase√±a:</label>
                                    <input type="password" class="form-control" name="con_password" placeholder="" required>
                                </div>
                                <div class="col-md-12 text-center">
                                    <label for="" class="textlabel">Correo Electronico:</label>
                                    <input type="email" class="form-control" name="email" placeholder="" value="<?php if(isset($email)) echo $email; ?>" required>
                                </div>
                                <div class="col-md-12 text-center mt-3">
                                    <p>Ya tienes una cuenta? <a href="index.php">Inicia Sesi&oacute;n</a></p>
                                </div>
                                <!-- Sign in button -->
                                <button class="btn btn-login btn-block ml-4 mr-4 mb-4 ml-0" type="submit">Registrar</button>
                            </div>
                        </div>
                    </form>
                    <?php  echo resultBlock($errors); ?>
                </div>
            </div>
        </div>

    </section>

    <?php
    require_once('footer.php');
?>