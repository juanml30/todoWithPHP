<?php
require_once "./app/task.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'listar';
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        // listar todas las tareas
        showTasks();
        break;
    case 'insertar':
        addTask();
        break;
    case 'borrar':
        delTask($params[1]);
        break;
    case 'completar':
        completeTask($params[1]);
        break;
    default:
        echo "Pagina no encontrada";
}