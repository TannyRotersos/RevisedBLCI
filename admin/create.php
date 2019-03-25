<?php
	session_start();
		if(!$_SESSION["username"]){
		    header("Location: ../index.php");
		}

		$userid=$_SESSION["username"];
		$_SESSION["id"] = $userid;
		?>


<!DOCTYPE html>
<html>
<head>
	<title>Create New Account</title>
	<meta charset="utf-8"/>
    <meta type="viewport" content="width=device=width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css" type="text/css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="script.js"></script>
</head>
<body>
	<br><br>
<br>

<form method="POST" action="<?php $_SERVER["PHP_SELF"];?>" >
	<br>
	<div class="create1">
	Name:<input type="text" name="fname" id="fname" class="input-field" placeholder="Name" required autocomplete="off"><br><br>
	Last Name:<input type="text" name="lname" id="lname" class="input-field" placeholder="Lastname"required autocomplete="off"><br><br>
	Age: <input type="text" onkeypress="return isNumber(event)" pattern="[0-9]{2}" title="PLEASE PUT APPROPRIATE AGE" onkeydown="if(this.value.length==2 && event.keyCode!=8) return false;" name="age" id="age" class="input-field" placeholder="Age" required autocomplete="off"><br><br>
	Address:<input type="text" name="add" id="add" class="input-field"placeholder="Address" required autocomplete="off"><br><br>
	
Contact Number: <input type="text"class="input-field" pattern="[0-9]{11}" title="PLEASE PUT 11-DIGIT NUMBER" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" name="cnum" id="contactnum" autocomplete="off" required><br><br>

Account Type:<select name="actype" id="actype" class="input-field" placeholder="Account Type">
		<option value="teller">Teller Account</option>
		<option value="admin">Admin Account</option>
	</select></div>

	<div class="create2">
	Username: <input type="text" name="username" id="user" class="input-field"placeholder="Username" required autocomplete="off"><br><br>
	Password: <input type="password" pattern="(?=.*\d).{8,}" title="At least one number and at least 8 or more characters" name="newpass" id="newpass"class="input-field" placeholder="Password" required autocomplete="off"><br><br>
	Re-enter Password: <input type="password" name="cnewpass" id="cnewpass" class="input-field" placeholder="Confirm Password" onkeyup="validation()" required><br><br>
	<div id="msg" style="color:#9D1A0A;font-size:18px;"></div><br>
	<button id="submit" value="submit" class="btn">Submit</button>
</form>


<script type="text/javascript">

	
 document.getElementById("submit").style.visibility = "hidden";

function validation(){
	
	var pass1=document.getElementById("cnewpass").value;
	var pass2=document.getElementById("newpass").value;

	if(pass1!==pass2){
		document.getElementById("msg").style.color = "#ff0000";
		document.getElementById("msg").innerHTML="Password Not Matched!";
		document.getElementById("submit").style.visibility = "hidden";
	}
	else{
		document.getElementById("msg").style.color = "#9D1A0A";
		document.getElementById("msg").innerHTML="Password Matched!";
		document.getElementById("submit").style.visibility = "visible";
	}

}
</script>
<?php

$hostname="localhost";
$user="root";
$password="";
$database="queuing";



$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$add=$_POST['add'];
$username=$_POST['username'];
$actype=$_POST['actype'];
$cnewpass=$_POST['cnewpass'];
$cnum=$_POST['cnum'];

if($actype=="teller"){
	$cctype="teller";
}
else{
	$cctype="admin";
}
 $password_hash = password_hash($cnewpass, PASSWORD_BCRYPT);

mysqli_query($link, "INSERT INTO accounts (userid, pass, link, accountype, stat, fname, lname, age,address,contact) VALUES ('$username','$password_hash', '$actype','$cctype','offline', '$fname', '$lname', $age, '$add', $cnum);");




header('Location:createsuccess.php');

}
?>

</body>
</html>