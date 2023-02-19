<?php
session_start(); 
$_SESSION["quno"]=$_POST["NumberOfQuestions"];
print_r($_SESSION);
try{
array_map("htmlspecialchars", $_POST);
header("Location: quizzesQ.php");
include_once("connection.php");
print_r($_POST);


$stmt = $conn->prepare("INSERT INTO 
QuizTable (QuizID,QuizName,UserID,NumberOfQ,DateCreated,Visitors,SubjectID)
VALUES(null,:Qn,:user,:NofQ,:datemade,:Visits,:SS)");
$currentDate = date("Y-m-d");
$userlogged=1;//temporary need to get logged user eventually
$pplVisits=1;//temporary


echo($currentDate);

$stmt->bindParam(":Qn", $_POST["QuizName"]);
$stmt->bindParam(":user", $userlogged);//temporary
$stmt->bindParam(":NofQ", $_POST["NumberOfQuestions"]);
$stmt->bindParam(":datemade", $currentDate);
$stmt->bindParam(":Visits", $pplVisits);//temporary
$stmt->bindParam(":SS", $_POST["subject_id"]);
$stmt->execute();
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}

$conn=null;
print_r($_SESSION);
?>