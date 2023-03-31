<?php
session_start(); 
try{
array_map("htmlspecialchars", $_POST);

print_r($_POST);
include_once("connection.php");
// switch($_POST["role"]){
//     case "Pupil":
//         $role=0;
//         //$_SESSION["S_SchoolID"]=$_POST["school"];
//         header("Location: homepage_S.php");
//         break;
//     case "Teacher":
//         $role=1;
//         //$_SESSION["T_SchoolID"]=$_POST["school"];
//         header("Location: homepage_T.php");
//         break;
// }

// above in green is the code used to take the user to a homepage depending on if they are a teacher or a student
// may be brought back in future updates
header("Location: homepage_S.php");
$student = 0;// for now, all users are set as students
$hashed_password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);
//this hashes the password, and thus protects the accounts of the users
echo($role);
$stmt = $conn->prepare("INSERT INTO UsersTable (UserID,Name,Email,Password,TeacherOrStudent,SchoolID)
VALUES(null,:Username,:email,:password,:role,:school)");
$stmt->bindParam(':Username',$_POST["Username"]);
$stmt->bindParam(':email',$_POST["email"]);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':role', $student);
$stmt->bindParam(":school", $_POST["schoolid"]);
$stmt->execute();
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null
?>