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

<form action="CreateQuiz.php" method= "post">
    Click here to Make a Quiz.
<input type="submit" value="Create quiz">
</form>
<form action="logout.php" method= "post">
    Click here to log out.
<input type="submit" value="Log out">

</form>
</body>
</html>