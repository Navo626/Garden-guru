<!DOCTYPE html>
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
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
}
if (isset($_SESSION["manager"])) {
    $manager = $_SESSION["manager"];
}
?>


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <title>GardenGURU</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/Selling.css" rel="stylesheet">

    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/Selling1/wall3.jpeg) center center no-repeat !important;
            background-size: cover !important;
        }
    </style>
</head>

<body>
    <?php

    ?>


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="../index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="../images/logo.png" style="width:220px;height:50px;">

        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="../index.php" class="nav-item nav-link active">Home</a>
                <a href="./plantSuggestion.php" class="nav-item nav-link">Plant Suggestions</a>
                <a href="./Selling.php" class="nav-item nav-link">Shop</a>

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
                    <a href="./user.php" class="btn btn-outline-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;"><?php echo $user->getFirstName() . " " . $user->getLastName() ?></a>
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

        </div>
    </nav>
    <!-- Navbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Confirm Payment</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Plants make people happy!</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row2">

            <?php
            if (isset($_GET['success'])) {
                if ($_GET['success'] == 1) {

                    echo "<b><div class='alert alert-danger py-2' role='alert'>
                                        Item Removed!
                                        </div></b>";
                }
            }
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 1) {

                    echo "<b><div class='alert alert-danger py-2' role='alert'>
                        Failed to Remove Item!
                        </div></b>";
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['pay'])) {
                    if (empty($_POST['streetAddress']) || empty($_POST['city']) || empty($_POST['receiver']) || empty($_POST['tel'])) {
                        header("Location: ./payement.php?error=3");
                        exit();
                    } else {



                        $address = Security::SanitizeInput($_POST['streetAddress']);
                        $city = Security::SanitizeInput($_POST['city']);
                        $receiver = Security::SanitizeInput($_POST['receiver']);
                        $tel = Security::SanitizeInput($_POST['tel']);
                        $date = date('Y-m-d');
                        $cart = new Cart();
                        $total = $cart->getTotal($user->getUserId());
                        $currentDate = new DateTime();


                        if (strlen($tel) === 10 && ctype_digit($tel)) {

                            $order = new Order($user->getUserId(), $date, $address, $city, $receiver, $tel, $total);
                            //$_SESSION['order'] = serialize($order);

                            // Serialize the object
                            $serializedObject = serialize($order);

                            // Save the serialized object in the session
                            $_SESSION['order'] = $serializedObject;


                            $order->setOrderTransaction("unsuccess");
                            $orderID = $order->placeOrder($user->getUserId());
                            $_SESSION['orderID'] = $orderID;
            ?>

                            <div class="col-lg-12">

                                <!-- <div class="col-md-8"> -->
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0"><b>Receiver Name</b></h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary">
                                                <?php echo $receiver ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0"><b>Delivery Address</b></h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary">
                                                <?php echo $address ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0"><b>City</b></h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary">
                                                <?php echo $city ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0"><b>Contact</b></h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary">
                                                <?php echo $tel ?>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="col-lg-12 text-center border rounded bg-light my-5">
                                        <h1>Order Items</h1>
                                    </div>
                                    <table class="table">

                                        <thead class="text-center">
                                            <tr>
                                                <!-- <th scope="col">Serial No.</th> -->
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Item Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Total(Rs.)</th>
                                                <!-- <th scope="col">Remove</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">

                                            <?php
                                            $total = 0;
                                            $grandTotal = 0;
                                            if (isset($_SESSION['cart'])) {
                                                $serialNo = 1;
                                                foreach ($_SESSION['cart'] as $key => $value) {

                                            ?>
                                                    <?php
                                                    if ($value['Price'] * $value['Quantity'] > 0) {
                                                    ?>
                                                        <tr>

                                                            <td><?php echo $value['Item_Name']; ?></td>
                                                            <td><?php echo $value['Price']; ?><input type='hidden' class='iprice' value='<?php echo $value['Price']; ?>'></td>

                                                            <td><?php echo $value['Quantity']; ?></td>

                                                            <td>
                                                                <?php
                                                                if ($value['Price'] * $value['Quantity'] > 0) {
                                                                    echo $value['Price'] * $value['Quantity'];
                                                                    $grandTotal = $grandTotal + ($value['Price'] * $value['Quantity']);
                                                                } ?></td>

                                                        </tr>
                                                    <?php } ?>

                                            <?php

                                                }
                                            }

                                            ?>





                                        </tbody>
                                    </table>
                                </div>

                            </div>


                            <div class="col-lg-12">
                                <div class="border bg-light rounded p-4">
                                    <h4>Grand Total: Rs. <?php echo  $grandTotal ?></h4>

                                    <br>
                                    <!-- <button class="btn btn-warning" onclick="paymentGateway();">Buy Now</button> -->



                                    <?php if ($grandTotal > 0) { ?>
                                        <!-- <a href="./Payement.php" class="btn btn-primary btn-block" name="purchase" onclick="paymentGateway();">Make Purchase</a> -->

                                        <!-- <button class="btn btn-success" onclick="paymentGateway();">Buy Now</button> -->
                                        <!-- <a href="./payemntThankyou.php"> -->
                                            <button class="btn btn-success" onclick="paymentGateway()">Confirm</button>
                                        <!-- </a> -->


                                        <!-- <script>
                                        function handleButtonClick() {
                                            // Call the paymentGateway function
                                            // paymentGateway();

                                            // Redirect the user to another page
                                            window.location.href = 'http://localhost/GardenGuru/php/payemntThankyou.php';
                                        }

                                        
                                    </script> -->

                                    <?php } ?>
                                    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
                                    <script src="../js/script.js"></script>





                                </div>

                            </div>





            <?php
                        } else {
                            header("Location: ./Payement.php?error=4");
                        }
                    }
                } else {
                    header("Location: ./Payement.php?error=2");
                }
            } else {
                header("Location: ./Payement.php?error=1");
            }
            ?>




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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>



</body>

</html>