<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
require '../classes/Security.php';

use classes\DbConnector;

$dbcon = new DbConnector();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = Security::SanitizeInput($_POST["email"]);

    $password = Security::SanitizeInput($_POST["password"]);
    //call LoginManager function in Manager class
    if (person::login($email, $password, "manager")) {
        header("Location: ../manager/managerProfile.php");
        exit;
    } else {
        header("Location: ../manager/managerlogin.php?error=1");
        exit;
    }
}
