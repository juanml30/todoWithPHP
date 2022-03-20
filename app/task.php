<?php

require_once "./app/db.php";

function showTasks()
{
    include "./templates/header.php";

    getAllTasks();

    include "./templates/footer.php";
}
