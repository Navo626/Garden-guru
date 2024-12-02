<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';

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

    $ManagerID = ($_POST["ManagerID"]);
    // call EditManagerDetails function
    if ($admin->deleteManager($ManagerID)) {
        header("Location: ../admin/Admin.php?success=2");
        exit;
    } else {
        header("Location: ../admin/Admin.php?error=1");
        exit;
    }
}
