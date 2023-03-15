<!DOCTYPE html>
<html>
<head>

    <title>User Registration Page (Basic)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="LooksGood.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
        <form action="addusers.php" method = "post">
        <div class="form-group">
            <label for="Name"> Create Username:</label>
            <input type="text" class="form-control" name="Username">
        </div>
        <div class="form-group">
            <label for="pwd">Create Password:</label>
            <input type="password" class="form-control"  name="passwd">
        </div>
        <div class="form-group">
            <label for="pwd">Register Email: </label>
            <input type="text" class="form-control"  name="email">
        </div>

        Choose the school that you are related to.<br>
    <select name = "schoolid">
<?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM SchoolTable ORDER BY SchoolName ASC");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
        echo("<option value=".$row["SchoolID"].">".$row["SchoolName"]."</option>");
} 
?>
 
</select><br>
        <button type="submit" class="btn btn-default">Submit</button>
        <!-- User name:<input type="text" name="Name"><br>
        Password:<input type="password" name="Pword"><br>
            <input type="submit" value="Login"> -->
        </form>

  </div>
  <div class="col-sm-3"></div>
</div>
</body>
</html>