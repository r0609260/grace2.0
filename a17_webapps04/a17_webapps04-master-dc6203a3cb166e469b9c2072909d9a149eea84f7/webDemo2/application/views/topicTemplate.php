<?php echo form_open('ResidentController/Question/0');?>
    <div class="form-group">
        <?php foreach($paragraph as $par){
            $topicName = wordwrap($par['topicName'], 17, "<br />");
            echo '<button class="btn btn-link" name="' . $par['idTopic'] . '" type="submit" style="margin-left:10px;"><small>' . $topicName . '</small><img class="image_topic" style="size: 100px" src="' . base_url() . 'assets/css/image/icons8-topic-' . $par['idTopic'] .'.png"></button>';
        }?>
        
      
    </div>
<?php echo form_close();?>