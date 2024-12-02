<?php

use classes\DbConnector;

class Shop
{
    private $ItemId;
    private $ItemName;
    private $ItemQuantity;
    private $ItemPrice;
    private $ItamImage;

    public function __construct($ItemName, $ItemQuantity, $ItemPrice)
    {
        $this->ItemId = null;
        $this->ItemName = $ItemName;
        $this->ItemQuantity = $ItemQuantity;
        $this->ItemPrice = $ItemPrice;
        $this->ItamImage = null;
    }

    public function setItemId($id)
    {
        $this->ItemId = $id;
    }

    public function setItemQuantity($qty)
    {
        $this->ItemQuantity = $qty;
    }

    public function setItemImage($img)
    {
        $this->ItamImage = $img;
    }

    public function getItemId()
    {
        return $this->ItemId;
    }

    public function getItemName()
    {
        return $this->ItemName;
    }

    public function getItemQuantity()
    {
        return $this->ItemQuantity;
    }

    public function getItemPrice()
    {
        return $this->ItemPrice;
    }

    public function getItamImage()
    {
        return $this->ItamImage;
    }

    public function reduceQuantity($ItemId, $amount)
    {
        try {
            $dbcon =  new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT ItemQuantity FROM shop WHERE ItemId = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $ItemId);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($rs as $item) {
                $quantity = $item->ItemQuantity;
                $quantity = $quantity - $amount;

                $query2 = "UPDATE shop SET ItemQuantity = ? WHERE ItemId = ?";
                $pstmt2 = $con->prepare($query2);
                $pstmt2->bindValue(1, $quantity);
                $pstmt2->bindValue(2, $ItemId);

                $pstmt2->execute();

                if (($pstmt2->rowCount()) > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public static function checkAvailability($ItemId, $quantity)
    {
        try {
            $dbcon =  new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT ItemQuantity FROM shop WHERE ItemId = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $ItemId);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($rs as $item) {
                if ($item->ItemQuantity < $quantity) {
                    return false;
                } else {
                    return true;
                }
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public static function notifyManager()
    {
        try {
            $dbcon =  new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT ItemQuantity FROM shop";
            $pstmt = $con->prepare($query);

            $pstmt->execute();
            if ($pstmt->rowCount() > 0) {
                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
                
                foreach ($rs as $item) {
                    if ($item->ItemQuantity < 5) {
                        return true;
                    }
                }
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
