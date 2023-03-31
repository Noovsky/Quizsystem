<?php
session_start();
include_once ("connection.php");
print_r($_POST);

array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM UsersTable WHERE Name =:username ;");
// Selects all the data from the UsersTable and allows this data to be used on this web page
$stmt->bindParam(":username", $_POST["Name"]);// pulls the usernames from the table
$stmt->execute();
//if no results from query, go back...

if ($stmt->rowCount() > 0) {
  // if at least 1 row returned from the database
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $hashed = $row["Password"];
    $attempt = $_POST["Pword"];
    // creates two variables
    if(password_verify($attempt,$hashed)){// checks the hash of the password entered by the user to the hash in the database
        $_SESSION["LoggedInUser"]=$row["UserID"];
        $_SESSION["LoggedInName"]=$row["Name"];
        $_SESSION["T_or_S_role"]=$row["TeacherOrStudent"];
        $_SESSION["SchoolID"]=$row["SchoolID"];
        //
        print_r($_SESSION);
        if ($_SESSION["T_or_S_role"]==0){
            header("Location: homepage_S.php");
        }
        // else if ($_SESSION["T_or_S_role"]==1){
        //     header("Location: homepage_T.php");
        // }

    }else{
        header('Location: login.php');
        //this means that the user entered the username that is present in the database files
        // but the hash of the password entered does not match the hash in the database respective to the correct username
    }
}
}
else{
    header("Location: login.php");
    //this means that the user entered the wrong username
}
$conn=null;
?>