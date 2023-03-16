<?php
session_start();
if(isset($_SESSION['LoggedInName']))
{
    unset($_SESSION['LoggedInName']);
}
header("Location: index1.php");
?>