<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type = "text/css">
    </head>
    <body>
        <main>
        <div id ="form">
            <form action="click" method="POST">
                <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
                    <div>GRACE AGE<span> Caregiver</span></div>
		</div>
		<br>
		<div class="login">
                    <input type="text" placeholder="username" name="user"><br>
                    <input type="password" placeholder="password" name="password"><br>
                    <input type="submit" value="Login">
		</div>
            </form>
        </div>
            <div class="jump">
                <input type="submit" value="Not a caregiver? Click here!">
            </div>
        </main>
    </body>
</html>
