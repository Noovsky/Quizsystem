<?php
session_start(); 
if (!isset($_SESSION['LoggedInName']))
{   
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>

    <title>Creating New Group</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="LooksGood.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<form action="addgroup.php" method="post">
    Type name of the Group<input type="text" name="GroupName"><br>
    <input type="radio" name="role" value="Private" checked> Select if you want the group to be Private<br>
    <input type="radio" name="role" value="Public" > Select if you want the group to be Public<br>
    Create Access code(Only if Group is private,leave blank if the Group is public)
    <input type="password" name="PriavteCode">
    <input type="submit" value="Create Quiz">
</form>

<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM GroupTable");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["GroupName"]."<br>");
}
?>
</body>
</html>