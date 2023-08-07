<?php

require_once('../config.php');


if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    echo redirect('../login.php');
}
