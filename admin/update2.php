<?php
session_start();
if(!$_SESSION["username"]){
    //Do not show protected data, redirect to login...
    header("Location: ../index.php");
}

$userid=$_SESSION["username"];
$_SESSION["id"] = $userid;
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Update User</title>
<style>

.t1{ 
	font-size: 15px;
}
td{
	width:220px;
	padding: 5px;
	border-radius: 2px;
	font-size: 13px;
}
table{
	font-family:'Century Gothic';
	font-size: 15px;
	padding: 0px;
	width: 100%;
	border-spacing: 1px;
	border-collapse: collapse;
}
th{
	width:220px;
	 border-radius: 2px;
	 font-size: 15px;
	 color: black;
}
.tds{
	text-align: center;
}
table, td, th {
  border: 1px solid gray;
}

 .btn {
    background-color: orangered;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 108%;
    opacity: 0.8;
    margin-top: 6%;
  }
  
  .btn:hover {
    opacity: 1;
  }

  .input-field {
  border: 1px solid #3A3939;
    width: 100%;
  padding: 10px;
  margin-top: 1%;
    outline: none;
    border-radius: 4px;
  }
  
  .input-field:focus {
    border: 2px solid orangered;
    box-shadow: 0 0 5px rgba(236, 110, 6, 1);
  
  }

  form{
    padding: 10px;
    font-family: 'Century Gothic';
}

.create1{
	width: 30%;
	margin-top: .5%;
	float:left;
	margin-left: 17%;
  font-family: Arial;

}
.create2{
	width: 30%;
	margin-top: .5%;
	float:right;
	margin-right: 17%;
  font-family: Arial;
}
</style>
</head>
<body>


<?php

$idn=$_POST["id"];

$hostname="localhost";
$user="root";
$password="";
$database="queuing";

$userid = $password = $fname = $lname =$age =$address =$contact = '';



$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$result=mysqli_query($link, "SELECT userid, pass, fname, lname, age, address, contact FROM accounts where userid='$idn';");

for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){

    $userid=$num_rows["userid"];
    $password=$num_rows["pass"];
    $fname=$num_rows["fname"];
    $lname=$num_rows["lname"];
    $age=$num_rows["age"];
    $address=$num_rows["address"];
    $contact=$num_rows["contact"];
}
    

    
?>
 

<br><br><br>
<form method="POST" action="updatenew.php" >
<div class="create1">
Username:<br><input type="text" name="username" class="input-field" value='<?php echo $userid;?>' autocomplete="off" required>  <br><br>

Password:<br> <input type="password" pattern="(?=.*\d).{8,}" title="At least one number and at least 8 or more characters" name="pas"class="input-field" disabled  required><br><br>

First Name:<br> <input type="text"  name="fname"class="input-field" value='<?php echo $fname;?>' autocomplete="off" required><br><br>

Last Name:<br> <input type="text" name="lname"class="input-field" value='<?php echo $lname;?>' autocomplete="off" required><br><br>
</div>


<div class="create2">
Age: <br><input type="text"  name="age"class="input-field" value='<?php echo $age;?>'  autocomplete="off" required><br><br>

Address: <br><input type="text"  name="add"class="input-field" value='<?php echo $address;?>' autocomplete="off" required><br><br>

Contact Number:<br> <input type="text"class="input-field" pattern="[0-9]{11}" title="PLEASE PUT 11-DIGIT NUMBER" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" name="cnum" id="contactnum" value='<?php echo $contact;?>'autocomplete="off" required><br><br>

<button type="submit" name="idnew"class="btn" value='<?php echo $userid;?>'>Update</button><br><br>
</div>
</form>

</body>
</html>
