<?php
session_start(); 


if ($_SESSION["quno"]==1){
    header("Location: Users.php");
}else{
    header("Location: quizzesQ.php");
} 

include_once("connection.php");
$stmt =$conn->prepare("SELECT MAX(QuizID) as qid FROM quiztable");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
$quiz=$row['qid'];
}

try{
array_map("htmlspecialchars", $_POST);
//header("Location: quizzesQ.php"); LOOP here
print_r($_POST);

//include_once("connection.php");
//$quiz=1//$_session["quizcurrent"];<-- need to add a session variable to it
$stmt =$conn->prepare("INSERT INTO
QuizQuestions (QuestionID,QuizID,Question,Answer1,Answer2,Answer3,Answer4,AnswerCorrect)
VALUES
(null,:qid,:QzN,:Answer1,:Answer2,:Answer3,:Answer4,:CorrectAns)");

$stmt->bindParam(":qid", $quiz);
$stmt->bindParam(":QzN", $_POST["QQ"]);
$stmt->bindParam(":Answer1", $_POST["A1"]);
$stmt->bindParam(":Answer2", $_POST["A2"]);
$stmt->bindParam(":Answer3", $_POST["A3"]);
$stmt->bindParam(":Answer4", $_POST["A4"]);
$stmt->bindParam(":CorrectAns", $_POST["CA"]);
$stmt->execute();
$_SESSION["quno"]-=1;
print_r($_SESSION);
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null
?>