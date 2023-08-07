<?php
include('../config.php');

if (isset($_SESSION['user_admin'])) {
    echo redirect('home.php');
}

//login user
$message = null;
if (isset($_POST['email']) && $_POST['email'] != '') {

    $email = trim($_POST['email']);
    $password = $_POST['password'];
    // print_r($_POST);die;
    //email and pass check
    $db->where('email', $email);
    $db->where('password', $password);
    //$db->where('role', 1);

    $results = $db->get('admin');

    if (count($results) != 0) {
        // print_r( $results );
        $_SESSION['user_admin'] = $results[0];
        $url = 'home.php';
        echo redirect($url);
    } else {
        $message = 'Email or password may be incorrect.';
    }
}

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
            font-style: italic;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>

    <title>NiNo
        Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" method="post" action="#">
        <h2 class="fancy-orange"> NiNo </h2>
        <?php if ($message != '') {
        ?>
            <div class="alert alert-danger">
                <span><?php echo $message ?></span>
            </div>
        <?php
        } ?>
        <h1 class="h3 mb-3 font-weight-normal">Ingresar como Administrador</h1>
        <label for="inputEmail" class="sr-only">E-Mail</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block " type="submit">Iniciar Sesión</button>
        <p class="mt-5 mb-3 text-muted fixed-bottom"">&copy; 2022-2023</p>
    </form>
</body>

</html>