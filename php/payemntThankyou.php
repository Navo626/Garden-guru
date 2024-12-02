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
    <title>GardenGURU | Payment</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/Payement.css" rel="stylesheet">

    <style>
        /* Center the loader */
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #00b50b;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }

        #myDiv {
            display: none;
            text-align: center;
        }

        body {

            /* background-image: url('../images/web.png') ; */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;

        }
    </style>
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
    <div id="start" style="margin-top: 100px;">

    </div>

    <div style="margin-top: 200px; margin-left: 38%;" id="process">
        <h1 style="margin-bottom: 50px;">Payment Processing!</h1>
        <svg width="400px" height="400px" viewBox="0 0 14 18" >
            <defs>
            </defs>
            <g id="sandclock" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                <path d="M13.0986667,16.465 L12.7226667,16.465 C12.6796667,16.031 12.5996667,15.6073333 12.4886667,15.1963333 C12.084,13.6953333 11.269,12.3646667 10.352,11.3396667 C9.52833333,10.4183333 8.623,9.74333333 7.859,9.41433333 C7.859,9.41433333 7.56766667,9.20133333 7.56766667,8.97866667 C7.56766667,8.75633333 7.859,8.54533333 7.859,8.54533333 C9.687,7.74033333 12.3786667,4.93333333 12.7223333,1.50133333 L13.0986667,1.50133333 C13.5006667,1.50133333 13.8266667,1.17533333 13.8266667,0.773666667 C13.8266667,0.371666667 13.5006667,0.0456666667 13.0986667,0.0456666667 L0.776,0.0456666667 C0.374,0.0456666667 0.048,0.371666667 0.048,0.773666667 C0.048,1.17533333 0.374,1.50133333 0.776,1.50133333 L1.152,1.50133333 C1.49233333,4.93666667 4.15866667,7.745 6.00533333,8.54733333 C6.00533333,8.54733333 6.31133333,8.737 6.31133333,8.97866667 C6.31133333,9.22033333 6.01566667,9.421 6.01566667,9.421 C5.26233333,9.75266667 4.36333333,10.4246667 3.54166667,11.3396667 C2.62066667,12.3646667 1.79833333,13.6953333 1.389,15.1963333 C1.277,15.6073333 1.196,16.031 1.15266667,16.465 L0.776,16.465 C0.374,16.465 0.048,16.791 0.048,17.1926667 C0.048,17.5946667 0.374,17.9206667 0.776,17.9206667 L13.0986667,17.9206667 C13.5006667,17.9206667 13.8266667,17.5946667 13.8266667,17.1926667 C13.8263333,16.791 13.5006667,16.465 13.0986667,16.465 L13.0986667,16.465 Z M2.47033333,16.4923333 L1.892,16.4923333 C1.92166667,16.023 1.97666667,15.5933333 2.053,15.1963333 C2.273,14.054 2.67366667,13.1896667 3.18666667,12.4753333 C3.47733333,12.0703333 3.80133333,11.6873333 4.14033333,11.3396667 C4.80733333,10.6553333 5.88879069,10.1021427 6.19133333,9.82066667 C6.49387598,9.53919067 6.65833333,9.39266667 6.65833333,8.997 C6.65833333,8.60133333 6.45611593,8.47363293 6.03570577,8.2112428 C5.61529562,7.94885266 4.034,6.69966667 3.17433333,5.49566667 C2.488,4.53433333 2.00533333,3.328 1.891,1.50166667 L11.982,1.50166667 C11.8663333,3.322 11.378,4.52866667 10.687,5.49133333 C9.82466667,6.69266667 8.52740499,7.75976575 7.89733907,8.12268078 C7.26727316,8.48559582 7.22133333,8.61 7.22133333,8.98333333 C7.22133333,9.35666667 7.41784912,9.52330154 7.89733907,9.82066691 C8.37682903,10.1180323 9.08133333,10.6486667 9.75266667,11.3393333 C10.0873333,11.6833333 10.4066667,12.0626667 10.6933333,12.4633333 C11.2053333,13.179 11.6043333,14.0463333 11.823,15.196 C11.8983333,15.5926667 11.9523333,16.0223333 11.9816667,16.492 L11.4053333,16.492 C4.14033338,16.4920002 5.86059567,16.4920002 2.47033333,16.4923333 Z" id="Shape" fill="#060606"></path>

                <g id="sand">
                    <path d="M7.00695799,10.3484497 C7.00695799,10.3484497 6.27532958,10.4129639 7.00695799,10.3484497 C7.73858641,10.2839355 7.00695799,10.3484497 7.00695799,10.3484497 C7.00695799,10.3484497 7.78173827,9.99768063 7.09265135,10.548584 C6.40356444,11.0994873 7.09265137,10.548584 7.09265137,10.548584 L7.09265137,10.5493774 L11.4924319,16.4705197 L2.52148436,16.4705197 L6.87243652,10.5493774 L6.80957031,10.548584 C6.80957031,10.548584 7.1925659,10.737854 6.87243651,10.548584 C6.37234656,10.2529159 7.00695799,10.3484497 7.00695799,10.3484497 Z;
" id="Path-26" fill="#C62626" sketch:type="MSShapeGroup">

                        <animate attributeName="d" dur="6s" repeatCount="once" keyTimes="0;
                       .01;
											 .2;
											 .4;
											 .7;
											 .8;
											 .99;
                       1" values="M2.33630371,3.07006836 C2.33630371,3.07006836 5.43261719,3.33813477 6.80957031,3.33813477 C8.18652344,3.33813477 11.3754883,3.07006836 11.3754883,3.07006836 C11.3754883,3.07006836 10.8122559,4.96514893 9.58630371,6.16516113 C8.36035156,7.36517334 7.09265137,8.2623291 7.09265137,8.2623291 L7.09265137,8.35028076 L7.09265137,8.46459961 L6.87243652,8.46459961 L6.87243652,8.35028076 L6.80957031,8.2623291 C6.80957031,8.2623291 4.9704053,7.27703707 3.96130371,5.96057129 C2.5045166,4.06005859 2.33630371,3.07006836 2.33630371,3.07006836 Z;
 
										 
							 									M2.375,3.11462402 C2.375,3.11462402 5.71569824,3.44421387 7.09265137,3.44421387 C8.46960449,3.44421387 11.4150391,3.31262207 11.4150391,3.31262207 C11.4150391,3.31262207 10.8122559,4.96514893 9.58630371,6.16516113 C8.36035156,7.36517334 7.09265137,8.2623291 7.09265137,8.2623291 L7.09265137,15.5496216 L7.09265137,16.47052 L6.87243652,16.47052 L6.87243652,15.5496216 L6.80957031,8.2623291 C6.80957031,8.2623291 4.9704053,7.27703707 3.96130371,5.96057129 C2.5045166,4.06005859 2.375,3.11462402 2.375,3.11462402 Z;
										 
							 									M2.49230957,3.31262207 C2.49230957,3.31262207 5.71569824,3.66851807 7.09265137,3.66851807 C8.46960449,3.66851807 11.3153076,3.53222656 11.3153076,3.53222656 C11.3153076,3.53222656 10.8122559,4.96514893 9.58630371,6.16516113 C8.36035156,7.36517334 7.09265137,8.2623291 7.09265137,8.2623291 L7.09265137,15.149231 L7.9152832,16.47052 L6.10144043,16.47052 L6.87243652,15.149231 L6.80957031,8.2623291 C6.80957031,8.2623291 4.9704053,7.27703707 3.96130371,5.96057129 C2.5045166,4.06005859 2.49230957,3.31262207 2.49230957,3.31262207 Z;
								
							                M2.98474121,4.37164307 C2.98474121,4.37164307 5.49548338,4.7074585 6.87243651,4.7074585 C8.24938963,4.7074585 10.8119509,4.64428711 10.8119509,4.64428711 C10.8119509,4.64428711 10.8122559,4.96514893 9.58630371,6.16516113 C8.36035156,7.36517334 7.09265137,8.2623291 7.09265137,8.2623291 L7.09265137,12.5493774 L9.36248779,16.47052 L4.5581665,16.47052 L6.87243652,12.5493774 L6.80957031,8.2623291 C6.80957031,8.2623291 4.9704053,7.27703707 3.96130371,5.96057129 C2.5045166,4.06005859 2.98474121,4.37164307 2.98474121,4.37164307 Z;
										 
										 M4.49743651,6.36560059 C4.49743651,6.36560059 5.63000487,6.72412109 7.00695799,6.72412109 C8.38391112,6.72412109 9.56188963,6.36560059 9.56188963,6.36560059 C9.56188963,6.36560059 9.48870848,6.54571533 8.79962157,7.09661865 C8.11053465,7.64752197 7.09265137,8.2623291 7.09265137,8.2623291 L7.09265137,10.5493774 L11.4924319,16.4705197 L2.52148436,16.4705197 L6.87243652,10.5493774 L6.80957031,8.2623291 C6.80957031,8.2623291 6.01727463,8.16043491 4.82800292,6.81622307 C4.42932128,6.36560059 4.49743651,6.36560059 4.49743651,6.36560059 Z;
										 
										 M5.87017821,7.51904297 C5.87017821,7.51904297 6.14080809,7.70904542 6.87243651,7.64453126 C7.60406493,7.5800171 7.47180174,7.51904297 7.47180174,7.51904297 C7.47180174,7.51904297 8.51336669,7.23876953 7.82427977,7.78967285 C7.13519286,8.34057617 7.09265137,8.2623291 7.09265137,8.2623291 L7.09265137,10.5493774 L11.4924319,16.4705197 L2.52148436,16.4705197 L6.87243652,10.5493774 L6.80957031,8.2623291 C6.80957031,8.2623291 6.66632079,8.14239502 6.34619139,7.953125 C5.84610144,7.65745695 5.87017821,7.51904297 5.87017821,7.51904297 Z;
										 
										 M7.00695799,8.06219482 C7.00695799,8.06219482 6.27532958,8.12670898 7.00695799,8.06219482 C7.73858641,7.99768066 7.00695799,8.06219482 7.00695799,8.06219482 C7.00695799,8.06219482 7.78173827,7.71142576 7.09265135,8.26232908 C6.40356444,8.8132324 7.09265137,8.2623291 7.09265137,8.2623291 L7.09265137,10.5493774 L11.4924319,16.4705197 L2.52148436,16.4705197 L6.87243652,10.5493774 L6.80957031,8.2623291 C6.80957031,8.2623291 7.1925659,8.45159912 6.87243651,8.2623291 C6.37234656,7.96666105 7.00695799,8.06219482 7.00695799,8.06219482 Z;
										 
										 M7.00695799,10.3484497 C7.00695799,10.3484497 6.27532958,10.4129639 7.00695799,10.3484497 C7.73858641,10.2839355 7.00695799,10.3484497 7.00695799,10.3484497 C7.00695799,10.3484497 7.78173827,9.99768063 7.09265135,10.548584 C6.40356444,11.0994873 7.09265137,10.548584 7.09265137,10.548584 L7.09265137,10.5493774 L11.4924319,16.4705197 L2.52148436,16.4705197 L6.87243652,10.5493774 L6.80957031,10.548584 C6.80957031,10.548584 7.1925659,10.737854 6.87243651,10.548584 C6.37234656,10.2529159 7.00695799,10.3484497 7.00695799,10.3484497 Z;" />

                        <animate attributeName="fill" dur="6s" repeatCount="once" keyTimes="0;
                       .5;
                       1" values="#94CE00; 
										 #FADB00;
										 #C62626;" />
                    </path>
                </g>
            </g>
        </svg>
        
    </div>

    <div class="container" style="margin-top: 100px;">
        <div class="intro">

        </div>
    </div>
    </div>

    <?php

    if ($orderID != null) {
        $order->setOrderID($orderID);
        if ($order->transactionConfirm($orderID)) {
            $cart = new Cart();
            $shop = new Shop(null, null, null);
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['ItemId'] != null) {
                    $order->setOrderItem($value['ItemId'], $value['Quantity']);
                    $shop->reduceQuantity($value['ItemId'], $value['Quantity']);
                }
            }

            if ($cart->resetCart($user->getUserId())) {
                $_SESSION['cart'] = null;
                $_SESSION['cart'][0] = array('ItemId' => null, 'Item_Name' => null, 'Price' => null, 'Quantity' => null);
            }
        }
    }


    ?>

    <div style="display:none; " id="myDiv" class="animate-bottom" style="margin-top: 200px;">
        <div class="row">
            <div class="col-md-6">
                <img src="../images/van.png" style="width: 700px; height: 600px; margin-left: 50px;">
            </div>
            <div class="col-md-6" style="margin-top: 100px;">
                <h1>Payment success!</h1>
                <h2 style="margin-top: 20px;">Thank you for placed your order with us.</h2>
                <h3 style="margin-top: 20px;"> Your Order currently in waiting status and <br>check your profile for more information.</h3>
                <a href="../index.php" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px;">Back to Home</a>
                <a href="./mybill.php" target="_blank" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px;">Download Bill</a>
            </div>





            <!-- <h1>Payment success!</h1>
        <h2>Thank you for palced your order with us.</h2>
        <a href="../index.php" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px;">Back to Home</a>
        <a href="./mybill.php" target="_blank" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px;">Download Bill</a> -->
        </div>

        <script>
            var myVar;

            function myFunction() {
                myVar = setTimeout(showPage, 5000);
            }

            function showPage() {
                document.getElementById("start").style.display = "none";
                document.getElementById("process").style.display = "none";
                document.getElementById("myDiv").style.display = "block";
            }
        </script>






</body>

</html>