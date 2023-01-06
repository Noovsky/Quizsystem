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
    
    <title>Adminpage</title>
    
</head>
<body>

<form action="schools.php" method= "post">
    Click here to Add a new school
<input type="submit" value="Add new School">
</form>


</body>
</html>