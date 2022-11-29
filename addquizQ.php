<?php
try{
array_map("htmlspecialchars", $_POST);
//header("Location: quizzesQ.php");
print_r($_POST);
include_once("connection.php");
$quiz=1//$_session["quizcurrent"];<-- need to add a session variable to it
$stmt =$conn->prepare("INSERT INTO
QuizQuestions (