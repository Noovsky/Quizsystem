<!DOCTYPE html>
<html>
<head>

    <title>User Registration Page (Basic)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<form action="addusers.php" method = "post">
    Create Username: <input type="text" name="Username"><br>
    Create Password: <input type="password" name="passwd"><br>
    Register Email: <input type="text" name="email"><br>
    <br>
    <input type="radio" name="role" value="Pupil" checked> Select if you are a Student<br>
    <input type="radio" name="role" value="Teacher"> Select if you are a Teacher<br>
    <br>
    Choose the school that you are related to.<br>
    <select name = "schoolid">
<?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM SchoolTable ORDER BY SchoolName ASC");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
        echo("<option value=".$row["SchoolID"].">".$row["SchoolName"]."</option>");
} 
?>
 
</select>
<br>
<br>
    <input type="submit" value="Add User"><br>
</form>
</body>
</html>