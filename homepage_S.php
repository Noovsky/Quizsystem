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
<br><br>
<div class="container text-center">
    <h1>Student Homepage</h1>
</div>
<br>
<div class="container text-center">

        <div class="col-sm-3">
            <form action="QuizSelection.php" method= "post">
                <div class="form-group">
                    <label class="control-label " for="Name"> Click here to Choose a quiz to complete.</label><br><br>
                    <input type="submit" class="btn btn-danger" value="Choose quiz"><br>
                </div>
            </form>
        </div>

    
        <div class="col-sm-3">
            <form action="CreateQuiz.php" method= "post">
                <div class="form-group">
                    <label class="control-label " for="Name"> Create a New Quiz For everyone to enjoy.</label><br><br>
                    <input type="submit"  class="btn btn-danger" value="Create Quiz"><br>
                </div>
            </form>
        </div>
    

    
        <div class="col-sm-3">
            <form action="ViewQuizResults.php" method= "post">
                <div class="form-group">
                    <label class="control-label " for="Name"> View the results from your previous attempts.</label><br><br>
                    <input type="submit" class="btn btn-danger" value="View Past Results"><br>
                </div>
            </form>
        </div>
    

    
        <div class="col-sm-3">
            <form action="logout.php" method= "post">
                <div class="form-group">
                    <label class="control-label " for="Name"> Click here to log out.</label><br><br><br>
                    <input type="submit" class="btn btn-danger" value="Log out"><br>
                </div>
            </form>
        </div>
</div>
</form>
</body>
</html>