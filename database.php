<?php

    $con = mysqli_Connect(
        'localhost:2974',
        'root',
        '',
        'task-app'
    );

    if(!$con){
        echo 'Error al conectar con la base de datos.';
    }

?>