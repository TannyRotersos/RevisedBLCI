<?php
session_start();
if(!$_SESSION["username"]){
    //Do not show protected data, redirect to login...
    header("Location: ../index.php");
}

$userid=$_SESSION["username"];
$_SESSION["id"] = $userid;
?>
<html>
<head><meta charset="utf-8"/>
         <style type="text/css">
 ::-webkit-scrollbar { 
    display: none; 
}

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
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
  border: 1px solid gray;
}

 .btn {
    background-color: orangered;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 15%;
    margin-left:2%;
    opacity: 0.8;
    margin-top:3%;
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
	<center>

		<form action="<?php $_SERVER["PHP_SELF"];?>" method="post" >
			<select name="year" class="input-field">
			<option value="" type="hidden" selected>Year</option>
  				<option value="2019">2019</option>
  				<option value="2018">2018</option>
			</select>
			<select name="month" class="input-field">
			<option value="" type="hidden" selected>Month</option>
    			<option value='01'>January</option>
			    <option value='02'>February</option>
			    <option value='03'>March</option>
			    <option value='04'>April</option>
			    <option value='05'>May</option>
			    <option value='06'>June</option>
			    <option value='07'>July</option>
			    <option value='08'>August</option>
			    <option value='09'>September</option>
			    <option value='10'>October</option>
			    <option value='11'>November</option>
			    <option value='12'>December</option>
    		</select> 
    		<select id="day_start" class="input-field"
          name="day_start" /> 
			<option value="" type="hidden" selected>Day</option>
			    <option>01</option>       
			    <option>02</option>       
			    <option>03</option>       
			    <option>04</option>       
			    <option>05</option>       
			    <option>06</option>       
			    <option>07</option>       
			    <option>08</option>       
			    <option>09</option>       
			    <option>10</option>       
			    <option>11</option>       
			    <option>12</option>       
			    <option>13</option>       
			    <option>14</option>       
			    <option>15</option>       
			    <option>16</option>       
			    <option>17</option>       
			    <option>18</option>       
			    <option>19</option>       
			    <option>20</option>       
			    <option>21</option>       
			    <option>22</option>       
			    <option>23</option>       
			    <option>24</option>       
			    <option>25</option>       
			    <option>26</option>       
			    <option>27</option>       
			    <option>28</option>       
			    <option>29</option>       
			    <option>30</option>       
			    <option>31</option>       
			  </select>
			<button type="submit" class="btn">SUBMIT</button>
</form>
<table>

	<?php

$hostname="localhost";
$user="root";
$password="";
$database="queuing";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


$year=$_POST['year'];
$month=$_POST['month'];
$day=$_POST['day_start'];
//where quenumber like '%$a%';

$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$result=mysqli_query($link, "SELECT * FROM que1 where dtime like '%$year-$month-$day%';");



echo "<tr class='t1'><th>Queue Number</th><th>Name</th><th>Account Number</th><th>Amount</th><th>Name</th><th>Account Number</th><th>Amount</th><th>Name</th><th>Account Number</th><th>Amount</th><th>Name</th><th>Account Number</th><th>Amount</th><th>Contact Number</th><th>Date</th><th>Teller</th></tr>" ;

for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){
	
$b=$num_rows["quenumber"];
$d=$num_rows["name"];
$e=$num_rows["accountnum"];
$f=$num_rows["amount"];
$g=$num_rows["name2"];
$h=$num_rows["accountnum2"];
$in=$num_rows["amount2"];
$j=$num_rows["name3"];
$k=$num_rows["accountnum3"];
$l=$num_rows["amount3"];
$m=$num_rows["name4"];
$n=$num_rows["accountnum4"];
$o=$num_rows["amount4"];
$p=$num_rows["contact"];
$q=$num_rows["dtime"];
$r=$num_rows["teller"];
$s=$num_rows["user"];	
	echo "<tr><td class='tds'>" .$b."</td>". "<td class='tds'>" .$d."</td>". "<td class='tds'>" .$e."</td>". "<td class='tds'>" .$f. "</td>". "<td class='tds'>" .$g."</td>"."<td class='tds'>" .$h. "</td>"."<td class='tds'>" .$in. "</td>"."<td class='tds'>" .$j. "</td>"."<td class='tds'>" .$k. "</td>"."<td class='tds'>" .$l. "</td>"."<td class='tds'>" .$m. "</td>"."<td class='tds'>" .$n. "</td>"."<td class='tds'>" .$o. "</td>"."<td class='tds'>" .$p. "</td>"."<td class='tds'>" .$q. "</td>"."<td class='tds'>" .$r." ".$s. "</td>"."</tr>";


}

//====================
}

else{
	$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$result=mysqli_query($link, "SELECT * FROM que1;");



echo "<tr class='t1'><th colspan='16'>ALL ORDINARY CUSTOMER'S RECORDS</th></tr>" ;
echo "<tr class='t1'><th>Queue Number</th><th>Name</th><th>Account Number</th><th>Amount</th><th>Name</th><th>Account Number</th><th>Amount</th><th>Name</th><th>Account Number</th><th>Amount</th><th>Name</th><th>Account Number</th><th>Amount</th><th>Contact Number</th><th>Date</th><th>Teller</th></tr>" ;

for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){
	
$b=$num_rows["quenumber"];
$d=$num_rows["name"];
$e=$num_rows["accountnum"];
$f=$num_rows["amount"];
$g=$num_rows["name2"];
$h=$num_rows["accountnum2"];
$in=$num_rows["amount2"];
$j=$num_rows["name3"];
$k=$num_rows["accountnum3"];
$l=$num_rows["amount3"];
$m=$num_rows["name4"];
$n=$num_rows["accountnum4"];
$o=$num_rows["amount4"];
$p=$num_rows["contact"];
$q=$num_rows["dtime"];
$r=$num_rows["teller"];
$s=$num_rows["user"];	
	
	echo "<tr><td class='tds'>" .$b."</td>". "<td class='tds'>" .$d."</td>". "<td class='tds'>" .$e."</td>". "<td class='tds'>" .$f. "</td>". "<td class='tds'>" .$g."</td>"."<td class='tds'>" .$h. "</td>"."<td class='tds'>" .$in. "</td>"."<td class='tds'>" .$j. "</td>"."<td class='tds'>" .$k. "</td>"."<td class='tds'>" .$l. "</td>"."<td class='tds'>" .$m. "</td>"."<td class='tds'>" .$n. "</td>"."<td class='tds'>" .$o. "</td>"."<td class='tds'>" .$p. "</td>"."<td class='tds'>" .$q. "</td>"."<td class='tds'>" .$r." ".$s. "</td>"."</tr>";


}
}


?>

</table>

	

</center>
</body>
	</html>