<?php
error_reporting(0);
ini_set('display_errors', 0);
$hostname="localhost";
$user="root";
$password="";
$database="queuing";

$a=$c='';





$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$result2=mysqli_query($link, "SELECT * FROM display where teller=4");

for($i=0; $i<$num_rows=mysqli_fetch_array($result2);$i++){
$c=$num_rows["quenumber"];
$a=$num_rows["done"];
}

if($c==null){
	echo "--";
}
else{
	echo "$c";

}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript">
	var sound="<?php echo "$a";?>";

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
mysqli_query($link, "UPDATE display SET done=1 where teller=4");

?> 
    }

</script>
<audio id="audio" src="1.mp3" ></audio>

</body>
</html>

  