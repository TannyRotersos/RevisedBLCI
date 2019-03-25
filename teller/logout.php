<?php
session_start();

$tellerid=$_SESSION["tellerid"];
$tellername=$_SESSION["user"];

$_SESSION["user"]=$tellername;
$hostname="localhost";
$user="root";
$password="";
$database="queuing";
  

$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
mysqli_query($link, "UPDATE accounts set stat='offline' where userid='$tellername';");
mysqli_query($link, "UPDATE display set quenumber='' where teller=$tellerid");
mysqli_query($link, "UPDATE accountreg set stat='offline', userid='' where teller=$tellerid");

$myfile = fopen("../tests/teller"."$tellerid".".txt", "w") or die("Unable to open file!");

  $txt = "--";

fwrite($myfile, $txt);



session_destroy();
header("Location: ../index.php");




?>