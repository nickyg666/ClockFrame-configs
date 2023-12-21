<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="dropzone.css"/>
<!--link rel="stylesheet" type="text/css" href="new.css"/-->
<script src="jquery-3.6.0.js"></script>
<script src="dropzonelate.js" type='text/javascript'></script>
</head>

<body>

<style>
body {
  background-image: linear-gradient(to right, #8B8756, #ECE6B1);
  background-size: 800px;
}
@font-face {
  font-family: "doboto";
  src: url("/var/www/html/android/RobLite.ttf") format("ttf");
}
#live-controls {
  background-image: linear-gradient(to top left, #F7F538, #F6D400);
  border-radius: 40px;
  padding: 10px;
  width: 330px;
  height: 375px;
  position: absolute;
  top: 15px;
  left: 5px;
  font-family: Roboto;
  font-size: 9px;
  text-align: center;
}
.label {
  font-family: Roboto;
  font-size: 10px;
  text-align: center;
  color: black;
}
#login {
  position: absolute;
  top: 0px;
  left: 290px;
  background-image: radial-gradient(#F7F538, #F6AD00);
  border-radius: 120px;
  color:black;
  font-family: Roboto;
  font-weight: bold;
  font-size: 6px;
  text-align: center;
  height: 60px;
  width: 60px;

}
#io {
  position: relative;
  height: 100px;
  top: 360px;
  background-image: linear-gradient(to top left, #F7F538, #F6D400);
  border-radius: 50px;
  color:black;
  font-family: Roboto;
  font-size: 10px;
  text-align: center;
  resize: none;
  padding: 10px 22px;
  margin: 4px 2px;
  cursor: pointer
}
#free_space {
  resize: none;
  position: absolute;
  top: 250px;
  border: dashed, black;
  left: 200px;
  font-family: roboto;
  font-size: 13px;
  text-align: center;
  background-image: radial-gradient(#A10100, #890000);
  border-radius: 90px;
  color:black;
  height: 90px;
  width: 90px;
  overflow: hidden;
  padding: 15px;
  cursor: pointer;
}
#drop { //"quick upload"
  position: absolute;
  top: 243px;
  left: 35px;
  font-family: roboto;
  font-size: 10px;
  text-align: center;
  border-radius: 90px;
  color:black;
  height: 120px;
  width:120px;
  resize: none;
  padding-top: 8px;
  border: 1px dashed #000000;
  //rbackground-image: url("DUDE.bmp");
  background-size: 150px 147px;
  overflow: scroll;
}

input[type="numeric"] {
  width: 2em;
}
input::placeholder {
  font-weight: bold;
  font-size:6px;
}
#album,.duration,#custom {
  border-radius: 120px;
  background-color:rgba(105,99,159,0.25);
  color:rgba(219,219,219,1);
}
#options {
  position: absolute;
  top: 40px;
  left: 50px;
}
.playback {
  font-family: roboto, sans-serif;
  font-size: 47px;
  border: 0px;
  border-radius: 8px;
  //background-image: radial-gradient(#DB0000, #DB6E00);
  background-color: transparent;
  padding-bottom: 0px;
  width: 55px;
  height: 55px;
  text-align: center;
  position: relative;
  top: 130px;
}
#delete_current {
  background-image: url(/var/www/html/images/del.png);
  background-color: transparent;
}
#play {
  background-image: url(/var/www/html/images/play.png);
  background-color: transparent;
}
#pause {
  background-image: url(/var/www/html/images/pause.png);
  background-color: transparent;
}
#FileBrowser {
  position: relative;
  top: 390px;
  text-align: center;
  font-family: roboto;
  font-size: 12px;
}
#power,#reboot {
  border-radius: 120px;
  background-color:rgba(105,99,159,0.25);
  color:rgba(0,0,0,1);
}
#reboot {
  background-image:url(images/reboot.png);
  background-color: transparent;
}
</style>
<!--BEGIN INSECURE PHP, EVERYWHERE -->
<?php


if(isset($_POST['custom'])) {
        $custom = $_POST['custom'];
        shell_exec("$custom");
        }

if(isset($_POST['play'])) {
        $ts = $_POST['durationS'];
        $tm = $_POST['durationM'];
        $th = $_POST['durationH'];
        $t = ((int)$tm * 60) + ((int)$th * 60 * 60) + $ts;
        //echo $t;
        $rel_alb_dir = $_POST['album'];
        exec("sudo killall -3 fbi");
        echo exec("sudo fbi $rel_alb_dir --random --timeout $t -a --edit --noverbose  -m round -T 1");
        }
if(isset($_POST['reboot'])) {
        exec('sudo reboot');
        }
if(isset($_POST['power'])) {
        exec('sudo shutdown -h now');        }
if(isset($_POST['pause'])) {
        shell_exec('sudo /usr/bin/fbi_pause');
        }
if(isset($_POST['delete_current'])) {        echo "<script>alert('Photo deleted. Check out Album Management to delete many at once.');</script>";
        shell_exec('sudo /usr/bin/fbi_del');
        }

if(isset($_POST['rot_left'])) {
        shell_exec('sudo /usr/bin/fbi_rot_left');
        }

if(isset($_POST['rot_right'])) {
        shell_exec('sudo /usr/bin/fbi_rot_right');
        }
?>
<?php//dropzonestuff scared to delete not sure needed
if(isset($_POST[''])){
        $countfiles = count($_FILES['file']['name']);
        for($i=0;$i<$countfiles;$i++){
                $filename = $_FILES['file']['name'][$i];
                move_uploaded_files($_FILES['file']['tmp_name'][$i],'Pictures/'.$filename);
        }
}
?>
<!-- BEGIN HTML FORM DATA --- END PHP SECTION -->
<div id="live-controls">

<div id="FileBrowser">
<a href="http://clockframe.wifi:2080">Album Management</a>
</div>
<form method="post">

<div id="options">
<label class="label" for="durationS">Change the current photo every:</label>
<br>
<input type="numeric" class="duration" name="durationH" id="durationH" placeholder="(hours)" onfocus="this.placeholder=''" onblur="this.placeholder='(hours)'">
<input type="numeric" name="durationM" class="duration" id="durationM" placeholder="(mins)" onfocus="this.placeholder=''" onblur="this.placeholder='(mins)'">
<input type="numeric" name="durationS" id="durationS" class="duration" placeholder="(seconds)" onfocus="this.placeholder=''" onblur="this.placeholder='(seconds)'"><br>
<br>
<input type="text" name="album" id="album" placeholder="test" onfocus="this.placeholder=''" onblur="this.placeholder='test'" value="-l /home/clockframe/clockframe.lst"> <br>
<label for="album" class="label">leave as is for "shuffle all", <br> add /Pictures/'my album' format to use custom albums.</label>
<br>
</div>

<input type="submit" id="play" name="play"  class="playback" value="▶">

<input type="submit" name="rot_right"  class="playback" value="↻">
<input type="submit" name="rot_left"  class="playback" value="↺">
<input type="submit" name="pause" id="pause" class="playback"  value="𝝞𝝞"><input type="submit" id="delete_current" name="delete_current" class="playback" value ="⌫ ">
<br>

<div id="io">

<input type="submit" name="reboot" id="reboot" value="Reboot ClockFrame">
<br>
<br><br><br>
<input type="submit" name="power" id="power" src="images/power.png" value="Power off">
<br><br><br>
<br><br><br>
<input type="text" name="custom" id="custom" placeholder="custom exec command" onfocus:"this.placeholder''" onblur:"this.placeholder='custom exec command🤞'">

</div>

<div onclick="location.href='intent://http://clockframe.wifi/index.php#intent;scheme=http;end';" id="login">
<br>
<br>
<br>
Login for full access!

</div>

</div><!-- this div is whole first box with controls-->

<div id="both_circles">
<textarea id="free_space" class="stats" rows="1" columns="1" readonly>
<?php

$GB_free = disk_free_space("Pictures")/1024/1024/1024;
$final = round($GB_free,2);
echo $final . "\r\n" . " GB free";
echo "\r\n";
echo "\r\n";
echo file_get_contents('/var/www/html/battery.txt');
echo "\r\n";
echo file_get_contents('temp.txt');
?>
</textarea>




<form method="post" class="controls">

</form>

<!--script>alert('Welcome to the ClockFrame Dash Beta, Work in progress!');</script-->




<form action="upload.php" id="drop" class="dropzone">
<div class="dz-message" data-dz-message>
<span>
<br>
<h1>Quick Upload</h1>
</span>
</div>
</form>

</div> <!--group of both circles-->

<script>
Dropzone.options.drop = {
  maxFilesize: 98726, //mb
  timeout: 0, //ms, cancels timeout
  dictDefaultMessage: "Quick Upload",
  init: function() {
    this.on("uploadprogress:, function(file, progress)
      console.log("File progress", progress);
    });
  }
}
</script>

</body>


</html>
