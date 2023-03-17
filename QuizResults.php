<!DOCTYPE html>
<html>
<head>

    <title>Scores for the Quiz</title>
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
    <h1>Your Results</h1>
    <?php
    session_start();
    echo("<h2>Name of Quiz - ".$_SESSION["NameOfQuiz"]."</h2><br>");
?>
</div>
<br><br>
<div class="container text-center">
<table class="table table-condensed">
    <thead>
      <tr>
        <th>Question</th>
        <th>Correct/Wrong</th>
        <th>Correct Answer</th>
      </tr>
    </thead>
        <tbody>
            <?php
            
            #  print_r($_POST);
            #echo("<br><br>");
            # print_r($_SESSION);
            #echo $_SESSION["CurrentQuiz"]."<br>";
            //echo $_SESSION["LoggedInUser"]."<br><br>";
            $score=0;
            $outof=0;
            include_once("connection.php");
            $stmt =$conn->prepare("SELECT * FROM QuizQuestions WHERE QuizID= :quid");
            $stmt->bindParam(":quid", $_SESSION["CurrentQuiz"]); 
            $stmt->execute();
            
            try{
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                
                echo("<tr>");
                echo("<td class='text-left'>".$row["Question"]."</td>");
                $outof=$outof+1;
                
                if ($_POST[$row["QuestionID"]]==$row["AnswerCorrect"]){
                    echo("<td class='text-left'>Correct</td>");
                    $score=$score+1;
                }else{
                    echo("<td class='text-left'>Wrong</td>");
                }
                if ($row["AnswerCorrect"]==1){
                    echo("<td class='text-left'>".$row["Answer1"]."</td>");
                }elseif($row["AnswerCorrect"]==2){
                    echo("<td class='text-left'>".$row["Answer2"]."</td>");
                }elseif($row["AnswerCorrect"]==3){
                    echo("<td class='text-left'>".$row["Answer3"]."</td>");
                }elseif($row["AnswerCorrect"]==4){
                    echo("<td class='text-left'>".$row["Answer4"]."</td>");
                }  
            }
        echo("</tbody>");
echo("</table>");
    
            echo "You got ".$score ." out of ".$outof." questions correct"."<br>";
            $stmt = $conn->prepare("INSERT INTO QuizUserScore (QuizID,UserID,Score,DateOfAttemt)
            VALUES (:qid,:user,:score,:datemade)");
            $currentDate = date("Y-m-d");


            echo($currentDate);

            $stmt->bindParam(":qid", $_SESSION["CurrentQuiz"]);
            $stmt->bindParam(":user", $_SESSION["LoggedInUser"]);
            $stmt->bindParam(":score",$score);
            $stmt->bindParam(":datemade", $currentDate);
            $stmt->execute();
            }
            catch(PDOException $e)
            {
                echo "error".$e->getMessage();
            }

            $conn=null;
            ?>
        
    <br><br>
    <form action="QuizSelection.php" method= "post">   
    <input type="submit" class="btn btn-danger" value="Solve another quiz"><br><br>
    </form>
    <form action="homepage_S.php"  method= "post">
    <input type="submit" class="btn btn-danger" value="Return to Homepage"><br>
    </form>
</div>

</body>
</html>