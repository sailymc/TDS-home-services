<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Admin Dashboard </title>

  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/dashboard.css" rel="stylesheet">


  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>


</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-info flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="home.php">Panel de Control -  Admin</a>
    <!-- <a class="navbar-brand" href="home.php"><img src="../assets/img/logos.png" alt="Logo" class="logo"></a> -->


    <!-- <input class="form-control form-control-dark w-100" type="text" plaSceholder="Search" aria-label="Search"> -->
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link btn btn" href="logout.php">Volver al Inicio</a>
      </li>
    </ul>


  </nav>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'home.php') echo 'active'; ?>" href="home.php">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'services.php') echo 'active'; ?>" href="services.php">
                <span data-feather="shopping-cart"></span>
                Servicios </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'clients.php') echo 'active'; ?>" href="clients.php">
                <span data-feather="users"></span>
                Clientes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'providers.php') echo 'active'; ?>" href="providers.php">
                <span data-feather="users"></span>
                Proveedores de Servicio
              </a>
            </li>
            <?php /*
            <li class="nav-item">
              <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'profile.php') echo 'active'; ?>" href="profile.php">
                <span data-feather="user"></span>
                Edit Profile </a>
            </li>
            */ ?>
          </ul>

        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


        <?php

        if (isset($_SESSION['user_admin'])) {
        ?>
          <script>
            function sendPushNotification() {
              Push.create("¡Buenas noticias!", {
                body: "Alguien acaba de realizar una orden.",
                timeout: 4000,
                onClick: function() {
                  window.focus();
                  this.close();
                }
              });
            }

            // Call the function immediately after the page loads
            sendPushNotification();
          </script>
        <?php
        }

        ?>