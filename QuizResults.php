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
    <!-- CSS scripts used on this webpage -->
    
</head>
<body>
<br><br>
<div class="container text-center">
    <h1>Your Results</h1>
    <?php
    session_start();
    echo("<h2>Name of Quiz - ".$_SESSION["NameOfQuiz"]."</h2><br>");
    // shows the name of the quiz in the top center container
?>
</div>
<br><br>
<div class="container text-center">
<table class="table table-condensed">
    <!-- creates a table -->
    <thead>
      <tr>
        <th>Question</th>
        <th>Correct/Wrong</th>
        <th>Correct Answer</th>
        <!-- these are the 3 table parameters -->
      </tr>
    </thead>
        <tbody>
            <?php
            

            $score=0;
            $outof=0;
            include_once("connection.php");
            $stmt =$conn->prepare("SELECT * FROM QuizQuestions WHERE QuizID= :quid");
            //selects all data from QuizQuestions where the quiz id matches the current quiz id
            $stmt->bindParam(":quid", $_SESSION["CurrentQuiz"]); 
            $stmt->execute();
            
            try{
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                
                echo("<tr>");
                echo("<td class='text-left'>".$row["Question"]."</td>");
                //pushes the text to the left part of that table section
                //outputs the quiz question in the table
                $outof=$outof+1;
                //a variable is created which shows how many answers can the user get correct
                
                if ($_POST[$row["QuestionID"]]==$row["AnswerCorrect"]){
                    echo("<td class='text-left'>Correct</td>");
                    //prints out correct in the table, if the questions is answered correctly
                    // the text is pushed to the left of that table pillar
                    $score=$score+1;
                    //increases the total score, if the answer is answered correctly
                    
                }else{
                    echo("<td class='text-left'>Wrong</td>");
                    //prints out wrong in the table if the question is answered wrong
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
                //prints out the correct answer depending on which of the 4 is the correct answer
            }
        echo("</tbody>");
echo("</table>");
    
            echo "You got ".$score ." out of ".$outof." questions correct"."<br>";
            //tells the user, how many questions did he/she get correct out of the total questions in the quiz
            $stmt = $conn->prepare("INSERT INTO QuizUserScore (QuizID,UserID,Score,DateOfAttemt)
            VALUES (:qid,:user,:score,:datemade)");
            //inserts the data received into the QuizUserScore table in the database
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
       <!--takes the user to Quiz Selection to solve another quiz  -->
    <input type="submit" class="btn btn-danger" value="Solve another quiz"><br><br>
    </form>
    <form action="homepage_S.php"  method= "post">
        <!-- takes the user to the homepage -->
    <input type="submit" class="btn btn-danger" value="Return to Homepage"><br>
    </form>
</div>

</body>
</html>