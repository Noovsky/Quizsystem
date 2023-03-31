<?php
session_start();//allows to use session variables that are created on other webpages


if ($_SESSION["quno"]==1){//triggers when the user finishes writing the amount of questions that they have set for the quiz
    header("Location: homepage_S.php");// takes the user to the homepage
}else{
    header("Location: quizzesQ.php");//it makes the user do quiz questions for the set quiz until a condition is reached 
} 

include_once("connection.php");//provides connection to the database
$stmt =$conn->prepare("SELECT MAX(QuizID) as qid FROM quiztable");
$stmt->execute();// executes the statement
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))//while loop
{
$quiz=$row['qid'];
}

try{
array_map("htmlspecialchars", $_POST);
print_r($_POST);// checks all the data that has been sent to this webpage via the POST method

$stmt =$conn->prepare("INSERT INTO
QuizQuestions (QuestionID,QuizID,Question,Answer1,Answer2,Answer3,Answer4,AnswerCorrect)
VALUES
(null,:qid,:QzN,:Answer1,:Answer2,:Answer3,:Answer4,:CorrectAns)");
// inserts all the data collected from the user into the database

$stmt->bindParam(":qid", $quiz);
$stmt->bindParam(":QzN", $_POST["QQ"]);
$stmt->bindParam(":Answer1", $_POST["A1"]);
$stmt->bindParam(":Answer2", $_POST["A2"]);
$stmt->bindParam(":Answer3", $_POST["A3"]);
$stmt->bindParam(":Answer4", $_POST["A4"]);
$stmt->bindParam(":CorrectAns", $_POST["CA"]);
$stmt->execute();
$_SESSION["quno"]-=1;// takes 1 away from the quiz question counter
print_r($_SESSION);// prints out all of the session variables
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null
?>