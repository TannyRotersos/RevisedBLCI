<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);
$hostname="localhost";
$user="root";
$password="";
$database="queuing";


$a=$b="";


$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$result=mysqli_query($link, "SELECT * FROM display where teller=1");

for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){
$a=$num_rows["quenumber"];
$b=$num_rows["done"];}

if($a==null){
	echo "--";
}
else{
	echo "$a";

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript">
	var sound="<?php echo "$b";?>";

function play(){
       var val = document.getElementById("audio");
       val.play();
                 }
    if(sound==0){
    	play();
    	<?php

$hostname="localhost";
$user="root";
$password="";
$database="queuing";


$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
mysqli_query($link, "UPDATE display SET done=1 where teller=1");

?> 
    }

</script>
<audio id="audio" src="1.mp3" ></audio>

</body>
</html>

  