<?php
try{
array_map("htmlspecialchars", $_POST);
header("Location: users.php");
include_once("connection.php");
switch($POST["role"]){
    case "Pupil":
        $role=0;
        break;
    case "Teacher":
        $role=1;
        break;
}
$stmt =$conn->prepare("INSERT INTO UsersTable (UserID,Name,Email,Password,TeacherOrStudent)
VALUES(null,:Username,:email,:password,:role)");

$stmt->bindParam('Username:',$_POST["Username"]);
$stmt->bindParam('email:',$_POST["email"]);
$stmt->bindParam('password:', $_POST["passwd"]);
$stmt->bindParam('role:', $role);
$stmt->execute();
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null
?>