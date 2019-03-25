<?php

session_start();

header('Location:ask3.html');
$name3=$_POST['name3'];
$num3=$_POST['num3'];
$amt3=$_POST['amount3'];
$name4=$_POST['name4'];
$num4=$_POST['num4'];
$amt4=$_POST['amount4'];
$queue=$_POST['queue'];

$_SESSION['name3']=$name3;
$_SESSION['num3']=$num3;
$_SESSION['amt3']=$amt3;
$_SESSION['name4']=$name4;
$_SESSION['num4']=$num4;
$_SESSION['amt4']=$amt4;

$hostname="localhost";
$user="root";
$password="";
$database="queuing";



$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
mysqli_query($link, "ALTER TABLE `senior` ADD `name3` VARCHAR(50) NOT NULL AFTER `contact`, ADD `accountnum3` INT(15) NOT NULL AFTER `name3`, ADD `amount3` VARCHAR(15) NOT NULL AFTER `accountnum3`, ADD `name4` VARCHAR(50) NOT NULL AFTER `amount3`, ADD `accountnum4` INT(15) NOT NULL AFTER `name4`, ADD `amount4` VARCHAR(15) NOT NULL AFTER `accountnum4`;");

mysqli_query($link, "UPDATE senior set name3='$name3', accountnum3='$num3', amount3='$amt3',name4='$name4', accountnum4='$num4', amount4='$amt4' where priority='SL$queue'");


//==========================================================================

?>
