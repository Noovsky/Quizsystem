<?php
session_start();

$SESSION["quno"]=$_POST["NumberOfQuestions"];

try{
array_map("htmlspecialchars", $_POST);
header("Location: quizzesQ.php");
include_once("connection.php");
print_r($_POST);
switch($_POST["role"]){
    case "Private":
        $role=0;
        break;
    case "Public":
        $role=1;
        break;
}

$stmt = $conn->prepare("INSERT INTO 
QuizTable (QuizID,QuizName,UserID,PrivatePublic,NumberOfQ,DateCreated,PrivatePasswd,Visitors)
VALUES(null,:Qn,:user,:role,:NofQ,:datemade,:PP,:Visits)");
$currentDate = date("Y-m-d");
$userlogged=1;//temporary need to get logged user eventually
$pplVisits=1;//temporary

echo($currentDate);
echo($role);
echo($pplVisits);
echo($userlogged);

$stmt->bindParam(":Qn", $_POST["QuizName"]);
$stmt->bindParam(":user", $userlogged);//temporary
$stmt->bindParam(":role", $role);
$stmt->bindParam(":NofQ", $_POST["NumberOfQuestions"]);
$stmt->bindParam(":datemade", $currentDate);
$stmt->bindParam(":PP", $_POST["passwd"]);
$stmt->bindParam(":Visits", $pplVisits);//temporary
$stmt->execute();
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null
?>