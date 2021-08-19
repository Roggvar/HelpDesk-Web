<?php

session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 'YES') {
  header('Location: index.php?login=error2'); // Redirects to the index.php with a login error
}
?>