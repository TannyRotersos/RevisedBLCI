<?php
session_start();
$hostname="localhost";
$user="root";
$password="";
$database="queuing";

$a='';

$id1=$_SESSION['name1'];
$num1=$_SESSION['num1'];
$amt1=$_SESSION['amt1'];
$id2=$_SESSION['name2'];
$num2=$_SESSION['num2'];
$amt2=$_SESSION['amt2'];
$id3=$_SESSION['name3'];
$num3=$_SESSION['num3'];
$amt3=$_SESSION['amt3'];
$id4=$_SESSION['name4'];
$num4=$_SESSION['num4'];
$amt4=$_SESSION['amt4'];
$contact=$_POST['contact'];


$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$result=mysqli_query($link, "SELECT * FROM senior");

for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){

$id=$num_rows["quenumber"];

if($id==0){
    echo "NO Data";
}
else{
    $a=$id;

}

}



$a_padded = sprintf("%02d", $a);
mysqli_query($link, "INSERT INTO senior1(quenumber, name, accountnum, amount,name2, accountnum2, amount2,name3, accountnum3, amount3, name4, accountnum4, amount4, taposna, contact) VALUES ('SL$a_padded','$id1', '$num1','$amt1','$id2','$num2','$amt2','$id3','$num3','$amt3','$id4','$num4','$amt4',0,'$contact')");
mysqli_query($link, "UPDATE senior SET contact='$contact' where quenumber=$a");


?>



<html>
<title>Queue Number</title>
<head>
    <meta charset="utf-8"/>
        <meta type="viewport" content="width=device=width, initial-scale=1.0">
       <link rel="stylesheet" href="../style/style.css" type="text/css"/>
<style type="text/css">
    
.paysubo{
  width: 40%;
  height:10%;
  background-color: orangered;
  color: white;
  font-family: arial;
  font-size: 30px;
  float: left;
  margin-left: 30%;
  border: 0px;
  margin-top: 5%;
  border-radius: 3px;
}
table{
  width: 80%;
  margin-left: 1%;
  margin-top: 2%;
  border: 3px solid orangered;
}
     </style>
     </head>
<body onload="deleteRow()">
     
  
       <center>
    <table>
    <tr>
        <td colspan="2">Your Queue Number is <b><?php echo "SL$a_padded";?></b></td>
         <td><?php echo "$contact";?></td>
    </tr>
    <tr>
        <td><b>Account Name</b></td>
        <td><b>Account Number</b></td>
        <td><b>Amount</b></td>
    </tr>
    <tr id="electh">
          <td colspan="3" style="text-align: left;"><b>Electric Bill Payment</b></td>
        </tr> 
    <tr id="row1">
        <td><?php echo "$id1";?></td>
        <td><?php echo "$num1";?></td>
        <td><?php echo "$amt1";?></td>
    </tr>
     <tr id="row2">
        <td><?php echo "$id3";?></td>
        <td><?php echo "$num3";?></td>
        <td><?php echo "$amt3";?></td>
    </tr>
    <tr id="watth">
          <td colspan="3" style="text-align: left;"><b>Water Bill Payment</b></td>
        </tr>
        <tr id="row3">
        <td><?php echo "$id2";?></td>
        <td><?php echo "$num2";?></td>
        <td><?php echo "$amt2";?></td>
    </tr>
     <tr id="row4">
        <td><?php echo "$id4";?></td>
        <td><?php echo "$num4";?></td>
        <td><?php echo "$amt4";?></td>
    </tr>
    </table>
    <form method="POST" action="../print/senprint.php">
      <button class="paysubo">PRINT QUEUE NUMBER</button>

    </form>
 </center>
    
     <script type="text/javascript">
//================
function deleteRow()  
{   

  var data1="<?php echo $id1; ?>";
  var data2="<?php echo $num1; ?>";
  var data3="<?php echo $amt1; ?>";
  var data4="<?php echo $id3; ?>";
  var data5="<?php echo $num3; ?>";
  var data6="<?php echo $amt3; ?>";
  var data7="<?php echo $id2; ?>";
  var data8="<?php echo $num2; ?>";
  var data9="<?php echo $amt2; ?>";
  var data10="<?php echo $id4; ?>";
  var data11="<?php echo $num4; ?>";
  var data12="<?php echo $amt4; ?>";
  
if(data1==''&&data2==''&&data3==''){
  var row = document.getElementById('row1');
    row.parentNode.removeChild(row);
}
if(data4==''&&data5==''&&data6==''){
   var row = document.getElementById('row2');
    row.parentNode.removeChild(row);
}
if(data1==''&&data2==''&&data3==''&&data4==''&&data5==''&&data6==''){
  var row = document.getElementById('electh');
    row.parentNode.removeChild(row);
}
if(data7==''&&data8==''&&data9==''){
   var row = document.getElementById('row3');
    row.parentNode.removeChild(row);
}
if(data10==''&&data11==''&&data12==''){
   var row = document.getElementById('row4');
    row.parentNode.removeChild(row);
}
if(data7==''&&data8==''&&data9==''&&data10==''&&data11==''&&data12==''){
   var row = document.getElementById('watth');
    row.parentNode.removeChild(row);
}
}
//================

</script>
 
 
</body>
</hmtl>