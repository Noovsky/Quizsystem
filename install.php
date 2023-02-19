<?php
include_once("connection.php");
$stmt =$conn->prepare("DROP TABLE IF EXISTS QuizTable;
CREATE TABLE QuizTable
(QuizID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
QuizName VARCHAR(20) NOT NULL,
UserID VARCHAR(20) NOT NULL,
NumberOfQ INT(3) NOT NULL,
DateCreated date,
Visitors INT(5),
SubjectID INT(3))");
$stmt->execute();
$stmt->closeCursor();
echo("QuizTable");

$stmt =$conn->prepare("DROP TABLE IF EXISTS QuizQuestions;
CREATE TABLE QuizQuestions
(QuestionID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
QuizID INT(8) NOT NULL,
Question VARCHAR(1000),
Answer1 VARCHAR(100) NOT NULL,
Answer2 VARCHAR(100) NOT NULL,
Answer3 VARCHAR(100) NOT NULL,
Answer4 VARCHAR(100) NOT NULL,
AnswerCorrect VARCHAR(100) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();
echo("QuizQuestions");

$stmt =$conn->prepare("DROP TABLE IF EXISTS UsersTable;
CREATE TABLE UsersTable
(UserID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(20) NOT NULL,
TeacherOrStudent BOOLEAN,
Email VARCHAR(20) NOT NULL,
Password VARCHAR(200) NOT NULL,
LoggedIN BOOLEAN,
SchoolID INT(5))");
$stmt->execute();
$stmt->closeCursor();

$stmt =$conn->prepare("DROP TABLE IF EXISTS SchoolTable;
CREATE TABLE SchoolTable
(SchoolID INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
SchoolName VARCHAR(20))");
$stmt->execute();
$stmt->closeCursor();

$stmt =$conn->prepare("DROP TABLE IF EXISTS GroupTable;
CREATE TABLE GroupTable
(GroupID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(20) NOT NULL,
UserID INT(7) NOT NULL,
SchoolID INT(5),
SchoolName VARCHAR(20))");
$stmt->execute();
$stmt->closeCursor();

$stmt =$conn->prepare("DROP TABLE IF EXISTS UserInGroup;
CREATE TABLE UserInGroup
(UserID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
GroupID INT(6))");
$stmt->execute();
$stmt->closeCursor();

$stmt =$conn->prepare("DROP TABLE IF EXISTS QuizInGroup;
CREATE TABLE QuizInGroup
(QuizID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
GroupID INT(6),
DateAdded date)");
$stmt->execute();
$stmt->closeCursor();

$stmt =$conn->prepare("DROP TABLE IF EXISTS QuizUserScore;
CREATE TABLE QuizUserScore
(AttemptID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
QuizID INT(8) NOT NULL,
UserID INT(7) NOT NULL,
Score INT (3) NOT NULL,
DateOfAttemt date)");
$stmt->execute();
$stmt->closeCursor();

$stmt =$conn->prepare("DROP TABLE IF EXISTS SchoolSubjects;
CREATE TABLE SchoolSubjects
(SubjectID INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
SchoolSubject VARCHAR(20))");
$stmt->execute();
$stmt->closeCursor();
?>