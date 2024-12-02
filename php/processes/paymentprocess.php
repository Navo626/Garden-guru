<?php

require '../classes/DbConnector.php';
require_once '../classes/Security.php';
require_once '../classes/order.php';
require_once '../classes/persons.php';
require_once '../classes/cart.php';
require_once '../classes/shop.php';

session_start();
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
} else {

    header("Location: ../login.php?error=4");
    exit();
}

use classes\DbConnector;

$dbcon = new DbConnector();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pay'])) {
        if (empty($_POST['nameOnCard']) || empty($_POST['cardNo']) || empty($_POST['expiry']) || empty($_POST['cvv']) || empty($_POST['streetAddress']) || empty($_POST['city']) || empty($_POST['receiver']) || empty($_POST['tel'])) {
            header("Location: ../payement.php?error=3");
        } else {

            $expiryDate = Security::SanitizeInput($_POST['expiry']);
            $name = Security::SanitizeInput($_POST['nameOnCard']);
            $cardno = Security::SanitizeInput($_POST['cardNo']);
            $CVV = Security::SanitizeInput($_POST['cvv']);
            $address = Security::SanitizeInput($_POST['streetAddress']);
            $city = Security::SanitizeInput($_POST['city']);
            $receiver = Security::SanitizeInput($_POST['receiver']);
            $tel = Security::SanitizeInput($_POST['tel']);
            $date = date('Y-m-d');
            $cart = new Cart();
            $total = $cart->getTotal($user->getUserId());
            $expiryDateTime = DateTime::createFromFormat('m/y', $expiryDate);
            $currentDate = new DateTime();

            if ($currentDate > $expiryDateTime) {

                header("Location: ../mycart.php?error=4");
            } else {

                $order = new Order($user->getUserId(), $date, $address, $city, $receiver, $tel, $total);





                // DO PAYMENT HERE
                // IF PAYMENT SUCCESS RUN BELOE CODE






                $order->setOrderTransaction("success");
                $orderID = $order->placeOrder($user->getUserId());
                if ($orderID != null) {
                    $order->setOrderID($orderID);
                    $shop = new Shop(null,null,null);
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $order->setOrderItem($value['ItemId'], $value['Quantity']);
                        $shop->reduceQuantity($value['ItemId'],$value['Quantity']);
                    }


                    if ($cart->resetCart($user->getUserId())) {
                        $_SESSION['cart'] = null;
                        $_SESSION['cart'][0] = array('ItemId' => null, 'Item_Name' => null, 'Price' => null, 'Quantity' => null);
                    }
                    $_SESSION['orderID'] = $orderID;
                    header("Location: ../payemntThankyou.php");
                } else {
                    header("Location: ../mycart.php?error=5");
                }
            }
        }
    } else {
        header("Location: ../Payement.php?error=2");
    }
} else {
    header("Location: ../Payement.php?error=1");
}
