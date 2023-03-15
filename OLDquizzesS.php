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
    <link rel="stylesheet" href="LooksGood.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<form action="QuizResults.php" method ="POST">

    <?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM QuizQuestions WHERE QuizID= :quid");
$stmt->bindParam(":quid", $_POST["quizid"]); 
$stmt->execute();
$count = 0;
$quizArray = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  $quizArray[$count] = array("QuestionID" => $row["QuestionID"], "Question" => $row["Question"], "Answer1" => $row["Answer1"], "Answer2" => $row["Answer2"], "Answer3" => $row["Answer3"], "Answer4" => $row["Answer4"]);
  $count = $count + 1;
  // $_SESSION['quizQuestion'] = $row["Question"];
  //   echo($row["Question"]."<br>");
    
  //   echo($row["AnswerCorrect"]."<br>");
  //   echo("<input type='radio' id=".$row["QuestionID"]." name=".$row["QuestionID"]." value=1>".$row["Answer1"]."<br>");
  //   echo("<input type='radio' id=".$row["QuestionID"]." name=".$row["QuestionID"]." value=2>".$row["Answer2"]."<br>");
  //   echo("<input type='radio' id=".$row["QuestionID"]." name=".$row["QuestionID"]." value=3>".$row["Answer3"]."<br>");
  //   echo("<input type='radio' id=".$row["QuestionID"]." name=".$row["QuestionID"]." value=4>".$row["Answer4"]."<br>");
}
$_SESSION['quizArray'] = $quizArray;
$_SESSION['currentQuestion'] = 0;
?>




<div class="jumbotron bg-black">
  <div class="container text-center">
    
    <?php
    {
        echo("<h2>".$_SESSION["quizArray"][$_SESSION['currentQuestion']]["Question"]."</h2><br>");
        #create an action from to check the question when the answer is selected
        #current question incremented by 1 each time
        #when current question == nofQ in quiz, go to quiz results.
    }
    echo('<div class="container-fluid bg-3 text-center">    
    <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col-sm-4">
        <p>'.$_SESSION["quizArray"][$_SESSION['currentQuestion']]["Answer1"].'</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-2">
      </div>
      <div class="col-sm-4"> 
        <p>'.$_SESSION["quizArray"][$_SESSION['currentQuestion']]["Answer2"].'</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-1">
      </div>
  </div><br><br>
  
     
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-4">
      <p>'.$_SESSION["quizArray"][$_SESSION['currentQuestion']]["Answer3"].'</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4"> 
      <p>'.$_SESSION["quizArray"][$_SESSION['currentQuestion']]["Answer4"].'</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-1">
  </div><br>
      
    </div>
  <br><br>');
    ?>      
  </div>
</div>

<input type="submit" value="NEXT">
</form>

</body>
</html>