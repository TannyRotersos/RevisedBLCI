<?php
$hostname="localhost";
$user="root";
$password="";
$database="queuing";



$err=$valid='';
$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");

//==========================================================================
/*echo 'Current script owner: ' . get_current_user();*/

/*$username = getenv('USERNAME') ?: getenv('USER');
echo "\n\n\n$username"; // e.g. root or www-data*/
//Hard Disk Drive Unique Serial Number 
function GetVolumeLabel($drive) {
if (preg_match('#Volume Serial Number is (.*)\n#i', shell_exec('dir '.$drive.':'), $m)) {
$volname = ' ('.$m[1].')';
} else {
$volname = '';
}
return $volname;
}
$serial = trim(str_replace("(","",str_replace(")","",GetVolumeLabel("c"))));


if ($_SERVER["REQUEST_METHOD"] == "POST") {

$teller=$_POST['teller'];

$result=mysqli_query($link, "SELECT * from tellereg where serialnum='$serial'");
for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){
$num=$num_rows["num"];
$serialnumber=$num_rows["serialnum"];
$idnumber=$num_rows["id"];

if($serial==$serialnumber){
    $valid="false";
}
else{
    $valid="true";
}
}

if($valid=='false'){
    $err="This serial number is already registered in Teller $idnumber";
}
else{
mysqli_query($link, "UPDATE tellereg set serialnum='$serial' where id=$teller;");
    $err="Success!";
}


}
//========================================================================
?>


<html>
<head>
    <title>Computer Register</title>
</head>
<body>
<form method="POST" acction="<?php $_SERVER["PHP_SELF"];?>">
Computer Serial Number: <?php echo "$serial"; ?><br>
Register Serial Number for: <select name="teller">
    <option value="1">Teller 1</option>
    <option value="2">Teller 2</option>
    <option value="3">Teller 3</option>
    <option value="4">Teller 4</option>
</select>
<br><br>
<button>SUBMIT</button>

<div style="color:#9D1A0A;font-size:26px;"><?php echo $err;?></div>
</form>
</body>
</html>