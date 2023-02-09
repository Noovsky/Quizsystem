<?php
session_start(); 
if (!isset($_SESSION['LoggedInName']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
print_r($_POST['quizid']);
?>
<!DOCTYPE html>
<html>
<head>

    <title>Solving the Quiz</title>

</head>
<body>
<form action="" method ="post">
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
    echo( "Choose answer 1 ".$row["Answer1"]."<input type='submit' value='Answer1'><br>");
    echo( "Choose answer 2 ".$row["Answer2"]."<input type='submit' value='Answer2'><br>");
    echo( "Choose answer 3 ".$row["Answer3"]."<input type='submit' value='Answer3'><br>");
    echo( "Choose answer 4 ".$row["Answer4"]."<input type='submit' value='Answer4'><br>");
    echo($row["AnswerCorrect"]."<br>");


}
?>
<input type="submit" value="NEXT">
</form>

</body>
</html>