<!DOCTYPE html>
<html>
<head>

    <title>Quiz Selection</title>

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
$stmt =$conn->prepare("SELECT * FROM QuizUserScore WHERE UserID=:loggedinuser ");
//S_SchoolID
$stmt->bindParam(":loggedinuser", $_SESSION["LoggedInUser"]);

$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo($row["QuizID"]."- score ".$row["Score"]." on ".$row["DateOfAttemt"]."<br>");
}
?>



</body>
</html>