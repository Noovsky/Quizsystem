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
    <br>
<div class="container text-center">
<h1>User Log In</h1>
<h2> To get further access to the site, please enter your Username and Password</h2>
</div>
<br><br>
<div class="container text-center">
    <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
            <form action="loginprocess.php" method= "POST">
            <div class="form-group">
                <label for="Name">Type in your Username:</label>
                <input type="text" class="form-control" placeholder="Enter Username" id="name" name="Name">
            </div>
            <div class="form-group">
                <label for="pwd">Type in your Password:</label>
                <input type="password" class="form-control" placeholder="Enter Password" id="Pword" name="Pword">
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
            <!-- User name:<input type="text" name="Name"><br>
            Password:<input type="password" name="Pword"><br>
                <input type="submit" value="Login"> -->
            </form>

    </div>
    <div class="col-sm-3"></div>
    </div>
</div>
</body>
</html>

