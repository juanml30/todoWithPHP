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
        echo "<li class ='list-group-item'> $task->titulo - $task->prioridad </li>";
    }
    echo "</ul>";

    //4 - Cerramos la conexion [existe pero lo hace solo PDO];
    return $tasks;
}
