<?php
session_start(); 

try{
array_map("htmlspecialchars", $_POST);
header("Location: groups.php");
include_once("connection.php");
switch($_POST["PrivateOrPublic"]){
    case "Public":
        $role=0;
        break;
    case "Private":
        $role=1;
        break;
}
$loggedin=1;//pick up logged in person later
$stmt = $conn->prepare("INSERT INTO GroupTable (GroupID, GroupName,UserID,PrivateOrPublic,PrivateCode)
VALUES (null,:Gn,:uid,:PrivateCode,:PrivateOrPublic)");
$stmt->bindParam(":uid", $loggedin);
$stmt->bindParam(":PrivateCode", $_POST["passwd"]);
$stmt->bindParam(":Gn", $_POST["GroupName"]);
$stmt->bindParam(":PrivateOrPublic", $role);
$stmt->execute();
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null 
?>