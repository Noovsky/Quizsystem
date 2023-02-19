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
    
    <title>Student Homepage</title>
    
</head>
<body>

<form action="QuizSelection.php" method= "post">
    Click here to Choose a quiz to complete.
<input type="submit" value="Choose quiz">
</form>
<form action="logout.php" method= "post">
    Click here to log out.
<input type="submit" value="Log out">

</form>
</body>
</html>