<!DOCTYPE html>
<html>
<head>

    <title>Make the Questions for your quiz here.</title>

</head>
<body>
<form action="addquizQ.php" method ="post">
    Type the Question(1000 Characters Max, Spaces Included):<br>
    <textarea id="Question" name="QQ" rows="6" cols="50"></textarea><br>
    Type Answer 1(100 Characters Max, Spaces Included):<br>
    <textarea id="Answer1" name="A1" rows="6" cols="50"></textarea><br>
    Type Answer 2(100 Characters Max, Spaces Included):<br>
    <textarea id="Answer2" name="A2" rows="6" cols="50"></textarea><br>
    Type Answer 3(100 Characters Max, Spaces Included):<br>
    <textarea id="Answer3" name="A3" rows="6" cols="50"></textarea><br>
    Type Answer 4(100 Characters Max, Spaces Included):<br>
    <textarea id="Answer4" name="A4" rows="6" cols="50"></textarea><br>
    Type the number for the correct answer:(1,2,3 or 4)<br>
    <input id="CorrectAns" name="CA"><br>

    <input type="submit" value="Submit the Question">
</form>
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM QuizQuestions");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["QQ"]."<br>");
}
?>
</body>
</html>