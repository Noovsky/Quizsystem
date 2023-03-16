<!DOCTYPE html>
<html>
<head>

    <title>Quiz Results of the User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="LooksGood.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container text-center">
<h1>Total Quiz Results</h1>
</div>
<br><br>
<div class="container text-center lessopaque">
    <?php
    session_start(); 
    if (!isset($_SESSION['LoggedInName']))
    {   
        $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
        header("Location:login.php");
    }

    ?>
<div class="row">
    <div class="col-sm-8">
        <?php
            echo ("<h2>User ".$_SESSION["LoggedInName"]."'s Quiz Scores</h2>");   
        ?>
    </div>
    <div class="col-sm-4">
        <form action="homepage_S.php" method= "post">
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Return To Homepage"><br>
            </div>
        </form>
    </div>
</div>
          
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Test</th>
        <th>Score</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include_once("connection.php");
    $stmt =$conn->prepare("SELECT Score, DateOfAttemt,QuizUserScore.QuizID as QID, userstable.Name as UN ,quiztable.NumberOfQ as QMAX, quiztable.QuizName as QN FROM QuizUserScore  
    INNER JOIN userstable ON QuizUserScore.UserID = userstable.UserID 
    INNER JOIN quiztable ON QuizUserScore.QuizID = quiztable.QuizID
    WHERE QuizUserScore.UserID=:loggedinuser ");
    //S_SchoolID
    $stmt->bindParam(":loggedinuser", $_SESSION["LoggedInUser"]);

    $stmt->execute();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo("<tr>");
        echo("<td class='text-left'>".$row["QN"]."</td>");
        echo("<td class='text-left'>".$row["Score"]."/".$row['QMAX']."</td>");
        echo("<td class='text-left'>".$row["DateOfAttemt"]."</td>");
        echo("</tr>");
       
    }
    ?>
    </tbody>
  </table>


</div>
</body>
</html>