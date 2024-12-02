<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
require_once '../classes/Security.php';

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

    $text_description = Security::SanitizeInput($_POST["text_description"]);
    $text_title = Security::SanitizeInput($_POST["text_title"]);
    $realDate = $_POST["realDate"];
    $file = $_FILES['image1'];

    if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
        // call putAdvertisement function in user class
        if($user->putAdvertisement($file,$text_title, $text_description, $realDate)){
            header("Location: ../user.php?success=3");
        }else{
            header("Location: ../user.php?success=4");
        }
    }
 
}