<?php 
include 'db.php';
include 'sessions.php';
session_start();
if(strcmp($_SESSION["type"],"faculty")==0)
	include 'faculty.php';
else
	include 'student.php';
?>