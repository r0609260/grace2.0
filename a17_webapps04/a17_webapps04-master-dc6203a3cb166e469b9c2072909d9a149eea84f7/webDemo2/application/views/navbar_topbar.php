<!DOCTYPE html>
<html>
    <head>
        <title>GraceAge 2.0 - Caregiver</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <script src="<?php echo base_url(); ?>assets/javascript/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/javascript/bootstrap.min.js"></script>
        <link rel ="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>assets/css/Caregiver.less"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>

        
    </head>

    <body>
        <script> var base_url = "<?= base_url('') ?>";</script>
        <p class="text-right" id="header"><span class="float_left">GraceAge 2.0 - <?php echo $title; ?> </span></p>
        <div>
            <div class="container">
                <div class="row">
                <div class="col-lg-1 col-lg-push-0  col-md-1 col-md-push-0 col-md-offset-0 col-sm-2  col-sm-push-0 col-xs-6 col-xs-push-3">
                        {menu}
                        <li class="item {className}" id="{itemNr}">
                            <a href="{link}" class="{className2}"> 
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" viewBox="0 0 100 100">
                                <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)" fill="#2c3d51" stroke="none">
                                <path d="{img}"/>
                                </g>
                                </svg>
                                <span class="category">{name}</span>
                            </a>
                        </li>
                        {/menu} 
                    </div>
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">{content}</div>
                </div>
            </div>
        </div>
         <script src="<?php echo base_url(); ?>assets/javascript/popover.js"></script>
    </body>
</html>