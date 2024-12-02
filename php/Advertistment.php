<?php
require './classes/DbConnector.php';

//use classes\DbConnector;
$dbConnector = new classes\DbConnector();
$dbcon = $dbConnector->getConnection();


require './classes/persons.php';
session_start();
$user =null;
$manager = null;
if (isset($_SESSION["user"]) || isset($_SESSION["manager"]) || isset($_SESSION["admin"]) ) {
  // User is logged in, retrieve the user object
  if(isset($_SESSION["user"])){
    $user = $_SESSION["user"];
  }
  if(isset($_SESSION["manager"])){
    $manager = $_SESSION["manager"];
  }
  if(isset($_SESSION["admin"])){
    $admin = $_SESSION["admin"];
  }
} else {
  // Redirect the user to login.php if not logged in
  header("Location: ./login.php?error=5");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8">
  <title>GrdenGURU | Advertiesment</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Customized Bootstrap Stylesheet -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="../css/style.css" rel="stylesheet">
 
  <link href="../css/Advertistment1.css" rel="stylesheet">

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
    <!-- <a href="#" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a> -->
    </div>
  </nav>
  <!-- Navbar End -->


  <!-- Page Header Start -->
  <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

    <div class="container text-center py-5">
      <h1 class="display-3 text-white mb-4 animated slideInDown">Advertisement</h1>
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item">Introducing our Gardening Business Ads platform, where your green dreams take center stage</li>
      </ol>
    </div>
  </div>
  <!-- Page Header End -->

  <div class="container1">
    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
      <p class="fs-5 fw-bold text-primary">Discover a World of Possibilities</p>
      <h1 class="display-5 mb-5">Explore Our Exclusive Collection</h1>
    </div>
    
    <!-- newly added advertiesments -->
    <!-- Projects Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-4 portfolio-container">
          <?php
          $sql = "SELECT
          a.id AS advertisement_id,
          a.title AS advertisement_title,
          a.description AS advertisement_description,
          a.adPostedDate AS advertisement_posted_date,
          a.image1_filename AS advertisement_image_filename,
          u.user_FirstName AS user_first_name,
          u.user_LastName AS user_last_name
        FROM
          advertisements a
        INNER JOIN
          users u
        ON
          a.user_id = u.user_id ORDER BY id DESC;";
          
          try {

            $stmt = $dbcon->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
              $photoCount = 1;
          ?>
              
              <div class="container">
                <div class="shop-default shop-cards shop-tech" >
                  <div class="row">

                    <?php
                    foreach ($result as $row) {
                      $photoName = $row["advertisement_image_filename"];
                      $title = $row["advertisement_title"];
                      $description = $row["advertisement_description"];
                      $fname = $row["user_first_name"];
                      $lname = $row["user_last_name"];
                      $adPostedDate = $row["advertisement_posted_date"];
                    ?>
                      <div class="col-md-6" style="margin-bottom: 25px;">
                        <div class="block product no-border z-depth-2-top z-depth-2--hover">
                          <div class="block-image">
                            <a>
                              <img src="<?php echo $photoName  ?> " class="img-center" style="height: 400px; width: 625px;">
                            </a>
                           
                          </div>
                          <div class="block-body text-center">
                            <h3 class="heading heading-5 strong-600 text-capitalize">
                              <a >
                              <?php echo $title  ?> 
                              </a>
                            </h3>
                            <p class="product-description">
                              <b>
                              <?php echo nl2br($description); ?>
                              </b>
                            </p>
                            
                            <div class="product-buttons mt-4">
                              <div class="row ">
                                <div class="col-12">
                                  
                                  <i class="fa fa-user"> </i> <b>Posted by: <?php echo $fname ." ". $lname . " (". $adPostedDate .")"?></b>
                                  
                                </div>
                                
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>



          <?php
            } else {
              echo "No photos uploaded yet.";
            }
          } catch (PDOException $exc) {
            die("Error executing the query: " . $exc->getMessage());
          }
          ?>
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
  <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>