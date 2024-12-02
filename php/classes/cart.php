<?php

use classes\DbConnector;

class Cart
{

    private $dbCon;
    private $con;

    function __construct()
    {
        $this->dbCon = new DbConnector();
        $this->con = $this->dbCon->getConnection();
    }

    public function addItem($user_id, $ItemId, $Item_Name, $Price)
    {
        try {
            $qty = 1;
            $query = "INSERT INTO cart(user_id, ItemId, Item_Name, Price, Quantity) VALUES(?, ?, ?, ?, ?)";
            $pstmt = $this->con->prepare($query);
            $pstmt->bindValue(1, $user_id);
            $pstmt->bindValue(2, $ItemId);
            $pstmt->bindValue(3, $Item_Name);
            $pstmt->bindValue(4, $Price);
            $pstmt->bindValue(5, $qty);

            $pstmt->execute();
            if (($pstmt->rowCount()) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function removeItem($user_id, $ItemId)
    {
        try {
            $query = "DELETE FROM cart WHERE user_id = ? AND ItemId = ?";
            $pstmt = $this->con->prepare($query);
            $pstmt->bindValue(1, $user_id);
            $pstmt->bindValue(2, $ItemId);

            $pstmt->execute();
            if (($pstmt->rowCount()) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function changeQuantity($ItemId, $user_id, $quantity)
    {
        try {
            $query = "UPDATE cart SET Quantity = ? WHERE user_id = ? AND ItemId = ?";
            $pstmt = $this->con->prepare($query);
            $pstmt->bindValue(1, $quantity);
            $pstmt->bindValue(2, $user_id);
            $pstmt->bindValue(3, $ItemId);

            $pstmt->execute();
            if (($pstmt->rowCount()) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getTotal($userID){
        try {
            $query = "SELECT Price, Quantity FROM cart WHERE user_id = ?";
            $pstmt = $this->con->prepare($query);
            $pstmt->bindValue(1, $userID);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            $total = 0;
            foreach ($rs as $item) {
                $total = $total + ($item->Price * $item->Quantity);
            }
            return $total;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function resetCart($userID){
        try {
            $query = "DELETE FROM cart WHERE user_id = ?";
            $pstmt = $this->con->prepare($query);
            $pstmt->bindValue(1, $userID);

            $pstmt->execute();
            if (($pstmt->rowCount()) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
