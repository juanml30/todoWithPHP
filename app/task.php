<?php

require_once "./app/db.php";

function showTasks()
{
    include "./templates/header.php";

    include "./templates/form_alta.php";

    getAllTasks();



    include "./templates/footer.php";
}

function addTask()
{
    $titulo = $_REQUEST['titulo'];
    $prioridad = $_REQUEST['prioridad'];
    $descripcion = $_REQUEST['descripcion'];
    $finalizada = 0;

    $id = insertarTask($titulo, $descripcion, $prioridad, $finalizada);

    // redirijo al home
    header("Location: " . BASE_URL);
}

function delTask($id)
{
    deleteTask($id);
    header("Location: " . BASE_URL);
}

function completeTask($id) {
    $updated = updateTask($id);
    header("Location: " . BASE_URL);
}