    <br>
    <button class="pure-button" style="font-size: 90%;background: rgb(202, 60, 60);color:#EDEBE1;float:right;" onclick="update()">
    	Update
    </button><br><br>
<?php foreach ($poll as $news_item): ?>

	<span style="width:50%;font-size:<?php if($news_item['type']<0)echo'40px'; else echo '30px'; ?>;color:#1A3B57;">
    <?php if($news_item['value'] <0) echo $news_item['type']."<br><br>"; ?>
    </span>
    <span style="width:50%;font-size:<?php if($news_item['type']>=0)echo'30px'; else echo '30px'; ?>;color:#1A3B57;">
    <?php if($news_item['value'] >=0) echo $news_item['type']; ?>
    </span>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="width:50%;font-size:20px;color:#1A3B57;">
    <?php if($news_item['value']>=0) echo $news_item['value'] ?>
    </span>
  <br><br>
     <?php endforeach ?>