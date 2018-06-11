<!DOCTYPE html>
<html>
    <head>
        <title>GraceAge 2.0 - Resident</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel ="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>assets/css/Resident.less"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/javascript/jquery.min.js"></script> 
        <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/changeFontsize.js"></script>
    </head>
    <body>
        <script> var base_url = "<?= base_url('') ?>";</script>
        <div>
            <p class="text-right" id="header"><span class="float_left">{topic}</span><span class="float_right">{font_size}<button id="BG" class="btn btn-primary" type="button" style="margin-left:10px;">{greater} </button><button id="BS" class="btn btn-primary" type="button">{smaller} </button></span></p>
            <p
                class="text-center" style="margin-top:60px;">{question}</p>
            <form style="margin-top:120px;" action="" id='questionForm' onsubmit="return nextQuestion()">
                <div class="form-group" id = "questionForm">
                    <?php echo form_input($hiddenQuestionNr)?>
                    <?php echo form_input($hiddenQuestionId)?>
                    <div>
                        <button class="btn btn-link question" onclick="score=0;" type="submit"><small>{verybad}</small><img class="image_topic" src="<?php echo base_url();?>assets/css/image/sad.png"></button>
                        <button class="btn btn-link" onclick="score=1;" type="submit"><small>{bad}</small><img class="image_topic" src="<?php echo base_url();?>assets/css/image/sadsad.png"></button>
                        <button class="btn btn-link" onclick="score=2;" type="submit"><small>{ok}</small><img class="image_topic" src="<?php echo base_url();?>assets/css/image/sadsadsad.png"></button>
                    </div>
                    <div>
                       <button class="btn btn-link" onclick="score=3;" type="submit"><small>{good}</small><img class="image_topic" src="<?php echo base_url();?>assets/css/image/happy.png"></button>
                       <button class="btn btn-link" onclick="score=4;" type="submit"><small>{verygood}</small><img class="image_topic" src="<?php echo base_url();?>assets/css/image/happyhappy.png"></button>
                    </div>
                </div>
                <div>
                    <button id="btnSkip" class="btn btn-primary" onclick="score=5" type="submit">{skipquestion}</button>
                </div>
            </form>
        </div>
        <script type="text/javascript" src ="<?php echo base_url();?>assets/javascript/questionpage.js"></script>
        
    </body>
    
</html>