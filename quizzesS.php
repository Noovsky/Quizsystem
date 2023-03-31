<?php
session_start(); 
if (!isset($_SESSION['LoggedInName']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
//checks if the user, who enters this webpage is logged in to an account


$_SESSION["CurrentQuiz"]=$_POST["quizid"];
// creates a session variable for the quiz that the user is currently attempting
?>
<!DOCTYPE html>
<html>
<head>

    <title>Solving the Quiz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- css scripts that this webpage uses -->
<style>
  
  input[type="radio"]:checked+label{
    background-color:green;
    color:white;
    border-color:green;
    /* this highlights the answer from red to green after the user clicks on it */
    /* by clicking on the answer, the user selects which answer to answer */
   
  }
.big{
  font-size:30px;
  /* sets the size of the symbols to 30px */
}
  </style>
</head>
<body>
<?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT QuizName FROM quiztable WHERE QuizID= :quid");
//selects the quizname from the quiztable, which uses the same quiz ID as the quiz that the user currently attempts
$stmt->bindParam(":quid", $_POST["quizid"]); 
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
$_SESSION["NameOfQuiz"]=$row["QuizName"];
// creates a session variable that is responsible for the quiz name 
}
?>
<form action="QuizResults.php" method ="POST">
  <!-- this form will take the user to QuizResults.php, upon submition -->

    <?php

$stmt =$conn->prepare("SELECT * FROM QuizQuestions WHERE QuizID= :quid");
// selects all from quiz questions, which has the same quiz id as the current quiz
$stmt->bindParam(":quid", $_POST["quizid"]); 
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    
    
    //echo($row["AnswerCorrect"]."<br>");
   
    echo('
    <div class="jumbotron">
    <div class="container text-center">
      <h2>'.$row["Question"].'<h2>      
    </div>
  </div>
    
  <div class="container-fluid bg-3 text-center">    
    <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col-sm-4">

        <input type="radio" hidden id="'.$row["QuestionID"]."a".'" name="'.$row["QuestionID"].'" value=1>
        <label class="big radio-inline btn btn-danger" for="'.$row["QuestionID"]."a".'">'.$row["Answer1"].' </label>

      </div>
      <div class="col-sm-2">
      </div>
      <div class="col-sm-4"> 
      
      <input type="radio" hidden  id="'.$row["QuestionID"]."b".'" name="'.$row["QuestionID"].'" value=2>
      <label class="big radio-inline btn btn-danger" for="'.$row["QuestionID"]."b".'">'.$row["Answer2"].' </label>
      </div>
      <div class="col-sm-1">
      </div>
  </div><br>

    
    <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col-sm-4">
      
    
      <input type="radio" hidden id="'.$row["QuestionID"]."c".'" name="'.$row["QuestionID"].'" value=3>
      <label class="big radio-inline btn btn-danger" for="'.$row["QuestionID"]."c".'">'.$row["Answer3"].' </label>
      
      </div>
      <div class="col-sm-2">
      </div>
      <div class="col-sm-4"> 
   
      <input type="radio" hidden id="'.$row["QuestionID"]."d".'" name="'.$row["QuestionID"].'" value=4>
      <label class="big radio-inline btn btn-danger" for="'.$row["QuestionID"]."d".'">'.$row["Answer4"].' </label>
      </div>
      <div class="col-sm-1">
      </div>
      
    </div> 
    <br>
    ');
    // creates html code, with the use of CSS, inside a PHP echo command
    // the code above shows the questions as well as their answers
}
?>

<input type="submit" class="btn btn-danger" value="NEXT">
<!-- submits the whole answered quiz -->


</form>

</body>

</html>