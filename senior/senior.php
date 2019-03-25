<html>
<head>
<title>Pay Bills</title>
<head>
    <meta charset="utf-8"/>
        <meta type="viewport" content="width=device=width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/inputstyle.css" type="text/css"/>

</head>     
<body onload="hidelec(); hidwat();">
    
 
 <center>
    <div class="not">
    
   
       <button onclick="hidelec()" class="pay1"><b>Pay Electric Bill</b></button>
        <button onclick="hidwat()" class="pay2"><b>Pay Water Bill</b></button>
     
  <br><br>

      <form action="seniorsubmit.php" method="POST">
            
            
                       <div id="elec1" class="payfield1">
                             <input type="text" name="name"  placeholder="Account Name" autocomplete="off"  class="paytf" required><br>
                             <input type="number" name="num" placeholder="Account Number" autocomplete="off" class="paytf"><br>
                                <input type="number" name="amount"  placeholder="Amount" autocomplete="off"  class="paytf">
                          </div>
                   
                          <div id="wat1" class="payfield2">
                              <input  type="text"name="name2"  placeholder="Account Name" autocomplete="off"  class="paytf"><br>
                              <input type="number" name="num2" placeholder="Account Number" autocomplete="off"  class="paytf"><br>
                              <input type="number" name="amount2"  placeholder="Amount" autocomplete="off"  class="paytf">
                          </div>
                   
                                    <button type="Submit" class="paysub">Submit</button>
       </form>
  
   <br><br><a href="../kiosk.php" ><button class="paycancel">Cancel</button></a>
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

