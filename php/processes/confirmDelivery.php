<?php

require '../classes/DbConnector.php';
require_once '../classes/persons.php';
session_start();
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
} else {

    header("Location: ../login.php?error=4");
    exit();
}

use classes\DbConnector;
$dbcon = new DbConnector();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderID = $_POST['orderID'];
    if($user->confirmDelivery($orderID)){
        header("Location: ../user.php");
    }
} else {
    header("Location: ../user.php?error=2");
}
