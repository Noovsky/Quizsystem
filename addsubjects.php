<?php
session_start(); 

try{
array_map("htmlspecialchars", $_POST);
header("Location: subjects.php");
include_once("connection.php");

$stmt = $conn->prepare("INSERT INTO SchoolSubjects (SubjectID,SchoolSubject)
VALUES (null,:SS)");

$stmt->bindParam(":SS", $_POST["SchoolSubject"]);
$stmt->execute();
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null
?>