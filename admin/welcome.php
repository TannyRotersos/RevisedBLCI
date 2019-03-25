<?php

 session_start();
$fname=$_SESSION["fname"];
$lname=$_SESSION["lname"];

?>
<html>
    <head>

        <style>
            z{
                font-family: 'Century Gothic';
                font-size: 70px;
            }
            </style>
    </head>
    <body>

<center>
    <br><br><br><br><br><br>

            <z>Welcome <?php echo "$fname $lname";?>!</z>
    </body>
        
</html> 