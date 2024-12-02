<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
require '../classes/Security.php';

use classes\DbConnector;

$dbcon = new DbConnector();

session_start();
if (isset($_SESSION["user"])) {

    $user = $_SESSION["user"];
} else {

    header("Location: ../login.php?error=2");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ((isset($_POST["firstname"]) && !empty($_POST["firstname"])) && (isset($_POST["lastname"]) && !empty($_POST["lastname"])) && (isset($_POST["phone"]) && !empty($_POST["phone"])) && (isset($_POST["address"]) && !empty($_POST["address"]))) {

        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $userID = $user->getUserId();

        $firstName = Security::SanitizeInput($firstName);
        $lastName = Security::SanitizeInput($lastName);
        $email = Security::SanitizeInput($email);
        $phone = Security::SanitizeInput($phone);
        $address = Security::SanitizeInput($address);

        // call EditUserDetails function in user class
        if ($user->EditUserDetails($firstName, $lastName, $email, $phone, $address)) {
            header("Location: ../user.php?success=2");
            exit;
        } else {
            header("Location: ../user.php?error=1");
            exit;
        }
    } else {
        header("Location: ../user.php?error=2");
        exit;
    }

    
}
