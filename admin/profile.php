<?php
 session_start();
if(!$_SESSION["username"]){
    //Do not show protected data, redirect to login...
    header("Location: ../index.php");
    exit;
}

$userid=$_SESSION["username"];
$_SESSION["id"] = $userid;
$_SESSION["user"] = $userid;
$fname=$_SESSION["fname"];
$lname=$_SESSION["lname"];

$hostname="localhost";
$user="root";
$password="";
$database="queuing";


$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");

$result=mysqli_query($link, "SELECT userid, accountype,fname,lname,age,address,contact from accounts where userid='$userid' and accountype='admin'");
$userid=$accountype=$firstname=$lastname=$age=$address=$contact='';

for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){
$userid=$num_rows["userid"];
$accountype=$num_rows["accountype"];
$firstname=$num_rows["fname"];
$lastname=$num_rows["lname"];
$age=$num_rows["age"];
$address=$num_rows["address"];
$contact=$num_rows["contact"];
}

?>

<html>
    <head> <title> Admin Dashboard </title>

    <meta charset="utf-8"/>
	          <meta name="viewport" content="width=device=width,initial-scale=1.0">
            <link rel="stylesheet" href="../style/style4.css" type="text/css"/>
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

            <style>
          
    .persinfo{
  
  width: 80%;
  height: 50%;
  position: relative;
  left: 20%;
  float: left;

}
.note1{
   color:orangered;
   font-size: 20px;
   
}
        </style>
    </head>
        <body>
            
<?php

$snlink='';
if(isset($_SESSION['user'])){
    $id=$_SESSION['user'];
$result=mysqli_query($link, "SELECT link FROM accountreg where userid='$id';");

for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){
    $snlink=$num_rows["link"];
    
}
}
?>    
                <div class="nav2">
                   <center><br><br><br><h2>Personal Information</h2></center>
                    <div class="persinfo">
                        <b>Name:</b><?php echo "$firstname $lastname"; ?><br><br>
                        <b>Age: </b><?php echo "$age"; ?><br><br>
                        <b>Address: </b><?php echo "$address"; ?><br><br>
                        <b>Contact Number:</b><?php echo "$contact"; ?><br><br>
                        <b>Account Type: </b><?php echo "$accountype"; ?><br><br><br><br>
                         <div class="note1">For modification of your account, please contact your administrator.</div>
                    </div>

                </div>
              
     </div>
    
   



</body>
</html>