<?php
session_start(); 
if (!isset($_SESSION['LoggedInName']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Creating New Quiz</title>

</head>
<body>
<form action="QuizCreation.php" method ="post">
    Type Name of the Quiz(20 Characters Max, Spaces Included): <input type="text" name="QuizName"><br>
    How many questions will there be in your quiz(You have to make the questions by yourself)
    <input type="text" name="NumberOfQuestions"><br>
    What subject is your Quiz related to?
    <select name = "subject_id"><br>


<?php 
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM SchoolSubjects ORDER BY SchoolSubject ASC");
$stmt =$conn->prepare("SELECT * FROM QuizTable");
$stmt->execute();
while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
{
    echo($row["QuizName"]."<br>");
    echo("<option value=".$row["SubjectID"].">".$row["SchoolSubject"]."</option>");
}
?>
</select>
<input type="submit" value="Create Quiz">
</form>
</body>
</html>
