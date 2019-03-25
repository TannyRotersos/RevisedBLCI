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
mysqli_query($link, "UPDATE accounts set stat='online' where userid='$userid';");
mysqli_query($link, "UPDATE accountreg SET userid='$userid',stat='online' where teller=7;");
?>

<html>
    <head> <title> Admin Dashboard </title>

    <meta charset="utf-8"/>
	          <meta name="viewport" content="width=device=width,initial-scale=1.0">
            <link rel="stylesheet" href="../style/style4.css" type="text/css"/>
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    </head>
        <body scroll="no" style="overflow: hidden">
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
                            <a href="profile.php" target="iframe_a"><button class="buttonadmin"><m>View Profile</m></button></a>
                            <a href="create.php" target="iframe_a"><button class="buttonadmin"><m>Create New Account</m></button></a>
                            <a href="edit.php" target="iframe_a"><button class="buttonadmin"><m>Edit User Account</m></button></a>
                            
                            <a href="regular.php" target="iframe_a"><button class="buttonadmin"><m>Regular Customers</m></button></a>
                            <a href="senior.php" target="iframe_a"><button class="buttonadmin"><m>Senior Citizen/PWD</m></button></a>
                            <form action="../teller/logout5.php" method="POST">
            <button type="submit" name="get" class="buttonadmin"><m>Logout</m></button>    
                            </div>

                    </div>
            </div>
    
            <div class="min">
                <div class="nav">
                        <img src="../img/BLCI.png">
                        <h3>Bohol Light Company Inc.</h3>
                </div>

 
                <div class="nav2">

                
                    <iframe src="welcome.php" name="iframe_a"></iframe>
                </div>
     </div>
    
   



</body>
</html>