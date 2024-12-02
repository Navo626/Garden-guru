<!DOCTYPE html>
<html lang="en">
<?php
require_once './classes/persons.php';
require_once './classes/DbConnector.php';

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
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GardenGURU | Communication Forum</title>
    <!-- <link href="../css/main2.css" rel="stylesheet" > -->
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/comForum.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            <!-- <a href="#" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a> -->
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Communication forum</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Nurture Your Green Thumb with Us!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container bootdey">
        <div class="col-md-12 bootstrap snippets">
            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <div class="panel">
                    <div class="panel-body">
                        <form action="./processes/comForumProcess.php" method="POST">
                            <?php $currentDate = date('Y-m-d'); ?>
                            <textarea class="form-control" name="question" rows="2" placeholder="Ask a Question?"></textarea>
                            <input type="hidden" name="date" value="<?php echo $currentDate ?>">
                            <div class="mar-top clearfix">
                                <button class="btn btn-sm btn-primary pull-right" name="ask_question" type="submit"> <i class="fa fa-pencil fa-fw"></i> Post </button>

                            </div>
                        </form>
                    </div>
                    <?php
                    if (isset($_GET['success'])) {
                        if ($_GET['success'] == 1) {

                            echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                                    You asked question Successfully!
                                    </div></b>";
                        }
                        if ($_GET['success'] == 2) {

                            echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                                    You answered to the Question Successfully!
                                    </div></b>";
                        }
                    }

                    ?>
                </div>
            <?php
            }
            if (isset($_SESSION["manager"])) {
                if (isset($_GET['success'])) {
                    if ($_GET['success'] == 3) {

                        echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                                You Deleted the Question Successfully!
                                </div></b>";
                    }
                    if ($_GET['success'] == 4) {

                        echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                                You Deleted the Answer Successfully!
                                </div></b>";
                    }
                }

                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 1) {

                        echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                                Question delete failed!
                                </div></b>";
                    }
                    if ($_GET['error'] == 2) {

                        echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                                Answer delete failed!
                                </div></b>";
                    }
                }
            }
            ?>


            <div class="panel-body">

                <?php
                try {
                    $con = $dbcon->getConnection();

                    // Pagination logic
                    $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
                    $rows_per_page = 10;

                    //$query = "SELECT * FROM question ORDER BY questionID DESC LIMIT $start, $rows_per_page ";
                    $query1 = "SELECT u.user_FirstName, u.profile_picture, U.user_LastName, q.question, q.askDate, Q.questionID FROM users u JOIN question q ON u.user_id = q.user_id ORDER BY questionID DESC LIMIT $start, $rows_per_page ";
                    $pstmt = $con->prepare($query1);
                    $pstmt->execute();
                    $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                    foreach ($rs as $item) {

                ?>
                        <div class="media-block">
                            <a class="media-left "><img class="rounded-circle me-2 " style="width: 50px; height: 50px; object-fit: cover" alt="Profile Picture" src="<?php echo $item->profile_picture;  ?>"></a>

                            <div class="media-body">
                                <div class="mar-btm" style="margin-left: 5px;">
                                    <a class="btn-link text-semibold media-heading box-inline"><?php echo $item->user_FirstName . " " . $item->user_LastName;  ?></a>
                                    <p class="text-muted text-sm"><i class="fa fa-regular fa-clock"></i> <?php echo $item->askDate;  ?></p>
                                </div>

                                <p style="margin-left: 5px;"><?php echo $item->question;  ?></p>
                                <div class="pad-ver">
                                    <button class="btn btn-outline-success toggle-comments" style="margin-left: 5px;"><i class="fa fa-reply"></i> reply</button>

                                    <?php
                                    if ($manager != null) {
                                    ?>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $item->questionID;  ?>">Delete Question</button>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="modal fade shadow my-5" id="delete<?php echo $item->questionID;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div style="width: 100%;" class="modal-content" style="background-color: white;">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Question
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="d-flex justify-content-between p-2">

                                                    <div class="col">

                                                        <form action="./processes/managerProcess.php" method="post" enctype="multipart/form-data">

                                                            <div class="row">
                                                                <p class="fw-bold me-2">
                                                                    Are you sure to delete this Question?
                                                                </p>


                                                            </div>

                                                            <input type="hidden" name="questionID" value="<?php echo $item->questionID ?>">

                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <div class="row w-100">
                                                        <div class="col-md-6" style="margin-bottom: 10px;">

                                                            <button class="btn btn-danger w-100 " type="submit">Delete</button>
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

                                <hr>


                                <!-- Comments -->
                                <div class="comments" style="display: none;">

                                    <?php
                                    //$query = "SELECT * FROM answer WHERE questionID = ?";
                                    $query = "SELECT u.user_FirstName, u.profile_picture, u.user_LastName, a.answerDate, a.answer, a.answerID FROM users u JOIN answer a ON u.user_id = a.user_id WHERE questionID = ? ORDER BY a.answerID ASC";

                                    $pstmt1 = $con->prepare($query);
                                    $pstmt1->bindValue(1, $item->questionID);


                                    $pstmt1->execute();
                                    $rs2 = $pstmt1->fetchAll(PDO::FETCH_OBJ);

                                    foreach ($rs2 as $item1) {

                                    ?>
                                        <div class="media-block">
                                            <a class="media-left" href="#"><img class="rounded-circle me-2 " style="width: 50px; height: 50px; object-fit: cover" alt="Profile Picture" src="<?php echo $item1->profile_picture;  ?>"></a>
                                            <div class="media-body" style="margin-left: 5px;">
                                                <div class="mar-btm">
                                                    <a class="btn-link text-semibold media-heading box-inline" style="margin-left: 5px;"><?php echo $item1->user_FirstName . " " . $item1->user_LastName;  ?></a>
                                                    <p class="text-muted text-sm"><i class="fa fa-regular fa-clock" style="margin-right: 5px;"></i><?php echo $item1->answerDate;  ?></p>
                                                </div>
                                                <p><?php echo $item1->answer;  ?></p>
                                                <?php
                                                if ($manager != null) {
                                                ?>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAnswer<?php echo $item1->answerID;  ?>">Delete Answer</button>
                                                <?php
                                                }
                                                ?>
                                                <hr>
                                            </div>
                                        </div>

                                        <div class="modal fade shadow my-5" id="deleteAnswer<?php echo $item1->answerID;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div style="width: 100%;" class="modal-content" style="background-color: white;">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Answer
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="d-flex justify-content-between p-2">

                                                            <div class="col">

                                                                <form action="./processes/managerProcess.php" method="post" enctype="multipart/form-data">

                                                                    <div class="row">
                                                                        <p class="fw-bold me-2">
                                                                            Are you sure to delete this Answer?
                                                                        </p>


                                                                    </div>

                                                                    <input type="hidden" name="answerID" value="<?php echo $item1->answerID ?>">

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <div class="row w-100">
                                                                <div class="col-md-6" style="margin-bottom: 10px;">

                                                                    <button class="btn btn-danger w-100 " type="submit">Delete</button>
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
                                    <?php

                                    }
                                    ?>

                                    <?php
                                    if (isset($_SESSION["user"])) {
                                    ?>
                                        <div class="panel-body">
                                            <form action="./processes/comForumProcess.php" method="POST">
                                                <textarea class="form-control" rows="2" placeholder="Answer to question" name="answer"></textarea>
                                                <?php $currentDate = date('Y-m-d'); ?>
                                                <input type="hidden" name="date" value="<?php echo $currentDate ?>">
                                                <input type="hidden" name="QuestionID" value="<?php echo $item->questionID ?>">
                                                <div class="mar-top clearfix">
                                                    <button class="btn btn-sm btn-primary pull-right" type="submit" name="giveAnswer"><i class="fa fa-pencil fa-fw"></i> Reply </button>
                                                </div>
                                            </form>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>



                            </div>
                        </div>


                <?php
                    }

                    if (!isset($total_rows)) {
                        $total_rows_query = "SELECT COUNT(*) as TOTAL FROM question";
                        $total_rows_stmt = $con->prepare($total_rows_query);
                        $total_rows_stmt->execute();
                        $total_rows_result = $total_rows_stmt->fetch(PDO::FETCH_ASSOC);
                        $total_rows = $total_rows_result['TOTAL'];
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".toggle-comments").click(function() {
                $(this).closest(".media-block").find(".comments").toggle();
            });
        });
    </script>
    <script src="../js/script2.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>


</body>

</html>