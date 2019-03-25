<?php
session_start();
if(!$_SESSION["username"]){
    //Do not show protected data, redirect to login...
    header("Location: ../index.php");
}

$userid=$_SESSION["username"];
$_SESSION["id"] = $userid;

$idn=$_POST["id"];
$_SESSION["uid"] = $idn;



?>
<!DOCTYPE html>
<html>
<head>
    
	<title>Update User</title>
<style>
body{
  font-family: Arial;
}
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
    width: 25%;
    float: left;
    position: relative;
    left: 8%;
  }
  
  .btn:hover {
    opacity: 1;
  }

  .input-field {
	border: 2px solid gray;
    width: 40%;
	padding: 10px;
    outline: none;
  }
  
  .input-field:focus {
    border: 2px solid orangered;
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
}
.create2{
	width: 30%;
	margin-top: .5%;
	float:right;
	margin-right: 17%;
}
.nav5{
 
  width: 50%;
  position: relative;
  float: left;
  left: 36%;

}
</style>
</head>
<body>
<br><br><br><br>

  <center><h2>Reset Password</h2></center>
  <div class="nav5">
  Reset Password for username: <b><?php echo "$idn"; ?></b><br><br>
 <form action="resetsub.php" method="post" >
Old Password:<br><input type="password" id="oldpass" name="oldpass" id="user" class="input-field" required autocomplete="off"><br><br>
  Create New Password:<br><input type="password"  pattern="(?=.*\d).{8,}" title="At least one number and at least 8 or more characters" name="newpass" id="newpass"class="input-field"  required><br><br>
  Confirm New Password:<br><input type="password" pattern="(?=.*\d).{8,}" name="cnewpass" id="cnewpass" class="input-field" onkeyup="validation()" required><br>
  <div id="msg" style="color:#9D1A0A;font-size:18px;"></div><br>
  <button id="submit" value="submit" class="btn">Submit</button>
</form>
</div>
<script type="text/javascript">

  
 document.getElementById("submit").style.visibility = "hidden";

function validation(){

  var pass1=document.getElementById("cnewpass").value;
  var pass2=document.getElementById("newpass").value;

  if(pass1!==pass2){
    document.getElementById("msg").style.color = "#ff0000";
    document.getElementById("msg").innerHTML="New Password Not Matched!";
    document.getElementById("submit").style.visibility = "hidden";
  }
  else{
    document.getElementById("msg").style.color = "#ff0000";
    document.getElementById("msg").innerHTML="New Password Matched!";
    document.getElementById("submit").style.visibility = "visible";
  }

}

</script>

</body>
</html>
