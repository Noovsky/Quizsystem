<!DOCTYPE html>
<html>
<head>

    <title>Creating New Quiz</title>

</head>
<body>
<form action="QuizCreation.php" method ="post">
    Type Name of the Quiz(20 Characters Max, Spaces Included): <input type="text" name="QuizName"><br>
    How many questions will there be in your quiz(You have to make the questions by yourself)
    <input type="text" name="NumberOfQuestions"><br>
    <input type="radio" name="role" value="Private" checked> Select if you want the quiz to be Private<br>
    <input type="radio" name="role" value="Public"> Select if you want the quiz to be Public<br>
    Create Password(Only if the Quiz is private, leave blank if Quiz is public)
    <input type="password" name="passwd"><br>
    <input type="submit" value="Create Quiz">
</form>
<?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM QuizTable");
$stmt->execute();
while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
{
    echo($row["QuizName"]."<br>");
}
?>
</body>
</html>
