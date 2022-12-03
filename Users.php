<!DOCTYPE html>
<html>
<head>

    <title>User Registration Page (Basic)</title>

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