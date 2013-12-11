<html>
<head>
<title>
Teacher</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.1/pure-min.css">
    <script src="<?php echo base_url() ?>js/jquery.js"></script>

</head>
<body>
<div id="heading" style="width:100%;height:10%;background:rgb(182,127,224);">
<a href="<?php echo base_url() ?>welcome" style="font-size:222%;color:#2E5B99;font-weight:bold;text-decoration:none">I THINK</a>
<a href="<?php echo base_url() ?>welcome/logout" style="float:right;text-decoration:none;margin:5px;color:#45051A;">Logout</a>
<span style="float:right;font-size:180%;color:#820932;font-weight:bold;">
<?php
echo $name;
?>
</span>

</div>
<div id="subheading" style="width:100%;height:1%;background:rgb(101,46,153);">
</div>

    <div style="background:rgb(101,46,153);height:89%;width:20%;float:left;"> 
<button class="pure-button" style="font-size: 125%;background: rgb(252, 240, 187);color:#61510C;">Skip to Courses</button><br><br><br>
<div style="font-size: 125%;background: rgb(252, 240, 187);color:#61510C;width:100%;">
<span style="color:#">Courses in Progress</span><hr>
</div>
<div style="color:#EDEBE1;padding:10px;cursor:pointer;background: rgb(127, 76, 176);" onclick="update()">
ESC 201
</div>
<br><br><br>
<button class="pure-button" style="font-size: 125%;background: rgb(202, 60, 60);color:#EDEBE1;" onclick="poll()">Ask For Poll</button>
     </div>

    <div  style="background:rgb(242,233,194);height:89%;width:80%;overflow:scroll;" id="mainquestion">
    <br>
    <button class="pure-button" style="font-size: 90%;background: rgb(202, 60, 60);color:#EDEBE1;float:right;" onclick="update()">
    	Update
    </button><br><br>


     </div>
     <script>
function cancel(one){
	
	var divid = "test"+one;
  var askques= $("#"+divid).text();
  $("#"+divid).load('http://localhost/p/welcome/updateaskquestion',{question: askques});
    $("#"+divid).fadeOut(600);

}

function update(){


	$.ajax({

      //i had to create another test fiddle to overcome the 'same origin' issues
      url: '<?php echo base_url() ?>/welcome/updatequestion',
      success: function(data) {             

          //we have the data now
          $('#mainquestion').fadeOut(100, function() {
            //this is a callback once the element has finished hiding

              //populate the div with whatever was returned from the ajax call
              $('#mainquestion').load('<?php echo base_url() ?>/welcome/updatequestion');
              //fade in with new content
              $("#mainquestion").fadeIn(1000);
          });
      }
    });
}

function poll(){

	$.ajax({

      //i had to create another test fiddle to overcome the 'same origin' issues
      url: '<?php echo base_url() ?>/welcome/poll',
      success: function(data) {             

          //we have the data now
          $('#mainquestion').fadeOut(100, function() {
            //this is a callback once the element has finished hiding

              //populate the div with whatever was returned from the ajax call
              $('#mainquestion').load('<?php echo base_url() ?>/welcome/poll');
              //fade in with new content
              $("#mainquestion").fadeIn(900);
          });
      }
    });
}

</script>
