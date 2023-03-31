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
    <!-- CSS scripts used on this page to make it look pretty -->
</head>
<body>
    <br>
<div class="container text-center">
<h1>User Log In</h1>
<h2> To get further access to the site, please enter your Username and Password</h2>
<!-- The top center container that holds infromation that explains the basic need for this webpage -->
</div>
<br><br>
<div class="container text-center">
    <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
            <form action="loginprocess.php" method= "POST">
                <!-- this form allows the user to enter their log in, uses POST method -->
                <!-- upon entry of correct username and password, will take the user to the loginprocess.php page -->
            <div class="form-group">
                <!-- allows the user to enter their username used for log in -->
                <label for="Name">Type in your Username:</label>
                <input type="text" class="form-control" placeholder="Enter Username" id="name" name="Name">
            </div>
            <div class="form-group">
                <label for="pwd">Type in your Password:</label>
                <!-- allows the user to enter their password that is used for log in -->
                <input type="password" class="form-control" placeholder="Enter Password" id="Pword" name="Pword">
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
            <!-- button that submits the data and completes the form -->
            
            </form>

    </div>
    <div class="col-sm-3"></div>
    </div>
</div>
</body>
</html>

