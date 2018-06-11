<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>GraceAge 2.0 - Family</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel ="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>assets/css/ResidentMessage.less"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <script src="<?php echo base_url(); ?>assets/javascript/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
             <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/changeFontsize.js"></script>
    </head>

    <body>
        <script> var base_url = "<?php echo base_url();?>";</script>
        <div class="content row ">
            <div class="content col-md-12">
                <div class="row content">
                    <div class="col-md-12 content" id="messageCol">
                        <div class="content col-md-12">
                            <p class="text-right">
                                <span class="float_left">
                                    <button class="returnBtn btn btn-primary" type="button" onclick="location.href='<?php echo base_url();?>index.php/ResidentController/menu'">< Keer terug naar het menu</button>
                                </span>
                                <span class="float_right">Lettergrootte:
                                    <button id="BG" class="btn btn-primary" type="button" style="margin-left:10px;">Groter</button>
                                    <button id="BS" class="btn btn-primary" type="button">Kleiner</button>
                                </span>
                            </p>
                        </div><span class="col-md-2"><img src="{senderPhoto}" class="personImg" id="senderPhoto"/></span><span id="personsays" class="messageText col-md-10">{senderName} zegt:</span><span id="message" class="messageText col-md-10 col-md-offset-2">{messageText}</span>
                        <span
                            id="date" class="messageText col-md-10">{messageDate}</span>
                    </div>
                </div>
                <div class="row content">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 buttonLeftCol">
                        <button class="btn btn-default" type="button" onclick="getMessage(-1)" {prevMessageExists} id="prevMessage"> <span class="buttonSpan">Vorige</span><span class="buttonSpan">Foto</span><img src="<?php echo base_url(); ?>assets\css\image\icons8-left-100.png" class="icon" /></button>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 imgCol"><img src="{messagePhoto}" id="messagePhoto"/></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 buttonRightCol">
                        <button class="btn btn-default" type="button" onclick="getMessage(1)" {nextMessageExists} id="nextMessage"><span class="buttonSpan">Volgende</span><span class="buttonSpan">Foto</span><img src="<?php echo base_url(); ?>assets\css\image\icons8-right-100.png" class="icon" /></button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?PHP echo base_url();?>assets/javascript/residentMessages.js"></script>
    </body>

</html>