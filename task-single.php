<?php
    include("database.php");
    if(isset($_POST['task_id'])){
        $id = $_POST['task_id'];
        $sql = "SELECT * FROM task WHERE id = '$id'";
        $resul = mysqli_query($con, $sql);
        if(!$resul){
            die('Error al acceder a la base de datos: ' . mysqli_error($con));
        }
        $json = array();
        while($row = mysqli_fetch_array($resul)){
            $json[] = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion']
            );
        }
        $jsonString = json_encode($json[0]);
        echo $jsonString;
    }
?>