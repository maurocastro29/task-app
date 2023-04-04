<?php
    session_start();
    $usuario = $_SESSION["newsession"];
    if($usuario===''){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task-App</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Task App</a>
        <ul class="navbar-nav ml-auto">
            <form class="form-inline my-2 my-lg-0">
                <input type="search" id="buscar" class="form-control mr-sm-2" placeholder="Busca tu tarea">
                <!-- <button class="btn btn-success my-2 my-sm-0" type="submit">
                    Buscar
                </button> -->
            </form>
        </ul>
        <div>
            <form action="funciones.php" method="post">
                <input class="btn-ingresar" name="salir" type="submit" value="Cerrar sesión"><br>
            </form>
        </div>
    </nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form id="task-form">
                            <input type="hidden" id="task-id">
                            <div class="form-group">
                                <input type="text" id="nombre" placeholder="Nombre de la tarea" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <textarea id="descripcion" cols="30" rows="10" class="form-control" placeholder="Descripcion de la tarea"></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-block btn-primary text-center">Guardar tarea</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card my-4" id="resultado">
                    <div class="card-body">
                        <ul id=container></ul>
                    </div>
                </div>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Descripcion</td>
                        </tr>
                    </thead>
                    <tbody id="tareas"></tbody>
                </table>
            </div>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <script src="app.js"></script>
</body>
</html>
