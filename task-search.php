<?php
include('database.php');

    $busqueda = $_POST['search']; //se extrae del data que se manda desde ajax

    if(!empty($busqueda)){
        $sql = "SELECT * FROM task WHERE nombre like '%$busqueda%' or descripcion like '%$busqueda%'";
        $result = mysqli_query($con, $sql);
        if(!$result){
            die('Error de consulta'. mysqli_error($con));
        }
        $json = array();//Se crea un array para tratar los json
        while($row = mysqli_fetch_array($result)){//Se recorre lo que trajo la busqueda de la base de datos
            $json[] = array(//los datos encontrados se insertar en el array de tipo json
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion']
            );
        }
        $jsonString = json_encode($json);//Se convierte el array de tipo json a String
        echo $jsonString;//se devuelvem los datos encontrados
    }
?>