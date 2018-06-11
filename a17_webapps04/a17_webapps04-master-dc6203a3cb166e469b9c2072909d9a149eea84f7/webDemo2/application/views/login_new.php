<!DOCTYPE html>
<html>

<head>
        <title>GraceAge 2.0 - Resident</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel ="stylesheet/less" type="text/css" href="<?php echo base_url();?>assets/css/LoginPage.css"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
 </head>

<body>
    <div class="login-dark">
        <button class="btn btn-primary btn pull-right" onclick="window.location.href='<?php echo base_url();?>index.php/ResidentController/login'">{goto_resident}</button>
        <button id=ENbtn class="btn btn-primary btn pull-left" onclick="window.location.href='<?php echo base_url();?>index.php/caregiverController/login?lang=english'">EN</button>
        <button id= NLbtn class="btn btn-primary btn pull-left" onclick="window.location.href='<?php echo base_url();?>index.php/caregiverController/login?lang=dutch'">NL</button>

        <h1 class="text-center">GraceAge 2.0</h1>
        <form method="post" action="login">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration" style="height:auto;"><img src="<?php echo base_url();?>assets/css/image/icons8-lock.png" style="margin-top:-40px;"></div>            
            <div class="form-group" style="height:auto;">
                <p id="form_error" <?php echo form_error('user'); ?></p>
                <?php echo $login_fail; ?></p>
                <input id="user_field" class="form-control" type="text" name="user" placeholder="{username}" value="<?php echo set_value('user'); ?>" style="font-family:Lato, sans-serif;font-size:18px;">
            </div>
            <div class="form-group" style="height:auto;">
                <p id="form_error"  <?php echo form_error('password'); ?></p>
                <input id="user_field" class="form-control" type="password" name="password" placeholder="{password}" style="font-family:Lato, sans-serif;font-size:18px;">
            </div>
            <div class="form-group" style="height:auto;">
                <button class="btn btn-primary btn-block" type="submit" style="background-color:#f4f4f4;color:#2c3d51;">{login}</button>
            </div>
        </form>
    </div>
</body>

</html>