<?php
require_once '../classes/DbConnector.php';
require_once '../classes/persons.php';


use classes\DbConnector;

$dbcon = new DbConnector();

session_start();
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
} else {

    header("Location: ./managerlogin.php?error=2");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>GardenGURU | Manager</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../../images/AboutUs/header_img.jpg) center center no-repeat !important;
            background-size: cover !important;
        }
    </style>
</head>

<body>
    <?php

    ?>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index-2.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="../../images/logo.png" style="width:220px;height:50px;">
            <!-- <h1 class="m-0">Garden<B>GURU</B></h1> -->
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="../../index.php" class="nav-item nav-link active">Home</a>
                <a href="../plantSuggestion.php" class="nav-item nav-link">Plant Suggestions</a>
                <a href="../Selling.php" class="nav-item nav-link">Shop</a>
                <!-- <a href="../php/blog.php" class="nav-item nav-link">Blog</a> -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Features</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="../blog.php" class="dropdown-item">Blog</a>
                        <a href="../Advertistment.php" class="dropdown-item">Advertisement</a>
                        <a href="../newsfeed.php" class="dropdown-item">News Feed</a>
                        <a href="../comForum.php" class="dropdown-item">Communication Forum</a>
                        <a href="../report.php" class="dropdown-item">Reporting</a>

                    </div>
                </div>
                <a href="../AboutUs.php" class="nav-item nav-link">About</a>
                <a href="../ContactUs.php" class="nav-item nav-link">Contact</a>
                <a href="../manager/managerProfile.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Profile</a>

            </div>

        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Manage Received Orders</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Nurture Your Green Thumb with Us!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-2 d-flex justify-content-center" style="margin-top: 5px;">
                    <a href="./manageNewsFeed.php" class="w-100"><button class="btn-lg btn-success w-100">News Feed</button></a>
                </div>
                <div class="col-md-2 d-flex justify-content-center" style="margin-top: 5px;">
                    <a href="./manageAdvertiesments.php" class="w-100"><button class="btn-lg btn-success w-100">Advertiesment</button></a>
                </div>
                <div class="col-md-2 d-flex justify-content-center" style="margin-top: 5px;">
                    <a href="./manageBlogs.php" class="w-100"><button class="btn-lg btn-success w-100">Manage Blog</button></a>
                </div>
                <div class="col-md-2 d-flex justify-content-center" style="margin-top: 5px;">
                    <a href="./manageUsers.php" class="w-100"><button class="btn-lg btn-success w-100">User Details</button></a>
                </div>
                <div class="col-md-2 d-flex justify-content-center" style="margin-top: 5px;">
                    <a href="./manageShop.php" class="w-100"><button class="btn-lg btn-success w-100">Manage Shop</button></a>
                </div>
                <div class="col-md-2 d-flex justify-content-center" style="margin-top: 5px;">
                <a href="./managerProfile.php" class="w-100"><button class="btn-lg btn-success w-100">My Profile</button></a>
                </div>
            </div>

            <!-- <button style="--c:#E95A49">Button</button> -->

            <div class="container-fluid" style="margin-top: 20px;"><br>
                <?php

                if (isset($_GET['success'])) {
                    echo "<hr>";
                    if ($_GET['success'] == 1) {

                        echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                                Status Updated Successfully!
                                </div></b>";
                    }
                }
                if (isset($_GET['error'])) {
                    echo "<hr>";
                    if ($_GET['error'] == 1) {

                        echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                                        Status Update Failed!
                                        </div></b>";
                    }
                }
                ?>

                <div class="card shadow">

                    <div class="card-body">

                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0">
                                <thead>
                                    <tr>
                                        <!-- <th> Order ID</th> -->
                                        <th> Order Date</th>
                                        <th> Receiver</th>
                                        <th> Contact</th>
                                        <th> Status</th>
                                        <th> Confirm </th>
                                        <th> Bill </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        $con = $dbcon->getConnection();

                                        // Pagination logic
                                        $start1 = isset($_GET['start1']) ? intval($_GET['start1']) : 0;
                                        $rows_per_page1 = 20;

                                        $query = "SELECT * FROM orders WHERE OrderTransaction = 'success' ORDER BY orderID DESC LIMIT $start1, $rows_per_page1";
                                        $pstmt = $con->prepare($query);
                                        $pstmt->execute();
                                        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                                        foreach ($rs as $order) {
                                            // Display user details as before
                                    ?>

                                            <tr>
                                                <!-- <td><?php echo $order->orderID; ?></td> -->
                                                <td><?php echo $order->orderDate; ?></td>
                                                <td><?php echo $order->receiver; ?></td>
                                                <td><?php echo $order->CoNum; ?></td>
                                                <td>
                                                    <?php
                                                    if ($order->OrderStatus == "waiting") {
                                                    ?>
                                                        <span class="btn btn-warning">Waiting</span>
                                                        <?php
                                                    } else if ($order->OrderStatus == "success") {
                                                        if ($order->deliveryStatus == "yes") {
                                                        ?>
                                                            <span class="btn btn-success">Delivered</span>
                                                        <?php
                                                        } else {

                                                        ?>
                                                            <span class="btn btn-outline-success">Completed</span>
                                                        <?php
                                                        }
                                                    } else if ($order->OrderStatus == "rejected") {
                                                        ?>
                                                        <span class="btn btn-danger">Rejected</span>
                                                    <?php
                                                    }
                                                    ?>

                                                </td>
                                                <td>
                                                    <?php
                                                    if ($order->OrderStatus == "waiting") {
                                                    ?>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#confirmOrder<?php echo $order->orderID ?>">Confirm</button>
                                                    <?php
                                                    }

                                                    if ($order->OrderStatus == "success" || $order->OrderStatus == "rejected") {
                                                    ?>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#confirmOrder<?php echo $order->orderID ?>" disabled>Confirm</button>
                                                    <?php
                                                    }
                                                    ?>


                                                </td>
                                                <td>
                                                    <!-- <button type="button" class="btn btn btn-danger" >Delete  -->
                                                    <a class="btn btn-outline-info" target="_blank" href="../mybill.php?orderID=<?php echo $order->orderID ?>"> Bill</a>
                                                </td>
                                            </tr>



                                            <div class="modal fade shadow " id="confirmOrder<?php echo $order->orderID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content" style="background-color: white;">

                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm or Reject the Order (Order ID = <?php echo $order->orderID ?>)</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" style="width: 100%;">

                                                            <div class="row">
                                                                <div class="col-4">

                                                                    <div class=" d-flex flex-column align-items-center justify-content-cente ">

                                                                        <!--name-->
                                                                        <!-- <h3 class="text-center m-0">
                                                                            <?php echo $order->receiver ?>
                                                                        </h3> -->

                                                                    </div>
                                                                    <div class="px-2">

                                                                        <div class="d-flex justify-content-between" style="margin-bottom: 5px;">
                                                                            <p class="fw-bold m-0">Item</p>
                                                                            <p class="fw-bold ms-3 m-0">Quantity</p>
                                                                        </div>

                                                                        <?php
                                                                        try {
                                                                            $dbcon = new DbConnector();
                                                                            $con = $dbcon->getConnection();
                                                                            $query = "SELECT o.receiver, o.orderDate, o.TotalPrice, o.deliveryAddress, o.CoNum, o.city, oi.itemQuantity, s.ItemName, s.ItemPrice
                                                                            FROM orders o
                                                                            JOIN orderitem oi ON o.orderID = oi.orderID
                                                                            JOIN shop s ON oi.ItemId = s.ItemId
                                                                            WHERE o.orderID = ?";
                                                                            $pstmt = $con->prepare($query);
                                                                            $pstmt->bindValue(1, $order->orderID);

                                                                            $pstmt->execute();

                                                                            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                                                                            foreach ($rs as $row) {
                                                                        ?>
                                                                                <div class="d-flex justify-content-between">
                                                                                    <p class="fw m-0"><?php echo $row->ItemName ?></p>
                                                                                    <p class="ms-3 m-0">
                                                                                        <?php echo $row->itemQuantity ?>
                                                                                    </p>
                                                                                </div>
                                                                        <?php
                                                                            }
                                                                        } catch (PDOException $exc) {
                                                                            echo $exc->getMessage();
                                                                        }


                                                                        ?>

                                                                    </div>

                                                                </div>
                                                                <div class="col-8">


                                                                    <div class="d-flex flex-column ">
                                                                        <h5>Receiver's Name</h5>
                                                                        <p class="m-0">
                                                                            <?php echo $order->receiver ?>
                                                                        </p>
                                                                    </div>
                                                                    <hr>

                                                                    <div class="d-flex flex-column ">
                                                                        <h5>Delivery Address</h5>
                                                                        <p class="m-0">
                                                                            <?php echo $order->deliveryAddress ?>
                                                                        </p>
                                                                    </div>
                                                                    <hr>

                                                                    <div class="d-flex flex-column ">
                                                                        <h5>City</h5>
                                                                        <p class="m-0">
                                                                            <?php echo $order->city ?>
                                                                        </p>
                                                                    </div>
                                                                    <hr>

                                                                    <div class="d-flex flex-column ">
                                                                        <h5>Telephone No</h5>
                                                                        <p class="m-0">
                                                                            <?php echo $order->CoNum ?>
                                                                        </p>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-evenly">
                                                            <div class="row w-100">
                                                                <div class="col-md-6" style="margin-bottom: 10px;">
                                                                    <form action='../processes/managerProcess.php' method='POST'>
                                                                        <input type='hidden' name='OrderID' value='<?php echo $order->orderID ?>'>
                                                                        <input type='hidden' name='status' value='success'>
                                                                        <button class="btn btn-success w-100" type="submit" data-bs-dismiss="modal" aria-label="Close">Confirm</button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form action='../processes/managerProcess.php' method='POST'>
                                                                        <input type='hidden' name='OrderID' value='<?php echo $order->orderID ?>'>
                                                                        <input type='hidden' name='status' value='rejected'>
                                                                        <button class="btn btn-danger w-100 " type="submit" data-bs-dismiss="modal" aria-label="Close">Reject</button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                    <?php
                                        }
                                        // Calculate the total number of rows in the 'orders' table (if not already calculated)
                                        if (!isset($total_rows1)) {
                                            $total_rows_query1 = "SELECT COUNT(*) as total FROM orders";
                                            $total_rows_stmt1 = $con->prepare($total_rows_query1);
                                            $total_rows_stmt1->execute();
                                            $total_rows_result1 = $total_rows_stmt1->fetch(PDO::FETCH_ASSOC);
                                            $total_rows1 = $total_rows_result1['total'];
                                        }

                                        // Calculate the total number of pages
                                        $pages1 = ceil($total_rows1 / $rows_per_page1);
                                    } catch (PDOException $exc) {
                                        echo $exc->getMessage();
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                    Showing <?php echo min($total_rows1, $start1 + 1) . ' to ' . min($total_rows1, $start1 + $rows_per_page1); ?> of <?php echo $total_rows1; ?>
                                </p>
                            </div>

                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <?php
                                        if ($start1 > 0) {
                                            echo '<li class="page-item"><a class="page-link" href="?start1=' . ($start1 - $rows_per_page1) . '">Previous</a></li>';
                                        } else {
                                            echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
                                        }

                                        for ($i1 = 1; $i1 <= $pages1; $i1++) {
                                            echo '<li class="page-item' . (($start1 / $rows_per_page1 + 1) == $i1 ? ' active' : '') . '"><a class="page-link" href="?start1=' . (($i1 - 1) * $rows_per_page1) . '">' . $i1 . '</a></li>';
                                        }

                                        if ($start1 < ($pages1 - 1) * $rows_per_page1) {
                                            echo '<li class="page-item"><a class="page-link" href="?start1=' . ($start1 + $rows_per_page1) . '">Next</a></li>';
                                        } else {
                                            echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>No. 58, Passara Road, Badulla</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+9455 34 67279</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@gardenguru.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Services</h4>
                    <a class="btn btn-link" href="../plantSuggestion.php">Plant Suggestion</a>
                    <a class="btn btn-link" href="../Advertistment.php">Advertiesment</a>
                    <a class="btn btn-link" href="../Selling.php">Shop</a>
                    <a class="btn btn-link" href="../blog.php">Blog</a>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="../AboutUs.php">About Us</a>
                    <a class="btn btn-link" href="../ContactUs.php">Contact Us</a>
                    <a class="btn btn-link" href="../newsfeed.php">News Feed</a>
                    <a class="btn btn-link" href="../login.php">Log Out</a>
                    <a class="btn btn-link" href="../termsAndCondition.php">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="../../images/logo.png" style="width:220px;height:50px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="index.php">GardenGURU</a>, All Right Reserved.
                </div>

            </div>
        </div>
    </div>
    <!-- Copyright End -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>