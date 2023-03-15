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

</head>
<body>
<form action="QuizResults.php" method ="POST">
    The Question<br>
    <br>
    <?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM QuizQuestions WHERE QuizID= :quid");
$stmt->bindParam(":quid", $_POST["quizid"]); 
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo($row["Question"]."<br>");
    
    echo($row["AnswerCorrect"]."<br>");
    echo("<input type='radio' id=".$row["QuestionID"]." name=".$row["QuestionID"]." value=1>".$row["Answer1"]."<br>");
    echo("<input type='radio' id=".$row["QuestionID"]." name=".$row["QuestionID"]." value=2>".$row["Answer2"]."<br>");
    echo("<input type='radio' id=".$row["QuestionID"]." name=".$row["QuestionID"]." value=3>".$row["Answer3"]."<br>");
    echo("<input type='radio' id=".$row["QuestionID"]." name=".$row["QuestionID"]." value=4>".$row["Answer4"]."<br>");
       
}
?>

<input type="submit" value="NEXT">


<div class="jumbotron">
  <div class="container text-center">
    <h2>The Quiz Question will be here</h2>
    <?php
    {
        echo($row["Question"]."<br>");
    }
    ?>      
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-4">
      <p>Some text..</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4"> 
      <p>Some text..</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-1">
    </div>
</div><br>

   
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-4">
      <p>Some text..</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4"> 
      <p>Some text..</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-1">
    </div>
    
  </div>

  <div class="container">
  <div class="radio-tile-group">
    <div class="input-container">
      <input id="walk" class="radio-button" type="radio" name="radio" />
      <div class="radio-tile">
       
        <label for="walk" class="radio-tile-label">Walk</label>
      </div>
    </div>

    <div class="input-container">
      <input id="bike" class="radio-button" type="radio" name="radio" />
      <div class="radio-tile">
        
        <label for="bike" class="radio-tile-label">Bike</label>
      </div>
    </div>

    <div class="input-container">
      <input id="drive" class="radio-button" type="radio" name="radio" />
      <div class="radio-tile">
        
        <label for="drive" class="radio-tile-label">Drive</label>
      </div>
    </div>

    <div class="input-container">
      <input id="fly" class="radio-button" type="radio" name="radio" />
      <div class="radio-tile">
     
        <label for="fly" class="radio-tile-label">Fly</label>
      </div>
    </div>
  </div>
</div>
</form>

</body>
</html>