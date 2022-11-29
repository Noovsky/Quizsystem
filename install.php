<?php 
include_once("connection.php" ); 
$stmt = $conn->prepare("DROP TABLE IF EXISTS QuizTab1e; 
CREATE TABLE QuizTable 
(QuizID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
QuizName VARCHAR(20) NOT NULL, 
UserID VARCHAR(20) NOT NULL, 
PrivatePublic INT(1), 
NumberOfQ INT(3) NOT NULL, 
DateCreated date, 
Visitors INT(5), 
QuizTopic VARCHAR(20))"); 
$stmt->execute(); 
$stmt->closeCursor(); 
echo("QuizTab1e");

$stmt = $conn->prepare("DROP TABLE IF EXISTS QuizQuestions; 
CREATE TABLE QuizQuestions 
(QuestionID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
QuizID INT(8) NOT NULL, 
Question VARCHAR(1000) NOT NULL, 
Answerl VARCHAR(100) NOT NULL, 
Answer2 VARCHAR(100) NOT NULL, 
Answer3 VARCHAR(100) NOT NULL, 
Answer4 VARCHAR(100) NOT NULL, 
Answercorrect VARCHAR(100) NOT NULL)"); 
$stmt->execute(); 
$stmt->closeCursor(); 
echo("QuizQuestions");

$stmt = $conn->prepare("DROP TABLE IF EXISTS UsersTable; 
CREATE TABLE UsersTable 
(UserID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Name VARCHAR(20) NOT NULL, 
TeacherOrStudent BOOLEAN, 
Email VARCHAR(20) NOT NULL, 
Password VARCHAR(20) NOT NULL, 
LoggedIn BOOLEAN, 
SchoolID INT(5) NOT NULL)"); 
$stmt->execute(); 
$stmt->closeCursor();

$stmt = $conn->prepare ("DROP TABLE IF EXISTS SchoolTable; 
CREATE TABLE SchoolTable 
(SchoolID INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
SchoolName VARCHAR(20))"); 
$stmt-execute(); 
$stmt-closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS GroupTable;
CREATE TABLE GroupTable
(GroupID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
GroupID INT(6))");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS UserInGroup;
CREATE TABLE UserInGroup
(UserID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
GroupID INT(6))");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS QuizInGroup;
CREATE TABLE QuizInGroup
(QuizID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
GroupID INT(6),
DateAdded date)");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS QuizUserScore;
CREATE TABLE QuizUserScore
(QuizID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
UserID INT(7) NOT NULL,
Score INT(3) NOT NULL,
DateOfAttempt date)");
$stmt->execute();
$stmt->closeCursor();
?>