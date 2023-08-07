<?php
require_once('config.php');


$active_orders = 0;
if ($logged_in_user_id > 0) {

  $db->where('status', 0); // for active orders status 0

  if ($account_type == 'client') {
    $db->where('client_id', $logged_in_user_id);
  } elseif ($account_type == 'service_provider') {
    $db->where('seller_id', $logged_in_user_id);
  }

  $active_orders = count($db->get('orders'));
}
$locations = locations();

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <style>
        .fancy-orange {
            color: orange;
            font-family: Rockwell;
            font-style: italic;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>
  <link rel="icon" href="../../../../favicon.ico">
  <title>NiNo</title>



  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/carousel.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">


  <!-- Load icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->

  <!-- Vue.js -->
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- Add this script after jQuery -->
  <script>
    var $j = jQuery.noConflict();
  </script>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark  ">
      <h2 class="fancy-orange"> NiNo🛠️   </h2>
      <h6 style="color: white; font-family: 'American Typewriter', sans-serif;"> Tus servicios a un click 🖱️</h6>
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
              <a class="nav-link" href="seller_dashboard" target="_blank">Tablero <span class="sr-only">
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
              <a class="nav-link" href="orders.php">Mis Servicios <span class="badge badge-success"><?= $active_orders ?></span></a>
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
              <a class="nav-link" href="./logout.php">Salir
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

  <main role="main">