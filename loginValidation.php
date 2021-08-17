<?php

    $userAuthenticated = false; // Login authentication control

    // UserDB
    $appUsers = array(
        array('userEmail' => 'adm@teste.com', 'userPassword' => '1234'),
        array('userEmail' => 'user@teste.com', 'userPassword' => 'abcd'), 
    );

    // Checks if a user typed the right email and password
    foreach($appUsers as $user){
        if($user['userEmail'] == $_POST['userEmail'] && $user['userPassword'] == $_POST['userPassword']) {
            $userAuthenticated = true;
        }
    }

    // Behavior for when a user is authenticated or not
    if($userAuthenticated) {

    } else {
        header('Location: index.php?login=error'); // Redirects to the index.php
    }

    // Receives the login info from the index.php
    $_POST['userEmail'];
    $_POST['userPassword'];

?>