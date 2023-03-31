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
    <!-- css scripts used in this webpage -->
</head>
<body>
<br><br>
<div class="container text-center">
<h1>Total Quiz Results</h1>
<!-- top center container used for the weboage description -->
</div>
<br><br>
<div class="container text-center lessopaque">
    <!-- creates a less than regular opaque container in the center of the webpage-->
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
        <!-- this part takes up 2/3 horizontal parts of the page -->
        <?php
            echo ("<h2>User ".$_SESSION["LoggedInName"]."'s Quiz Scores</h2>");  
            // shows the name if the user 
        ?>
    </div>
    <div class="col-sm-4">
        <form action="homepage_S.php" method= "post">
            <!-- the form would take the user to the homepage upon completion -->
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Return To Homepage"><br>
            </div>
        </form>
    </div>
</div>
          
  <table class="table table-condensed">
      <!-- makes a table -->
    <thead>
      <tr>
        <th>Test</th>
        <th>Score</th>
        <th>Date</th>
        <!-- 3 table parameters -->
      </tr>
    </thead>
    <tbody>
    <?php
    include_once("connection.php");
    $stmt =$conn->prepare("SELECT Score, DateOfAttemt,QuizUserScore.QuizID as QID, userstable.Name 
    as UN ,quiztable.NumberOfQ as QMAX, quiztable.QuizName as QN FROM QuizUserScore  
    INNER JOIN userstable ON QuizUserScore.UserID = userstable.UserID 
    INNER JOIN quiztable ON QuizUserScore.QuizID = quiztable.QuizID
    WHERE QuizUserScore.UserID=:loggedinuser ");
    //selects the quiz scores, the date of attempt, the quiz id, the question id and the number of questions in the quiz 
    //from the Userstable, the quiztable and the QuizUserScoreTable
    $stmt->bindParam(":loggedinuser", $_SESSION["LoggedInUser"]);

    $stmt->execute();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo("<tr>");
        echo("<td class='text-left'>".$row["QN"]."</td>");
        echo("<td class='text-left'>".$row["Score"]."/".$row['QMAX']."</td>");
        echo("<td class='text-left'>".$row["DateOfAttemt"]."</td>");
        echo("</tr>");
        // displays the data in the table
        // the question number
        // the score and what it was out of
        // the date of attempt of the quiz
       
    }
    ?>
    </tbody>
  </table>


</div>
</body>
</html>