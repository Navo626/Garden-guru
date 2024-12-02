<!DOCTYPE html>
<html lang="en">
<?php
require_once './classes/persons.php';
require_once './classes/DbConnector.php';
require_once './classes/report.php';

use classes\DbConnector;

session_start();
$user = null;
$manager = null;
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
if (isset($_SESSION["manager"])) {
    $manager = $_SESSION["manager"];
}
?>


<head>
    <meta charset="utf-8">
    <title>GardenGURU | About</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/0008de2df6.js" crossorigin="anonymous"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/aboutUs.css" rel="stylesheet">
    <link href="../css/reviews.css" rel="stylesheet">
    <link href="../css/review.css" rel="stylesheet">
    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/AboutUs/header_img.jpg) center center no-repeat !important;
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
            <h1 class="display-3 text-white mb-4 animated slideInDown">About Us</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Nurture Your Green Thumb with Us!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <?php
        if (isset($_GET['success'])) {
            if ($_GET['success'] == 1) {

                echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                    Review Submited Successfully!
                    </div></b>";
            }
            if ($_GET['success'] == 2) {

                echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                    Review Edited Successfully!
                    </div></b>";
            }
        }
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 1) {
                echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                    Review Submit Failed!
                    </div></b>";
            }
            if ($_GET['error'] == 2) {
                echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                    Please Fill all fields!
                    </div></b>";
            }
            if ($_GET['error'] == 3) {
                echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                    You can not access that page!
                    </div></b>";
            }
        }
        ?>
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="../images/AboutUs/about_start.jpg">
                </div>
                <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0">15</h1>
                    <p class="text-primary mb-4">Year of Experience</p>
                    <h1 class="display-6 mb-4">Blooming Your Gardening Dreams with Us.</h1>
                    <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Join our community of passionate gardeners, immerse yourself in the art of nurturing plants, and let nature's charm unfold in your own backyard.
                        Get ready to discover the joy of gardening and witness the magic that unfolds when you connect with the earth.
                    </p>
                    <h4>"Nurture Your Green Thumb with Us!"</h4>
                </div>
                <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <img src="../images/AboutUs/farming.png" alt="Ad 1">
                                <h5 class="mb-3">"Discover Premium Gardening Tools Exclusively at Our Store"</h5>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <img src="../images/AboutUs/diliveryy.png" alt="Ad 1">
                                <h5 class="mb-3">"Home Delivery: Bring Your Favorite Plants Right to Your Doorstep!"</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Vision and Mission Grid Start -->
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-6 col-md-8 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h2 class="display-4 mb-4">Our Vision</h2>
                    <p class="lead" style="font-family: Georgia, 'Times New Roman', Times, serif">To create a greener and more sustainable world by inspiring and empowering individuals to connect with nature through gardening.</p>
                </div>
                <div class="col-lg-6 col-md-8 text-center wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="display-4 mb-4">Our Mission</h2>
                    <p class="lead" style="font-family: Georgia, 'Times New Roman', Times, serif">To provide gardening enthusiasts with the knowledge, tools, and resources they need to cultivate beautiful and thriving gardens, while promoting environmental conservation and awareness.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Vision and Mission Grid End -->

    <!-- Reviews -->
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12 course-details-content">

                <div class="course-content">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <p class="fs-5 fw-bold text-primary">User Feedbacks</p>
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
                                <?php
                                if (isset($_SESSION["user"])) {
                                    $myReview = null;
                                    try {
                                        $dbcon = new DbConnector();
                                        $con = $dbcon->getConnection();
                                        $query = "SELECT * FROM review WHERE user_id = ?";
                                        $pstmt = $con->prepare($query);
                                        $pstmt->bindValue(1, $user->getUserId());
                                        $pstmt->execute();

                                        if ($pstmt->rowCount() > 0) {
                                            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                                            foreach ($rs as $row) {
                                                $myReview = $row->description;
                                            }



                                ?>

                                            <button type="button" style="margin-top: 10px;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editReview">Edit Review</button>

                                            <div class="modal fade shadow my-5" id="editReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div style="width: 100%;" class="modal-content" style="background-color: white;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit My Review
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="d-flex justify-content-between p-2">

                                                                <div class="container d-flex justify-content-center mt-5">

                                                                    <div class="card1 text-center mb-4">
                                                                        <form action="./processes/reviewProcess.php" method="POST">
                                                                            <p class="fw-bold me-2">
                                                                                Enter Your Review:
                                                                            </p>
                                                                            <textarea name="edit_description" placeholder="<?php echo $myReview ?>" class="form-control" id="text_description" rows="5" cols="40"></textarea>
                                                                            <div class="rate bg-success py-3 text-white mt-3">

                                                                                <h6 class="mb-0" style="color: white;">Rate GardenGURU</h6>

                                                                                <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                                                                </div>

                                                                            </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="row w-100">
                                                                    <div class="col-md-6" style="margin-bottom: 10px;">

                                                                        <button class="btn btn-success w-100 " type="submit">Submit</button>
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
                                        <?php

                                        } else {

                                        ?>

                                            <button type="button" style="margin-top: 10px;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submitReview">write Review</button>

                                            <div class="modal fade shadow my-5" id="submitReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div style="width: 100%;" class="modal-content" style="background-color: white;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Submit a Review
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="d-flex justify-content-between p-2">

                                                                <div class="container d-flex justify-content-center mt-5">

                                                                    <div class="card1 text-center mb-4">
                                                                        <form action="./processes/reviewProcess.php" method="POST">
                                                                            <p class="fw-bold me-2">
                                                                                Enter Your Review:
                                                                            </p>
                                                                            <textarea name="text_description" class="form-control" id="text_description" rows="5" cols="40"></textarea>
                                                                            <div class="rate bg-success py-3 text-white mt-3">

                                                                                <h6 class="mb-0" style="color: white;">Rate GardenGURU</h6>

                                                                                <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                                                                </div>

                                                                            </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="row w-100">
                                                                    <div class="col-md-6" style="margin-bottom: 10px;">

                                                                        <button class="btn btn-success w-100 " type="submit">Submit</button>
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
                                <?php

                                        }
                                    } catch (PDOException $exc) {
                                        echo $exc->getMessage();
                                    }
                                }

                                ?>

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

                    <div class="comment-wrapper pt--40">

                        <div id="comment-container">

                            <?php

                            try {
                                $dbcon = new DbConnector();
                                $con = $dbcon->getConnection();
                                
                                $sql = "SELECT
                                R.reviewID,
                                R.user_id,
                                R.rate,
                                R.description,
                                U.user_FirstName,
                                U.user_LastName,
                                U.profile_picture
                            FROM
                                review AS R
                            JOIN
                                users AS U
                            ON
                                R.user_id = U.user_id ORDER BY R.reviewID DESC;";

                                $pstmt = $con->prepare($sql);

                                $pstmt->execute();
                                $reviews = $pstmt->fetchAll(PDO::FETCH_OBJ);

                                foreach ($reviews as $row) {

                            ?>

                                    <!--  Comment Box start--->
                                    <div class="edu-comment">
                                        <div class="thumbnail"> <img style="width: 75px; height: 75px;" src="<?php echo $row->profile_picture ?> " alt="Comment Images"> </div>
                                        <div class="comment-content">
                                            <div class="comment-top">
                                                <h6 class="title"><?php echo $row->user_FirstName . " " . $row->user_LastName ?></h6>
                                                <div class="rating">
                                                    
                                                    <?php
                                                    for ($i = 1; $i <= $row->rate; $i++) {
                                                        echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <!-- <span class="subtitle">“ Outstanding Review Design ”</span> -->
                                            <p><?php echo $row->description ?> </p>
                                        </div>
                                    </div>
                                    <!-- Comment Box end--->

                            <?php
                                }
                            } catch (PDOException $exc) {
                                echo $exc->getMessage();
                            }
                            ?>
                            <button id="see-more-button" class="btn btn-success">See More</button>
                        </div>
                    </div>



                    <script>
                        // JavaScript to handle the "See More" button
                        document.addEventListener("DOMContentLoaded", function() {
                            const commentContainer = document.getElementById("comment-container");
                            const seeMoreButton = document.getElementById("see-more-button");
                            const reviews = [...commentContainer.querySelectorAll(".edu-comment")];
                            const numVisibleReviews = 3;

                            // Function to show/hide reviews
                            function toggleReviews() {
                                for (let i = numVisibleReviews; i < reviews.length; i++) {
                                    reviews[i].style.display = reviews[i].style.display === "none" ? "block" : "none";
                                }

                                // Toggle "See More" button text
                                if (reviews.slice(numVisibleReviews).some(review => review.style.display === "none")) {
                                    seeMoreButton.textContent = "See More";
                                } else {
                                    seeMoreButton.textContent = "See Less";
                                }
                            }

                            // Initial state
                            toggleReviews();

                            // Handle "See More" button click
                            seeMoreButton.addEventListener("click", function() {
                                toggleReviews();
                            });
                        });
                    </script>





                </div>
            </div>
        </div>
    </div>

    <!-- Reviews End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Our Team</p>
                <h1 class="display-5 mb-5">Dedicated & Experienced Team Members</h1>
            </div>
            <div class="responsive-container-block">



                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
                    <div class="card">
                        <div class="team-image-wrapper">
                            <img class="team-member-image" src="../images/AboutUs/Migaranew.jpg">
                        </div>
                        <p class="text-blk name">
                            Migara Thiyunuwan
                        </p>
                        <p class="text-blk position">
                            Full Stack Dev
                        </p>
                        <p class="text-blk feature-text">
                        Full stack guru, enjoys tackling complex problems, adept at database management, and optimizing performance.
                        </p>
                        <div class="social-icons">
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="fa-brands fa-twitter" style="color: #08b43c;"></i>
                            </a>
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fa-brands fa-facebook" style="color: #08b43c;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
                    <div class="card">
                        <div class="team-image-wrapper">
                            <img class="team-member-image" src="../images/AboutUs/Malki.jpg">
                        </div>
                        <p class="text-blk name">
                            Malki Madhubhashini
                        </p>
                        <p class="text-blk position">
                            Full Stack Dev
                        </p>
                        <p class="text-blk feature-text">
                        Passionate Agile developer, skilled in UI/UX, thrives in fast-paced environments, and loves elegant code solutions.
                        </p>
                        <div class="social-icons">
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="fa-brands fa-twitter" style="color: #08b43c;"></i>
                            </a>
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fa-brands fa-facebook" style="color: #08b43c;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
                    <div class="card">
                        <div class="team-image-wrapper">
                            <img class="team-member-image" src="../images/AboutUs/navonew.jpg">
                        </div>
                        <p class="text-blk name">
                            Nipuni Navodya
                        </p>
                        <p class="text-blk position">
                            Full Stack Dev
                        </p>
                        <p class="text-blk feature-text">
                        Adept coder with a creative touch, expert in front-end design, dedicated to user experience, and proficient in problem-solving
                        </p>
                        <div class="social-icons">
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="fa-brands fa-twitter" style="color: #08b43c;"></i>
                            </a>
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fa-brands fa-facebook" style="color: #08b43c;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
                    <div class="card">
                        <div class="team-image-wrapper">
                            <img class="team-member-image" src="../images/AboutUs/lashan.jpg">
                        </div>
                        <p class="text-blk name">
                            Lashan Sachintha
                        </p>
                        <p class="text-blk position">
                            Full Stack Dev
                        </p>
                        <p class="text-blk feature-text">
                        Detail-oriented programmer, proficient in backend systems, adept at server-side architecture.
                        </p>
                        <div class="social-icons">
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="fa-brands fa-twitter" style="color: #08b43c;"></i>
                            </a>
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fa-brands fa-facebook" style="color: #08b43c;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
                    <div class="card">
                        <div class="team-image-wrapper">
                            <img class="team-member-image" src="../images/AboutUs/dharani.jpg">
                        </div>
                        <p class="text-blk name">
                            Dharani Gunasekara
                        </p>
                        <p class="text-blk position">
                            Full Stack Dev
                        </p>
                        <p class="text-blk feature-text">
                       Full stack developer, excels in web and app development, always eager to learn new technologies.
                        </p>
                        <div class="social-icons">
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="fa-brands fa-twitter" style="color: #08b43c;"></i>
                            </a>
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fa-brands fa-facebook" style="color: #08b43c;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


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
    <script src="../js/popup.js"></script>


</body>



</html>