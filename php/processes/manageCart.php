<?php
require_once '../classes/cart.php';
require_once '../classes/shop.php';
require_once '../classes/DbConnector.php';
require '../classes/persons.php';

use classes\DbConnector;
$dbcon = new DbConnector();

session_start();
$user = null;
if (isset($_SESSION["user"])) {

    $user = $_SESSION["user"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Add_To_Cart"])) {

        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'Item_Name');
            if (in_array($_POST['Item_Name'], $myitems)) {
                header("Location: ../selling.php?error=1");
            } else {
                $cart = new Cart();
                // calling addItem function in Cart class
                if ($cart->addItem($user->getUserId(), $_POST['ItemId'], $_POST['Item_Name'], $_POST['price'])) {
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('ItemId' => $_POST['ItemId'], 'Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['price'], 'Quantity' => 1);

                    header("Location: ../selling.php?success=1");
                } else {
                    header("Location: ../selling.php?error=2");
                }
            }
        } else {

            if (isset($_SESSION['cartTemp'])) {

                $myitems = array_column($_SESSION['cartTemp'], 'Item_Name');
                if (in_array($_POST['Item_Name'], $myitems)) {
                    header("Location: ../selling.php?error=1");
                } else {
                    $count = count($_SESSION['cartTemp']);
                    $_SESSION['cartTemp'][$count] = array('ItemId' => $_POST['ItemId'], 'Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['price'], 'Quantity' => 1);

                    header("Location: ../selling.php?success=1");
                }
            } else {
                $_SESSION['cartTemp'][0] = array('ItemId' => $_POST['ItemId'], 'Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['price'], 'Quantity' => 1);
                header("Location: ../selling.php?success=1");
            }
        }
    }

    if (isset($_POST['Remove_Item'])) {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['ItemId'] == $_POST['ItemId']) {

                    $cart = new Cart();
                    // call to removeItem function in Cart class
                    if ($cart->removeItem($user->getUserId(), $_POST['ItemId'])) {
                        unset($_SESSION['cart'][$key]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']);

                        header("Location: ../mycart.php?success=1");
                    } else {
                        header("Location: ../mycart.php?error=1");
                    }
                }
            }
        }

        if (isset($_SESSION['cartTemp'])) {
            foreach ($_SESSION['cartTemp'] as $key => $value) {
                if ($value['ItemId'] == $_POST['ItemId']) {
                    unset($_SESSION['cartTemp'][$key]);
                    $_SESSION['cartTemp'] = array_values($_SESSION['cartTemp']);
                    header("Location: ../mycart.php?success=1");
                }
            }
        }
    }

    if (isset($_POST['Mod_Quantity'])) {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['ItemId'] == $_POST['ItemId']) {

                    if ($_POST['Mod_Quantity'] > 0) {
                        $cart = new Cart();
                        //call to checkAvailability func and changeQuantity func
                        if (Shop::checkAvailability($_POST['ItemId'], $_POST['Mod_Quantity'])) {
                            if ($cart->changeQuantity($_POST['ItemId'], $user->getUserId(), $_POST['Mod_Quantity'])) {
                                $_SESSION['cart'][$key]['Quantity'] = $_POST['Mod_Quantity'];
                                header("Location: ../mycart.php");
                            } else {
                                header("Location: ../mycart.php?error=4");
                            }
                        } else {
                            header("Location: ../mycart.php?error=3");
                        }
                    } else {
                        header("Location: ../mycart.php?error=2");
                    }
                }
            }
        }

        if (isset($_SESSION['cartTemp'])) {
            foreach ($_SESSION['cartTemp'] as $key => $value) {
                if ($value['ItemId'] == $_POST['ItemId']) {
                    $_SESSION['cartTemp'][$key]['Quantity'] = $_POST['Mod_Quantity'];

                    header("Location:../mycart.php");
                }
            }
        }
    }
}
