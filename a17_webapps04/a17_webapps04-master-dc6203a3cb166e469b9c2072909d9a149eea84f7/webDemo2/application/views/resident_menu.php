<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>GraceAge 2.0 - Family</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel ="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>assets/css/ResidentMenu.less"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/javascript/jquery.min.js"></script> 
        <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/changeFontsize.js"></script>
    </head>

    <body>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <p class="text-right"><span class="float_right">{font_size}<button id="BG" class="btn btn-primary" type="button" style="margin-left:10px;">{greater} </button><button id="BS" class="btn btn-primary" type="button">{smaller} </button></span></p>
                </div><span class="text-center">{sentence1}</span>
                <form>
                    <button class="btn btn-default menuButton" type="button" onclick="location='message'" {messageDisabled}>{sentence2}</button>
                </form>
                <form>
                    <button class="btn btn-default menuButton" type="button" onclick="location='topics'">{sentence3}</button>
                </form>
                <form>
                    <button class="btn btn-default menuButton" type="button" onclick="location='login'">{sentence4}</button>
                </form>
            </div>
        </div>
    </body>

</html>