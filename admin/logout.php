<?php

require_once('../config.php');


if (isset($_SESSION['user_admin'])) {
    unset($_SESSION['user_admin']);
    echo redirect('index.php?logout');
}
