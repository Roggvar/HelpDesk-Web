<?php

    session_start();

    session_destroy(); // Removes the variables inside the array
    header('Location: index.php');

?>