<div style="font-size:30px;color:#780808;padding:20px;width:100%;">POLLING</div>
<div style="margin:20px;">
<form name="loginForm" action="<?php echo base_url(); ?>welcome/pollsubmit" method="POST" class="pure-form ">

                  <label style="font-family:sans-serif;color:#134975;font-size:16px;font-weight:bold;">Your Question</label>
                  <br>
                  <input type="text" name="pollquestion" style="width:85%;">
                    
                  <br><br>
                  <div id="option">
                  Option 1<input type="text" size=60% name="option1" style="margin:10px;" required><br>
                  Option 2<input type="text" size=60% name="option2" style="margin:10px;" required><br>
                  </div>
                  
                    <br>
                    <button id="loginn_button" class="pure-button pure-button" style="" onclick="return addmore()">Add more Options</button>
             		<button id="loginn_button" class="pure-button pure-button-secondary" onclick="return total()">Submit to Poll</button>
      </form><br><br>
      
</div>
<script>
var count=2;
function addmore(){
	count=count+1;

	var child ="Option "+count+"<input type='text' size=60% name='option"+count+"' style='margin:10px;'><br>"
	$("#option").append(child);

	return false;
}

function total(){
	var child="<input type='hidden' value='"+count+"' name='count'>"
	$("#option").append(child);
  var data = $('form').serialize();
$.post('http://localhost/welcome/pollsubmit', data);

  return true;
}
</script>