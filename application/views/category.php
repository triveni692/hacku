<?php echo $category; ?>
    <br>
    <a  href="<?php echo base_url()?>"><button class="pure-button" style="font-size: 90%;background: rgb(202, 60, 60);color:#EDEBE1;float:right;">
      Home
    </button></a><br><br>

    <?php 
    foreach ($questions as $key) {
      $id = $key['id'];
      $question = $key['question'];
      $path = $key['path'];
      
      echo $id." ".$question." ".$path."<br>";

      foreach ($comments[$id] as $keyy) {
        $c_id = $keyy['id'];
        $comment = $keyy['comment'];
        $whodid = $keyy['whodid'];
        echo $c_id." ".$comment." ".$whodid."<br>";
      }
      echo "<br>"; ?>

      <div id="comment">comment </div>
      <form style="display:none" id="xyz">
        <fieldset style="background:#DBD5E6;">
            
            <textarea placeholder="Enter your reply here" id="reply"></textarea>            

            <button style="float:right" id="button">Post Comment</button>

        </fieldset>
      <form>
    <?php
    }
    ?>
    <script>
      $("#comment").click(function(){
        $("#xyz").slideToggle();
      });
      $("#button").click(function() {
          var name = "<?php echo $name;?>";
          var content = $("#reply").val();
          var id = "<?php echo $id; ?>";
          //alert();
          
          var dataString = 'whodid='+ name + '&content=' + content + '&id=' + id;
          var url = "<?php echo base_url();?>forum/comment";
    
            $.ajax({
              type: "POST",
              url: url,              
              data: dataString,
              success: function() {
                alert("Updated Successfully");
              }
            });
            return false;
        });
    </script>
  