<?php

session_start();

$hostname="localhost";
$user="root";
$password="";
$database="queuing";


    $link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
    mysqli_select_db($link, $database) or die ("Error creating database");

    if(isset($_SESSION['user']))
    {
	$id=$_SESSION['user'];
    $result=mysqli_query($link, "SELECT link FROM accountreg where userid='$id';");

    for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){
	$snlink=$num_rows["link"];
	header('Location: '.$snlink);
    }
    }

    $err='';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nlink=$n1link=$stat2='';


$user1=$_POST['user'];
$pass1=$_POST['pass'];
$accountype=$_POST['accountype'];    

$account=mysqli_query($link, "SELECT link,stat FROM accountreg where teller=$accountype");
for($i=0; $i<$num_rows=mysqli_fetch_array($account);$i++){
	$nlink=$num_rows["link"];
    $n1link=$num_rows["stat"];
}

$result=mysqli_query($link, "SELECT userid,pass,link,accountype,stat,fname,lname FROM accounts where userid='$user1';");

for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){

	$tellerid=$num_rows["userid"];
	$pass=$num_rows["pass"];
	$slink=$num_rows["link"];
	$actype=$num_rows["accountype"];
	$stat=$num_rows["stat"];
    $name=$num_rows["fname"];
    $lastname=$num_rows["lname"];


if($user1==$tellerid&&password_verify($pass1, $pass)&&$stat=='offline'&&$n1link=='offline'){
	$_SESSION["username"] = $tellerid;
    
	if($actype=='admin'&&$accountype==7){
		$_SESSION["username"] = $tellerid;
        $_SESSION["fname"] = $name;
        $_SESSION["lname"] = $lastname;
	header('Location: '.$slink);
	}

	if($actype=='kiosk'&&$accountype==8){
    header('Location: kiosk.php');
    }
    
	if($actype=='teller'&&$accountype==1||$actype=='teller'&&$accountype==2||$actype=='teller'&&$accountype==3||$actype=='teller'&&$accountype==4){
		$_SESSION["username"] = $tellerid;
        $_SESSION["fname"] = $name;
        $_SESSION["lname"] = $lastname;
	header('Location: '.$nlink);
	}
	else{
		$err="Account Id or Password is Incorrect";
     
	}	
			
}
else if($user1==$tellerid&&password_verify($pass1, $pass)&&$stat=='online'||$n1link=='online'){
	$err="Account is already online";
}
else{
	$err="Account Id or Password is Incorrect";
}
}



}
?>



<html>
    <head> <title> Login </title>

    <meta charset="utf-8"/>
	          <meta name="viewport" content="width=device=width,initial-scale=1.0">
            <link rel="stylesheet" href="style/styleuser.css" type="text/css"/>
            <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
    window.onload = disableBack();    
</script>    
</head>
        <body>

        <div class="log">
            <div class="nin">
                <img src="img/BLCI.png">
            </div>

            <div class="yah">
                <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" >
                    <h1>Log in Credentials</h1>
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" type="text" placeholder="Username" name="user" autocomplete="off">
                    </div>
                                  
                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input class="input-field" type="password" placeholder="Password" name="pass">
                    </div>
					<div class="input-container">
                        <i class="fa fa-user icon"></i>
                    <select name="accountype" placeholder="User Type" class="input-field">
                        <option value="1">Teller 1</option>
                        <option value="2">Teller 2</option>
                        <option value="3">Teller 3</option>
                        <option value="4">Teller 4</option>
                        <!--  <option value="5">Teller 5</option>
                        <option value="6">Teller 6</option> -->
                        <option value="7">Admin</option>
                        <option value="8">Kiosk</option>
                    </select>
                                  
					</div>
					<center>
                    <div style="color:#9D1A0A;font-size:18px;"><?php echo $err;?></div>
                    </center>
                    <button type="submit" class="btn">Log in</button>
                        
                    </form>
                </div>
        </div>
        </body>
</html>

