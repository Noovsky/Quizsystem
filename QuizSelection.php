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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<form action="quizzesS.php" method = "post">
<select name = "quizid">
<?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM QuizTable ORDER BY QuizName ASC");
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