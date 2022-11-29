<?php
try{
array_map("htmlspecialchars", $_POST);
header("Location: schools.php");
include_once("connection.php");

$stmt = $conn->prepare("INSERT INTO SchoolTable (SchoolID,SchoolName)
VALUES (null,:Sn)");

$stmt->bindParam(":Sn", $_POST["SchoolName"]);
$stmt->execute();
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null
?>