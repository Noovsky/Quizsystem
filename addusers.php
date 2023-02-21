<?php
session_start(); 
try{
array_map("htmlspecialchars", $_POST);
//header("Location: users.php");
print_r($_POST);
include_once("connection.php");
switch($_POST["role"]){
    case "Pupil":
        $role=0;
        //$_SESSION["S_SchoolID"]=$_POST["school"];
        header("Location: homepage_S.php");
        break;
    case "Teacher":
        $role=1;
        //$_SESSION["T_SchoolID"]=$_POST["school"];
        header("Location: homepage_T.php");
        break;
}

$_SESSION["T_or_S_role"]=$_POST["role"];
$_SESSION["SchoolID"]=$_POST["school"];
        

$hashed_password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);
echo($role);
$stmt = $conn->prepare("INSERT INTO UsersTable (UserID,Name,Email,Password,TeacherOrStudent,SchoolID)
VALUES(null,:Username,:email,:password,:role,:school)");

$stmt->bindParam(':Username',$_POST["Username"]);
$stmt->bindParam(':email',$_POST["email"]);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':role', $role);
$stmt->bindParam(":school", $_POST["schoolid"]);
$stmt->execute();
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null
?>