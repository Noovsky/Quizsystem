<?php
include_once ("connection.php");
print_r($_POST);

array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM UsersTable WHERE Name =:username ;");
$stmt->bindParam(":username", $_POST["Name"]);
$stmt->execute();
//if no results from query, go back...

if ($stmt->rowCount() > 0) {
  
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    if($row["Password"]== $_POST["Pword"]){
        header("Location: QuizSelection.php");
        echo("yes");
    }else{
        header("Location: login.php");
        echo("no");
    }
}
}else{
    header("Location: login.php");
    echo("nope");
}
$conn=null;
?>