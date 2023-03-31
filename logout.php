<?php
session_start();
if(isset($_SESSION['LoggedInName']))// if the session variable resposible for holding the data for the user being logged in
// has anything in it
{
    unset($_SESSION['LoggedInName']);// erase all data from the session variable 
}
header("Location: index1.php");// take the user to the index page
?>