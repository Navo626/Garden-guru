<!DOCTYPE html>
<html lang="en">


<?php
require '../classes/persons.php';
session_start();
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
} else {
    // Redirect the user to login.php if not logged in
    header("Location: ./managerlogin.php?error=2");
    exit();
}
?>

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Edit Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
    <?php

    ?>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="../../index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
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
                <a href="./managerProfile.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Profile</a>
            </div>

    </nav>
    <!-- Navbar End -->

    <section>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="../../images/manager.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>Hello! <?php echo $manager->getFirstName() . "" . $manager->getLastName() ?> !</h4><br>
                                    <a class="btn btn-outline-danger " target="" href="../processes/logout.php">Log Out</a>

                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#changePassword">Change Password </button>
                                    <?php
                                    if (isset($_GET['success'])) {
                                        if ($_GET['success'] == 1) {

                                            echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                                                    Password changed Successfully!
                                                    </div></b>";
                                        }
                                    }

                                    if (isset($_GET['error'])) {
                                        if ($_GET['error'] == 1) {

                                            echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                                                    Plese fill all Fields!
                                                    </div></b>";
                                        }
                                        if ($_GET['error'] == 2) {

                                            echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                                                   Password Miss Match!
                                                    </div></b>";
                                        }
                                        if ($_GET['error'] == 3) {

                                            echo "<b><div class='alert alert-danger py-2' role='alert'>
                                        Password Must Contain, <br></b>
                                        <ul>
                                            <li>More than 6 characters</li>
                                            <li>At least one number</li>
                                            <li>At least one Upper Case character</li>
                                            <li>At least one Special Character</li>
                                        </ul>
                                        </div></b>";
                                        }
                                        if ($_GET['error'] == 4) {

                                            echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                                                   Password Change Failed!
                                                    </div></b>";
                                        }
                                        if ($_GET['error'] == 5) {

                                            echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                                                   Current Password Incorrect!
                                                    </div></b>";
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade shadow my-5" id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="background-color: white;">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="d-flex justify-content-between p-2">

                                    <div class="col">
                                        <form action='../processes/changePassword.php' method='POST'>
                                            <div class="row">
                                                <p class="fw-bold me-2">
                                                    Enter Current Password:
                                                </p>
                                                <input class="form-control" type="password" name="currentPassword1">

                                            </div>
                                            <div class="row" style="margin-top: 10px;">
                                                <p class="fw-bold me-2">
                                                    Confirm Current Password :
                                                </p>
                                                <input class="form-control" type="password" name="currentPassword2">

                                            </div>
                                            <div class="row" style="margin-top: 10px;">
                                                <p class="fw-bold me-2">
                                                    New Password :
                                                </p>
                                                <input class="form-control" type="password" name="newPassword">

                                            </div>

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <div class="row w-100">
                                        <div class="col-md-6" style="margin-bottom: 10px;">

                                            <button class="btn btn-danger w-100 " type="submit">Change</button>
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






                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="../processes/managerEditProcess.php" method="post">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="firstname" class="form-control" value="<?php echo $manager->getFirstName() ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Last Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="lastname" class="form-control" value="<?php echo $manager->getLastName() ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="email" class="form-control" value="<?php echo $manager->getEmail() ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="phone" class="form-control" value="<?php echo $manager->getManagerPhoneNo() ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">NIC</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="NIC" class="form-control" value="<?php echo $manager->getManagerNIC() ?>">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-sm-6">
                                        <div class="col-sm-9 text-secondary">
                                            <button class="btn btn-primary my-3 w-100">
                                                Save Changes
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br><br>
    </section>

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
                    &copy; <a class="border-bottom" href="../index.php">GardenGURU</a>, All Right Reserved.
                </div>

            </div>
        </div>
    </div>
    <!-- Copyright End -->
    <!-- JavaScript Libraries -->
    <script src="../../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/main.js"></script>
</body>