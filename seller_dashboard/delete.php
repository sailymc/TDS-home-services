<?php

include('../config.php');


if (!isset($_SESSION['user'])) {
    echo redirect('index.php?logout');
}



if (isset($_GET['service_id'])) {
    $service_id = $_GET['service_id'];
    $db->where('service_id', $service_id);
    if ($db->delete('service')) {
        echo redirect('services.php');
    }
}
include('header.php');
?>