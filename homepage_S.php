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
    
    <title>Student Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="LooksGood.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>

<form action="QuizSelection.php" method= "post">
    Click here to Choose a quiz to complete.<br>
<input type="submit" value="Choose quiz"><br>
</form>
<form action="CreateQuiz.php" method= "post">
    Create a New Quiz For everyone to enjoy.<br>
<input type="submit" value="Create Quiz"><br>
<form action="ViewQuizResults.php" method= "post">
    View the results from your previous attempts.<br>
<input type="submit" value="View Past Results"><br>
<form action="logout.php" method= "post">
    Click here to log out.<br>
<input type="submit" value="Log out"><br>

</form>
</body>
</html>