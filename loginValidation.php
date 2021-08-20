<?php

    session_start(); //

    $userAuthenticated = false; // Login authentication control
    $userId = null;
    $userProfileId = null;

    $profiles = array(1 => 'adm', 2 => 'user');

    // UserDB
    $appUsers = array(
        array('id' => 1, 'userEmail' => 'adm@teste.com', 'userPassword' => '1234', 'userId' => 1),
        array('id' => 2, 'userEmail' => 'user@teste.com', 'userPassword' => 'abcd', 'userId' => 2), 
    );

    // Checks if a user typed the right email and password
    foreach($appUsers as $user){
        if($user['userEmail'] == $_POST['userEmail'] && $user['userPassword'] == $_POST['userPassword']) {
            $userAuthenticated = true;
            $userId = $user['id'];
            $userProfileId = $user['userId'];
        }
    }

    // Behavior for when a user is authenticated or not
    if($userAuthenticated) {
        $_SESSION['authenticated'] = 'YES';
        $_SESSION['id'] = $userId;
        $_SESSION['userId'] = $userProfileId;
        header('Location: home.php'); // Redirects to the home.php page
    } else {
        $_SESSION['authenticated'] = 'NO';
        header('Location: index.php?login=error'); // Redirects to the index.php with a login error
    }

    // Receives the login info from the index.php
    $_POST['userEmail'];
    $_POST['userPassword'];
