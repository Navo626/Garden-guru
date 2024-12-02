<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
require '../classes/Security.php';

use classes\DbConnector;

$dbcon = new DbConnector();
session_start();
$admin = null;
if (isset($_SESSION["admin"])) {
    // User is logged in, retrieve the user object
    $admin = $_SESSION["admin"];
} else {
    header("Location: ../login.php?error=5");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['lastname']) && !empty($_POST['lastname']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passwordConfirmation']) && !empty($_POST['passwordConfirmation']) && isset($_POST['NIC']) && !empty($_POST['NIC'])) {
        $tempPass1 = $_POST["password"];
        $tempPass2 = $_POST["passwordConfirmation"];

        if (Security::validate_password($tempPass1)) {

            if ($tempPass1 == $tempPass2) {
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $email = $_POST["email"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $NIC = $_POST["NIC"];
                $phone = $_POST["phone"];

                $firstname = Security::SanitizeInput($firstname);
                $lastname = Security::SanitizeInput($lastname);
                $email = Security::SanitizeInput($email);
                $NIC = Security::SanitizeInput($NIC);
                $phone = Security::SanitizeInput($phone);

                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    if (is_numeric($phone)) {
                        // call AddManager function in Admin class
                        if ($admin->AddManager($firstname, $lastname, $email, $password, $NIC, $phone)) {
                            header("Location: ../admin/Admin.php?success=1");
                        } else {
                            header("Location: ../admin/managerRegister.php?error=6");
                        }
                    } else {
                        header("Location: ../admin/managerRegister.php?error=5");
                    }
                } else {
                    header("Location: ../admin/managerRegister.php?error=4");
                }
            } else {
                header("Location: ../admin/managerRegister.php?error=2");
            }
        } else {
            header("Location: ../admin/managerRegister.php?error=3");
        }
    } else {
        header("Location: ../admin/managerRegister.php?error=1");
    }
}
