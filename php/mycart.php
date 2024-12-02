<!DOCTYPE html>
<html lang="en">
<?php

require_once './classes/DbConnector.php';
require_once './classes/persons.php';

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
                        <a href="./report.php" class="dropdown-item">Reporting</a>

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

        </div>
    </nav>
    <!-- Navbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Best Selling</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Plants make people happy!</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row2">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>MY CART</h1>
            </div>
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
                if ($_GET['error'] == 2) {

                    echo "<b><div class='alert alert-danger py-2' role='alert'>
                        Please Enter valid quantity!
                        </div></b>";
                }
                if ($_GET['error'] == 3) {

                    echo "<b><div class='alert alert-danger py-2' role='alert'>
                        No more items in stock!
                        </div></b>";
                }
                if ($_GET['error'] == 4) {

                    echo "<b><div class='alert alert-danger py-2' role='alert'>
                        Failed to change quantity!
                        </div></b>";
                }
            }
            ?>

            <div class="col-lg-12">

                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <!-- <th scope="col">Serial No.</th> -->
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total(Rs.)</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                            $serialNo = 1;
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $total = $total + $value['Price'];
                                if ($serialNo > 1) {
                                    $serialNo--;
                        ?>
                                    <tr>

                                        <td><?php echo $value['Item_Name']; ?></td>
                                        <td><?php echo $value['Price']; ?><input type='hidden' class='iprice' value='<?php echo $value['Price']; ?>'></td>
                                        <form action='./processes/manageCart.php' method='POST'>
                                            <td><input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit()' type='number' value='<?php echo $value['Quantity']; ?>' min='1' max='10'></td>
                                            <input type='hidden' name='Item_Name' value='<?php echo $value['Item_Name']; ?>'>
                                            <input type='hidden' name='ItemId' value='<?php echo $value['ItemId']; ?>'>
                                            <td class='itotal'></td>
                                        </form>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deletemodel<?php echo $serialNo ?>">Delete </button>
                                        </td>
                                    </tr>

                                    <div class="modal fade shadow my-5" id="deletemodel<?php echo $serialNo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to Remove Item
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="d-flex justify-content-between p-2">

                                                        <div class="d-flex">
                                                            <p class="fw-bold me-2">
                                                                Are you sure to remove Item "<?php echo $value['Item_Name'] ?>" from cart?
                                                            </p>

                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <form action='./processes/manageCart.php' method='POST'>
                                                            <input type='hidden' name='ItemId' value='<?php echo $value['ItemId']; ?>'>

                                                            <button name='Remove_Item' class="btn btn-danger w-100" type="submit" data-bs-dismiss="modal" aria-label="Close">Confirm</button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $serialNo++;
                                }
                                $serialNo++;
                            }
                        }


                        if (isset($_SESSION['cartTemp'])) {
                            $serialNo = 1;
                            foreach ($_SESSION['cartTemp'] as $key => $value) {
                                $total = $total + $value['Price'];
                                ?>
                                <tr>
                                    <!-- <td><?php echo $serialNo; ?></td> -->
                                    <td><?php echo $value['Item_Name']; ?></td>
                                    <td><?php echo $value['Price']; ?><input type='hidden' class='iprice' value='<?php echo $value['Price']; ?>'></td>
                                    <form action='./processes/manageCart.php' method='POST'>
                                        <td><input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit()' type='number' value='<?php echo $value['Quantity']; ?>' min='1' max='10'></td>
                                        <input type='hidden' name='Item_Name' value='<?php echo $value['Item_Name']; ?>'>
                                        <input type='hidden' name='ItemId' value='<?php echo $value['ItemId']; ?>'>
                                        <td class='itotal'></td>

                                    </form>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deletemodel<?php echo $serialNo ?>">Delete </button>
                                    </td>
                                </tr>


                                <div class="modal fade shadow my-5" id="deletemodel<?php echo $serialNo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to Remove Item
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="d-flex justify-content-between p-2">

                                                    <div class="d-flex">
                                                        <p class="fw-bold me-2">
                                                            Are you sure to remove Item "<?php echo $value['Item_Name'] ?>" from cart?
                                                        </p>

                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <form action='./processes/manageCart.php' method='POST'>
                                                        <input type='hidden' name='ItemId' value='<?php echo $value['ItemId']; ?>'>

                                                        <button name='Remove_Item' class="btn btn-danger w-100" type="submit" data-bs-dismiss="modal" aria-label="Close">Confirm</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php
                                $serialNo++;
                            }
                        }

                        ?>

                    </tbody>
                </table>

            </div>

            <!-- <form action="payement.php" method="POST"> -->
                <div class="col-lg-12">
                    <div class="border bg-light rounded p-4">
                        <h4>Grand Total: Rs.</h4>
                        <h4 class="text-right" id="gtotal"> <?php echo  $total ?></h4>
                        <br>
                        <?php

                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == 4) {

                                    echo "<b><div class='alert alert-danger py-2' role='alert'>
                                        Your card is expired!
                                        </div></b>";
                                }
                            }
                        ?>

                            <input type="hidden" name="total" value="<?php echo $total ?>">
                            <?php if($total > 0){ ?>
                            <a href="./Payement.php" class="btn btn-primary btn-block" name="purchase">Make Purchase</a>
                            <?php } ?>
                        <?php

                        }
                        ?>


                        <?php

                        if (isset($_SESSION['cartTemp']) && count($_SESSION['cartTemp']) > 0) {

                        ?>

                            <br>
                            <input type="hidden" name="total" value="<?php echo $total ?>">
                            <a href="./Payement.php" class="btn btn-primary btn-block" name="purchase">Make Purchase</a>

                        <?php

                        }
                        ?>


                    </div>

                </div>
            <!-- </form> -->

        </div>
    </div>

    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal'); // Use getElementById to select the grand total element
        var button = document.getElementById("MYbtn");

        function subTotal() {
            //button.click();
            gt = 0;
            for (i = 0; i < iprice.length; i++) {
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }
            gtotal.innerText = gt; // Update the grand total element
        }

        for (i = 0; i < iquantity.length; i++) {
            iquantity[i].addEventListener('change', subTotal); // Add an event listener to update the total when the quantity changes
        }

        subTotal(); // Call the function once initially
    </script>

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