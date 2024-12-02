<!DOCTYPE html>
<html lang="en">
<?php
require_once './classes/persons.php';
require_once './classes/report.php';
require_once './classes/DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector();

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    <meta charset="utf-8">
    <title>GardenGURU | Reports</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/report.css" rel="stylesheet">
    <link href="../css/Selling.css" rel="stylesheet">

    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/AboutUs/header_img.jpg) center center no-repeat !important;
            background-size: cover !important;
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
                <a href="./downloadReport.php" target="_blank" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">Download Report</a>
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
            <h1 class="display-3 text-white mb-4 animated slideInDown">Reports</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Nurture Your Green Thumb with Us!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container">
        <div class="Reportrow">
            <div class="Reportcolumn">
                <div class="Reportcard">
                    <p><i class="fa fa-user" style="font-size:50px;"></i></p>
                    <?php
                    $roundedNumber = floor(Report::RegisteredUsers() / 10) * 10;
                    ?>
                    <h3><?php echo $roundedNumber ?>+</h3>
                    <p>Registered Users</p>
                </div>
            </div>

            <div class="Reportcolumn">
                <div class="Reportcard">
                    <p><i class="fa fa-check" style="font-size:50px;"></i></p>
                    <?php
                    $roundedNumber = floor(Report::totalOrders() / 10) * 10;
                    ?>
                    <h3><?php echo $roundedNumber ?>+</h3>
                    <p>Recieved Orders</p>
                </div>
            </div>

            <div class="Reportcolumn">
                <div class="Reportcard">
                    <p><i class="fa fa-smile-beam" style="font-size:50px;"></i></p>
                    <?php
                    $roundedNumber = floor(Report::happyCustomers() / 10) * 10;
                    ?>
                    <h3><?php echo $roundedNumber ?>+</h3>
                    <p>Completed Orderes</p>
                </div>
            </div>

            <div class="Reportcolumn">
                <div class="Reportcard">
                    <p><i class="fa fa-shopping-bag" style="font-size:50px;"></i></p>
                    <?php
                    $roundedNumber = floor(Report::availableItems() / 10) * 10;
                    ?>
                    <h3><?php echo $roundedNumber ?>+</h3>
                    <p>Available Items</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- <p style="margin-top: 50px;"><b>Gender Diversity: A Visual Snapshot of Our Registered Users</b></p> -->
                <div id="myChart1" style="width:100%; max-width:600px; height:500px;">
                </div>
                <script>
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        const data = google.visualization.arrayToDataTable([
                            ['Gender', 'Count'],
                            ['Male', <?php echo Report::maleUserPercentage() ?>],
                            ['Female', <?php echo Report::femaleUserPercentage() ?>],

                        ]);

                        const options = {
                            title: 'Gender Diversity: A Visual Snapshot of Our Registered Users',
                            colors: ['#378a13', '#78d278']
                        };

                        const chart = new google.visualization.PieChart(document.getElementById('myChart1'));
                        chart.draw(data, options);
                    }
                </script>
            </div>

            <div class="col-md-6">
                <!-- <p style="margin-top: 50px;"><b>Gender Diversity: A Visual Snapshot of Recieved Orders</b></p> -->
                <div id="myChart2" style="width:100%; max-width:600px; height:500px;">
                </div>
                <script>
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        const data = google.visualization.arrayToDataTable([
                            ['Gender', 'Count'],
                            ['Male', <?php echo Report::maleOrderPercentage() ?>],
                            ['Female', <?php echo Report::femaleOrderPercentage() ?>],

                        ]);

                        const options = {
                            title: 'Gender Diversity: A Visual Snapshot of Recieved Orders',
                            colors: ['#378a13', '#78d278']
                        };

                        const chart = new google.visualization.PieChart(document.getElementById('myChart2'));
                        chart.draw(data, options);
                    }
                </script>
            </div>


        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <canvas id="myChart23" style="width:100%; "></canvas>

        <script>
            var yValues = [];
            var xValues = [];

            var xValues = ["Ampara",
                "Anuradhapura",
                "Badulla",
                "Batticaloa",
                "Colombo",
                "Galle",
                "Gampaha",
                "Hambantota",
                "Jaffna",
                "Kalutara",
                "Kandy",
                "Kegalle",
                "Kilinochchi",
                "Kurunegala",
                "Mannar",
                "Matale",
                "Matara",
                "Monaragala",
                "Mullaitivu",
                "Nuwara Eliya",
                "Polonnaruwa",
                "Puttalam",
                "Ratnapura",
                "Trincomalee",
                "Vavuniya",
            ];


            <?php
            $districts = [
                "Ampara",
                "Anuradhapura",
                "Badulla",
                "Batticaloa",
                "Colombo",
                "Galle",
                "Gampaha",
                "Hambantota",
                "Jaffna",
                "Kalutara",
                "Kandy",
                "Kegalle",
                "Kilinochchi",
                "Kurunegala",
                "Mannar",
                "Matale",
                "Matara",
                "Monaragala",
                "Mullaitivu",
                "Nuwara Eliya",
                "Polonnaruwa",
                "Puttalam",
                "Ratnapura",
                "Trincomalee",
                "Vavuniya",
            ];




            foreach ($districts as $district) {
            ?>
                yValues.push(<?php echo ((Report::districtUserPercentage($district))) ?>);


            <?php
            }
            ?>

            var barColors = ["red", "green", "blue", "orange", "brown", "green", "blue", "orange", "brown", "red", "green", "blue", "orange", "brown", "green", "blue", "orange", "brown", "blue", "orange", "brown", "green", "blue", "orange", "green"];

            new Chart("myChart23", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "District Diversity Percentage: A Visual Snapshot of Registered Users"
                    }
                }
            });
        </script>


        <div id="myChart" style="width:100%;  height:1000px;"></div>

        <script>
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                const data = google.visualization.arrayToDataTable([
                    ['Item', 'Qty'],



                    <?php
                    try {
                        $con = $dbcon->getConnection();
                        $query = "SELECT ItemId, ItemName FROM shop";
                        $pstmt = $con->prepare($query);

                        $pstmt->execute();
                        if ($pstmt->rowCount() > 0) {

                            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                            foreach ($rs as $row) {
                                $itemName = $row->ItemName;
                                $ItemId = $row->ItemId;

                    ?>['<?php echo $itemName ?>', <?php echo Report::totalSales($ItemId) ?>],

                    <?php

                            }
                        }
                    } catch (PDOException $exc) {
                        echo $exc->getMessage();
                    }
                    ?>

                ]);



                const options = {
                    title: 'Total Sales in GardenGuru',
                    colors: ['#378a13', '#78d278']
                };

                const chart = new google.visualization.BarChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        </script>

        <!-- ///////////////////////////////////////////////////////////////////////////////////// -->


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
    <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>



</body>



</html>