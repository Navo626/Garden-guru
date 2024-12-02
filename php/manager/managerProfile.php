<?php
require_once '../classes/DbConnector.php';
require_once '../classes/persons.php';
require_once '../classes/shop.php';


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
    <script src="https://kit.fontawesome.com/0008de2df6.js" crossorigin="anonymous"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../../images/AboutUs/header_img.jpg) center center no-repeat !important;
            background-size: cover !important;
        }

        .mybtn {
            --c: #3A833A;
            /* the color*/

            box-shadow: 0 0 0 .1em inset var(--c);
            --_g: linear-gradient(var(--c) 0 0) no-repeat;
            background:
                var(--_g) calc(var(--_p, 0%) - 100%) 0%,
                var(--_g) calc(200% - var(--_p, 0%)) 0%,
                var(--_g) calc(var(--_p, 0%) - 100%) 100%,
                var(--_g) calc(200% - var(--_p, 0%)) 100%;
            background-size: 50.5% calc(var(--_p, 0%)/2 + .5%);
            outline-offset: .1em;
            transition: background-size .4s, background-position 0s .4s;
        }

        button:hover {
            --_p: 100%;
            transition: background-position .4s, background-size 0s;
        }

        button:active {
            box-shadow: 0 0 9e9q inset #0009;
            background-color: var(--c);
            color: #fff;
        }

        .mybtn {
            font-family: system-ui, sans-serif;
            font-size: 25px;
            cursor: pointer;
            padding: .1em .6em;
            font-weight: bold;
            border: none;

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
                <a href="../processes/logout.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">Log Out</a>

            </div>

        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Manager Dashbord</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Nurture Your Green Thumb with Us!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="../../images/manager.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?php echo $manager->getFirstName() . " " . $manager->getLastName(); ?> </h4><br>
                                <a class="btn btn-outline-danger " target="" href="../processes/logout.php">Log Out</a>
                                <a class="btn btn-outline-primary " target="" href="./managerEdit.php">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"><b>Manager Name</b></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?Php echo $manager->getFirstName() . " " . $manager->getLastName(); ?>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"><b>E-mail</b></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?Php echo $manager->getEmail(); ?>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"><b>Phone</b></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?Php echo $manager->getManagerPhoneNo(); ?>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"><b>NIC</b></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?Php echo $manager->getManagerNIC(); ?>
                                </div>
                            </div>
                            <?php

                            if (isset($_GET['success'])) {
                                echo "<hr>";
                            }

                            if (isset($_GET['error'])) {
                                echo "<hr>";
                            }
                            ?>

                            <?php
                            if (Shop::notifyManager()) {

                                echo "<hr><b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                                Check the shop. Some items in the shop have a quantity less than 5!
                                </div></b>";
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <br>



            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="../../images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <!-- <i class="fa fa-leaf" aria-hidden="true"></i> -->
                                <i class="fa-sharp fa-solid fa-user fa-2xl text-primary"></i>
                                <!-- <img class="img-fluid" src="img/icon/icon-3.png" alt="Icon"> -->
                            </div>
                            <h4 class="mb-3">Manage Users</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Take charge of user management with the 'Manage Users' button. This feature allows you to efficiently oversee and administrate user accounts, ensuring smooth operations and user satisfaction. Click now to maintain control and optimize your website.</p>
                            <a class="btn btn-sm" href="./manageUsers.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="../../images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-newspaper fa-2xl text-primary"></i>
                            </div>
                            <h4 class="mb-3">Manage News Feed</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Stay up-to-date and in control with the 'Manage News Feed' button. This powerful tool on your dashboard allows you to curate and manage your news feed content effortlessly. Keep your audience engaged and informed by clicking here to customize your news updates.</p>
                            <a class="btn btn-sm" href="./manageNewsFeed.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="../../images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-blog fa-2xl text-primary"></i>
                            </div>
                            <h4 class="mb-3">Manage Blogs</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Enhance your blog presence with the 'Manage Blog' button. This intuitive feature on your dashboard empowers you to create, edit, and organize your blog posts effortlessly. Click here to craft captivating content and engage your readers with ease.</p>
                            <a class="btn btn-sm" href="./manageBlogs.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="../../images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-rectangle-ad fa-2xl text-primary"></i>
                            </div>
                            <h4 class="mb-3">Manage Advertiesment</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Optimize your advertising strategy with the 'Manage Advertisement' button. This handy tool on your dashboard allows you to monitor ad campaigns with ease. Click here to drive results and maximize the impact of your advertisements.</p>
                            <a class="btn btn-sm" href="./manageAdvertiesments.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="../../images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-shop fa-2xl text-primary"></i>
                            </div>
                            <h4 class="mb-3">Manage Orders</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Effortlessly oversee your shop's activity with the 'Manage Orders' button. This intuitive tool on your dashboard empowers you to efficiently handle incoming orders, ensuring a seamless and organized workflow for your gardening business.</p>
                            <a class="btn btn-sm" href="./manageOrder.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="../../images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-shop fa-2xl text-primary"></i>
                            </div>
                            <h4 class="mb-3">Manage Shop</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Elevate your shop's performance with the 'Manage Shop' button. This powerful feature on your dashboard enables you to effortlessly oversee and optimize your entire shop operation. Take control of inventory, update product listings, and enhance the overall shopping experience.</p>
                            <a class="btn btn-sm" href="./manageShop.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>
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