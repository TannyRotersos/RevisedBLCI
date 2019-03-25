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
	<title>Edit User Account</title>
	<style type="text/css">.t1{ 
	font-size: 15px;
}
td{
	width:220px;
	padding: 5px;
	border-radius: 2px;
	font-size: 13px;
}
table{
	font-family:'Arial';
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
  border: 1px solid #8d938d;
}

 .btn {
    background-color: orangered;
    color: white;
    padding: 5px 8px;
    border: none;
    cursor: pointer;
    width: 96%;
    margin-left:2%;
    opacity: 0.8;
  }
  
  .btn:hover {
    opacity: 1;
  }

  .input-field {
	border: 2px solid gray;
    width: 10%;
	padding: 10px;
    outline: none;
  }
  
  .input-field:focus {
    border: 2px solid orangered;
  }
</style>
</head>
<body>
	
<br><br><br><br><center>
<table border="0" >
<?php



$hostname="localhost";
$user="root";
$password="";
$database="queuing";



$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$result=mysqli_query($link, "SELECT * FROM accounts;");

echo "<tr><th colspan='10'>User Accounts</th></tr>" ;
echo "<tr><th>User ID</th><th>Password</th><th>Account Type</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Address</th><th>Contact Number</th><th></th><th></th></tr>" ;


//===========================================================================================
for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){


	
	$id=$num_rows["userid"];
	$pass=$num_rows["pass"];
	$link=$num_rows["link"];
	$actype=$num_rows["accountype"];
	$stat=$num_rows["stat"];
	$fname=$num_rows["fname"];
	$lname=$num_rows["lname"];
	$age=$num_rows["age"];
	$add=$num_rows["address"];
	$contact=$num_rows["contact"];
	
	

	echo "<tr><td>".$id."</td>". "<td>**************</td>". "<td>" .$actype."</td>". "<td >" .$fname."</td>". "<td>" .$lname. "</td>". "<td>" .$age."</td>"."<td >" .$add."</td>"."<td>" .$contact."</td>"."<td><form method='POST' action='update2.php'><button name='id' class='btn' value='$id'>Update Account</button></form></td>"."<td><form method='POST' action='reset.php'><button name='id' class='btn' value='$id'>Reset Password</button></form></td>"."</tr>";


//===========================================================================================

//===========================================================================================
//========================================================================================
}
?>

</table>

</center>
</body>
</html>