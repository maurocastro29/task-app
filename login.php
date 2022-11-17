<?php
    session_start();
    $_SESSION["newsession"] = '';
    $usuario = $_SESSION["newsession"];
    if($usuario!=''){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG-IN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="principal">
        <div class="cuerpo">
            <div class="formulario">
                <p class="credenciales-text">Ingrese las credenciales de inicio</p>
                <form action="funciones.php" method="post">
                    <div class="form-interno">
                        <input class="entrada-estilo" type="text" name="user" id="usuario" placeholder="Usuario">
                    </div>
                    <div class="form-interno">
                        <input class="entrada-estilo" type="password" name="passw" id="password" placeholder="Password">
                    </div>
                    <input class="btn-ingresar" name="iniciarSesion" type="submit" value="Ingresar"><br>
                    <div class="form-interno">
                        <a href="#">Registrarse</a>
                    </div>
                </form>
                <div>
                    <?php
                        include("funciones.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>