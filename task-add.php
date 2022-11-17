<?php
    include('database.php');

    if($con){
        if(isset($_POST['nombre'])){
            $name = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $sql = "INSERT INTO task (nombre, descripcion) VALUES('$name', '$descripcion')";
            $result = mysqli_query($con, $sql);
            if(!$result){
                die('Los datos no se pudieron insertar');
            }
            echo 'Datos insertados con exito';
        }
    }

?>