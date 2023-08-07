<?php

include('./config.php');


if (isset($_POST['submit'])) {
    $account_type = isset($_POST['account_type']) && $_POST['account_type'] != '' ?  $_POST['account_type'] : 'client';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // check if a file was uploaded successfully
    if (isset($_FILES['document']) && $_FILES['document']['error'] === UPLOAD_ERR_OK) {
        // define the target location for uploads
        $uploadDir = 'uploads/';

        // generate a unique filename for the uploaded document to prevent overwriting existing files
        $uploadedFileName = uniqid() . '_' . basename($_FILES['document']['name']);

        // move the uploaded file to the target location
        $uploadedFilePath = $uploadDir . $uploadedFileName;
        if (move_uploaded_file($_FILES['document']['tmp_name'], $uploadedFilePath)) {
            // file upload successful, continue inserting data to the database
            $data = [
                'username' => $name,
                'email' => $email,
                'password' => $pass,
                'account_type' => $account_type,
                'document' => $uploadedFileName // save the uploaded file in the database
            ];

            // insert the data into the 'user' table
            $user_id = $db->insert('user', $data);

            // insert data into the 'service_provider_profile' table 
            $user = $db->insert('service_provider_profile', ['user_id' => $user_id]);

            if ($user) {
                echo redirect('login.php');
            } else {
                // handle database insert error
            }
        } else {
            // handle file upload error
        }
    } else {
        // handle file upload error (e.g., no file uploaded or other errors)
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

    <title>Registrarse </title>

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
      <h2 class="fancy-orange"> NiNo🛠️</h2>
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
              <a class="nav-link" href="orders.php">Mis Pedidos <span class="badge badge-success"><?= $active_orders ?></span></a>
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
            <form method="POST" class="signup-form" action="#" enctype="multipart/form-data">
                <h2 class="form-title">¿Qué tipo de usuario eres?</h2>
                <div class="form-radio">
                    <input type="radio" name="account_type" value="service_provider" id="nuevo" />
                    <label for="nuevo">Proveedor</label>

                    <input type="radio" name="account_type" value="client" id="promedio" />
                    <label for="promedio">Cliente</label>
                    <!--    
                    <input type="radio" name="member_level" value="maestro" id="maestro" />
                    <label for="maestro">Maestro</label> -->
                </div>

                <div class="form-textbox">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="form-textbox">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="form-textbox">
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" id="pass" required>
                </div>
                <div class="form-textbox">
                    <label for="document">Documento</label>
                    <input type="file" name="document" id="document" required>
                </div>

                <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>Acepto los <a href="#" class="term-service">Términos de Servicio</a></label>
                </div>

                <div class="form-textbox">
                    <input type="submit" name="submit" id="submit" class="submit" value="Crear cuenta" />
                </div>
            </form>

            <p class="loginhere">
                ¿Ya tienes una cuenta?<a href="login.php" class="loginhere-link"> Iniciar sesión</a>
            </p>
        </div>
    </div>
</div>


    <!-- JS -->
    <script src="regform/vendor/jquery/jquery.min.js"></script>
    <script src="regform/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>