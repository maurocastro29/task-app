<?php
    include('database.php');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $sql = "UPDATE task SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = '$id'";

        $resul = mysqli_query($con, $sql);
        if(!$resul){
            die('Error al acceder a la base de datos: ' . mysqli_error($con));
        }
        echo 'Tarea actualizada con exito';
    }
?>