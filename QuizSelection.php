<?php
session_start(); 
if (!isset($_SESSION['LoggedInName']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
//takes the user to the log in if not logged in
//returns the user back to this page, after they have logged in correctly
?>
<!DOCTYPE html>
<html>
<head>

    <title>Quiz Selection</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="LooksGood.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- css scripts for this webpage -->

</head>
<body>
<div class="container text-center">
<form action="quizzesS.php" method = "post">
    <!-- will take the user to quizzesS.php after the form is submitted -->
<label class="control-label " for="Name"> Select a Quiz that you wish to attempt (typying in a letter on the keyboard</label><br><br>
    <select class="form-control" name = "quizid"><br>
    <!-- allows the user to select a quiz out of the ones available -->
<?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM QuizTable ORDER BY QuizName ASC");
//selects all data from the Quiztable and orders it in alphabetical order via the names of quizzes
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo("<option value=".$row["QuizID"].">".$row["QuizName"]."</option>");
}
?>
</select>
<br><br>
<input type="submit" class="btn btn-danger" value="Choose Quiz">
<!-- submits the choice of the quiz  -->
</form>
</body>
</html>