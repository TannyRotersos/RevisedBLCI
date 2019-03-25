<?php

session_start();

header('Location:ask2.html');

$name=$_POST['name'];
$num=$_POST['num'];
$amt=$_POST['amount'];
$name2=$_POST['name2'];
$num2=$_POST['num2'];
$amt2=$_POST['amount2'];

$q='';


$_SESSION['name1']=$name;
$_SESSION['num1']=$num;
$_SESSION['amt1']=$amt;
$_SESSION['name2']=$name2;
$_SESSION['num2']=$num2;
$_SESSION['amt2']=$amt2;

//dump

$_SESSION['name3']='';
$_SESSION['num3']='';
$_SESSION['amt3']='';
$_SESSION['name4']='';
$_SESSION['num4']='';
$_SESSION['amt4']='';

$hostname="localhost";
$user="root";
$password="";
$database="queuing";




$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$result=mysqli_query($link, "INSERT INTO senior(name, accountnum, amount,name2, accountnum2, amount2, taposna) VALUES ('$name', '$num', '$amt','$name2', '$num2', '$amt2',0)");


//==========================scanning for the last number===================




$result=mysqli_query($link, "SELECT MAX(quenumber) as 'new' FROM senior where taposna=0;");
for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){
$q=$num_rows["new"];
}
$q_padded = sprintf("%02d", $q);
mysqli_query($link, "UPDATE senior SET priority='SL$q_padded' where quenumber=$q");
$_SESSION['qn']=$q_padded;

//==========================================================================

?>
