<!DOCTYPE html>
<html>
<head>

    <title>Quiz results</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
print_r($_POST);
echo $_SESSION["CurrentQuiz"]."<br>";
$score=0;
$outof=0;
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM QuizQuestions WHERE QuizID= :quid");
$stmt->bindParam(":quid", $_SESSION["CurrentQuiz"]); 
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo("This is a ".$row["Question"]."<br>"."<br>");
    $outof=$outof+1;
    echo($row["AnswerCorrect"]."<br>");
    if ($_POST[$row["Question"]]==$row["AnswerCorrect"]){
        echo "Correct <br>";
        $score=$score+1;
    }else{
        echo("Wrong <br>");
    }
    
    

}

echo "You got ".$score ." out of ".$outof." questions correct"."<br>";

?>
</body>
</html>