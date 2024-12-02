<?php

use classes\DbConnector;

class Report
{

    public static function getBill($orderID)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT o.receiver, o.orderDate, o.TotalPrice, o.deliveryAddress, o.CoNum, o.city, o.OrderStatus, oi.itemQuantity, s.ItemName, s.ItemPrice
            FROM orders o
            JOIN orderitem oi ON o.orderID = oi.orderID
            JOIN shop s ON oi.ItemId = s.ItemId
            WHERE o.orderID = ? AND OrderTransaction = 'success'";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $orderID);

            $pstmt->execute();
            $myarray = array(); // Initialize an empty array

            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                $myarray[] = array(
                    $row['receiver'],
                    $row['orderDate'],
                    $row['TotalPrice'],
                    $row['deliveryAddress'],
                    $row['itemQuantity'],
                    $row['ItemName'],
                    $row['ItemPrice'],
                    $row['CoNum'],
                    $row['city'],
                    $row['OrderStatus']
                );
            }
            return $myarray;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function totalIncome()
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT TotalPrice FROM orders WHERE OrderTransaction = 'success'";
            $pstmt = $con->prepare($query);

            $pstmt->execute();
            $total = 0;
            if ($pstmt->rowCount() > 0) {

                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($rs as $row) {
                    $total = $total + $row->TotalPrice;
                }

                return $total;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function RegisteredUsers()
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT COUNT(*) as total FROM users";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['total'];
            return $total;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public static function totalOrders()
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT COUNT(*) as total FROM orders WHERE OrderTransaction = 'success'";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['total'];
            return $total;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function happyCustomers()
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT COUNT(*) as total FROM orders WHERE deliveryStatus = ?";
            $stmt = $con->prepare($query);
            $stmt->bindValue(1, "yes");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['total'];
            return $total;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function availableItems()
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT COUNT(*) as total FROM shop";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['total'];
            return $total;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function maleUserPercentage()
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT COUNT(*) as total FROM users";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['total'];

            $query1 = "SELECT COUNT(*) as total FROM users WHERE user_Gender = ?";
            $stmt1 = $con->prepare($query1);
            $stmt1->bindValue(1, "Male");
            $stmt1->execute();
            $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            $male = $result1['total'];

            $percentage1 = ($male / $total) * 100;
            $percentage = number_format($percentage1, 2);
            return ($percentage);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function femaleUserPercentage()
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT COUNT(*) as total FROM users";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['total'];

            $query1 = "SELECT COUNT(*) as total FROM users WHERE user_Gender = ?";
            $stmt1 = $con->prepare($query1);
            $stmt1->bindValue(1, "Female");
            $stmt1->execute();
            $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            $female = $result1['total'];

            $percentage1 = ($female / $total) * 100;
            $percentage = number_format($percentage1, 2);
            return ($percentage);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function maleOrderPercentage()
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT COUNT(*) as total FROM orders AS o JOIN users AS u ON o.user_id = u.user_id WHERE u.user_Gender = ? AND OrderTransaction = 'success'";
            $stmt = $con->prepare($query);
            $stmt->bindValue(1, 'Male');
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalMale = $result['total'];

            $query1 = "SELECT COUNT(*) as total FROM orders WHERE OrderTransaction = 'success'";
            $stmt1 = $con->prepare($query1);
            $stmt1->execute();
            $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            $total1 = $result1['total'];


            $percentage1 = ($totalMale / $total1) * 100;
            $percentage = number_format($percentage1, 2);
            return $percentage;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function femaleOrderPercentage()
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT COUNT(*) as total FROM orders AS o JOIN users AS u ON o.user_id = u.user_id WHERE u.user_Gender = ? AND OrderTransaction = 'success'   ";
            $stmt = $con->prepare($query);
            $stmt->bindValue(1, "Female");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalFemale = $result['total'];

            $query1 = "SELECT COUNT(*) as total FROM orders";
            $stmt1 = $con->prepare($query1);
            $stmt1->execute();
            $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            $total = $result1['total'];


            $percentage1 = ($totalFemale / $total) * 100;
            $percentage = number_format($percentage1, 2);
            return $percentage;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function districtUserPercentage($district)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT COUNT(*) as total FROM users";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['total'];

            $query1 = "SELECT COUNT(*) as total FROM users WHERE user_District = ?";
            $stmt1 = $con->prepare($query1);
            $stmt1->bindValue(1, $district);
            $stmt1->execute();
            $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            $female = $result1['total'];

            $percentage1 = ($female / $total) * 100;
            $percentage = number_format($percentage1, 2);
            return ($percentage);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function totalSales($itemID)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT oi.ItemId, SUM(oi.itemQuantity) AS TotalSales
            FROM orderitem oi
            INNER JOIN orders o ON oi.orderID = o.orderID
            WHERE o.OrderStatus = 'success' AND oi.ItemId = ?
            GROUP BY oi.ItemId ";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $itemID);
            $pstmt->execute();

            if ($pstmt->rowCount() > 0) {
                $result = $pstmt->fetch(PDO::FETCH_OBJ);
                $total = $result->TotalSales;

                return $total;
            }
            return 0; 
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function reviewStarCount($rate)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT COUNT(*) as total FROM review WHERE rate = ?";
            $stmt = $con->prepare($query);
            $stmt->bindValue(1, $rate);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['total'];
            return $total;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
