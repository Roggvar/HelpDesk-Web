<?php

    $_POST;

    // Text assembly
    $title = str_replace('#', "-", $_POST['title']);
    $category = str_replace('#', "-", $_POST['category']);
    $desc = str_replace('#', "-", $_POST['desc']);

    $text = $title . '#' . $category . '#' . $desc . PHP_EOL;

    // File management
    $file = fopen('file.hd', 'a');
    fwrite($file, $text);
    fclose($file);

    header('Location: abrir_chamado.php');

?>