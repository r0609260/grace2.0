        <div class="row">
         <div class="col-md-12" style="display: block; text-align: center;margin-top: 5%;">
          <?php echo form_open_multipart('UploadController/resident_upload');?>
             <span id="label_span"></span>
             <label for="file" class="btn-photo" style="background-image: url({photo}); background-position: center; background-size: cover; font-size: 150%">
                 <input id="file"  name="userfile" type="file" size="20" style="display: none; " />
             </label>  
             <input id="upload_button" type="submit" style="display: none;" />
             
        </form>  
         </div>
        </div>
        <form class="form-horizontal" method="post" action="uploadPhotoConfirm">
            <div class="row" style="margin-top: 8%;">
                
                    <div class="col-sm-5 col-sm-offset-3 col-xs-12">
                    <input type="submit" class="btn-confirm" name="submit2" value="Finish Upload">
                    </div>
        </div>
        </form>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/modal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/script.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $("#file").on("change",function()
        {
            var files=$(this)[0].files;
            if(files.length>=1)
           
        {
                $("#upload_button").click();
            }
           
        
        });
        
      
    });
    

    </script>
