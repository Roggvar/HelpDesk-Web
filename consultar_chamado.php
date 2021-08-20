<?php require_once "acessValidator.php"; ?>

<?php

  $issuesArray = array();
  $file = fopen('issue.hd', 'r');

  while(!feof($file)) {
     $issues = fgets($file);
     $issuesArray[] = $issues;
  }

  fclose($file);

?>

<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="logOff.php" class="nav-link">Sign Out</a>
      </li>
    </ul>
  </nav>

  <div class="container">
    <div class="row">

      <div class="cardCommon">
        <div class="card">
          <div class="card-header">
            Consulta de chamado
          </div>

          <div class="card-body">

            <?php foreach($issuesArray as $issue) { ?>

              <?php
              
                $issueData = explode('#', $issue);

                // Tests if is an adm or user logged
                if($_SESSION['userId'] == 2) {
                  if($_SESSION['id'] != $issueData[0]) {
                    continue;
                  }
                }

                if(count($issueData) < 3) {
                  continue;
                }
                
              ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title">
                    <?= $issueData[1] ?>
                  </h5>
                  <h6 class="card-subtitle mb-2 text-muted">
                    <?= $issueData[2] ?>
                  </h6>
                  <p class="card-text">
                    <?= $issueData[3] ?>
                  </p>

                </div>
              </div>

            <?php  } ?>

            <div class="row mt-5">
              <div class="col-6">
                <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>