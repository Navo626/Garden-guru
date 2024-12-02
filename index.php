<!DOCTYPE html>
<html lang="en">

<?php
require_once './php/classes/persons.php';
require_once './php/classes/report.php';
require_once './php/classes/DbConnector.php';

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


<head>
    <meta charset="utf-8">
    <title>GardenGURU | Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
    <script src="https://kit.fontawesome.com/0008de2df6.js" crossorigin="anonymous"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/reviews.css" rel="stylesheet">
    <style>
        .width-auto {
            width: auto;
        }

        .text-lg {
            font-size: 2rem;
        }

        .carousel-indicators li {
            border: none;
            background: #ccc;
        }

        .carousel-indicators li.active {
            background: #28a745;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

<body class="body">

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="images/logo.png" style="width:220px;height:50px;">

        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">

                <a href="./index.php" class="nav-item nav-link active">Home</a>
                <a href="./php/plantSuggestion.php" class="nav-item nav-link">Plant Suggestions</a>
                <a href="./php/Selling.php" class="nav-item nav-link">Shop</a>
                <!-- <a href="../php/blog.php" class="nav-item nav-link">Blog</a> -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Features</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="./php/blog.php" class="dropdown-item">Blog</a>
                        <a href="./php/Advertistment.php" class="dropdown-item">Advertisement</a>
                        <a href="./php/newsfeed.php" class="dropdown-item">News Feed</a>
                        <a href="./php/comForum.php" class="dropdown-item">Communication Forum</a>
                        <a href="./php/report.php" class="dropdown-item">Reporting</a>
                    </div>
                </div>
                <a href="./php/AboutUs.php" class="nav-item nav-link">About</a>
                <a href="./php/ContactUs.php" class="nav-item nav-link">Contact</a>
                <?php
                if ($user != null) {
                    $imagePathRelative = str_replace("../", "./", $user->getPropic());
                ?>
                    <div class="p-3 ">
                        <a href="./php/user.php">
                            <img src="<?php echo $imagePathRelative ?>" alt="avatar" class="rounded-circle me-2 " style="width: 45px; height: 45px; object-fit: cover" />
                        </a>
                    </div>

                    <a href="./php/user.php" class="btn btn-outline-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;"><?php echo $user->getFirstName() . " " . $user->getLastName() ?></a>
                <?php
                } else if ($manager != null) {
                ?>
                    <a href="./php/manager/managerProfile.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Pofile</a>
                <?php
                } else if (isset($_SESSION["admin"])) {
                ?>
                    <a href="./php/admin/Admin.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Pofile</a>
                <?php
                } else {
                ?>
                    <a href="./php/login.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">Sign In</a>
                <?php
                }
                ?>

            </div>


        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="images/s1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Make Your Home Like Garden</h1>
                                    <!-- <a href="./php/register.php" class="btn btn-primary py-sm-3 px-sm-4">Sign Up Now</a> -->
                                    <?php
                                    if ($user != null) {
                                        
                                    ?>
                                        <a href="./php/user.php" class="btn btn-primary py-sm-3 px-sm-4" >My Pofile</a>

                                        
                                    <?php
                                    } else if ($manager != null) {
                                    ?>
                                        <a href="./php/manager/managerProfile.php" class="btn btn-primary py-sm-3 px-sm-4" >My Pofile</a>
                                    <?php
                                    } else if (isset($_SESSION["admin"])) {
                                    ?>
                                        <a href="./php/admin/Admin.php" class="btn btn-primary py-sm-3 px-sm-4" >My Pofile</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="./php/login.php" class="btn btn-primary py-sm-3 px-sm-4" >Sign In</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="images/s2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Create Your Own Small Garden At Home</h1>
                                    <!-- <a href="./php/register.php" class="btn btn-primary py-sm-3 px-sm-4">Sign Up Now</a> -->
                                    <?php
                                    if ($user != null) {
                                        
                                    ?>
                                        <a href="./php/user.php" class="btn btn-primary py-sm-3 px-sm-4" >My Pofile</a>

                                        
                                    <?php
                                    } else if ($manager != null) {
                                    ?>
                                        <a href="./php/manager/managerProfile.php" class="btn btn-primary py-sm-3 px-sm-4" >My Pofile</a>
                                    <?php
                                    } else if (isset($_SESSION["admin"])) {
                                    ?>
                                        <a href="./php/admin/Admin.php" class="btn btn-primary py-sm-3 px-sm-4" >My Pofile</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="./php/login.php" class="btn btn-primary py-sm-3 px-sm-4" >Sign In</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <!-- Top Feature Start -->
    <div class="container-fluid top-feature py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 ">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <!-- <i class="fa fa-times text-primary"></i> -->
                                <i class="fa fa-solid fa-lightbulb text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Plant Suggestion</h4>
                                <span style="font-family: Georgia, 'Times New Roman', Times, serif">Your Personalized Garden Guide: Where Green Dreams Blossom!</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-users text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Plant Selling</h4>
                                <span style="font-family: Georgia, 'Times New Roman', Times, serif">Planting Beauty Made Easy: Shop Plants Online at GardenGURU's Green Haven.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-solid fa-rectangle-ad text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Advertiesment</h4>
                                <span style="font-family: Georgia, 'Times New Roman', Times, serif">Plant the Seeds of Success: Advertise Your Products with GardenGURU Today!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Feature End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Our Features</p>
                <h1 class="display-5 mb-5">Features That You Can Get From Us</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="./images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <!-- <i class="fa fa-leaf" aria-hidden="true"></i> -->
                                <i class="fa-sharp fa-solid fa-seedling fa-2xl text-primary"></i>
                                <!-- <img class="img-fluid" src="img/icon/icon-3.png" alt="Icon"> -->
                            </div>
                            <h4 class="mb-3">Plant Suggestion</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Get ready to transform your garden into a captivating symphony of colors, fragrances, and textures. Let's cultivate beauty together, one plant at a time. 🌼🌳</p>
                            <a class="btn btn-sm" href="./php/plantSuggestion.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="./images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-newspaper fa-2xl text-primary"></i>
                            </div>
                            <h4 class="mb-3">News Feed</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Join us as we unearth the secrets to flourishing gardens and explore the stories behind your favorite flora. Let's cultivate knowledge, one headline at a time. 🌼🌍</p>
                            <a class="btn btn-sm" href="./php/newsfeed.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="./images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-handshake fa-2xl text-primary"></i>
                            </div>
                            <h4 class="mb-3">Communication Forum</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Join us in sowing the seeds of inspiration and cultivating a garden of knowledge like no other. Let's chat, share, and watch our gardening dreams grow wild! 🌍🌸</p>
                            <a class="btn btn-sm" href="./php/comForum.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="./images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-rectangle-ad fa-2xl text-primary"></i>
                            </div>
                            <h4 class="mb-3">Advertiesment</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Grow Your Green Business with Us! With our platform, your gardening business can flourish like never before. 🌞🌳</p>
                            <a class="btn btn-sm" href="../GardenGURU/php/Advertistment.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="./images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-shop fa-2xl text-primary"></i>
                            </div>
                            <h4 class="mb-3">Plant Selling</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif"> Bring the Beauty of Nature Home! Browse our garden of possibilities where you'll find a world of green wonders waiting to transform your space. 🌷🏡</p>
                            <a class="btn btn-sm" href="./php/Selling.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="./images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-blog fa-2xl text-primary"></i>
                            </div>
                            <h4 class="mb-3">Blog</h4>
                            <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif"> Cultivate Your Knowledge with Us! Welcome to our Gardener's Blog, your passport to a world of horticultural wisdom and green inspiration. 🌿📝</p>
                            <a class="btn btn-sm" href="./php/blog.php"><i class="fa fa-plus text-primary me-2"></i>Visit There</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    <div class="container-xxl py-5">
        <div class="row">
            <div class="col-md-12 course-details-content">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="fs-5 fw-bold text-primary">User Reviews</p>
                    <h1 class="display-5 mb-5">What our customers say about us</h1>
                </div>



                <div class="row row--30">
                    <div class="col-lg-4">
                        <div class="rating-box">
                            <?php
                            $totalSum = 5 * Report::reviewStarCount(5) + 4 * Report::reviewStarCount(4) + 3 * Report::reviewStarCount(3) + 2 * Report::reviewStarCount(2) + Report::reviewStarCount(1);
                            $totalReviews = Report::reviewStarCount(5) + Report::reviewStarCount(4) + Report::reviewStarCount(3) + Report::reviewStarCount(2) + Report::reviewStarCount(1);
                            $score = round($totalSum / $totalReviews, 1);
                            ?>
                            <div class="rating-number"><?php echo $score ?></div>
                            <?php

                            $fullStars = floor($score);
                            $halfStar = $score - $fullStars >= 0.5;

                            if ($score <= 0) {
                                $fullStars = 0;
                                $halfStar = false;
                            }

                            for ($i = 1; $i <= $fullStars; $i++) {
                                echo '<i class="fa fa-star" aria-hidden="true"></i>'; // Unicode star character
                            }

                            if ($halfStar) {
                                echo '<i class="fa-solid fa-star-half-stroke" aria-hidden="true"></i>';
                                $fullStars++; // Increment full stars if there's a half star
                            }

                            $emptyStars = 5 - $fullStars;
                            for ($i = 1; $i <= $emptyStars; $i++) {
                                echo '<i class="fa-regular fa-star" aria-hidden="true"></i>'; // Unicode empty star character
                            }
                            ?>


                            <span> <br>(<?php echo $totalReviews ?> Reviews) </span> <br>
                        </div>
                    </div>
                    <?php
                    $totalReviews = Report::reviewStarCount(5) + Report::reviewStarCount(4) + Report::reviewStarCount(3) + Report::reviewStarCount(2) + Report::reviewStarCount(1);

                    ?>
                    <div class="col-lg-8">
                        <div class="review-wrapper">
                            <div class="single-progress-bar">
                                <div class="rating-text"> 5 <i class="fa fa-star" aria-hidden="true"></i> </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo (Report::reviewStarCount(5) / $totalReviews) * 100 ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="rating-value"><?php echo Report::reviewStarCount(5) ?></span>
                            </div>
                            <div class="single-progress-bar" style="margin-top: 7px;">
                                <div class="rating-text"> 4 <i class="fa fa-star" aria-hidden="true"></i> </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo (Report::reviewStarCount(4) / $totalReviews) * 100 ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="rating-value"><?php echo Report::reviewStarCount(4) ?></span>
                            </div>
                            <div class="single-progress-bar" style="margin-top: 7px;">
                                <div class="rating-text"> 3 <i class="fa fa-star" aria-hidden="true"></i> </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo (Report::reviewStarCount(3) / $totalReviews) * 100 ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="rating-value"><?php echo Report::reviewStarCount(3) ?></span>
                            </div>
                            <div class="single-progress-bar" style="margin-top: 7px;">
                                <div class="rating-text"> 2 <i class="fa fa-star" aria-hidden="true"></i> </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo (Report::reviewStarCount(2) / $totalReviews) * 100 ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="rating-value"><?php echo Report::reviewStarCount(2) ?></span>
                            </div>
                            <div class="single-progress-bar" style="margin-top: 7px;">
                                <div class="rating-text"> 1 <i class="fa fa-star" aria-hidden="true"></i> </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo (Report::reviewStarCount(1) / $totalReviews) * 100 ?>%" aria-valuenow="0" aria-valuemin="80" aria-valuemax="100"></div>
                                </div>
                                <span class="rating-value"><?php echo Report::reviewStarCount(1) ?></span>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <section class="pb-5" style="margin-top: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5 bg-white shadow rounded">
                            <!-- Bootstrap carousel-->
                            <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
                                <!-- Bootstrap carousel indicators [nav] -->
                                <ol class="carousel-indicators mb-0">
                                    <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>


                                <!-- Bootstrap inner [slides]-->
                                <div class="carousel-inner px-5 pb-4">

                                    <?php
                                    try {
                                        $con = $dbcon->getConnection();

                                        $query = "SELECT
                                        r.reviewID,
                                        r.rate,
                                        r.description,
                                        u.user_FirstName,
                                        u.user_LastName,
                                        u.profile_picture
                                    FROM
                                        review AS r
                                    JOIN
                                        users AS u
                                    ON
                                        r.user_id = u.user_id
                                    WHERE
                                        r.rate = 5
                                    ORDER BY
                                        r.reviewID DESC
                                    LIMIT 1";
                                        $pstmt = $con->prepare($query);
                                        $pstmt->execute();
                                        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                                        foreach ($rs as $item) {
                                            $imagePathRelative = str_replace("../", "./", $item->profile_picture);

                                    ?>
                                            <div class="carousel-item active">
                                                <div class="media"><img class="rounded-circle img-thumbnail" src="<?php echo "" . $imagePathRelative ?>" alt="" width="75">
                                                    <div class="media-body ml-3">
                                                        <blockquote class="blockquote border-0 p-0">
                                                            <p class="font-italic lead"> <i class="fa fa-quote-left mr-3 text-success"> </i><?php echo " " . $item->description ?> <i class="fa fa-quote-right mr-3 text-success"> </i></p>
                                                            <footer class="blockquote-footer">Registered User -
                                                                <cite title="Source Title"><?php echo $item->user_FirstName . " " . $item->user_LastName ?></cite>
                                                            </footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } catch (PDOException $exc) {
                                        echo $exc->getMessage();
                                    }

                                    try {
                                        $con = $dbcon->getConnection();

                                        $query = "SELECT
                                        r.reviewID,
                                        r.rate,
                                        r.description,
                                        u.user_FirstName,
                                        u.user_LastName,
                                        u.profile_picture
                                    FROM
                                        review AS r
                                    JOIN
                                        users AS u
                                    ON
                                        r.user_id = u.user_id
                                    WHERE
                                        r.rate = 5
                                    ORDER BY
                                        r.reviewID DESC
                                    LIMIT 1,4";
                                        $pstmt = $con->prepare($query);
                                        $pstmt->execute();
                                        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                                        foreach ($rs as $item) {
                                            $imagePathRelative = str_replace("../", "./", $item->profile_picture);

                                        ?>
                                            <div class="carousel-item">
                                                <div class="media"><img class="rounded-circle img-thumbnail" src="<?php echo "" . $imagePathRelative ?>" alt="" width="75">
                                                    <div class="media-body ml-3">
                                                        <blockquote class="blockquote border-0 p-0">
                                                            <p class="font-italic lead"> <i class="fa fa-quote-left mr-3 text-success"></i><?php echo " " . $item->description ?> <i class="fa fa-quote-right mr-3 text-success"> </i></p>
                                                            <footer class="blockquote-footer">Registered User -
                                                                <cite title="Source Title"><?php echo $item->user_FirstName . " " . $item->user_LastName ?></cite>
                                                            </footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    } catch (PDOException $exc) {
                                        echo $exc->getMessage();
                                    }
                                    ?>

                                </div>


                                <!-- Bootstrap controls [dots]-->
                                <a class="carousel-control-prev width-auto" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <i class="fa fa-angle-left text-dark text-lg"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next width-auto" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <i class="fa fa-angle-right text-dark text-lg"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p style="color: white;" class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>No. 58, Passara Road, Badulla</p>
                    <p style="color: white;" class="mb-2"><i class="fa fa-phone-alt me-3"></i>+9455 34 67279</p>
                    <p style="color: white;" class="mb-2"><i class="fa fa-envelope me-3"></i>info@gardenguru.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Services</h4>
                    <a class="btn btn-link" href="./php/plantSuggestion.php">Plant Suggestion</a>
                    <a class="btn btn-link" href="./php/Advertistment.php">Advertiesment</a>
                    <a class="btn btn-link" href="./php/Selling.php">Shop</a>
                    <a class="btn btn-link" href="./php/blog.php">Blog</a>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="./php/AboutUs.php">About Us</a>
                    <a class="btn btn-link" href="./php/ContactUs.php">Contact Us</a>
                    <a class="btn btn-link" href="./php/newsfeed.php">News Feed</a>
                    <a class="btn btn-link" href="./php/login.php">Log Out</a>
                    <a class="btn btn-link" href="./php/termsAndCondition.php">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="images/logo.png" style="width:220px;height:50px;">
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
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>



</html>