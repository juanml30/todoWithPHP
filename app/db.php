<?php

function getAllTasks()
{
    //1 - abrimos una conexion
    $db = new PDO("mysql:host=localhost;" . "dbname=db_task;charset=utf8", "root", "");

    //2 - Enviamos la consulta y nos devuelve el resultado
    $query = $db->prepare("SELECT * FROM task");
    $query->execute();
    //3 - Procesamos los datos para generar el html (Mejor dicho obtengo la rta)
    $tasks = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las tareas
    echo "<ul class='list-group mt-5'>";
    foreach ($tasks as $task) {
        if ($task->finalizada) {
            echo "<li class ='list-group-item-success'> $task->titulo - $task->prioridad - 
                    <a class='btn btn-outline-primary text-decoration-none' href='borrar/$task->id'>Borrar</a>
                    </li>";
        } else {
            echo "<li class ='list-group-item'> $task->titulo - $task->prioridad - 
                        <a class='btn btn-outline-primary text-decoration-none' href='borrar/$task->id'>Borrar</a>
                        <a class='btn btn-outline-secondary text-decoration-none' href='completar/$task->id'>Completar</a>
                    </li>";
        }
    }
    echo "</ul>";

    //4 - Cerramos la conexion [existe pero lo hace solo PDO];
    return $tasks;
}

function insertarTask($titulo, $descripcion, $prioridad, $finalizada)
{
    $db = new PDO('mysql:host=localhost;' . 'dbname=db_task;charset=utf8', 'root', '');

    $query = $db->prepare('INSERT INTO task(titulo, descripcion, prioridad, finalizada) VALUES (?, ?, ?, ?)');
    $query->execute([$titulo, $descripcion, $prioridad, $finalizada]);

    // 3. Obtengo y devuelo el ID de la tarea nueva
    return $db->lastInsertId();
}

function deleteTask($id)
{
    $db = new PDO('mysql:host=localhost;' . 'dbname=db_task;charset=utf8', 'root', '');

    $query = $db->prepare('DELETE FROM task WHERE id = ?');
    $query->execute([$id]);
}

function updateTask($id) {
    $db = new PDO('mysql:host=localhost;' . 'dbname=db_task;charset=utf8', 'root', '');

    $query = $db->prepare('UPDATE task SET finalizada = 1 WHERE id=?');
    $query->execute([$id]);
    
}