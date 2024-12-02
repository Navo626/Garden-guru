<?php
require_once '../classes/Security.php';
require_once '../classes/DbConnector.php';
require '../classes/persons.php';

session_start();
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
} else {
    header("Location: ../manager/managerlogin.php?error=2");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['UserID'])) {
        $UserID = $_POST['UserID'];
        // call deleteUser function in Manager class
        if ($manager->deleteUser($UserID)) {
            header("Location: ../manager/manageUsers.php?success=1");
        } else {
            header("Location: ../manager/manageUsers.php?error=1");
        }
    }

    if (isset($_POST['newsID'])) {
        $newsID = $_POST['newsID'];
        // call deleteNews function in Manager class
        if ($manager->deleteNews($newsID)) {
            header("Location: ../manager/manageNewsFeed.php?success=2");
        } else {
            header("Location: ../manager/manageNewsFeed.php?error=2");
        }
    }

    if (isset($_POST['addID'])) {
        $addID = $_POST['addID'];
        // call deleteAdd function in Manager class
        if ($manager->deleteAdd($addID)) {
            header("Location: ../manager/manageAdvertiesments.php?success=3");
        } else {
            header("Location: ../manager/manageAdvertiesments.php?error=3");
        }
    }

    if (isset($_POST['blogID'])) {
        $blogID = $_POST['blogID'];
        // call deleteBlog function in Manager class
        if ($manager->deleteBlog($blogID)) {
            header("Location: ../manager/manageBlogs.php?success=4");
        } else {
            header("Location: ../manager/manageBlogs.php?error=4");
        }
    }

    if (isset($_POST['OrderID'])) {
        $OrderID = $_POST['OrderID'];
        $status = $_POST['status'];
        // call manageOrder function in Manager class
        if ($manager->manageOrder($OrderID, $status)) {
            header("Location: ../manager/manageOrder.php?success=1");
        } else {
            header("Location: ../manager/manageOrder.php?error=1");
        }
    }

    if (isset($_POST['questionID'])) {
        $questionID = $_POST['questionID'];
        // call deleteQuestion function in Manager class
        if ($manager->deleteQuestion($questionID)) {
            header("Location: ../comForum.php?success=3");
        } else {
            header("Location: ../comForum.php?error=1");
        }
    }

    if (isset($_POST['answerID'])) {
        $answerID = $_POST['answerID'];
        // call deleteAnswer function in Manager class
        if ($manager->deleteAnswer($answerID)) {
            header("Location: ../comForum.php?success=4");
        } else {
            header("Location: ../comForum.php?error=2");
        }
    }
    
    

    if (isset($_POST['ItemID']) && isset($_POST['newPrice'])) {
        $ItemID = $_POST['ItemID'];
        $newPrice = $_POST['newPrice'];
        // call changePrice function in Manager class
        if ($manager->changePrice($ItemID, $newPrice)) {
            header("Location: ../manager/manageShop.php?success=1");
        } else {
            header("Location: ../manager/manageShop.php?error=1");
        }
    }

    if (isset($_POST['newQty']) && isset($_POST['currentQty']) && isset($_POST['ItemID'])) {
        $ItemID = $_POST['ItemID'];
        $newQty = intval($_POST['newQty']);
        $currentQty = intval($_POST['currentQty']);
        $total = $newQty + $currentQty;
        // call changeQty function in Manager class
        if ($manager->changeQty($ItemID, $total)) {
            header("Location: ../manager/manageShop.php?success=2");
        } else {
            header("Location: ../manager/manageShop.php?error=2");
        }
    }

    if (isset($_FILES['itemImage']) && $_FILES['itemImage']['error'] === UPLOAD_ERR_OK) {
        $itamName = Security::SanitizeInput($_POST['itamName']);
        $itemPrice = Security::SanitizeInput($_POST['itemPrice']);
        // call addItem function in Manager class
        if ($manager->addItem($_FILES['itemImage'], $itemPrice, $itamName)) {
            header("Location: ../manager/manageShop.php?success=3");
        } else {
            header("Location: ../manager/manageShop.php?error=3");
        }
    }

    if (isset($_FILES['newsimage1']) && $_FILES['newsimage1']['error'] === UPLOAD_ERR_OK) {
        $title = Security::SanitizeInput($_POST['title']);
        $description = Security::SanitizeInput($_POST['description']);
        $content = Security::SanitizeInput($_POST['content']);
        $currentDate = date('Y-m-d');
        // call postNews function in Manager class
        if ($manager->postNews($_FILES['newsimage1'], $title, $description, $content, $currentDate)) { 
            header("Location: ../manager/manageNewsFeed.php?success=1");
        } else {
            header("Location: ../manager/manageNewsFeed.php?error=3");
        }
    }
}
