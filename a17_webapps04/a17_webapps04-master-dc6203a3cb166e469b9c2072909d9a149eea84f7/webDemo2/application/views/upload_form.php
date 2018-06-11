<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('UploadController/do_upload');?>

 <label for="file" class="input-label" style=" background:#009688; display: flex; flex-direction: row; width: 100px; height: 40px; color: #fff;  text-align: center;"  ><span id="label_span">Select your photo</span> </label><input id="file"  name="userfile" type="file" size="20" style=" display: none;" />

<br /><br />

<input type="submit" value="upload" />
<input id="login_close" type="button" value="cancel" />

<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/jquery2.2.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/modal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/script.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $("#file").on("change",function()
        {
            $("#label_span").text("The photo is ready");
            
        });
        
      
    });
    
     $(document).ready(function()
    {
        $("#login_close").on("click",function()
        {
            $("#file").val('');
             $("#label_span").text("Selct photo");
        });
    });
      
    </script>
</form>

</body>
</html>