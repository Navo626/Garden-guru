<?php

use classes\DbConnector;

class Order
{
    private $orderID;
    private $userID;
    private $orderDate;
    private $totalPrice;
    private $OrderTransaction;
    private $deliveryAddress;
    private $city;
    private $receiver;
    private $postalCode;
    private $OrderStatus;

    public function __construct($userID, $orderDate, $deliveryAddress, $city, $receiver, $postalCode, $totalPrice)
    {
        $this->orderID = null;
        $this->userID = $userID;
        $this->orderDate = $orderDate;
        $this->deliveryAddress = $deliveryAddress;
        $this->city = $city;
        $this->receiver = $receiver;
        $this->postalCode = $postalCode;
        $this->totalPrice = $totalPrice;
        $this->OrderTransaction = "unsuccess";
        $this->OrderStatus = "waiting";
    }

    public function getOrderID()
    {
        return $this->orderID;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getOrderDate()
    {
        return $this->orderDate;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function getOrderTransaction()
    {
        return $this->OrderTransaction;
    }
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
    }
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function setOrderTransaction($OrderTransaction)
    {
        $this->OrderTransaction = $OrderTransaction;
    }

    public function setOrderStatus($OrderStatus)
    {
        $this->OrderStatus = $OrderStatus;
    }

    public function placeOrder($user_id)
    {
        try {

            $dbcon =  new DbConnector();
            $con = $dbcon->getConnection();
            $query = "INSERT INTO orders (user_id, orderDate, TotalPrice, deliveryAddress, city, receiver, CoNum, OrderTransaction, OrderStatus, deliveryStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $user_id);
            $pstmt->bindValue(2, $this->orderDate);
            $pstmt->bindValue(3, $this->totalPrice);
            $pstmt->bindValue(4, $this->deliveryAddress);
            $pstmt->bindValue(5, $this->city);
            $pstmt->bindValue(6, $this->receiver);
            $pstmt->bindValue(7, $this->postalCode);
            $pstmt->bindValue(8, $this->OrderTransaction);
            $pstmt->bindValue(9, $this->OrderStatus);
            $pstmt->bindValue(10, "no");
            $pstmt->execute();
            $orderID = $con->lastInsertId();

            if (($pstmt->rowCount()) > 0) {
                return $orderID;
            } else {
                return null;
            }
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function setOrderItem($itemId, $quantity)
    {
        try {

            $dbcon =  new DbConnector();
            $con = $dbcon->getConnection();
            $query = "INSERT INTO orderitem (orderID, ItemId, itemQuantity) VALUES (?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->orderID);
            $pstmt->bindValue(2, $itemId);
            $pstmt->bindValue(3, $quantity);

            $pstmt->execute();

            if (($pstmt->rowCount()) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }
    public function transactionConfirm()
    {
        try {

            $dbcon =  new DbConnector();
            $con = $dbcon->getConnection();
            $query = "UPDATE orders SET OrderTransaction = 'success' WHERE orderID = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->orderID);
            $pstmt->execute();

            if (($pstmt->rowCount()) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }
}
