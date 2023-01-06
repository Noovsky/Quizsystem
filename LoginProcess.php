<?php
session_start();
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
    $hashed = $row["Password"];
    $attempt = $_POST["Pword"];
    if(password_verify($attempt,$hashed)){
        $_SESSION["LoggedInUser"]=$row["UserID"];
        $_SESSION["LoggedInName"]=$row["Name"];
        if (!isset($_SESSION['backURL'])){
            $backURL= "users.php"; //Sets a default destination if no BackURL set (parent dir)
        }else{
            $backURL=$_SESSION['backURL'];
        }#
        echo $backURL;
        unset($_SESSION['backURL']);
        header('Location: ' . $backURL);
        echo("yes");
    }else{
        header('Location: login.php');
        echo("no");
    }
}
}else{
    header("Location: login.php");
    echo("nope");
}
$conn=null;
?>
