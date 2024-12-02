<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
require '../classes/Security.php';

use classes\DbConnector;

$dbcon = new DbConnector();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = Security::SanitizeInput($_POST["email"]);
    $password = Security::SanitizeInput($_POST["password"]);
    if (person::login($email, $password, "admin")) {
        header("Location: ../admin/Admin.php");
        exit;
    } else {
        header("Location: ../admin/adminlogin.php?error=1");
        exit;
    }
}
