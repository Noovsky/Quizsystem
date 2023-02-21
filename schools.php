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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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