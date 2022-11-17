<?php
include("database.php");

if($con){

    if(isset($_POST["crearUsuario"])){
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $con_password = $_POST["con_password"];

        if( strlen($nombre)>0 && strlen($apellido)>0 && 
            strlen($usuario)>0 && strlen($password)>0 && strlen($con_password)>0){
            if($password === $con_password){
                $Object = new DateTime(null, new DateTimeZone('America/New_York'));
                $fechaSistema = $Object->format("y/m/d h:i:s a");
                $sql = "INSERT INTO users(nombre, apellido, usuario, passw, fechaRegistro) 
                        VALUES ('$nombre','$apellido','$usuario','$password','$fechaSistema')";
                
                $resul = mysqli_query($con, $sql);
                if($resul){
                    echo "<div class=".'registrado'."><p>Usuario registrado con exito</p></div>";
                }
            }else{
                echo "<div class=".'errorpassw'."><p>Las contraseñas no coinciden</p></div>";
            }
        }else{
            echo "<div class=".'faltandatos'."><p>Falta por rellenar algun campo</p></div>";
        }
    }

    if(isset($_POST["iniciarSesion"])){
        session_start();
        $usuario = $_POST["user"];
        $password = $_POST["passw"];
        if(strlen($usuario)>0 && strlen($password)>0){
            $sql = "SELECT * FROM USERS WHERE usuario = '$usuario' AND password = '$password'";
            $consulta = mysqli_query($con, $sql);
            $array = mysqli_fetch_array($consulta);
            if($array <= 0){
                echo "<div class=".'faltandatos'."><p>Usuario y/o contraseña incorrecta</p></div>";
            }else{
                $_SESSION["newsession"] = $usuario;
                if($array['tipo'] == 1){
                    header("Location: index.php");
                }else if($array['tipo'] == 0){
                    header("Location: index2.php");
                }else{
                    echo "<div class=".'faltandatos'."><p>Hubo algun error con el usuario</p></div>";
                }
            }
        }else{
            echo "<div class=".'faltandatos'."><p>Falta por rellenar algun campo</p></div>";
        }
    }

    if(isset($_POST["salir"])){
        session_start();
        session_destroy();
        header("Location: login.php");
    }

}else{
    
}