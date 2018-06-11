<!DOCTYPE html>
<html>

    <head>
        <title>GraceAge 2.0 - Resident</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link id="pageStyle" rel ="stylesheet/less" type="text/css" href="<?php echo base_url() ?>assets/css/Resident.less"/> 
        <script src="<?php echo base_url(); ?>assets/javascript/jquery.min.js"></script> 
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/changeFontsize.js"></script>       
    </head>

    <body id="88">
        <div style="font-size: 0px">


            <p class="text-right" id="header"><span class="float_left">{welcome} {name}, {choose_topic}</span><span class="float_right">{font_size}<button id="BG" name="greatButton" class="btn btn-primary" style="margin-left:10px;">{greater}</button><button id="BS" name="smallButton" class="btn btn-primary">{smaller}</button></span></p>
            {topicButtons}
        </div>
        <script src="<?php echo base_url(); ?>assets/javascript/bootstrap.min.js"></script>
        
    </body>
</html>