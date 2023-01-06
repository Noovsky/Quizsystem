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

    <title>New School Registartion</title>

</head>
<body>
<form action="addschools.php" method ="post">
    Type Name of School:<input type="text" name="SchoolName"><br>
    <input type="submit" value="Add New School">
</form>
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM SchoolTable");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["SchoolName"]."<br>");
}
?>
</body>
</html>