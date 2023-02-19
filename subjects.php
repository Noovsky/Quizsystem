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

    <title>Subject Creation</title>

</head>
<body>
<form action="addsubjects.php" method ="post">
    Type Name of New Subject:<input type="text" name="SchoolSubject"><br>
    <input type="submit" value="Add New Subject">
</form>
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM SchoolSubjects");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["SchoolSubject"]."<br>");
}
?>
</body>
</html>