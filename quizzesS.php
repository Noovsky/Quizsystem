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
    echo("<input type='radio' id=".$row["Question"]." name=".$row["Question"]." value=1>".$row["Answer1"]."<br>");
    echo("<input type='radio' id=".$row["Question"]." name=".$row["Question"]." value=2>".$row["Answer2"]."<br>");
    echo("<input type='radio' id=".$row["Question"]." name=".$row["Question"]." value=3>".$row["Answer3"]."<br>");
    echo("<input type='radio' id=".$row["Question"]." name=".$row["Question"]." value=4>".$row["Answer4"]."<br>");
    
    
    
}
?>
<input type="submit" value="NEXT">
</form>

</body>
</html>