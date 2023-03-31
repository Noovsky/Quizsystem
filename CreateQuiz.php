<?php
session_start(); 
if (!isset($_SESSION['LoggedInName']))// checks that the person on this webpage is logged in
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];// will return the user to this page after they log in
    header("Location:login.php");// takes the person to the login page if they are not logged in
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    // Connection to the css files on the web, as well as my own css file - "LooksGood.css"
    </script>
  

</head>
<body>
    <br><br>
<div class="container text-center">
    <!-- Creates a container at the top center of the page -->
<form action="QuizCreation.php" method ="post">
    <!-- Creates a form, that will take the user to the page "QuizCreation.php" -->
<div class="form-group">
    <!-- Changes the look of the data entry bar -->
            <label class="control-label" for="Name"> Type Name of the Quiz(20 Characters Max, Spaces Included):</label>
            <input type="text" class="form-control" placeholder="Enter Quiz Name" name="QuizName"><br><br>
            <!-- Adds extra cool features such as a placeholder to make it look better -->
            <!-- QuizName is the name for the data that the user is going to enter -->
        </div>
<div class="form-group">
            <label class="control-label " for="Name"> How many questions will there be in your quiz(You have to make the questions by yourself)</label>
            <input type="text" class="form-control" placeholder="Enter the Number Of Questions" name="NumberOfQuestions">
        </div><br><br>
    <label class="control-label " for="Name"> What subject is your Quiz related to?</label>
    <select class="form-control" name = "subject_id"><br>
    <!-- Select allows to choose an answer from an already given choice of answers -->
    

<?php 
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM SchoolSubjects ORDER BY SchoolSubject ASC");
// allows to use all data from the SchoolSubjects table
$stmt->execute();
while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
{
    echo("<option value=".$row["SubjectID"].">".$row["SchoolSubject"]."</option>");
    // the code above allows the Subject selection function above to work
}
?>
</select><br><br>
<input type="submit" class="btn btn-danger" value="Create Quiz">
<!-- above is a button that submits all the data on the page, and finishes the form -->
<!-- it uses the red colour of the danger class to add style to my webpage -->
</div>
</form>
</body>
</html>
