    <br>
    <button class="pure-button" style="font-size: 90%;background: rgb(202, 60, 60);color:#EDEBE1;float:right;" onclick="update()">
    	Update
    </button><br><br>
<?php foreach ($question as $news_item): ?>

<div  style="background:rgb(162,190,242);width:95%;padding:10px;margin:10px;" id="test<?php echo $news_item['id'] ?>">
    <?php echo $news_item['question'] ?>
      <button class="pure-button" style="font-size: 80%;background: rgb(151,230,167);color:#4D1818;" onclick="answer(<?php echo $news_item['id'] ?>)" id="one">Answer</button>
      <button class="pure-button" style="font-size: 80%;background: rgb(222,184,184);color:#4D1818;" onclick="cancel(<?php echo $news_item['id'] ?>)" id="one1">Cancel</button>

     </div>

     <?php endforeach ?>

<?php
/*
$file = fopen("http://localhost/test.txt","r");

while (! feof ($file))
  {
  $char= fgetc($file);
  echo $char;
  if($char=="?"){
  	echo "<br>";
  }

  }

fclose($file);

?>*/