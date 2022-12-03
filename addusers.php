<?php
try{
array_map("htmlspecialchars", $_POST);
//header("Location: users.php");
print_r($_POST);
include_once("connection.php");
switch($_POST["role"]){
    case "Pupil":
        $role=0;
        break;
    case "Teacher":
        $role=1;
        break;
}
echo($role);
$stmt = $conn->prepare("INSERT INTO UsersTable (UserID,Name,Email,Password,TeacherOrStudent,SchoolID)
VALUES(null,:Username,:email,:password,:role,:school)");

$stmt->bindParam(':Username',$_POST["Username"]);
$stmt->bindParam(':email',$_POST["email"]);
$stmt->bindParam(':password', $_POST["passwd"]);
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