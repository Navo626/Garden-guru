<?php

use classes\DbConnector;

/* =========================================================|| person class (Parent Class) ||====================================================================================== */

class person
{
    protected $FirstName;
    protected $LastName;
    protected $Email;

    protected $Password;

    function __construct($FirstName, $LastName, $Email)
    {
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->Email = $Email;
    }
    public function getFirstName()
    {
        return $this->FirstName;
    }
    public function getLastName()
    {
        return $this->LastName;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function getPassword()
    {
        return $this->Password;
    }

    public static function login($email, $password, $role)
    {
        if ($role == "user") {
            try {
                $dbcon = new DbConnector();
                $con = $dbcon->getConnection();
                $query = "SELECT * FROM users WHERE user_Email = ? ";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $email);

                $pstmt->execute();

                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($rs as $row) {
                    $dbpassword = $row->user_Password;
                    $dbFirstName = $row->user_FirstName;
                    $dbLastName = $row->user_LastName;
                    $dbEmail = $row->user_Email;
                    $dbPhoneNo = $row->user_PhoneNo;
                    $dbDistrict = $row->user_District;
                    $dbGender = $row->user_Gender;
                    $dbid = $row->user_id;
                    $dbaddress = $row->user_address;
                    $dbpicture = $row->profile_picture;
                }

                if (password_verify($password, $dbpassword)) {

                    $user = new user($dbFirstName, $dbLastName, $dbEmail, $dbaddress, $dbid, $dbDistrict, $dbPhoneNo, $dbpicture, $dbGender);
                    session_start();
                    $_SESSION["user"] = $user;
                    $_SESSION['cart'][0] = array('ItemId' => null, 'Item_Name' => null, 'Price' => null, 'Quantity' => null);
                    if (isset($_SESSION['cartTemp'])) {
                        $_SESSION['cartTemp'] = null;
                    }

                    try {
                        $con = $dbcon->getConnection();
                        $query1 = "SELECT * FROM cart WHERE user_id = ? ";
                        $pstmt1 = $con->prepare($query1);
                        $pstmt1->bindValue(1, $user->getUserId());

                        $pstmt1->execute();

                        if ($pstmt1->rowCount() > 0) {

                            $rs = $pstmt1->fetchAll(PDO::FETCH_OBJ);

                            foreach ($rs as $row) {
                                $Item_Name = $row->Item_Name;
                                $Price = $row->Price;
                                $Quantity = $row->Quantity;
                                $ItemId = $row->ItemId;
                                $_SESSION['cart'][] = array('ItemId' => $ItemId, 'Item_Name' => $Item_Name, 'Price' => $Price, 'Quantity' => $Quantity);
                            }

                            return $user;
                        } else {
                        }
                    } catch (PDOException $exc) {
                        echo $exc->getMessage();
                    }
                    return $user;
                } else {
                    return null;
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else if ($role == "manager") {
            try {
                $dbcon = new DbConnector();
                $con = $dbcon->getConnection();
                $query = "SELECT * FROM manager WHERE mEmail = ? ";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $email);

                $pstmt->execute();

                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($rs as $row) {
                    $dbpassword = $row->mPassword;
                    $dbFirstName = $row->mFirstName;
                    $dbLastName = $row->mLastName;
                    $dbEmail = $row->mEmail;
                    $dbPhoneNo = $row->mPhone;
                    $dbNIC = $row->mNIC;
                    $dbmID = $row->managerID;
                };
                if (password_verify($password, $dbpassword)) {

                    $manager = new Manager($dbFirstName, $dbLastName, $dbEmail, $dbNIC, $dbmID, $dbPhoneNo);
                    session_start();
                    $_SESSION["manager"] = $manager;
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else if ($role == "admin") {
            try {
                $dbcon = new DbConnector();
                $con = $dbcon->getConnection();
                $query = "SELECT * FROM admin WHERE aEmail = ? ";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $email);

                $pstmt->execute();

                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($rs as $row) {
                    $dbpassword = $row->aPassword;
                    $dbFirstName = $row->aFirstName;
                    $dbLastName = $row->aLastName;
                    $dbEmail = $row->aEmail;
                    $dbPhoneNo = $row->aPhone;
                    $dbNIC = $row->aNIC;
                    $dbaID = $row->adminID;
                }

                if (password_verify($password, $dbpassword)) {

                    $admin = new Admin($dbFirstName, $dbLastName, $dbEmail, $dbNIC, $dbaID, $dbPhoneNo);
                    session_start();
                    $_SESSION["admin"] = $admin;
                    return true;
                } else {

                    return false;
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else {
            return false;
        }
    }
    public function checkPassword($password, $id, $role)
    {

        if ($role == "user") {
            try {
                $dbcon = new DbConnector();
                $con = $dbcon->getConnection();
                $query = "SELECT user_Password FROM users WHERE user_id = ? ";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $id);

                $pstmt->execute();

                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($rs as $row) {
                    $dbpassword = $row->user_Password;
                };
                if (password_verify($password, $dbpassword)) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else if ($role == "manager") {
            try {
                $dbcon = new DbConnector();
                $con = $dbcon->getConnection();
                $query = "SELECT mPassword FROM manager WHERE managerID = ? ";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $id);

                $pstmt->execute();

                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($rs as $row) {
                    $dbpassword = $row->mPassword;
                };
                if (password_verify($password, $dbpassword)) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else if ($role == "admin") {
            try {
                $dbcon = new DbConnector();
                $con = $dbcon->getConnection();
                $query = "SELECT aPassword FROM admin WHERE adminID = ? ";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $id);

                $pstmt->execute();

                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($rs as $row) {
                    $dbpassword = $row->aPassword;
                };
                if (password_verify($password, $dbpassword)) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else {
            return false;
        }
    }

    public function changePassword($password, $id, $role)
    {
        if ($role == "user") {
            $dbcon = new DbConnector();
            try {
                $con = $dbcon->getConnection();
                $query = "UPDATE users SET user_Password = ? WHERE user_id = ?";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $password);
                $pstmt->bindValue(2, $id);
                $pstmt->execute();
                return ($pstmt->rowCount() > 0);
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else if ($role == "manager") {
            $dbcon = new DbConnector();
            try {
                $con = $dbcon->getConnection();
                $query = "UPDATE manager SET mPassword = ? WHERE managerID = ?";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $password);
                $pstmt->bindValue(2, $id);
                $pstmt->execute();
                return ($pstmt->rowCount() > 0);
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else if ($role == "admin") {
            $dbcon = new DbConnector();
            try {
                $con = $dbcon->getConnection();
                $query = "UPDATE admin SET aPassword = ? WHERE adminID = ?";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $password);
                $pstmt->bindValue(2, $id);
                $pstmt->execute();
                return ($pstmt->rowCount() > 0);
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else {
            return false;
        }
    }
}

/* =========================================================|| user class (Child Class) ||====================================================================================== */
class user extends person
{
    private $userId;
    private $District;
    private $PhoneNo;
    private $Address;
    private $ProPic;
    private $Gender;
    function __construct($FirstName, $LastName, $Email, $Address, $userId, $District, $PhoneNo, $ProPic, $Gender)
    {
        parent::__construct($FirstName, $LastName, $Email);
        $this->userId = $userId;
        $this->District = $District;
        $this->PhoneNo = $PhoneNo;
        $this->Address = $Address;
        $this->ProPic = $ProPic;
        $this->Gender = $Gender;
    }
    public function getPropic()
    {
        return $this->ProPic;
    }

    public function setPropic($picture)
    {
        $this->ProPic = $picture;
    }
    public function getUserId()
    {
        return $this->userId;
    }
    public function getDistrict()
    {
        return $this->District;
    }
    public function getPhoneNo()
    {
        return $this->PhoneNo;
    }
    public function getAddress()
    {
        return $this->Address;
    }

    public static function RegisterUser($firstname, $lastname, $email, $phone, $address, $password, $district, $gender, $picture)
    {
        try {

            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "INSERT INTO users(user_FirstName, user_LastName, user_Email, user_PhoneNo, user_address, user_Password, user_District, user_Gender, profile_picture) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $firstname);
            $pstmt->bindValue(2, $lastname);
            $pstmt->bindValue(3, $email);
            $pstmt->bindValue(4, $phone);
            $pstmt->bindValue(5, $address);
            $pstmt->bindValue(6, $password);
            $pstmt->bindValue(7, $district);
            $pstmt->bindValue(8, $gender);
            $pstmt->bindValue(9, $picture);
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

    public static function UserLogin($email, $password)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT * FROM users WHERE user_Email = ? ";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);

            $pstmt->execute();

            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($rs as $row) {
                $dbpassword = $row->user_Password;
                $dbFirstName = $row->user_FirstName;
                $dbLastName = $row->user_LastName;
                $dbEmail = $row->user_Email;
                $dbPhoneNo = $row->user_PhoneNo;
                $dbDistrict = $row->user_District;
                $dbGender = $row->user_Gender;
                $dbid = $row->user_id;
                $dbaddress = $row->user_address;
                $dbpicture = $row->profile_picture;
            }

            if (password_verify($password, $dbpassword)) {

                $user = new user($dbFirstName, $dbLastName, $dbEmail, $dbaddress, $dbid, $dbDistrict, $dbPhoneNo, $dbpicture, $dbGender);
                session_start();
                $_SESSION["user"] = $user;
                $_SESSION['cart'][0] = array('ItemId' => null, 'Item_Name' => null, 'Price' => null, 'Quantity' => null);
                if (isset($_SESSION['cartTemp'])) {
                    $_SESSION['cartTemp'] = null;
                }

                try {
                    $con = $dbcon->getConnection();
                    $query1 = "SELECT * FROM cart WHERE user_id = ? ";
                    $pstmt1 = $con->prepare($query1);
                    $pstmt1->bindValue(1, $user->getUserId());

                    $pstmt1->execute();

                    if ($pstmt1->rowCount() > 0) {

                        $rs = $pstmt1->fetchAll(PDO::FETCH_OBJ);

                        foreach ($rs as $row) {
                            $Item_Name = $row->Item_Name;
                            $Price = $row->Price;
                            $Quantity = $row->Quantity;
                            $ItemId = $row->ItemId;
                            $_SESSION['cart'][] = array('ItemId' => $ItemId, 'Item_Name' => $Item_Name, 'Price' => $Price, 'Quantity' => $Quantity);
                        }

                        return $user;
                    }
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function EditUserDetails($firstName, $lastName, $email, $phone, $address)
    {

        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "UPDATE users SET user_FirstName = ?, user_LastName = ?, user_Email = ?, user_PhoneNo = ?, user_address = ? WHERE user_id = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $firstName);
            $pstmt->bindValue(2, $lastName);
            $pstmt->bindValue(3, $email);
            $pstmt->bindValue(4, $phone);
            $pstmt->bindValue(5, $address);
            $pstmt->bindValue(6, $this->userId);

            $pstmt->execute();


            if ($pstmt->execute()) {

                $_SESSION["user"] = null;

                try {
                    $con = $dbcon->getConnection();
                    $query = "SELECT * FROM users WHERE user_id = ? ";
                    $pstmt = $con->prepare($query);
                    $pstmt->bindValue(1, $this->userId);

                    $pstmt->execute();

                    $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                    foreach ($rs as $row) {
                        $dbFirstName = $row->user_FirstName;
                        $dbLastName = $row->user_LastName;
                        $dbEmail = $row->user_Email;
                        $dbPhoneNo = $row->user_PhoneNo;
                        $dbDistrict = $row->user_District;
                        $dbGender = $row->user_Gender;
                        $dbid = $row->user_id;
                        $dbaddress = $row->user_address;
                        $dbpicture = $row->profile_picture;
                    }

                    $user = new user($dbFirstName, $dbLastName, $dbEmail, $dbaddress, $dbid, $dbDistrict, $dbPhoneNo, $dbpicture, $dbGender);
                    $_SESSION["user"] = $user;
                    return true;
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function updateToken($token, $exp)
    {
        $dbcon = new DbConnector();
        try {
            $con = $dbcon->getConnection();
            $query = "UPDATE users SET token = ?, expdate = ? WHERE user_id = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $token);
            $pstmt->bindValue(2, $exp);
            $pstmt->bindValue(3, $this->userId);
            $pstmt->execute();
            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function validateToken($token)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT * FROM users WHERE token =?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $token);
            $pstmt->execute();
            $rs = $pstmt->fetch(PDO::FETCH_OBJ);

            $dbexp = $rs->expdate;
            $dbFirstName = $rs->user_FirstName;
            $dbLastName = $rs->user_LastName;
            $dbEmail = $rs->user_Email;
            $dbPhoneNo = $rs->user_PhoneNo;
            $dbDistrict = $rs->user_District;
            $dbGender = $rs->user_Gender;
            $dbid = $rs->user_id;
            $dbaddress = $rs->user_address;
            $dbpicture = $rs->profile_picture;
            $user = new user($dbFirstName, $dbLastName, $dbEmail, $dbaddress, $dbid, $dbDistrict, $dbPhoneNo, $dbpicture, $dbGender);
            if (($dbexp - time()) > 0) {

                session_start();
                $_SESSION["user"] = $user;
                $_SESSION['cart'][0] = array('Item_Name' => null, 'Price' => null, 'Quantity' => null);
                if (isset($_SESSION['cartTemp'])) {
                    $_SESSION['cartTemp'] = null;
                }

                try {
                    $con = $dbcon->getConnection();
                    $query1 = "SELECT * FROM cart WHERE user_id = ? ";
                    $pstmt1 = $con->prepare($query1);
                    $pstmt1->bindValue(1, $dbid);

                    $pstmt1->execute();

                    if ($pstmt1->rowCount() > 0) {

                        $rs = $pstmt1->fetchAll(PDO::FETCH_OBJ);

                        foreach ($rs as $row) {
                            $Item_Name = $row->Item_Name;
                            $Price = $row->Price;
                            $Quantity = $row->Quantity;
                            $ItemId = $row->ItemId;
                            $_SESSION['cart'][] = array('ItemId' => $ItemId, 'Item_Name' => $Item_Name, 'Price' => $Price, 'Quantity' => $Quantity);
                        }

                        return true;
                    }
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }

                return true;
            } else {
                $user->updateToken(null, null);
                $user = null;
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function putAdvertisement($file, $text_title, $text_description, $realDate)
    {
        $tmp_name1 = $file['tmp_name'];
        $filename1 = $file['name'];
        $randomString = bin2hex(random_bytes(8));

        $allowed = array('jpeg', 'png', 'jpg', 'JPEG', 'PNG', 'JPG');
        $ext = pathinfo($filename1, PATHINFO_EXTENSION);

        if (in_array($ext, $allowed)) {

            if ($file['size'] < 5 * 1024 * 1024) {
                $newFilename = $randomString . '.' . pathinfo($filename1, PATHINFO_EXTENSION);
                $destination1 = '../../images/Adevertistment/' . $newFilename;
                $dbdestination = '../images/Adevertistment/' . $newFilename;
                if (move_uploaded_file($tmp_name1, $destination1)) {

                    try {
                        $dbcon = new DbConnector();
                        $conn = $dbcon->getConnection();
                        $sql = "INSERT INTO advertisements (user_id, image1_filename, title, description, adPostedDate) VALUES ( ?, ? ,?, ?, ?)";

                        $pstmt = $conn->prepare($sql);
                        $pstmt->bindValue(1, $this->userId);
                        $pstmt->bindValue(2, $dbdestination);
                        $pstmt->bindValue(3, $text_title);
                        $pstmt->bindValue(4, $text_description);
                        $pstmt->bindValue(5, $realDate);

                        if ($pstmt->execute()) {
                            return true;
                        } else {
                            return false;
                        }
                    } catch (PDOException $exc) {
                        echo $exc->getMessage();
                    }
                } else {
                    header("Location: ../user.php?success=4");
                    exit;
                }
            } else {
                header("Location: ../user.php?error=3");
                exit;
            }
        } else {
            header("Location: ../user.php?error=4");
            exit;
        }
    }
    
    public function putBlog($file, $blogTitle, $blogDetails, $Date)
    {
        $tmp_name1 = $file['tmp_name'];
        $filename1 = $file['name'];
        $randomString = bin2hex(random_bytes(8));

        $allowed = array('jpeg', 'png', 'jpg', 'JPEG', 'PNG', 'JPG');
        $ext = pathinfo($filename1, PATHINFO_EXTENSION);

        if (in_array($ext, $allowed)) {

            if ($file['size'] < 5 * 1024 * 1024) {
                $newFilename = $randomString . '.' . pathinfo($filename1, PATHINFO_EXTENSION);
                $destination1 = '../../images/blog/' . $newFilename;
                $dbdestination = '../images/blog/' . $newFilename;

                if (move_uploaded_file($tmp_name1, $destination1)) {
                    $dbcon = new DbConnector();
                    $con = $dbcon->getConnection();
                    $query = "INSERT INTO blog (blog_title, user_id, blog_details, blog_image, blogPostedDate) VALUES (?, ?, ?, ?, ?)";
                    $pstmt = $con->prepare($query);
                    $pstmt->bindValue(1, $blogTitle);
                    $pstmt->bindValue(2, $this->userId);
                    $pstmt->bindValue(3, $blogDetails);
                    $pstmt->bindValue(4, $dbdestination);
                    $pstmt->bindValue(5, $Date);

                    $pstmt->execute();
                    if (($pstmt->rowCount()) > 0) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    header("Location: ./user.php?success=0");
                }
            } else {
                header("Location: ../user.php?error=3");
                exit;
            }
        } else {
            header("Location: ../user.php?error=4");
            exit;
        }
    }

    public function uploadProPic($file)
    {
        $tmp_name1 = $file['tmp_name'];
        $filename1 = $file['name'];
        $userID = $this->userId; 

        $newFilename = $userID . '.' . pathinfo($filename1, PATHINFO_EXTENSION); // Generate the new filename.


        $destination1 = '../../images/profile_pictures/' . $newFilename;
        $dbDestination = '../images/profile_pictures/' . $newFilename;

        if (file_exists($destination1)) {
            unlink($destination1);
        }

        if (move_uploaded_file($tmp_name1, $destination1)) {
            try {
                $dbcon = new DbConnector();
                $conn = $dbcon->getConnection();
                $sql = "UPDATE users SET profile_picture = ? WHERE user_id = ?;";

                $pstmt = $conn->prepare($sql);
                $pstmt->bindValue(1, $dbDestination);
                $pstmt->bindValue(2, $this->userId);

                if ($pstmt->execute()) {
                    $this->ProPic = $dbDestination;

                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }
    }

    public function askQuestion($question, $date)
    {
        try {
            $dbcon = new DbConnector();
            $conn = $dbcon->getConnection();
            $sql = "INSERT INTO question (user_id, askDate, question) VALUES ( ?, ?, ? )";

            $pstmt = $conn->prepare($sql);
            $pstmt->bindValue(1, $this->userId);
            $pstmt->bindValue(2, $date);
            $pstmt->bindValue(3, $question);

            if ($pstmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function giveAnswer($answer, $questionID, $date)
    {
        try {
            $dbcon = new DbConnector();
            $conn = $dbcon->getConnection();
            $sql = "INSERT INTO answer (user_id, questionID, answerDate, answer) VALUES ( ?, ?, ?, ? )";

            $pstmt = $conn->prepare($sql);
            $pstmt->bindValue(1, $this->userId);
            $pstmt->bindValue(2, $questionID);
            $pstmt->bindValue(3, $date);
            $pstmt->bindValue(4, $answer);

            if ($pstmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function writeReview($rate, $description)
    {
        try {
            $dbcon = new DbConnector();
            $conn = $dbcon->getConnection();
            $sql = "INSERT INTO review (user_id, rate, description) VALUES ( ?, ?, ? )";

            $pstmt = $conn->prepare($sql);
            $pstmt->bindValue(1, $this->userId);
            $pstmt->bindValue(2, $rate);
            $pstmt->bindValue(3, $description);
            if ($pstmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function editReview($rate, $description)
    {
        try {
            $dbcon = new DbConnector();
            $conn = $dbcon->getConnection();
            $sql = "UPDATE review SET rate = ? , description = ? WHERE user_id = ?";

            $pstmt = $conn->prepare($sql);
            $pstmt->bindValue(1, $rate);
            $pstmt->bindValue(2, $description);
            $pstmt->bindValue(3, $this->userId);
            if ($pstmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function confirmDelivery($orderID)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "UPDATE orders SET deliveryStatus = ? WHERE orderID = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, "yes");
            $pstmt->bindValue(2, $orderID);
            $a = $pstmt->execute();
            if ($a > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}

/* =========================================================|| Manager class (Child Class) ||====================================================================================== */
class Manager extends person
{
    private $managerId;
    private $NIC;

    private $PhoneNo;

    public function __construct($FirstName, $LastName, $Email, $NIC, $managerId, $PhoneNo)
    {
        parent::__construct($FirstName, $LastName, $Email);
        $this->NIC = $NIC;
        $this->PhoneNo = $PhoneNo;
        $this->managerId = $managerId;
    }

    public function getManagerNIC()
    {
        return $this->NIC;
    }

    public function getManagerPhoneNo()
    {
        return $this->PhoneNo;
    }

    public function getManagerid()
    {
        return $this->managerId;
    }

    public function deleteUser($user_id)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "DELETE FROM users WHERE user_id = :user_id";
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $a = $pstmt->execute();
            if ($a > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function deleteNews($newsId)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "DELETE FROM news WHERE newsId = :newsId";
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(':newsId', $newsId, PDO::PARAM_INT);
            $a = $pstmt->execute();
            if ($a > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function deleteAdd($Addid)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "DELETE FROM advertisements WHERE id = :id";
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(':id', $Addid, PDO::PARAM_INT);
            $a = $pstmt->execute();
            if ($a > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function deleteBlog($Blogid)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "DELETE FROM blog WHERE blog_id = :id";
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(':id', $Blogid, PDO::PARAM_INT);
            $a = $pstmt->execute();
            if ($a > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function deleteQuestion($questionID)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "DELETE FROM question WHERE questionID = :id";
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(':id', $questionID, PDO::PARAM_INT);
            $a = $pstmt->execute();
            if ($a > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function deleteAnswer($answerID)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "DELETE FROM answer WHERE answerID = :id";
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(':id', $answerID, PDO::PARAM_INT);
            $a = $pstmt->execute();
            if ($a > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function manageOrder($orderID, $status)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "UPDATE orders SET OrderStatus = ? WHERE orderID = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $status);
            $pstmt->bindValue(2, $orderID);
            $a = $pstmt->execute();
            if ($a > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function changePrice($ItemID, $newPrice)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "UPDATE shop SET ItemPrice = ? WHERE ItemId = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $newPrice);
            $pstmt->bindValue(2, $ItemID);
            $a = $pstmt->execute();
            if ($a > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function changeQty($ItemID, $total)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "UPDATE shop SET ItemQuantity = ? WHERE ItemId = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $total);
            $pstmt->bindValue(2, $ItemID);
            $a = $pstmt->execute();
            if ($a > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function addItem($file, $price, $name)
    {
        $tmp_name1 = $file['tmp_name'];
        $filename1 = $file['name'];
        $randomString = bin2hex(random_bytes(8));

        $allowed = array('jpeg', 'png', 'jpg', 'JPEG', 'PNG', 'JPG');
        $ext = pathinfo($filename1, PATHINFO_EXTENSION);

        if (in_array($ext, $allowed)) {

            if ($file['size'] < 5 * 1024 * 1024) {

                $newFilename = $randomString . '.' . pathinfo($filename1, PATHINFO_EXTENSION);

                $destination1 = '../../images/Selling1/' . $newFilename;
                $dbDestination = '../images/Selling1/' . $newFilename;

                if (file_exists($destination1)) {
                    unlink($destination1);
                }

                if (move_uploaded_file($tmp_name1, $destination1)) {
                    try {
                        $dbcon = new DbConnector();
                        $conn = $dbcon->getConnection();
                        $sql = "INSERT INTO shop (ItemName, ItemQuantity, ItemPrice, ItemImage) VALUES ( ?, ?, ?, ? )";

                        $pstmt = $conn->prepare($sql);
                        $pstmt->bindValue(1, $name);
                        $pstmt->bindValue(2, 0);
                        $pstmt->bindValue(3, $price);
                        $pstmt->bindValue(4, $dbDestination);

                        if ($pstmt->execute()) {
                            return true;
                        } else {
                            return false;
                        }
                    } catch (PDOException $exc) {
                        echo $exc->getMessage();
                    }
                }
            } else {
                header("Location: ../manager/manageShop.php?error=4");
                exit();
            }
        } else {
            header("Location: ../manager/manageShop.php?error=5");
            exit();
        }
    }

    public function postNews($file, $title, $description, $content, $date)
    {
        $tmp_name1 = $file['tmp_name'];
        $filename1 = $file['name'];
        $randomString = bin2hex(random_bytes(8));

        $allowed = array('jpeg', 'png', 'jpg', 'JPEG', 'PNG', 'JPG');
        $ext = pathinfo($filename1, PATHINFO_EXTENSION);

        if (in_array($ext, $allowed)) {

            if ($file['size'] < 5 * 1024 * 1024) {

                $newFilename = $randomString . '.' . pathinfo($filename1, PATHINFO_EXTENSION);

                $destination1 = '../../images/newsfeed/' . $newFilename;
                $dbDestination = '../images/newsfeed/' . $newFilename;

                if (file_exists($destination1)) {
                    unlink($destination1);
                }

                if (move_uploaded_file($tmp_name1, $destination1)) {
                    try {
                        $dbcon = new DbConnector();
                        $conn = $dbcon->getConnection();
                        $sql = "INSERT INTO news (title, newsPostedDate, description, image, full_content) VALUES ( ?, ?, ?, ?, ?)";

                        $pstmt = $conn->prepare($sql);
                        $pstmt->bindValue(1, $title);
                        $pstmt->bindValue(2, $date);
                        $pstmt->bindValue(3, $description);
                        $pstmt->bindValue(4, $dbDestination);
                        $pstmt->bindValue(5, $content);

                        if ($pstmt->execute()) {
                            return true;
                        } else {
                            return false;
                        }
                    } catch (PDOException $exc) {
                        echo $exc->getMessage();
                    }
                } else {
                    header("Location: ../manager/manageNewsFeed.php?error=3");
                    exit();
                }
            } else {
                header("Location: ../manager/manageNewsFeed.php?error=2");
                exit();
            }
        } else {
            header("Location: ../manager/manageNewsFeed.php?error=1");
            exit();
        }
    }

    public function EditManagerDetails($firstName, $lastName, $email, $NIC, $phone)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "UPDATE manager SET mFirstName = ?, mLastName = ?, mEmail = ?, mNIC = ?, mPhone = ? WHERE managerID = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $firstName);
            $pstmt->bindValue(2, $lastName);
            $pstmt->bindValue(3, $email);
            $pstmt->bindValue(4, $NIC);
            $pstmt->bindValue(5, $phone);
            $pstmt->bindValue(6, $this->managerId);

            $pstmt->execute();

            if ($pstmt->execute()) {

                $_SESSION["manager"] = null;

                try {
                    $con = $dbcon->getConnection();
                    $query = "SELECT * FROM manager WHERE managerID = ? ";
                    $pstmt = $con->prepare($query);
                    $pstmt->bindValue(1, $this->managerId);

                    $pstmt->execute();

                    $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                    foreach ($rs as $row) {
                        $dbFirstName = $row->mFirstName;
                        $dbLastName = $row->mLastName;
                        $dbEmail = $row->mEmail;
                        $dbPhoneNo = $row->mPhone;
                        // $dbpassword = $row->mPassword;
                        $dbNIC = $row->mNIC;
                    }

                    $manager = new Manager($dbFirstName, $dbLastName, $dbEmail, $dbNIC, $this->managerId, $dbPhoneNo);

                    $_SESSION["manager"] = $manager;
                    return true;
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}



/* =========================================================|| Admin class (Child Class) ||====================================================================================== */
class Admin extends person
{

    private $adminId;
    private $NIC;
    private $PhoneNo;

    public function __construct($FirstName, $LastName, $Email, $NIC, $adminId, $PhoneNo)
    {
        parent::__construct($FirstName, $LastName, $Email);
        $this->NIC = $NIC;
        $this->PhoneNo = $PhoneNo;
        $this->adminId = $adminId;
    }

    public function getAdminNIC()
    {
        return $this->NIC;
    }

    public function getAdminPhoneNo()
    {
        return $this->PhoneNo;
    }

    public function getAdminid()
    {
        return $this->adminId;
    }

    public function AddManager($firstname, $lastname, $email, $password, $NIC, $phone)
    {
        try {

            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "INSERT INTO manager(mFirstName, mLastName, mEmail, mPassword, mNIC, mPhone) VALUES(?, ?, ?, ?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $firstname);
            $pstmt->bindValue(2, $lastname);
            $pstmt->bindValue(3, $email);
            $pstmt->bindValue(4, $password);
            $pstmt->bindValue(5, $NIC);
            $pstmt->bindValue(6, $phone);

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
    public function deleteManager($managerID)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();

            $query = "DELETE FROM manager WHERE managerID = :managerID";
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(':managerID', $managerID, PDO::PARAM_INT);
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

    public function editAdminDetails($firstName, $lastName, $email, $NIC, $phone)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "UPDATE admin SET aFirstName = ?, aLastName = ?, aEmail = ?, aNIC = ?, aPhone = ? WHERE adminID = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $firstName);
            $pstmt->bindValue(2, $lastName);
            $pstmt->bindValue(3, $email);
            $pstmt->bindValue(4, $NIC);
            $pstmt->bindValue(5, $phone);
            $pstmt->bindValue(6, $this->adminId);

            $pstmt->execute();

            if ($pstmt->execute()) {
                $_SESSION["admin"] = null;
                try {

                    $con = $dbcon->getConnection();
                    $query = "SELECT * FROM admin WHERE adminID = ? ";
                    $pstmt1 = $con->prepare($query);
                    $pstmt1->bindValue(1, $this->adminId);
                    $pstmt1->execute();
                    $rs = $pstmt1->fetchAll(PDO::FETCH_OBJ);

                    foreach ($rs as $row) {
                        $dbFirstName = $row->aFirstName;
                        $dbLastName = $row->aLastName;
                        $dbEmail = $row->aEmail;
                        $dbPhoneNo = $row->aPhone;
                        $dbNIC = $row->aNIC;
                    }

                    $adminNew = new admin($dbFirstName, $dbLastName, $dbEmail, $dbNIC, $this->adminId, $dbPhoneNo);
                    $_SESSION["admin"] = $adminNew;
                    return true;
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
