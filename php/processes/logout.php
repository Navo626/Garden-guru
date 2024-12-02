<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
// Start the session
session_start();
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
    $user->updateToken(null, null);
}
// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page after logging out
header("Location: ../login.php");
exit();

