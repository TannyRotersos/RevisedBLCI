<?php

session_start();

if(!isset($_SESSION["username"])){
    //Do not show protected data, redirect to login...
    header("Location: ../index.php");
    
}


date_default_timezone_set("Asia/Hong_Kong");
$hostname="localhost";
$user="root";
$password="";
$database="queuing";
$fname=$_SESSION["fname"];
$lname=$_SESSION["lname"];
$userid=$_SESSION["username"];
$_SESSION["user"]=$userid;
$a=$b=$c=$d=$e=$f=$g=$h=$in=$j=$k=$l=$m=$n=$o=$p=$q=$r=$aa=$bb=$cc=$val='';
$message='';
$_SESSION["tellerid"]=5;


$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
mysqli_query($link, "UPDATE accounts set stat='online' where userid='$userid';");
mysqli_query($link, "UPDATE accountreg SET userid='$userid',stat='online' where teller=5;");


if ($_SERVER["REQUEST_METHOD"] == "POST") {



//===============================================================
$result=mysqli_query($link, "SELECT MIN(quenumber) as 'new' FROM que where taposna=0;");
for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){
$a=$num_rows["new"];
}

if($a!==null){
//===============================================================
mysqli_query($link, "UPDATE que SET taposna=1,teller='5', user='$userid' where quenumber='$a';");
//===============================================================
$result1=mysqli_query($link, "SELECT * FROM que where quenumber=$a");
         mysqli_query($link, "UPDATE que1 SET taposna=1,teller='5', user='$userid' where quenumber like '%$a%';");
for($i=0; $i<$num_rows=mysqli_fetch_array($result1);$i++){
$b=$num_rows["quenumber"];
$d=$num_rows["name"];
$e=$num_rows["accountnum"];
$f=$num_rows["amount"];
$g=$num_rows["name2"];
$h=$num_rows["accountnum2"];
$in=$num_rows["amount2"];
$aa=$num_rows["priority"];
$bb=$num_rows["taposna"];
$cc=$num_rows["contact"];
$j=$num_rows["name3"];
$k=$num_rows["accountnum3"];
$l=$num_rows["amount3"];
$m=$num_rows["name4"];
$n=$num_rows["accountnum4"];
$o=$num_rows["amount4"];
$p=$num_rows["taposna"];
$q=$num_rows["contact"];
}
//===============================================================
mysqli_query($link, "UPDATE display SET quenumber='$aa', done=0 where teller=5");

//===============================================================


}
else{
  mysqli_query($link, "UPDATE display SET quenumber='',done=1 where teller=5");

}
//#############################Here starts the sms notification
$sms=$a+5;
$a1=$a2=$a3=$a4=$a5=$a6=$a7=$a8=$a9=$a10=$a11=$a12=$a13=$a14=$a15=$a16=$in1='';
$cc1='';

$result1=mysqli_query($link, "SELECT * FROM que where quenumber=$sms");
for($i=0; $i<$num_rows=mysqli_fetch_array($result1);$i++){
$a1=$num_rows["quenumber"];
$a2=$num_rows["name"];
$a3=$num_rows["accountnum"];
$a4=$num_rows["amount"];
$a5=$num_rows["name2"];
$a6=$num_rows["accountnum2"];
$in1=$num_rows["amount2"];
$a7=$num_rows["priority"];
$a8=$num_rows["taposna"];
$cc1=$num_rows["contact"];
$a9=$num_rows["name3"];
$a10=$num_rows["accountnum3"];
$a11=$num_rows["amount3"];
$a12=$num_rows["name4"];
$a13=$num_rows["accountnum4"];
$a14=$num_rows["amount4"];
$a15=$num_rows["taposna"];
}

//##########################################################################

//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode){
      $ch = curl_init();
      $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
      curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
      curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, 
                http_build_query($itexmo));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      return curl_exec ($ch);
      curl_close ($ch);
}
//##########################################################################

if($cc1==null||$cc1==''){
  $result = itexmo("09094420621","Bohol Light Company Inc.\nis now serving priority number $aa. Please be ready. \n\nYou can inquire the current number served by the teller! Just reply BLCIQ to this message. You can also view it online by visiting https://blci.000webhostapp.com/","DE-TANNY941655_25SU7");
}
else{
 $result = itexmo("$cc1","Bohol Light Company Inc.\nNow serving priority number $aa. Please be ready.","DE-TANNY941655_25SU7");
}

if ($result == ""){
echo "";  
}else if ($result == 0){
echo "";
}
else{ 
echo "Error Num ". $result . " was encountered!";
}
//##########################################################################


$n1=date('h:i a');
//========================
$myfile = fopen("../tests/teller5.txt", "w") or die("Unable to open file!");
if($b==null||$b==''){
  $txt = "--";
}
else{
  $txt = "$aa ($n1)";
}
fwrite($myfile, $txt);

//========================

}
?>



<html>
<head>
    <title>Teller's Dashboard</title>

    <meta charset="utf-8"/>
        <meta type="viewport" content="width=device=width, initial-scale=1.0">
            <link rel="stylesheet" href="../style/style4.css" type="text/css"/>
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<style type="text/css">
      
     .disp1{
    margin: 0%;
    width: 75%;
    height: 19%;
}
     </style>
</head>    
<body onload="play(); deleteRow();">

<div class="ad">
                <div class="adnav1">
                    <c><i class='fas fa-user-tie' class="c"></i></c><br>
                    <h>Hello <?php echo "$fname";?>!</h>
                    </div>
                    <div class="adnav2">
                        <div class="adnav11">
      
                        </div>

                        <div class="adnav22">
                            <n>Menu</n>
                            <a href="profile.php"><button class="buttonadmin"><m>Profile</m></button></a>
                            <form action="../teller/logout.php" method="POST">
            <button type="submit" name="get" class="buttonadmin"><m>Logout</m></button> </form>   
                            </div>

                    </div>
            </div>
    
            <div class="min">
                <div class="nav">
                        <img src="../img/BLCI.png">
                        <h3>Bohol Light Company Inc.</h3>
                </div>

 
                <div class="nav2">
                  <center><br><br><br><br><br>
<table class="table1" id="tellertab" border="0">
        <tr>
          <td colspan="3"><center><o>QUEUE NUMBER &nbsp;&nbsp;</o><mn><b><?php echo "$aa";?></b></mn></center></td>
        </tr>  
        <tr>
          <td>Name</td>
          <td>Account Number<br></td>
          <td>Amount</td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: left;"><b>Electric Bill Payment</b></td>
        </tr>  
        <tr id="row3">
          <td><?php echo "$d";?></td>
          <td><?php echo "$e";?></td>
          <td><?php echo "$f";?></td>
        </tr>  
        <tr id="row4">
          <td><?php echo "$j";?></td>
          <td><?php echo "$k";?></td>
          <td><?php echo "$l";?></td>
        </tr> 
        <tr>
          <td colspan="3" style="text-align: left;"><b>Water Bill Payment</b></td>
        </tr> 
        <tr id="row5">
          <td><?php echo "$g";?></td>
          <td><?php echo "$h";?></td>
          <td><?php echo "$in";?></td>
        </tr>
         <tr id="row6">
          <td><?php echo "$m";?></td>
          <td><?php echo "$n";?></td>
          <td><?php echo "$o";?></td>
        </tr> 




        </table>
              
 
        <div id="links"></div>
       
        <hr width="80%" size="5px" align="center" color="orangered">
        
       <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
            <button type="submit" id="submit" name="get" class="paysub" value="<?php echo "$e";?>" >Get Queue</button>
        </form>
    </center>
    
                </div>
     </div>
    


        
     <iframe src="../tests/upload.php" style="float: left;position: relative;width:0%; height:0%;border: 0px; overflow: hidden;"></iframe>
 <script type="text/javascript" src="jj.js"></script> 
<script>

 //==============================================================
 function deleteRow()  
{   

  var data1="<?php echo $d; ?>";
  var data2="<?php echo $e; ?>";
  var data3="<?php echo $f; ?>";
  var data4="<?php echo $j; ?>";
  var data5="<?php echo $k; ?>";
  var data6="<?php echo $l; ?>";
  var data7="<?php echo $g; ?>";
  var data8="<?php echo $h; ?>";
  var data9="<?php echo $in; ?>";
  var data10="<?php echo $m; ?>";
  var data11="<?php echo $n; ?>";
  var data12="<?php echo $o; ?>";
  
if(data1==''&&data2==''&&data3==''){
  var row = document.getElementById('row3');
    row.parentNode.removeChild(row);
}
if(data4==''&&data5==''&&data6==''){
   var row = document.getElementById('row4');
    row.parentNode.removeChild(row);
}
if(data7==''&&data8==''&&data9==''){
   var row = document.getElementById('row5');
    row.parentNode.removeChild(row);
}
if(data10==''&&data11==''&&data12==''){
   var row = document.getElementById('row6');
    row.parentNode.removeChild(row);
}
}



 //==============================================================
  function play(){
       var audio = document.getElementById("audio");
       audio.play();
                 }
var auto_refresh = setInterval( function() {
  $('#links').load('waiting.php'); 
}, 1000); 
 
   </script>

<audio id="audio" src="1.mp3" ></audio>


</body>
</html>

