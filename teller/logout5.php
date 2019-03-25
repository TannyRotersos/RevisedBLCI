<?php
session_start();

$userid=$_SESSION["id"];

$hostname="localhost";
$user="root";
$password="";
$database="queuing";

$_SESSION['user']=$userid;
$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
mysqli_query($link, "UPDATE accounts set stat='offline' where userid='$userid' and accountype='admin';");
mysqli_query($link, "UPDATE accountreg set stat='offline', userid='' where teller=7");


session_destroy();
header("Location: ../index.php");




?>