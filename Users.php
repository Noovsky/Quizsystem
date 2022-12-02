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
    <input type="radio" name="role" value="Pupil" checked> Select if you are a Student
    <input type="radio" name="role" value="Teacher"> Select if you are a Teacher
    <select name = "quizid">
<?php
/* include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM QuizTable WHERE PrivatePublic = 1 ORDER BY QuizName ASC");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo("<option value=".$row["QuizID"].">".$row["DateCreated"]."</option>");
} */
?> --> 
</select>
    <input type="submit" value="Add User">
</form>
</body>
</html>