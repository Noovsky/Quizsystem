<!DOCTYPE html>
<html>
<head>
    
    <title>Welcome to Enigma Learning</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="LooksGood.css" type="text/css">
    <!-- CSS that is connected to this page, and allows the CSS code to work -->
</head>
<body>
 <br>
 <br>
 <div class="container text-center">
    <h1>Enigma Learning</h1>
    <!-- container at the top center of the page that explains the need for this specific page -->
</div>
<br>
    <div class="container text-center">
        
        <form action="Users.php" method= "post">
            <h2>Click here to Create an Account</h2>
            <!-- form that takes the user to the account creation page -->
        <br>
        <input type="submit" class="btn btn-danger" value="Create an Account">
        </form>
        <br>
        <form action="Login.php" method= "post">
            <!-- form that takes the user to the log in page -->
            <h2>Already a User? Click here to log in.</h2>
        <br>
        <input type="submit" class="btn btn-danger" value="Login">
        <br>

        </form>
  

    </div>
</body>
</html>