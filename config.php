<?php

session_start();

$logged_in_user_id= isset($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : 0;
$account_type= isset($_SESSION['user']['account_type']) ? $_SESSION['user']['account_type'] : 0;
$logged_in_admin_id= isset($_SESSION['user_admin']['admin_id']) ? $_SESSION['user_admin']['admin_id'] : 0;


include_once('mysql.class.php');
include_once('lib.php');
$db = new MysqliDb('localhost', 'root', '', 'home-service');

