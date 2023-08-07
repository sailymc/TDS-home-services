<?php
require_once('config.php');

if (isset($_SESSION['user_admin'])) {
    // echo redirect('home.php');
}

//login user
$message = null;

if (isset($_POST['email']) && $_POST['email'] != '') {

    $email =         trim($_POST['email']);
    $password =         $_POST['password'];
 
    $db->where('email', $email)->where('password', $password);

    $results = $db->get('admin');

    if (count($results) != 0) {

        $_SESSION['user_admin'] = $results[0];
        $url = 'home.php';
        echo redirect($url);
    } else {
        $message = "El nombre de usuario o contraseña podrían ser incorrectos.";
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
    <title>Login </title>

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
            <a class="navbar-brand" href="#">NiNo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto ml-3">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only"> </span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="profile.php"> Profile <span class="sr-only"> </span></a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registrarse </a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0 d-flex" id='search-form'>
                    <input class="form-control mr-sm-2" type="text" placeholder="Location." aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>

            </div>
        </nav>
    </header>


    <div class="main">

        <h1>Registrate</h1>
        <div class="container">
            <div class="sign-up-content">
                <form method="POST" class="signup-form">
                    <h2 class="form-title">Iniciar Sesión</h2>

                    <div class="form-textbox">
                        <label for="username">E-Mail</label>
                        <input type="text" name="username" id="email" required>
                    </div>

                    <div class="form-textbox" style="margin-top: 20px;">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <div class="form-textbox " style="margin-top: 40px;">
                        <input type="submit" name="submit" id="submit" class="submit" value="Create account" />
                    </div>
                </form>

                <p class="loginhere">
                    ¿No tienes una cuenta? <a href="register.php" class="loginhere-link"> Registrate</a>
                </p>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="regform/vendor/jquery/jquery.min.js"></script>
    <script src="regform/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>