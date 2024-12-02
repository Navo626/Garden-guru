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
            <h1 class="display-3 text-white mb-4 animated slideInDown">Manage News</h1>
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
                    <a href="./manageUsers.php" class="w-100"><button class="btn-lg btn-success w-100">User Details</button></a>
                </div>
                <div class="col-md-2 d-flex justify-content-center" style="margin-top: 5px;">
                    <a href="./manageAdvertiesments.php" class="w-100"><button class="btn-lg btn-success w-100">Advertiesment</button></a>
                </div>
                <div class="col-md-2 d-flex justify-content-center" style="margin-top: 5px;">
                    <a href="./manageBlogs.php" class="w-100"><button class="btn-lg btn-success w-100">Manage Blog</button></a>
                </div>
                <div class="col-md-2 d-flex justify-content-center" style="margin-top: 5px;">
                    <a href="./manageOrder.php" class="w-100"><button class="btn-lg btn-success w-100">Orders</button></a>
                </div>
                <div class="col-md-2 d-flex justify-content-center" style="margin-top: 5px;">
                    <a href="./manageShop.php" class="w-100"><button class="btn-lg btn-success w-100">Manage Shop</button></a>
                </div>
                <div class="col-md-2 d-flex justify-content-center" style="margin-top: 5px;">
                <a href="./managerProfile.php" class="w-100"><button class="btn-lg btn-success w-100">My Profile</button></a>
                </div>
            </div>

            <!-- <button style="--c:#E95A49">Button</button> -->

            <div class="container"><br>
                <?php

                if (isset($_GET['success'])) {

                    if ($_GET['success'] == 2) {

                        echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                                    News Deleted Successfully!
                                    </div></b>";
                    }
                }
                if (isset($_GET['error'])) {
                    echo "<hr>";
                    if ($_GET['error'] == 2) {

                        echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                                    News Deleting Failed!
                                    </div></b>";
                    }
                }
                ?>
                <br>

                <div class="card shadow">
                    <?php

                    if (isset($_GET['success'])) {
                        if ($_GET['success'] == 1) {

                            echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                    News Posted Successfully!
                    </div></b>";
                        }
                        
                    }
                    if (isset($_GET['error'])) {

                        if ($_GET['error'] == 1) {

                            echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                            Please upload JPG, JPGE or PNG image types!
                    </div></b>";
                        }
                        if ($_GET['error'] == 2) {

                            echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                            Please upload image less than 5MB!
                    </div></b>";
                        }

                        if ($_GET['error'] == 3) {

                            echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
            News Posting Failed!
                    </div></b>";
                        }
                    }
                    ?>
                    <div class="card-body">

                        <div class="col">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#postNews">Post a News </button>
                        </div>
                        <div class="modal fade shadow my-5" id="postNews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="background-color: white;">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Post a News
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="d-flex justify-content-between p-2">

                                            <div class="col">
                                                <form action='../processes/managerProcess.php' method='POST' enctype="multipart/form-data">

                                                    <div class="row">
                                                        <p class="fw-bold me-2">
                                                            Upload Image:
                                                        </p>
                                                        <input type="file" class="form-control" name="newsimage1" id="image1" values="$filename1">

                                                    </div>

                                                    <div class="row" style="margin-top: 10px;">
                                                        <p class="fw-bold me-2">
                                                            Enter Title:
                                                        </p>
                                                        <input class="form-control" type="text" name="title">

                                                    </div>

                                                    <div class="row" style="margin-top: 10px;">
                                                        <p class="fw-bold me-2">
                                                            Brief Description :
                                                        </p>
                                                        <textarea name="description" class="form-control" id="text_description" rows="2" cols="40"></textarea>

                                                    </div>

                                                    <div class="row" style="margin-top: 10px;">
                                                        <p class="fw-bold me-2">
                                                            News Content:
                                                        </p>
                                                        <textarea name="content" class="form-control" id="text_description" rows="5" cols="40"></textarea>

                                                    </div>

                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <div class="row w-100">
                                                <div class="col-md-6" style="margin-bottom: 10px;">

                                                    <button class="btn btn-success w-100 " type="submit">Post</button>
                                                    </form>

                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-danger w-100" type="button" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <!-- <th>News ID</th> -->
                                        <th>Title</th>
                                        <th>Posted Date</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        $con = $dbcon->getConnection();

                                        // Pagination logic
                                        $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
                                        $rows_per_page = 20;

                                        $query = "SELECT * FROM news ORDER BY newsId DESC LIMIT $start, $rows_per_page";
                                        $pstmt = $con->prepare($query);
                                        $pstmt->execute();
                                        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                                        foreach ($rs as $news) {
                                            // Display user details as before
                                    ?>

                                            <tr>
                                                <!-- <td><?php echo $news->newsId; ?></td> -->
                                                <td><?php echo $news->title; ?></td>
                                                <td><?php echo $news->newsPostedDate; ?></td>


                                                <td>
                                                    <button type="button" class="btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodel<?php echo $news->newsId ?>">Delete </button>

                                                </td>
                                            </tr>

                                            <div class="modal fade shadow my-5" id="deletemodel<?php echo $news->newsId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content" style="background-color: white;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to Delete News
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="d-flex justify-content-between p-2">

                                                                <div class="d-flex">
                                                                    <p class="fw-bold me-2">
                                                                        Are you sure to delete news <span style="color: green;">"<?php echo $news->title ?>"</span> from the News Feed?
                                                                    </p>

                                                                </div>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="row w-100">
                                                                    <div class="col-md-6" style="margin-bottom: 10px;">
                                                                        <form action='../processes/managerProcess.php' method='POST'>
                                                                            <input type='hidden' name='newsID' value='<?php echo $news->newsId ?>'>

                                                                            <button class="btn btn-danger w-100 " type="submit" data-bs-dismiss="modal" aria-label="Close">Confirm</button>

                                                                        </form>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <button class="btn btn-success w-100" type="button" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                    <?php
                                        }
                                        // Calculate the total number of rows in the 'news' table (if not already calculated)
                                        if (!isset($total_rows)) {
                                            $total_rows_query = "SELECT COUNT(*) as total FROM news";
                                            $total_rows_stmt = $con->prepare($total_rows_query);
                                            $total_rows_stmt->execute();
                                            $total_rows_result = $total_rows_stmt->fetch(PDO::FETCH_ASSOC);
                                            $total_rows = $total_rows_result['total'];
                                        }

                                        // Calculate the total number of pages
                                        $pages = ceil($total_rows / $rows_per_page);
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
                                    Showing <?php echo min($total_rows, $start + 1) . ' to ' . min($total_rows, $start + $rows_per_page); ?> of <?php echo $total_rows; ?>
                                </p>
                            </div>

                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <?php
                                        if ($start > 0) {
                                            echo '<li class="page-item"><a class="page-link" href="?start=' . ($start - $rows_per_page) . '">Previous</a></li>';
                                        } else {
                                            echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
                                        }

                                        for ($i = 1; $i <= $pages; $i++) {
                                            echo '<li class="page-item' . (($start / $rows_per_page + 1) == $i ? ' active' : '') . '"><a class="page-link" href="?start=' . (($i - 1) * $rows_per_page) . '">' . $i . '</a></li>';
                                        }

                                        if ($start < ($pages - 1) * $rows_per_page) {
                                            echo '<li class="page-item"><a class="page-link" href="?start=' . ($start + $rows_per_page) . '">Next</a></li>';
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