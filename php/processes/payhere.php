<?php

require_once '../classes/DbConnector.php';
require_once '../classes/persons.php';
require_once '../classes/cart.php';
require_once '../classes/order.php';
require_once '../classes/Security.php';
require_once '../classes/shop.php';

use classes\DbConnector;

$dbcon = new DbConnector();
$con = $dbcon->getConnection();

session_start();
$user = null;

if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
}
if (isset($_SESSION["orderID"])) {

    $orderID = $_SESSION["orderID"];
}


// Visa : 4916217501611292
// MasterCard : 5307732125531191
// AMEX : 346781005510225


$amount = null;
$order_id = $orderID;
$name = null;
$phoneNo = null;
$address = null;
$city = null;
try {
    $query = "SELECT * FROM orders WHERE orderID = ?";
    $pstmt = $con->prepare($query);
    $pstmt->bindValue(1, $orderID);
    $pstmt->execute();
    $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($rs as $order) {
        $amount = $order->TotalPrice;
        $name = $order->receiver;
        $phoneNo = $order->CoNum;
        $address = $order->deliveryAddress;
        $city = $order->city;
    }
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

// $amount = 5000;

// $order_id = uniqid();
$merchant_id = "1224349";
$currency = "LKR";
$merchant_secret = "Mjc3NDU1OTUxNjE1NTUzNTQ0NTY0NTM5OTQ5MzUzNjQ3NzkzNzk=";
$hash = strtoupper(
    md5(
        $merchant_id .
            $order_id .
            number_format($amount, 2, '.', '') .
            $currency .
            strtoupper(md5($merchant_secret))
    )
);
$array = [];


$array["fname"] = $name;
// $array["lname"] = "thiyunuwan";
// $array["email"] = "migarathiyunuwan@gmail.com";
$array["phoneNo"] = $phoneNo;
$array["title"] = "GardenGURU Items";
$array["address"] = $address;
$array["city"] = $city;
$array["country"] = "Sri Lanka";

$array["amount"] = $amount;
$array["merchant_id"] = $merchant_id;
$array["order_id"] = $order_id;
$array["currency"] = $currency;
$array["hash"] = $hash;

$jsonObj = json_encode($array);

echo $jsonObj;
