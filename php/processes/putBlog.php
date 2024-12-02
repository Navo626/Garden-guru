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

    $blogTitle = Security::SanitizeInput($_POST["blog_title"]);
    $blogDetails = Security::SanitizeInput($_POST["blog_details"]);
    $Date = $_POST["Date"];
    $file = $_FILES['blog_image'];

    if (isset($_FILES['blog_image']) && $_FILES['blog_image']['error'] === UPLOAD_ERR_OK) {
        // call putBlog function in user class
        if ($user->putBlog($file, $blogTitle, $blogDetails, $Date)) {
            header("Location: ../user.php?success=1");
        } else {
            header("Location: ../user.php?success=0");
        }
    }
}
