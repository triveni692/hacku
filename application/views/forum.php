<html>
<head>
<title>
Login to contiue</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.1/pure-min.css">
    <script src="<?php echo base_url() ?>js/jquery.js"></script>

</head>
<body>
<div id="heading" style="width:100%;height:10%;background:rgb(182,127,224);">
<a href="<?php echo base_url() ?>welcome" style="font-size:222%;color:#2E5B99;font-weight:bold;text-decoration:none">FORUM</a>
<a href="<?php echo base_url() ?>welcome/logout" style="float:right;text-decoration:none;margin:5px;color:#45051A;"><?php if($status == "login") echo "Logout"; else echo "LOGIN";?></a>
<span style="float:right;font-size:180%;color:#820932;font-weight:bold;">
<?php
if($status == "login") echo $name;
?>
</span>

</div>
<div id="subheading" style="width:100%;height:1%;background:rgb(101,46,153);">
</div>

    <div style="background:rgb(101,46,153);height:89%;width:20%;float:left;"> 
      <button class="pure-button" style="font-size: 125%;background: rgb(252, 240, 187);color:#61510C;" onclick="f('ESC201')">&nbsp;&nbsp;ESC201&nbsp;&nbsp;</button><br><br>
      
      <button class="pure-button" style="font-size: 125%;background: rgb(252, 240, 187);color:#61510C;" onclick="f('ESE200')">&nbsp;&nbsp;EEE200&nbsp;&nbsp;</button><br><br>

      <button class="pure-button" style="font-size: 125%;background: rgb(252, 240, 187);color:#61510C;" onclick="f('EEE201')">&nbsp;&nbsp;EEE201&nbsp;&nbsp;</button><br><br>

      <button class="pure-button" style="font-size: 125%;background: rgb(252, 240, 187);color:#61510C;" onclick="f('MSE200')">&nbsp;&nbsp;MSE200&nbsp;&nbsp;</button><br><br>

      <button class="pure-button" style="font-size: 125%;background: rgb(252, 240, 187);color:#61510C;" onclick="f('ESO200')">&nbsp;&nbsp;ESO200&nbsp;&nbsp;</button><br><br>

      <button class="pure-button" style="font-size: 125%;background: rgb(252, 240, 187);color:#61510C;" onclick="f('MTH200')">&nbsp;&nbsp;MTH200&nbsp;&nbsp;</button><br><br>
    </div>

  <div  style="background:rgb(242,233,194);height:89%;width:80%;overflow:scroll;" id="mainquestion">
  </div>
     
<script>
$(document).ready(function(){
  $("#mainquestion").load('<?php echo base_url();?>forum/category/none');
});
function f(id) {
  $("#mainquestion").load('<?php echo base_url();?>forum/category/'+id);
}
</script>
