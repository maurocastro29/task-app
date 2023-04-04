$(function(){


    $('#resultado').hide();//ocultar elementos por su ID
    obtenerTareas();
    let edit = false;


    $('#buscar').keyup(function(){//keyup: Se ejecuta cuando se oprime una tecla
        let busqueda = $('#buscar').val();//Se obtiene el valor del formulario de busqueda
        if($('#buscar').val()){//Se valida si trajo datos
            $.ajax({//metodo ajax de jQuery
                url: 'task-search.php',  // Direccion donde se van a buscar o enviar los datos
                type: 'POST', //Tipo: buscar:GET | enviar:POST
                data: {search: busqueda}, // datos que se envian a la url
                success: function(response){ // en caso que responda la peticion con datos
                    let tareas = JSON.parse(response);//Convierte datos a json que fueron convertidos a String antes
                    let plantilla = '';
                    tareas.forEach(tarea => {//se recorre el objeto para cargar la plantilla con los datos de tipo json
                        plantilla +=`<tr Task-id=${tarea.id}>
                                    <td>${tarea.id}</td>
                                    <td>
                                        <a href="#" class="task-item">${tarea.nombre}</a>
                                    </td>
                                    <td>${tarea.descripcion}</td>
                                    <td>
                                        <button class="task-delete btn btn-danger btn-sm">Eliminar</button>
                                        <button class="task-edit btn btn-success btn-sm">Editar</button>
                                    </td>
                                </tr>`
                    });
                    if(plantilla === ''){
                        plantilla = `<li>No hay elementos que coincidan con la busqueda</li><br>`
                        $('#container').html(plantilla);//se insertan los datos de la plantilla en el elemento con ID 'container'
                        $('#tareas').html('');
                        $('#resultado').show();//mostrar elementos por su ID
                    }else{
                        $('#resultado').hide();//ocultar elementos por su ID
                        $('#tareas').html(plantilla);
                    }
                }
            })
        }else{

        }
    })
    
    $('#task-form').submit(function(e){
        const datosEnviar = {
            id: $('#task-id').val(), 
            nombre: $('#nombre').val(),
            descripcion: $('#descripcion').val()
        };
        let url = '';
        if(edit===false){
            url = 'task-add.php';
        }else{
            url = 'task-edit.php';
            edit = false;
        }
        $.post(url, datosEnviar, function(response){
            $('#task-form').trigger('reset');
            console.log(response);
        });
        obtenerTareas();
        e.preventDefault();
    });

    function obtenerTareas(){
        $.ajax({
            url: 'task-list.php',
            type: 'GET',
            success: function(response){
                let datosTareas = JSON.parse(response);
                let plantilla = '';
                datosTareas.forEach(tarea => {
                    plantilla +=`<tr Task-id=${tarea.id}>
                                    <td>${tarea.id}</td>
                                    <td>
                                        <a href="#" class="task-item">${tarea.nombre}</a>
                                    </td>
                                    <td>${tarea.descripcion}</td>
                                    <td>
                                        <button class="task-delete btn btn-danger btn-sm">Eliminar</button>
                                        <button class="task-edit btn btn-success btn-sm">Editar</button>
                                    </td>
                                </tr>`
                });
                $('#tareas').html(plantilla);
            }
        });
    }
    $(document).on('click', '.task-delete', function(){
        if(confirm("Estas seguro que desea eliminar esta tarea?")){
            let element = $(this)[0].parentElement.parentElement;
            let task_id = $(element).attr('Task-id');
            $.post('task-delete.php', {task_id}, function(response){
                alert(response);
                obtenerTareas()
            });
        }
    });

    $(document).on('click', '.task-edit', function(){
        if(confirm("Estas seguro que desea editar esta tarea?")){
            let element = $(this)[0].parentElement.parentElement;
            let task_id = $(element).attr('Task-id');
            $.ajax({//metodo ajax de jQuery
                url: 'task-search.php',  // Direccion donde se van a buscar o enviar los datos
                type: 'POST', //Tipo: buscar:GET | enviar:POST
                data: {search: element}, // datos que se envian a la url
                success: function(response){ // en caso que responda la peticion con datos
                    let tareas = JSON.parse(response);//Convierte datos a json que fueron convertidos a String antes
                    let plantilla = '';
                    tareas.forEach(tarea => {//se recorre el objeto para cargar la plantilla con los datos de tipo json
                        plantilla +=`<tr Task-id=${tarea.id}>
                                    <td>${tarea.id}</td>
                                    <td>
                                        <a href="#" class="task-item">${tarea.nombre}</a>
                                    </td>
                                    <td>${tarea.descripcion}</td>
                                    <td>
                                        <button class="task-delete btn btn-danger btn-sm">Eliminar</button>
                                        <button class="task-edit btn btn-success btn-sm">Editar</button>
                                    </td>
                                </tr>`
                    });
                    if(plantilla === ''){
                        plantilla = `<li>No elementos que coincidan con la busqueda</li><br>`
                        $('#container').html(plantilla);//se insertan los datos de la plantilla en el elemento con ID 'container'
                        $('#tareas').html('');
                        $('#resultado').show();//mostrar elementos por su ID
                    }else{
                        $('#tareas').html(plantilla);
                    }
                }
            })
        }
    });

    function obtenerTareas(){
        $.ajax({
            url: 'task-list.php',
            type: 'GET',
            success: function(response){
                let datosTareas = JSON.parse(response);
                let plantilla = '';
                datosTareas.forEach(tarea => {
                    plantilla +=`<tr Task-id=${tarea.id}>
                                    <td>${tarea.id}</td>
                                    <td>
                                        <a href="#" class="task-item">${tarea.nombre}</a>
                                    </td>
                                    <td>${tarea.descripcion}</td>
                                    <td>
                                        <button class="task-delete btn btn-danger btn-sm">Eliminar</button>
                                        <button class="task-edit btn btn-success btn-sm">Editar</button>
                                    </td>
                                </tr>`
                });
                $('#tareas').html(plantilla);
            }
        });
    }

    $(document).on('click', '.task-item', function(){
        let element = $(this)[0].parentElement.parentElement;
        let task_id = $(element).attr('Task-id');
        $.post('task-single.php', {task_id}, function(response){
            const datos = JSON.parse(response);
            $('#task-id').val(datos.id);
            $('#nombre').val(datos.nombre);
            $('#descripcion').val(datos.descripcion);
            console.log($('#task-id').val());
            edit = true;
        });
    });

});