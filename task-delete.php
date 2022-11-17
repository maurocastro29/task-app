<?php
    include("database.php");

    if(isset($_POST['task_id'])){
        $dato = $_POST['task_id'];
        $sql = "DELETE FROM task WHERE id = '$dato'";
        $resul = mysqli_query($con, $sql);
        if(!$resul){
            die('Error al eliminar tarea: ' . mysqli_error($con));
        }
        echo 'Tarea eliminada con exito';
    }

?>