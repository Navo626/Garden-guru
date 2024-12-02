<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
require '../classes/Security.php';
use classes\DbConnector;
$dbcon = new DbConnector();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['lastname']) && !empty($_POST['lastname']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_POST['gender']) && !empty($_POST['gender']) && isset($_POST['district']) && !empty($_POST['district']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passwordConfirmation']) && !empty($_POST['passwordConfirmation'])) {
        $tempPass1 = $_POST["password"];
        $tempPass2 = $_POST["passwordConfirmation"];

        if (Security::validate_password($tempPass1)) {

            if ($tempPass1 == $tempPass2) {
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $gender = $_POST["gender"];
                $district = $_POST["district"];
                $address = $_POST["address"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $picture = "../images/profile_pictures/Default.png";

                $firstname = Security::SanitizeInput($firstname);
                $lastname = Security::SanitizeInput($lastname);
                $email = Security::SanitizeInput($email);
                $phone = Security::SanitizeInput($phone);
                $gender = Security::SanitizeInput($gender);
                $district = Security::SanitizeInput($district);
                $address = Security::SanitizeInput($address);

                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    if (is_numeric($phone)) {

                        try {
                            $con = $dbcon->getConnection();
                            $query = "SELECT user_Email FROM users WHERE user_Email = ? ";
                            $pstmt = $con->prepare($query);
                            $pstmt->bindValue(1, $email);

                            $pstmt->execute();

                            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                            foreach ($rs as $row) {

                                if ($row->user_Email == $email) {
                                    header("Location: ../register.php?error=6");
                                    exit();
                                }
                            }
                        } catch (PDOException $exc) {
                            echo $exc->getMessage();
                        }
                        // call RegisterUser function in user class
                        if (user::RegisterUser($firstname, $lastname, $email, $phone, $address, $password, $district, $gender, $picture)) {
                            header("Location: ../login.php?success=1");
                        } else {
                            header("Location: ../register.php?error=7");
                        }
                    } else {
                        header("Location: ../register.php?error=1");
                    }
                } else {
                    header("Location: ../register.php?error=2");
                }
            } else {
                header("Location: ../register.php?error=3");
            }
        } else {
            header("Location: ../register.php?error=4");
        }
    } else {
        header("Location: ../register.php?error=5");
    }
}
