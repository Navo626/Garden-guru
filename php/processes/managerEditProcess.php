<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
require '../classes/Security.php';

use classes\DbConnector;

$dbcon = new DbConnector();

session_start();
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
} else {
    // Redirect the user to login.php if not logged in
    header("Location: ../manager/managerlogin.php?error=2");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = Security::SanitizeInput(($_POST["firstname"]));
    $lastName = Security::SanitizeInput(($_POST["lastname"]));
    $email = Security::SanitizeInput(($_POST["email"]));
    $phone = Security::SanitizeInput(($_POST["phone"]));
    $NIC = Security::SanitizeInput(($_POST["NIC"]));
    // call EditManagerDetails function
    if ($manager->EditManagerDetails($firstName, $lastName, $email, $NIC, $phone)) {
        header("Location: ../manager/managerProfile.php");
        exit;
    } else {
        header("Location: ../manager/managerProfile.php?error=1");
        exit;
    }
}
