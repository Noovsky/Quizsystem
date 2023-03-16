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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="LooksGood.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <br><br>
<div class="container text-center">
<form action="QuizCreation.php" method ="post">
<div class="form-group">
            <label class="control-label" for="Name"> Type Name of the Quiz(20 Characters Max, Spaces Included):</label>
            <input type="text" class="form-control" placeholder="Enter Quiz Name" name="QuizName"><br><br>
        </div>
<div class="form-group">
            <label class="control-label " for="Name"> How many questions will there be in your quiz(You have to make the questions by yourself)</label>
            <input type="text" class="form-control" placeholder="Enter the Number Of Questions" name="NumberOfQuestions">
        </div><br><br>
    <label class="control-label " for="Name"> What subject is your Quiz related to?</label>
    <select class="form-control" name = "subject_id"><br>
    

<?php 
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM SchoolSubjects ORDER BY SchoolSubject ASC");
//$stmt =$conn->prepare("SELECT * FROM QuizTable");
$stmt->execute();
while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
{
    //echo($row["QuizName"]."<br>");
    echo("<option value=".$row["SubjectID"].">".$row["SchoolSubject"]."</option>");
}
?>
</select><br><br>
<input type="submit" class="btn btn-danger" value="Create Quiz">
</div>
</form>
</body>
</html>
