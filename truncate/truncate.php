<?php

header('Location:success.html');
$hostname="localhost";
$user="root";
$password="";
$database="queuing";





$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
mysqli_query($link, "TRUNCATE table display;");
mysqli_query($link, "TRUNCATE table que;");
mysqli_query($link, "TRUNCATE table senior;");
?>


