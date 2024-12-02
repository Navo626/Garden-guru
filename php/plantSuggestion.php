<?php
require './classes/DbConnector.php';

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

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Plant Suggestion</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <script src="https://kit.fontawesome.com/0008de2df6.js" crossorigin="anonymous"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/register.css" rel="stylesheet">
    <link href="../css/plantSuggesion.css" rel="stylesheet">


    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/AboutUs/header_img.jpg) center center no-repeat !important;
            background-size: cover !important;
        }
    </style>

</head>

<body class="body">
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
                <a href="./Selling.php" class="nav-item nav-link ">Shop</a>
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
            <!-- <a href="#" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a> -->
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Plant Suggestions</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Welcome to our Plant Suggestion, your personal botanical matchmaker!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->



    <div class="container">

        <div class="container mt-2">
            <div class="row">

                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $location = $_POST["location"];
                    $soil = $_POST["soil"];
                    $sun = $_POST["sun"];
                    $water = $_POST["water"];
                    $space = $_POST["space"];
                    $time = $_POST["time"];

                ?>

                    <?php

                    try {

                        $con = $dbcon->getConnection();

                        $sql = "SELECT DISTINCT p.*

                        FROM plant p

                        JOIN plantsunexpo ps ON p.PlantID = ps.PlantID

                        JOIN plantsoil pst ON p.PlantID = pst.PlantID

                        JOIN plantwater pw ON p.PlantID = pw.PlantID

                        JOIN Plantlocation pl ON p.PlantID = pl.PlantID

                        JOIN plantspace pspace ON p.PlantID = pspace.PlantID

                        JOIN plantharvesttime pht ON p.PlantID = pht.PlantID

                        WHERE

                        ps.sunExpoID = ? AND pst.soilTypeID = ? AND pw.waterLevelID = ? AND pl.locationID = ? AND pht.harvestTimeId = ? AND pspace.spaceID = ?";

                        $pstmt = $con->prepare($sql);
                        $pstmt->bindValue(1, $sun);
                        $pstmt->bindValue(2, $soil);
                        $pstmt->bindValue(3, $water);
                        $pstmt->bindValue(4, $location);
                        $pstmt->bindValue(5, $time);
                        $pstmt->bindValue(6, $space);
                        $pstmt->execute();
                        $plants = $pstmt->fetchAll(PDO::FETCH_OBJ); // Suggested plant details saved in $plants variable

                        foreach ($plants as $plant) {
                            $plantName = $plant->PlantName;
                            $filePath = $plant->FilePath;
                            $description = $plant->description;
                            $instruction = $plant->instruction;
                    ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="card card-block" style="margin-top: 10px;">
                                    <img src="<?php echo $filePath ?>" alt="Photo of sunset">
                                    <h4 class="card-title mt-3 mb-3" style="margin-left: 10px;"><?php echo $plantName ?></h4>

                                    <p class="card-text" style="margin-left: 10px; height: 100px;"><?php echo $description ?></p>
                                    <!-- <button class="btn btn-success">Instructions</button> -->
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Instructions<?php echo $plant->PlantID ?>">Instructions</button>
                                </div>
                            </div>


                            <div class="modal fade shadow my-5" id="Instructions<?php echo $plant->PlantID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div style="width: 100%;" class="modal-content" style="background-color: white;">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Instructions to plant <?php echo $plantName ?>
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="d-flex justify-content-between p-2">

                                                <div class="col">

                                                    <div class="row">
                                                        <p class="fw-bold me-2">
                                                            <?php echo $instruction ?>

                                                        </p>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <div class="row w-100">

                                                    <div class="col-md-12">
                                                        <button class="btn btn-success w-100" type="button" data-bs-dismiss="modal" aria-label="Close">Ok</button>
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
                } ?>

            </div>


        </div>
        <div class="row py-5 mt-4 align-items-center">
            <!-- <span><b>
                    <p style="color:Tomato;"> Note:-</p>
                    <p style="color:MediumSeaGreen;"> Here we suggest you plants for home gardening purpose only. (මෙහිදී අපි ඔබට පැල යෝජනා කරන්නේ ගෙවතු වගාව සඳහා පමණි )</p>
                </b></span> -->
            <div class="container">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <div class="row">
                        <div class="col-sm">
                            <!-- Select Box 1 -->
                            <!-- <div class="input-group col"> -->

                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;"> <i class="fa-solid fa-location-dot fa-fade" style="color: #0b8952; font-size: 25px; margin-right: 10px;"></i>Select Location</a>
                            <select id="location" name="location" class="form-control bg-white px-4 border-md border-right-0" style="margin-bottom: 20px;">
                                <option value="2">Badulla</option>
                                <option value="3">Soranathota</option>
                                <option value="4">Meegahakiula</option>
                                <option value="5">Kandaketiya</option>
                                <option value="6">Rideemaliyadda</option>
                                <option value="7">Mahiyanganaya</option>
                                <option value="8">Passara</option>
                                <option value="9">Lunugala</option>
                                <option value="10">Hali Ela</option>
                                <option value="11">Ella</option>
                                <option value="12">Bandarawela</option>
                                <option value="13">Haputale</option>
                                <option value="14">Haldummulla</option>
                                <option value="15">Uva Paranagama</option>
                                <option value="16">Welimada</option>
                            </select>
                            <!-- </div> -->
                        </div>
                        <!-- Select Box 2 -->
                        <!-- <div class="input-group col"> -->
                        <div class="col-sm">

                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;"> <i class="fa-solid fa-sun fa-beat-fade" style="color: #0b8952; font-size: 25px; margin-right: 10px;"></i>Sun Exposure</a>
                            <select id="sun" name="sun" class="form-control bg-white px-4 border-md border-right-0" style="margin-bottom: 20px;">
                                <option value="1">High</option>
                                <option value="2">Medium</option>
                                <option value="3">Low</option>
                            </select>
                        </div>

                        <!-- Select Box 3 -->
                        <!-- <div class="input-group col"> -->
                        <div class="col-sm">

                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;"> <i class="fa-solid fa-person-digging fa-shake" style="color: #0b8952; font-size: 25px; margin-right: 10px;"></i>Soil </a>
                            <select id="soil" name="soil" class="form-control bg-white px-4 border-md border-right-0">
                                <option value="1">Reddish Brown Earths</option>
                                <option value="2">Red Yellow Podzolic</option>
                                <!-- <option value="Low Humic Gley">Low Humic Gley</option> -->
                                <!-- <option value="Mountain regosols">Mountain regosols</option> -->
                            </select>
                        </div>

                    </div>

                    <div class="row" style="margin-top: 25px;">

                        <!-- Select Box 1 -->
                        <!-- <div class="input-group col"> -->
                        <div class="col-sm">

                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;"> <i class="fa-solid fa-droplet fa-bounce" style="color: #0b8952;font-size: 25px; margin-right: 10px;"></i>Water</a>
                            <select id="water" name="water" class="form-control bg-white px-4 border-md border-right-0" style="margin-bottom: 20px;">
                                <option value="1">Easy to found</option>
                                <option value="2">Normally can found</option>
                                <option value="3">Rare to found</option>
                            </select>
                        </div>

                        <!-- Select Box 2 -->
                        <!-- <div class="input-group col"> -->
                        <div class="col-sm">

                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;"> <i class="fa-solid fa-landmark fa-fade" style="color: #0b8952;font-size: 25px; margin-right: 10px;"></i>Space</a>
                            <select id="space" name="space" class="form-control bg-white px-4 border-md border-right-0" style="margin-bottom: 20px;">
                                <option value="1">Limited</option>
                                <option value="2">Average</option>
                                <option value="3">Large</option>
                            </select>
                        </div>

                        <!-- Select Box 3 -->
                        <!-- <div class="input-group col"> -->
                        <div class="col-sm">
                            <div class="row">

                                <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;"> <i class="fa-solid fa-clock fa-flip" style="color: #0b8952;font-size: 25px; margin-right: 10px;"></i>Harvest Time</a>
                                <select id="time" name="time" class="form-control bg-white px-4 border-md border-right-0">
                                    <!-- <option value="< 2 months">< 2 months</option> -->
                                    <option value="1">2 to 6 months</option>
                                    <option value="2">6 to 12 months</option>
                                    <option value="3">> 12 months</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="input-group col">
                        <input type="submit" value="Find Plants" class="btn btn-primary my-3 w-100">
                    </div>
                </form>

            </div>

        </div>
        <span>
            <b>
                <br>
                <p style="color:MediumSeaGreen;">Reddish Brown Earths - </p>වැලි ලෝම සිට සැහැල්ලු මැටි ලෝම දක්වා මතුපිට පස් ඇති අතර එය මැටි යටි පසකට ඉහළින් පිහිටා ඇත.
                මතුපිට පස් සෙන්ටිමීටර 10 ත් 40 ත් අතර ඝනකමකින් යුක්ත වන අතර රතු සිට අළු දුඹුරු දක්වා වෙනස් වේ. යටි පස කහ සිට රතු සිට අළු දක්වා වෙනස් වේ. <br><br>
                <p style="color:MediumSeaGreen;">Red Yellow Podzolic - </p>රතු සහ කහ පැහැති පාට සඳහා ප්රසිද්ධය. පාංශු මතුපිට සමහර ප්‍රදේශවල රතු හෝ තැඹිලි පාටින් ද තවත් ප්‍රදේශවල කහ පැහැයෙන්ද දිස් විය හැක.
            </b>
        </span>

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

    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>



    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="../index.php">GardenGURU</a>, All Right Reserved.
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