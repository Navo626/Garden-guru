<!DOCTYPE <html>
<html lang="en">

<?php
require_once './classes/DbConnector.php';
require_once './classes/persons.php';
require_once './classes/cart.php';
require_once './classes/order.php';
require_once './classes/Security.php';
require_once './classes/shop.php';

use classes\DbConnector;

$dbcon = new DbConnector();

session_start();
$user = null;
$manager = null;
$orderID = null;
$order = null;
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
}
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
}

if (isset($_SESSION["order"])) {
    // User is logged in, retrieve the user object
    //$order = unserialize($_SESSION["order"]);

    // Retrieve the serialized object from the session
    $serializedObject = $_SESSION['order'];

    // Unserialize the object
    $order = unserialize($serializedObject);
}
if (isset($_SESSION["orderID"])) {
    // User is logged in, retrieve the user object
    $orderID = $_SESSION["orderID"];
}
?>


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Cancel Payment</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/Payement.css" rel="stylesheet">


</head>

<body onload="myFunction()" style="margin:0;" class="bg-white">

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="../index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="../images/logo.png" style="width:220px;height:50px;">
            <!-- <h1 class="m-0">Garden<B>GURU</B></h1> -->
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="../index.php" class="nav-item nav-link active">Home</a>
                <a href="./plantSuggestion.php" class="nav-item nav-link">Plant Suggestions</a>
                <a href="./Selling.php" class="nav-item nav-link">Shop</a>
                <!-- <a href="../php/blog.php" class="nav-item nav-link">Blog</a> -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Features</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="./blog.php" class="dropdown-item">Blog</a>
                        <a href="./Advertistment.php" class="dropdown-item">Advertisement</a>
                        <a href="./newsfeed.php" class="dropdown-item">News Feed</a>
                        <a href="./comForum.php" class="dropdown-item">Communication Forum</a>
                        <a href="./report.php" class="dropdown-item">Reporting</a>

                    </div>
                </div>
                <a href="./AboutUs.php" class="nav-item nav-link">About</a>
                <a href="./ContactUs.php" class="nav-item nav-link">Contact</a>

                <a href="./user.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Profile</a>

                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="./user.php" class="dropdown-item">Profile</a>
                        <a href="./processes/logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div> -->
            </div>
            <!-- <a href="#" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a> -->
        </div>
    </nav>
    <!-- Navbar End -->


    <div id="myDiv" class="animate-bottom">
        <div class="row">
            
            <div class="col-md-6 text-center" style="margin-top: 100px;">
                <h1 style="margin-left: 250px; margin-top: 100px;">Payment Declined!</h1>
                <h2 style="margin-left: 250px; margin-top: 0px;">Please Retry your transaction</h2>
                <a href="../index.php" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px; margin-left: 250px;">Back to Home</a>
                <a href="./mycart.php" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px; ">Back to Cart</a>
            </div>
            <div class="col-md-6" style="margin-top: 70px; ">
                <img src="../images/cancel.webp" width="100%">
            </div>


        </div>
        <!-- <h1>Payment Cancel!</h1> -->

        <!-- <h2>Thank you for palced your order with us.</h2> -->
        <!-- <a href="../index.php" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px;">Back to Home</a> -->
        <!-- <a href="./mybill.php" target="_blank" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px;">Download Bill</a> -->
    </div>



</body>

</html>