<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/login.css" rel="stylesheet">


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
                <!-- <a href="../user.php" class="nav-item nav-link">Profile</a> -->
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                     <div class="dropdown-menu bg-light m-0">
                        <a href="./login.php" class="dropdown-item">Log Out</a>
                    </div> 
                </div> -->
            </div>
            <!-- <a href="#" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a> -->
        </div>
    </nav>
    <!-- Navbar End -->


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../../images/web.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3> Sign In as Manager</h3>
                                <p class="mb-4">Sign in to your account by entering email and password.</p>
                            </div>
                            <form action="../processes/managerLoginProcess.php" method="post">
                                <div class="form-group first">
                                    <!-- <label for="username">Username</label> -->
                                    <input type="email" placeholder="Email" class="form-control" name="email" id="email" >
                                </div>
                                <div class="form-group last mb-4">
                                    <!-- <label for="password">Password</label> -->
                                    <input type="password" placeholder="password" class="form-control" name="password" id="password" >
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <!-- <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label> -->
                                    <!-- <span class="ml-auto" ><a href="#" class="forgot-pass">Forgot Password?</a></span> -->
                                </div>

                                <?php
                                if (isset($_GET['error'])) {
                                    if($_GET['error'] == 1){
                                        echo "<b><div class='alert alert-danger py-2' role='alert'>
                                        Email address or Password Incorrect!
                                        </div></b>";
                                        
                                    }
                                    if($_GET['error'] == 2){
                                        echo "<b><div class='alert alert-danger py-2' role='alert'>
                                        You Need to Login to Your Account to Visit Profile.
                                        </div></b>"; 
                                    }
                                    
                                } ?>


                                <button class="btn btn-primary my-3 w-100">
                                    login
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>