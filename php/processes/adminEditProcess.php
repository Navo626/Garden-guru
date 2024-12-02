<?php
require '../classes/DbConnector.php';
require '../classes/persons.php';
require '../classes/Security.php';

use classes\DbConnector;

$dbcon = new DbConnector();

session_start();
if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
} else {
    header("Location: ./admin/adminlogin.php?error=2");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = Security::SanitizeInput($_POST["firstname"]);
    $lastName = Security::SanitizeInput($_POST["lastname"]);
    $email = Security::SanitizeInput($_POST["email"]);
    $phone = Security::SanitizeInput($_POST["phone"]);
    $NIC = Security::SanitizeInput($_POST["NIC"]);

    if ($admin->editAdminDetails($firstName, $lastName, $email, $NIC, $phone)) {
        header("Location: ../admin/Admin.php");
        exit;
    } else {
        header("Location: ../admin/Admin.php?error=1");
        exit;
    }
}
