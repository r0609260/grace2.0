<!DOCTYPE html>
 
<html>
    <head>
        <title>GraceAge 2.0 - Resident</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel ="stylesheet/less" type="text/css" href="<?php echo base_url();?>/assets/css/QuestionPage.less"/>
        <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
        
    </head>
    <body>
        <div id="content">
            <div class="page-header" style="background: #2c3d51;">
                <div class="row" style="background: #2c3d51;">
                    <h1 class="col-md-8" style="font-family: 'CaviarDreams',sans-serif;color:#e4e4e4;opacity: 20%"><font size="20"><b>{topic}</b></font></h1>
                    
                    <div class ="col-md-4" style="display:flex; flex-direction: row">
                        <h2 type="text"style="font-family: 'Lato', sans-serif; margin-left: 20px; padding-top: 20px;
                              margin-right: 20px;font-size: 20px;color:#e4e4e4;">Letter Size:</h2>
                        <button type="button" class="btn btn-lg btn-primary"style="background:#e4e4e4;margin-top: 30px; font-family: 'Lato:900', sans-serif;color:#2c3d51;">Smaller Font</button>
                        <button type="button" class="btn btn-lg btn-primary"style="background:#e4e4e4;margin-top: 30px;font-family: 'Lato', sans-serif;color:#2c3d51;">Bigger Font</button>
                        
                    </div>
                </div>
            </div>
            <div id="question" class="container"style="color:2c3d51">
                <p class="text-center" style="font-family: 'Lato', sans-serif;color:#2c3d51"><font size="20">{question}</font></p>
            </div>
            <form action="" id='questionForm' onsubmit="return nextQuestion()">
            <div class="row">
                <?php echo form_input($hiddenQuestionNr)?>
                <div class="col-md-1"></div>
                <div class="col-md-2" align="center">
                    <button id="b0" style="height:180px; width:  16.7%;" type="submit"><img id="img0" src="http://a17-webapps04.studev.groept.be/assets/css/image/face.png" width="20"style="border-radius: 10%;"/></button>
                </div>
                <div class="col-md-2" align="center">
                    <button id="b1" style="height:180px; width: 16.7%; " type="submit"><img id="img1" src="http://a17-webapps04.studev.groept.be/assets/css/image/face1.png" width="20"style="border-radius: 10%; "/></button>
                </div>
                <div class="col-md-2" align="center">
                    <button id="b2" style="height:180px; width: 16.7%;" type="submit"><img id="img2" src="http://a17-webapps04.studev.groept.be/assets/css/image/face2.png" width="20"style="border-radius: 10%;" /></button>
                </div>            
                <div class="col-md-2"align="center">
                    <button id="b3" style="height:180px; width: 16.7%;" type="submit"><img id="img3" src="http://a17-webapps04.studev.groept.be/assets/css/image/face3.png" width="20"style="border-radius: 10%;" /></button>
                </div>
                <div class="col-md-2" align="center">
                    <button id="b4" style="height:180px; width: 16.7%;" type="submit"><img id="img4" src="http://a17-webapps04.studev.groept.be/assets/css/image/face4.png" width="20"style="border-radius: 10%; "/></button>
                </div>
                <div class="col-md-1"></div>
            </div>
            <script type="text/javascript" src ="<?php echo base_url();?>assets/javascript/questionpage.js"></script>
            </form>
        </div>
    </body>
</html>
