<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';

session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    header("Location: ../login.php?error=2");
    exit();
}

if (isset($_POST['submit'])) {

    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        // call uploadProPic function in user class
        if ($user->uploadProPic($_FILES['profile_picture'])) {
            $_SESSION["user"] = $user;
            header("Location: ../user.php?success=6");
        } else {
            header("Location: ../user.php?error=6");
        }

    } else {
        header("Location: ../user.php?error=6");
    }
}
