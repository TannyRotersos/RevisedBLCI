<?php
session_start();
if(!$_SESSION["username"]){
    //Do not show protected data, redirect to login...
    header("Location: ../index.php");
}

$userid=$_SESSION["username"];
$_SESSION["id"] = $userid;


$userid=$_POST['username'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$address=$_POST['add'];
$contact=$_POST['cnum'];
$old=$_POST['idnew'];

$hostname="localhost";
$user="root";
$password="";
$database="queuing";

$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");

mysqli_query($link, "UPDATE accounts SET userid='$userid',fname='$fname',lname='$lname',age=$age,address='$address',contact=$contact where userid='$old';");


header('Location:success.php');



?>