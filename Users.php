<!DOCTYPE html>
<html>
<head>

    <title>User Registration Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="LooksGood.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- css scripts used on this webpage -->

</head>
<body>
    <br>
    <br>
<div class="container text-center">
    <h1>Account Creation</h1>
    <!-- the top center contaner, containing the describtion of this page -->
</div>
<br>
    <div class="container text-center">
        
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
        <form action="addusers.php" method = "post">
            <!-- takes the user to addusers.php upon completion -->
        <div class="form-group">
            <label for="Name"> Create Username:</label>
            <input type="text" class="form-control" name="Username">
            <!-- allows the user to create a username -->
        </div>
        <div class="form-group">
            <label for="pwd">Create Password:</label>
            <input type="password" class="form-control"  name="passwd">
            <!-- allows the user to create a password -->
        </div>
        <div class="form-group">
            <label for="pwd">Register Email: </label>
            <input type="text" class="form-control"  name="email">
            <!-- allows the user to register their email -->
        </div>

        Choose the school that you are related to.<br>
    <select class="form-control" name = "schoolid">
        <!-- allows the user to select the school that they are affiliated to -->
        <!-- the user can only select out of the schools that are already in the database -->
<?php
include_once("connection.php");
$stmt =$conn->prepare("SELECT * FROM SchoolTable ORDER BY SchoolName ASC");
// selects all from the scooltable and orders them by the names of the schools in alphabetical order
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
        echo("<option value=".$row["SchoolID"].">".$row["SchoolName"]."</option>");
} 
?>
 
</select><br>
        <button type="submit" class="btn btn-danger">Submit</button>
        <!-- submits the user results -->
        </form>

  </div>
  <div class="col-sm-3"></div>
</div>
</div>
</body>
</html>