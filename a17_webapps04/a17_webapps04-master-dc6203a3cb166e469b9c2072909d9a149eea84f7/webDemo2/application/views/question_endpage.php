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
        <div>

            <p class="text-right"><span class="float_right" style="background-color:#2c3d51;">{font_size}
                    <input id="BG" class="btn btn-primary" type="submit" style="margin-left:10px;" value="{greater}" name='greatButton'>
                    <input id="BS" class="btn btn-primary" type="submit" value="{smaller}" name='smallButton'></span></p>
            <p class="text-center" style ="margin-top:120px;">{content}</p>

        </div>
        <div>
            <div class="container" style=" margin-top: 100px; padding-right: 20%; padding-left: 20%;">
                <div class="row">
                    <div class="col-md-6">
                        <?php echo form_open('ResidentController/Topics'); ?>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">{yes}</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo form_open('ResidentController/menu'); ?>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">{no}</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>


    </body>

</html>
