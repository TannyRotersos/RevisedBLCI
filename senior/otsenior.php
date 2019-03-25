<?php
session_start();

$queue=$_SESSION['qn'];

?>


<html>
<head>
<title>Pay Bills</title>
<head>
    <meta charset="utf-8"/>
        <meta type="viewport" content="width=device=width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/inputstyle.css" type="text/css"/>

<style type="text/css">
 .field1{
  float: left;
  position: relative;
  left: 35.9%;
}
.field2{
  float: right;
   position: relative;
  right: 35%;
}
.disp1{
    margin: 0%;
    width: 75%;
    height: 19%;
}

</style>
</head>     
<body onload="hidelec(); hidwat();">
   
 <center>
  <div class="not">
    
        <button onclick="hidelec()"  class="pay1"><b>Pay Electric Bill</b></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button onclick="hidwat()"  class="pay2"><b>Pay Water Bill</b></button>
     
  <br><br>
      <form action="otseniorsubmit.php" method="POST">
            
            
                         <div id="elec1" class="payfield1">
                             <input type="text" name="name3"  placeholder="Account Name" autocomplete="off" class="paytf" required><br>
                             <input type="number" name="num3" placeholder="Account Number" autocomplete="off" class="paytf"><br>
                                <input type="number" name="amount3"  placeholder="Amount" autocomplete="off" class="paytf">
                          </div>
                   
                          <div id="wat1" class="payfield2">
                              <input type="text" name="name4"  placeholder="Account Name" autocomplete="off" class="paytf"><br>
                              <input type="number" name="num4" placeholder="Account Number" autocomplete="off" class="paytf"><br>
                              <input type="number" name="amount4"  placeholder="Amount" autocomplete="off" class="paytf">
                          </div>
                   
                                      <button type="Submit" name="queue" class="paysub" value=<?php echo "$queue"; ?>>Submit</button>
       </form>
  
    </div>
</center>  
    
 <script>
function hidelec() {
    var y = document.getElementById("elec1");
    
    if (y.style.display === "none") {
        y.style.display = "block";
    } else {
        y.style.display = "none";
    }
}
function hidwat() {
    var m = document.getElementById("wat1");
    
    if (m.style.display === "none") {
        m.style.display = "block";
    } else {
        m.style.display = "none";
    }
}

</script>   
    
    
</body>
</html>

