<!DOCTYPE html>
<html>
<head>

    <title>Quiz Results of the User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="LooksGood.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start(); 
if (!isset($_SESSION['LoggedInName']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}

?>


<?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT Score, DateOfAttemt,QuizUserScore.QuizID as QID, userstable.Name as UN ,quiztable.NumberOfQ as QMAX, quiztable.QuizName as QN FROM QuizUserScore  
INNER JOIN userstable ON QuizUserScore.UserID = userstable.UserID 
INNER JOIN quiztable ON QuizUserScore.QuizID = quiztable.QuizID
WHERE QuizUserScore.UserID=:loggedinuser ");
//S_SchoolID
$stmt->bindParam(":loggedinuser", $_SESSION["LoggedInUser"]);

$stmt->execute();
echo ($_SESSION["LoggedInName"]."'s scores are");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    
    echo("<p class='text-danger'>".$row["QN"]."- score ".$row["Score"]."/".$row['QMAX']." on ".$row["DateOfAttemt"]."</p>");
}
?>



</body>
</html>