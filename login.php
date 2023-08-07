<?php
require_once('config.php');


if (isset($_SESSION['user'])) {
    echo redirect('index.php');
}

//login user
$message = null;

if (isset($_POST['email']) && $_POST['email'] != '') {

    $email =         trim($_POST['email']);
    $password =         $_POST['password'];

    $db->where('email', $email)->where('password', $password);

    $results = $db->get('user');

    if (count($results) != 0) {

        $_SESSION['user'] = $results[0];
        $url = 'index.php';
        echo redirect($url);
    } else {
        $message = "Username or password maybe incorrect";
        // echo redirect('index.php?incorrect');
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .fancy-orange {
            color: orange;
            font-style: italic;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>
    <title>Iniciar Sesión </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Register css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="regform/css/style.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="background: #eee">





    <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark  ">
      <h2 class="fancy-orange"> NiNo🛠️ </h2>
      <h6 style="color: white; font-family: 'American Typewriter', sans-serif;">Tus servicios a un click 🖱️</h6>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto ml-3">
          <li class="nav-item active">
          <a class="nav-link" href="index.php">Inicio<span class="sr-only"></span></a>

          </li>
          <?php

          if ($account_type == 'service_provider') {
          ?>
            <li class="nav-item active">
              <a class="nav-link" href="seller_dashboard" target="_blank">Panel de control <span class="sr-only">
                </span></a>
            </li>
          <?php
          }

          ?>

          <!-- <li class="nav-item active">
              <a class="nav-link" href="profile.php"> Profile <span class="sr-only"> </span></a>
            </li> -->
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Servicios
            </a>
            <ul class="dropdown-menu">
              <?php
              foreach (services() as $key => $value) {
              ?>
                <li><a class="dropdown-item" href="services.php?service=<?= $value ?>"><?= $value ?></a>
                </li>
              <?php } ?>
            </ul>
          </li>
          <?php
          if ($logged_in_user_id > 0) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="orders.php">Mis Solicitudes <span class="badge badge-success"><?= $active_orders ?></span></a>
            </li>
          <?php
          }
          if ($logged_in_user_id == 0) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Iniciar sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Registrarse </a>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="./logout.php">Cerrar sesión
</a>
            </li>
          <?php
          } ?>
        </ul>
        <div>
          <form class="form-inline mt-2 mt-md-0 d-flex" method="get" action="search.php" id='search-form'>
            <input value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" class="form-control mr-sm-2" name="search" value="" type="text" placeholder="Ubicación" aria-label="Search" id="search-input" autocomplete="off">
            <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
          </form>
          <div id="search-results" class="list-group"></div>
        </div>
      </div>
    </nav>
  </header>

  <div class="main">
    <h1>Registro</h1>
    <div class="container">
        <div class="sign-up-content">
            <form method="POST" class="signup-form">
                <!-- PHP: Si hay un mensaje, mostrar una alerta de error -->
                <h2 class="form-title">INICIAR SESIÓN</h2>

                <div class="form-textbox">
                    <label for="email">E-Mail</label>
                    <input type="text" name="email" id="email" required>
                </div>

                <div class="form-textbox" style="margin-top: 20px;">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="form-textbox " style="margin-top: 40px;">
                    <input type="submit" name="submit" id="submit" class="submit" value="Iniciar sesión" />
                </div>
            </form>

            <p class="loginhere">
                ¿No tienes una cuenta?<a href="register.php" class="loginhere-link"> Registrate</a>
            </p>
        </div>
    </div>
</div>


    <!-- JS -->
    <script src="regform/vendor/jquery/jquery.min.js"></script>
    <script src="regform/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>