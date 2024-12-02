<?php

require_once './classes/DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector();

require_once './classes/persons.php';
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
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/Selling.css" rel="stylesheet">

    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/Selling1/download.jpeg) center center no-repeat !important;
            background-size: cover !important;
        }

        .team-members-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .team-item {
            max-width: 300px;

        }
    </style>
</head>

<body>


    <?php
    $count = 0;
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
    }
    if (isset($_SESSION['cartTemp'])) {
        $count = count($_SESSION['cartTemp']);
    }
    ?>
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
                <?php
                if (isset($_SESSION['cart'])) {
                ?>
                    <a href="mycart.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Cart (<?php echo $count - 1; ?>)</a>
                <?php
                } else {
                ?>
                    <a href="mycart.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Cart (<?php echo $count; ?>)</a>
                <?php
                }
                ?>



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
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Best Selling</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Welcome to our Plant Shop, where you'll find a world of green wonders waiting to transform your space.</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- <div class="top-right-container"> -->



    <!-- </div> -->

    <div class="container">
        <?php
        if (isset($_GET['success'])) {
            if ($_GET['success'] == 1) {

                echo "<b><div class='alert alert-success py-2' role='alert'>
                                        Item Added!
                                        </div></b>";
            }
        }

        if (isset($_GET['error'])) {
            if ($_GET['error'] == 1) {

                echo "<b><div class='alert alert-danger py-2' role='alert'>
                                        Item Already Added!
                                        </div></b>";
            }
            if ($_GET['error'] == 2) {

                echo "<b><div class='alert alert-danger py-2' role='alert'>
                                        Failed to Add Item!
                                        </div></b>";
            }
        }


        ?>
        <div class="row">

            <?php
            try {
                $con = $dbcon->getConnection();

                // Pagination logic
                $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
                $rows_per_page = 10;

                $query = "SELECT * FROM shop LIMIT $start, $rows_per_page";
                $pstmt = $con->prepare($query);
                $pstmt->execute();
                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($rs as $item) {

            ?>

                    <div class="col-xs-12 col-md-6 bootstrap snippets bootdeys" >

                        <!-- product -->
                        <div class="product-content product-wrap clearfix" >
                            <div class="row">
                                <div class="col-md-5 col-sm-12 col-xs-12">
                                    <div class="product-image">
                                        <img src="<?php echo $item->ItemImage;  ?>"  class="img-responsive" style="height: 250px; ">
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-12">
                                    <div class="product-deatil">
                                        <h5 class="name">
                                            <a>
                                                <h4><?php echo $item->ItemName;  ?></h4>
                                            </a>
                                        </h5>
                                        <p class="price-container">
                                            <span> <?php echo "Rs." . $item->ItemPrice . ".00" ?> </span>
                                        </p>
                                        <span class="tag1"></span>
                                    </div>
                                    <div class="description">
                                        <?php if ($item->ItemQuantity > 0) {
                                        ?>
                                            <p><b><?php echo $item->ItemQuantity; ?> Items Availabe.</b></p>
                                        <?php
                                        } else {
                                        ?>
                                            <p style="color: red;"><b>No Items Availabe.</b></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="product-info smart-form">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">

                                                <a href="./mycart.php">
                                                    <div class="icon-container">

                                                        <i class="fa fa-shopping-cart cart-icon" style="position: absolute; top: 10px; right: 10px; font-size: 24px; margin: 10px;"></i> <!-- Font Awesome icon -->
                                                    </div>
                                                </a>


                                                <form action="./processes/manageCart.php" method="POST">

                                                    <!-- <a href="javascript:void(0);" class="btn btn-success">Add to cart</a> -->
                                                    <input type="hidden" name="Item_Name" value="<?php echo $item->ItemName; ?>">
                                                    <input type="hidden" name="price" value="<?php echo $item->ItemPrice; ?>">
                                                    <input type="hidden" name="ItemId" value="<?php echo $item->ItemId; ?>">

                                                    <?php
                                                    if ($item->ItemQuantity < 1) {
                                                    ?>
                                                        <button type="submit" class="btn btn-success" name="Add_To_Cart" disabled>Add to Cart</button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <button type="submit" class="btn btn-success" name="Add_To_Cart">Add to Cart</button>
                                                    <?php
                                                    }
                                                    ?>

                                                </form>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">

                                                <?php if ($item->ItemQuantity < 1) {
                                                ?>

                                                    <b>
                                                        <div style="color: red;" role='alert'>
                                                            Out of Stock!
                                                        </div>
                                                    </b>

                                                <?php
                                                }
                                                ?>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end product -->
                    </div>

            <?php
                }
                
                if (!isset($total_rows)) {
                    $total_rows_query = "SELECT COUNT(*) as total FROM shop";
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



    </section>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s" >
        <div class="container py-5" >
            <div class="row g-5" >
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


    <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>

</body>



</html>