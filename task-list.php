<?php
    include("database.php");

    if($con){
        $sql = "SELECT * FROM task";
        $result = mysqli_query($con, $sql);
        
        if(!$result){
            die('Error al hacer la consulta: ' . mysqli_error($con));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }


?>