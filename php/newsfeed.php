<?php
require_once './classes/persons.php';
session_start();
$user = null;
$manager = null;
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
}
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
}
require './classes/DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector(); // Create a new instance of DbConnector class
$conn = $dbcon->getConnection(); // Get the database connection object

$latestStoriesQuery = "SELECT * FROM news ORDER BY newsId DESC LIMIT 3";
$latestStoriesResult = $conn->query($latestStoriesQuery);


$newsCounter = 0;

?>

<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GardenGURU | News</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/newsfeed.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
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
            <h1 class="display-3 text-white mb-4 animated slideInDown">Newsfeed</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"> Get the latest news for plant enthusiasts!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Page Header Start -->


    <main class="container">
        <section class="main-container-left">

            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h2>Latest News</h2>
            </div>
            <?php
            while ($row = $latestStoriesResult->fetch(PDO::FETCH_ASSOC)) {
                // Increment the counter for each news story
                $newsCounter++;
            ?>

                <?php

                ?>
                <div class="container-top-left">
                    <article>
                        <img style="height: 400px;" src="<?php echo $row['image'];  ?>">

                        <div>
                            <div style="margin-top: 10px;">
                                <h2><?php echo $row['title']; ?></h2>
                            </div>

                            <p id="description<?php echo $newsCounter; ?>" class="truncated"><?php echo nl2br($row['description']); ?></p>
                            <button class="btn btn-outline-success" id="readMoreButton<?php echo $newsCounter; ?>">Read More</button>
                            <p id="fullDescription<?php echo $newsCounter; ?>" style="display: none;"><?php echo nl2br($row['full_content']); ?></p>
                            <button class="btn btn-success" id="readLessButton<?php echo $newsCounter; ?>" style="display: none;">Read Less</button>

                        </div>
                    </article>
                </div>

            <?php
            }
            ?>
        </section>

        <section class="main-container-right">

            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h2>Other News</h2>
            </div>


            <?php
            try {
                $con = $dbcon->getConnection();

                // Pagination logic
                $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
                $start = $start + 3;
                $rows_per_page = 9;

                $query = "SELECT * FROM news ORDER BY newsId DESC LIMIT $start , $rows_per_page";
                $query = $conn->query($query);


                $otherNewsCounter = 0;
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $otherNewsCounter++;
                    
            ?>

                    <article>
                        <h4><?php echo $row['newsPostedDate']; ?></h4>
                        <div>
                            <h2><?php echo $row['title']; ?></h2>

                            <p id="otherDescription<?php echo $otherNewsCounter; ?>" class="truncated"><?php echo $row['description']; ?></p>
                            <button class="btn btn-outline-success" id="otherReadMoreButton<?php echo $otherNewsCounter; ?>">Read More</button>
                            <p id="otherFullDescription<?php echo $otherNewsCounter; ?>" style="display: none;"><?php echo $row['full_content']; ?></p>
                            <button class="btn btn-success" id="otherReadLessButton<?php echo $otherNewsCounter; ?>" style="display: none;">Read Less</button>
                        </div>
                        <img src="<?php echo $row['image']; ?>">
                    </article>

            <?php
                }
                // Calculate the total number of rows in the 'users' table (if not already calculated)
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
        </section>

    </main>

    <style>
        /* Style for the Read More button */
        .read-more-button {
            padding: 5px 10px;
            /* Adjust padding to control button size */
            font-size: 14px;
            /* Adjust font size as needed */
        }

        .story-content {
            display: flex;
            align-items: center;
            /* Vertically center the content */
        }

        .truncated {
            flex: 1;
            /* Allow the paragraph to take remaining horizontal space */
            margin-right: 10px;
            /* Add some spacing between the paragraph and image */
        }

        img {
            max-width: 100%;
            /* Ensure the image doesn't exceed its container */
        }
    </style>
    <script>
        <?php
        // Generate JavaScript code for each news story
        for ($i = 1; $i <= $newsCounter; $i++) {
        ?>
            const description<?php echo $i; ?> = document.getElementById("description<?php echo $i; ?>");
            const readMoreButton<?php echo $i; ?> = document.getElementById("readMoreButton<?php echo $i; ?>");
            const fullDescription<?php echo $i; ?> = document.getElementById("fullDescription<?php echo $i; ?>");
            const readLessButton<?php echo $i; ?> = document.getElementById("readLessButton<?php echo $i; ?>");

            readMoreButton<?php echo $i; ?>.addEventListener("click", function() {
                description<?php echo $i; ?>.classList.remove("truncated");
                readMoreButton<?php echo $i; ?>.style.display = "none";
                fullDescription<?php echo $i; ?>.style.display = "block";
                readLessButton<?php echo $i; ?>.style.display = "inline";
            });

            readLessButton<?php echo $i; ?>.addEventListener("click", function() {
                description<?php echo $i; ?>.classList.add("truncated");
                readMoreButton<?php echo $i; ?>.style.display = "inline";
                fullDescription<?php echo $i; ?>.style.display = "none";
                readLessButton<?php echo $i; ?>.style.display = "none";
            });
        <?php
        }
        ?>
    </script>

    <script>
        <?php
        for ($i = 1; $i <= $otherNewsCounter; $i++) {
        ?>
            const otherDescription<?php echo $i; ?> = document.getElementById("otherDescription<?php echo $i; ?>");
            const otherReadMoreButton<?php echo $i; ?> = document.getElementById("otherReadMoreButton<?php echo $i; ?>");
            const otherFullDescription<?php echo $i; ?> = document.getElementById("otherFullDescription<?php echo $i; ?>");
            const otherReadLessButton<?php echo $i; ?> = document.getElementById("otherReadLessButton<?php echo $i; ?>");

            otherReadMoreButton<?php echo $i; ?>.addEventListener("click", function() {
                otherDescription<?php echo $i; ?>.classList.remove("truncated");
                otherReadMoreButton<?php echo $i; ?>.style.display = "none";
                otherFullDescription<?php echo $i; ?>.style.display = "block";
                otherReadLessButton<?php echo $i; ?>.style.display = "inline";
            });

            otherReadLessButton<?php echo $i; ?>.addEventListener("click", function() {
                otherDescription<?php echo $i; ?>.classList.add("truncated");
                otherReadMoreButton<?php echo $i; ?>.style.display = "inline";
                otherFullDescription<?php echo $i; ?>.style.display = "none";
                otherReadLessButton<?php echo $i; ?>.style.display = "none";
            });
        <?php
        }
        ?>
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

</body>

</html>