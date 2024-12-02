<?php
require_once './classes/cart.php';
require_once './classes/persons.php';
require_once './classes/DbConnector.php';
session_start();
if (isset($_SESSION["user"])) {

    $user = $_SESSION["user"];
} else {
    header("Location: ./login.php?error=4");
    exit();
}

$cart = new Cart();
$total = $cart->getTotal($user->getUserId());

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Payment</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/Payement.css" rel="stylesheet">


</head>

<body>

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

                    </div>
                </div>
                <a href="./AboutUs.php" class="nav-item nav-link">About</a>
                <a href="./ContactUs.php" class="nav-item nav-link">Contact</a>

                <?php
                if ($user != null) {
                ?>
                    <div class="p-3 ">
                        <a href="./user.php">
                        <img src="<?php echo $user->getPropic() ?>" alt="avatar" class="rounded-circle me-2 " style="width: 45px; height: 45px; object-fit: cover" />
                        </a>
                    </div>
                    <a href="./user.php" class="btn btn-outline-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;"><?php echo $user->getFirstName() . " ". $user->getLastName() ?></a>
                <?php
                } else if ($manager != null) {
                ?>
                    <a href="./manager/managerProfile.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Pofile</a>
                <?php
                } else if (isset($_SESSION["admin"])) {
                ?>
                    <a href="./admin/Admin.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Pofile</a>
                <?php
                } else {
                ?>
                    <a href="./login.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">Sign In</a>
                <?php
                }
                ?>
            </div>
            <!-- <a href="#" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a> -->
        </div>
    </nav>
    <!-- Navbar End -->


    <div class="container1 mt-5 px-5" style="margin-bottom: 240px;">
        

        <div class="mb-4">

            <h2>Confirm order and pay</h2>
            <span>please make the payment, after that you can enjoy all the features and benefits.</span>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3">
                <?php
            
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 1) {

                    echo "<b><div class='alert alert-danger py-2' role='alert'>
                        Plese Use POST Method!
                        </div></b>";
                }
                if ($_GET['error'] == 2) {

                    echo "<b><div class='alert alert-danger py-2' role='alert'>
                        Press Pay Button!
                        </div></b>";
                }
                if ($_GET['error'] == 3) {

                    echo "<b><div class='alert alert-danger py-2' role='alert'>
                        Plese Fill All Fields!
                        </div></b>";
                }
                if ($_GET['error'] == 4) {

                    echo "<b><div class='alert alert-danger py-2' role='alert'>
                    Plese Enter a Valied phone Number!
                        </div></b>";
                }
            }
            ?>
                    <!-- <form action="./processes/paymentprocess.php" method="POST"> -->
                    <form action="./paymentConfirm.php" method="POST"> 
                        <!-- <h6 class="text-uppercase"><b>Payment details</b></h6>
                        <div class="inputbox mt-3"> <input type="text" name="nameOnCard" class="form-control" required="required"> <span>Name on card</span> </div> -->
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="cardNo" class="form-control" required="required"> <i class="fa fa-credit-card"></i> <span>Card Number</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-row">
                                    <div class="inputbox mt-3 mr-2"> <input type="text" name="expiry" class="form-control" required="required"> <span>Expiry</span> </div>

                                    <div class="inputbox mt-3 mr-2"> <input type="text" name="cvv" class="form-control" required="required"> <span>CVV</span> </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="mt-4 mb-4">
                            <h6 class="text-uppercase"><b>Billing Address</b></h6>
                            <div class="row mt-3">

                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2"> <input type="text" name="receiver" class="form-control" required="required"> <span>Receiver's Name</span> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2"> <input type="address" name="streetAddress" class="form-control" required="required"> <span>Street Address</span> </div>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <!-- <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2"> <input type="text" name="state" class="form-control" required="required"> <span>State/Province</span> </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2"> <input type="text" name="city" class="form-control" required="required"> <span>City</span> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2"> <input type="number" name="tel" class="form-control" required="required"> <span>Contact Number</span> </div>

                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-4 d-flex justify-content-between">

                            <!-- <span>Previous step</span> -->
                            <button class="btn btn-success px-3" type="submit" name="pay">Pay Rs.<?php if (isset($total)) {
                                                                                                        echo $total;
                                                                                                    } ?></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">

                <div class="card card-blue p-3 text-white mb-3">

                    <span>You have to pay</span>
                    <div class="d-flex flex-row align-items-end mb-3">
                        <h1 class="mb-0 yellow">Rs. <?php if (isset($total)) {
                                                        echo $total;
                                                    } ?></h1> <span>.00</span>
                    </div>

                    <span>Enjoy all the features and perk after you complete the payment</span>
                    <a href="#" class="yellow decoration">Know all the features</a>

                    <div class="hightlight">

                        <span>100% Guaranteed support and update for the next 5 years.</span>


                    </div>

                </div>

                <br><img src="../images/logo.png" height="75px">

            </div>

        </div>
        
    </div>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 100px;">
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
                    <a class="btn btn-link" href="./plantSuggestion.php">Plant Suggestion</a>
                    <a class="btn btn-link" href="./Advertistment.php">Advertiesment</a>
                    <a class="btn btn-link" href="./Selling.php">Shop</a>
                    <a class="btn btn-link" href="./blog.php">Blog</a>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="./AboutUs.php">About Us</a>
                    <a class="btn btn-link" href="./ContactUs.php">Contact Us</a>
                    <a class="btn btn-link" href="./newsfeed.php">News Feed</a>
                    <a class="btn btn-link" href="./login.php">Log Out</a>
                    <a class="btn btn-link" href="./termsAndCondition.php">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="../images/logo.png" style="width:220px;height:50px;">
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

    <!-- JavaScript Libraries -->
    <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>