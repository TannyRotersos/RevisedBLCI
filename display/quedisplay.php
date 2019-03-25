	<html>
<head>
    <title>Queue Display</title>
            <link rel="stylesheet" href="../style/style.css" type="text/css"/>
    <style type="text/css">
body{
    background-image: url(../img/2.jpg);
    margin: 0%;
    background-repeat: no-repeat;
  background-attachment: fixed;

}
.disp1{
    margin: 0%;
    width: 75%;
    height: 19%;
}
.vid{
    margin: 0%;
    float: left;
    position: absolute;
    top: 10%;
    width: 700px;
    height: 700px;
}
</style>
</head>
<body onload="vidload();">
    <center><img src="../img/3.png" class="disp1">
</center>
    <video id="idle_video" class="vid" autoplay onended="onVideoEnded();"></video>
<iframe src="display.php" style="float: right;position: relative;width:44.5%; height:90%;border: 0px;margin: 0%;margin-top: 0.9%; overflow: hidden;"></iframe>


    <script>
        var video_list      = ["video1.mp4"];
        var video_index     = 0;
        var video_player    = null;

        function vidload(){
           
            var vid = document.getElementById("idle_video");
            vid.autoplay = true;
            console.log("body loaded");
            video_player        = document.getElementById("idle_video");
            video_player.setAttribute("src", video_list[video_index]);
            video_player.play();
            
        }

        function onVideoEnded(){
            console.log("video ended");
            if(video_index < video_list.length - 1){
                video_index++;
            }
            else{
                video_index = 0;
            }
            video_player.setAttribute("src", video_list[video_index]);
            video_player.play();
        }
    </script>

  
  

</body>
</html>