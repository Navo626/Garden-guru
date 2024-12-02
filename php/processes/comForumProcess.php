<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
require '../classes/Security.php';

use classes\DbConnector;

$dbcon = new DbConnector();

session_start();
$user = null;
if (isset($_SESSION["user"])) {

    $user = $_SESSION["user"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["ask_question"])) {
        $date = $_POST["date"];
        $question = Security::SanitizeInput($_POST["question"]);
        //call askQuestion function in user class
        if ($user->askQuestion($question, $date)) {
            header("Location: ../comForum.php?success=1");
        } else {
            header("Location: ../comForum.php?error=1");
        }
    }

    if (isset($_POST["giveAnswer"])) {
        $date = $_POST["date"];
        $questionID = $_POST["QuestionID"];
        $answer = Security::SanitizeInput($_POST["answer"]);
        //call askQuestion function in user class
        if ($user->giveAnswer($answer,$questionID,$date)) {
            header("Location: ../comForum.php?success=2");
        } else {
            header("Location: ../comForum.php?error=2");
        }
    }
}

