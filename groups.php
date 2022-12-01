<!DOCTYPE html>
<html>
<head>

    <title>Creating New Group</title>
</head>
<body>
<form action="addgroup.php" method="post">
    Type name of the Group<input type="text" name="GroupName"><br>
    <input type="radio" name="role" value="Private" checked> Select if you want the group to be Private<br>
    <input type="radio" name="role" value="Public" > Select if you want the group to be Public<br>
    Create Access code(Only if Group is private,leave blank if the Group is public)
    <input type="password" name="PriavteCode">
    <input type="submit" value="Create Quiz">
</form>
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM GroupTable");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["GroupName"]."<br>");
}
?>
</body>
</html>