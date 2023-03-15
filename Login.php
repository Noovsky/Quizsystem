<!DOCTYPE html>
<html>
<head>

    <title>Login</title>
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
        <form action="loginprocess.php" method= "POST">
        <div class="form-group">
            <label for="Name">User name:</label>
            <input type="text" class="form-control" id="name" name="Name">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="Pword" name="Pword">
        </div>
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

