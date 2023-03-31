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

    <title>Make the Questions for your quiz here.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="LooksGood.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- css scripts for this webpage -->

</head>
<body>
<br><br>
<div class="container text-center">
<h1>Making Quiz Questions</h1>
<?php
echo("<h2>You have ".$_SESSION["quno"]." Questions left to make </h2>");
//outputs to the user, how many questions do they have left to write
?>
</div>
<br>
<div class="container text-center">
    <form action="addquizQ.php" method ="post">
            <!-- will take the user to addquizQ.php after the form is submitted -->

            Type the Question(1000 Characters Max, Spaces Included):<br>
            <textarea id="Question" name="QQ" rows="6" cols="50"></textarea><br>
            <!-- allows the user to enter the question -->

        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-4">
                Type Answer 1(100 Characters Max, Spaces Included):<br>
                <textarea id="Answer1" name="A1" rows="6" cols="50"></textarea><br>
                <!-- allows the user to enter the 1st answer -->
                <!-- all answers are carefully placed on the webpage, using the splitting of the webpage into 12 parts -->
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-4">
                Type Answer 2(100 Characters Max, Spaces Included):<br>
                <textarea id="Answer2" name="A2" rows="6" cols="50"></textarea><br>
                <!-- allows the user to enter the second answer -->
            </div>
            <div class="col-sm-1">
            </div>
        </div>

        <div class="row">
        <div class="col-sm-1">
            </div>
            <div class="col-sm-4">
                Type Answer 3(100 Characters Max, Spaces Included):<br>
                <textarea id="Answer3" name="A3" rows="6" cols="50"></textarea><br>
                <!-- allows the user to enter the 3rd answer -->
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-4">
                Type Answer 4(100 Characters Max, Spaces Included):<br>
                <textarea id="Answer4" name="A4" rows="6" cols="50"></textarea><br>
                <!-- allows the user to enter the 4th answer -->
            </div>
            <div class="col-sm-1">
            </div>
        </div><br>

        <label for="quantity">Correct answer is the value between 1 and 4</label>
        <input type="number" id="CorrectAns" name="CA" min="1" max="4"><br><br>
        <!-- the user has to specify which of the 4 answers is the correct one -->
        <!-- the code will not accept an answer smaller than 1 or bigger than 4 -->
        <input type="submit" class="btn btn-danger" value="Submit the Question">
        <!-- submits the form -->
    </form>
</div>
</body>
</html>