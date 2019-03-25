<?php

$hostname="localhost";
$user="root";
$password="";
$database="queuing";






$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$result0=mysqli_query($link, "SELECT COUNT(quenumber) as 'new2' FROM que where taposna=0;");
for($i=0; $i<$num_rows=mysqli_fetch_array($result0);$i++){
$f=$num_rows["new2"];

echo "$f clients waiting";
}

?>