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

    <title>Quiz Selection</title>

</head>
<body>
<form action="quizzesS.php" method = "post">
<select name = "quizid">
<?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM QuizTable WHERE PrivatePublic = 1 ORDER BY QuizName ASC");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo("<option value=".$row["QuizID"].">".$row["QuizName"]."</option>");
}
?>
</select>
<input type="submit" value="choose quiz">
</form>
</body>
</html>