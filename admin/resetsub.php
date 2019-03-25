<?php
session_start();
if(!$_SESSION["username"]){
    //Do not show protected data, redirect to login...
    header("Location: ../index.php");
}

$userid=$_SESSION["username"];
$_SESSION["id"] = $userid;
$usernid=$_SESSION["uid"];

$hostname="localhost";
$user="root";
$password="";
$database="queuing";

$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$cnewpass=$_POST['cnewpass'];
$password_hash = password_hash($cnewpass, PASSWORD_BCRYPT);


$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$result=mysqli_query($link, "SELECT pass from accounts where userid='$usernid';");


$pass='';
for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){
  $pass=$num_rows["pass"];
}

if(password_verify($oldpass, $pass)){
mysqli_query($link, "UPDATE accounts SET pass='$password_hash' where userid='$usernid';");

header('Location:passchange.php');
}
else{
header('Location:passchangef.php');
}


?>