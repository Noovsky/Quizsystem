<?php
session_start(); 
if (!isset($_SESSION['LoggedInName']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
print_r($_POST['quizid']);

$_SESSION["CurrentQuiz"]=$_POST["quizid"];
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
<style>
  
  input[type="radio"]:checked+label{
    background-color:blue;
    color:white;
    
  }

  </style>
</head>
<body>
<form action="QuizResults.php" method ="POST">

    <?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM QuizQuestions WHERE QuizID= :quid");
$stmt->bindParam(":quid", $_POST["quizid"]); 
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    
    
    echo($row["AnswerCorrect"]."<br>");
   
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

        <input type="radio" hidden id="1" name="'.$row["QuestionID"].'" value=1/>
        <label class="radio-inline btn btn-danger" for="1">'.$row["Answer1"].' </label>

      </div>
      <div class="col-sm-2">
      </div>
      <div class="col-sm-4"> 
      
      <input type="radio" hidden  id="2" name="'.$row["QuestionID"].'" value=2>
      <label class="radio-inline btn btn-danger" for="2">'.$row["Answer2"].' </label>
      </div>
      <div class="col-sm-1">
      </div>
  </div><br>

    
    <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col-sm-4">
      
    
      <input type="radio" hidden id="3" name="'.$row["QuestionID"].'" value=3>
      <label class="radio-inline btn btn-danger" for="3">'.$row["Answer3"].' </label>
      
      </div>
      <div class="col-sm-2">
      </div>
      <div class="col-sm-4"> 
   
      <input type="radio" hidden id="4" name="'.$row["QuestionID"].'" value=4>
      <label class="radio-inline btn btn-danger" for="4">'.$row["Answer4"].' </label>
      </div>
      <div class="col-sm-1">
      </div>
      
    </div> 
    ');
}
?>

<input type="submit" value="NEXT">


</form>

</body>

</html>