<?php

$hostname="localhost";
$user="root";
$password="";
$database="queuing";

$yesterday='';
date_default_timezone_set("Asia/Hong_Kong");
$today=date("Y-m-d");

$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$result=mysqli_query($link, "SELECT dtime FROM que where quenumber=1");

for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){

$yesterday=$num_rows["dtime"];

}


if($yesterday<$today){
mysqli_query($link, "UPDATE display SET quenumber=''");
mysqli_query($link, "TRUNCATE table que;");
mysqli_query($link, "TRUNCATE table senior;");
mysqli_query($link, "UPDATE accounts set stat='offline';");
}

?>

<html>
<head>
    <title>BLCI Queueing System</title>
    <meta charset="utf-8"/>
        <meta type="viewport" content="width=device=width, initial-scale=1.0">
       
        <style type="text/css">
        	body{
        		margin: 0%;
        	}
        </style>
</head>
<body>

   
        <a href="ask.html" ><img src="img/1.jpg" style="width: 100%;height: 100%;"></a>
  
   
    
</body>
</html>