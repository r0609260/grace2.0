<html>
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel ="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>assets/css/sendMessage.css"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
         
    </head>
    
    <body>
        <script> var base_url = "<?= base_url('') ?>";</script>        
        <div>
            <div id="container">
                <div id="row">
                    <?php echo form_open_multipart('UploadController/sendMessage'); ?>
                    
                    <div class="col-md-6 leftCol">
                        <div class="col-md-6"><img src={photo} id="imgPerson" name="{idUser}"/></div>
                        <div class="col-md-6 personInfo"><span class="normalPxFont personInfoLine">{welcome} {name}!</span>
                            <label for="file1" class="imgBtn" type="button">{changeImage}</label>
                            <input id="file1"  name="userfile1" type="file" size="20" onchange="readURL1(this);" style="display: none; " />
                        </div><span class="col-md-12 normalPxFont">{selectReceivers}</span>
                        <div class="col-md-12 buttonBar">
                            <label >
                                <input type="checkbox" name="deleteAll" onclick="selectAll(this)">
                                    <span class="checkmark"></span>
                            </label>

                            <button id="searchButton" class="searchButton" type="button" onclick="searchResidents()">
                                <svg class="filterSVG" version="1.0" xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" viewBox="0 0 100 100">
                                    <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)" fill="#2c3d51" stroke="none">
                                        <path d="M363 939 c-145 -18 -262 -137 -282 -284 -22 -159 53 -296 198 -364 
                                              47 -22 70 -26 141 -26 73 0 93 4 140 27 l55 28 130 -130 131 -130 32 
                                              33 32 33 -129 128 -129 129 29 45 c76 120 57 297 -44 409 -71 78 -186 
                                              117 -304 102z m173 -74 c180 -80 227 -307 95 -458 -40 -45 -121 -86 -187 
                                              -93 -164 -20 -319 122 -317 290 1 139 101 259 236 285 56 11 111 3 173 -24z"
                                              />
                                    </g>
                                </svg>
                            </button>
                            <input id="searchInput" type="text" class="searchBox" placeholder="{FirstName or LastName}" />
                        </div>
                      
                        <div id="residentsList" class="pre-scrollable col-md-12">
                            {residents}
                            <div class="line col-md-12">
                                <label>
                                    <input id="{idResident}" type="checkbox" name="delete_list[]" value="{idResident}"/><span class="checkmark"></span></label>
                                    <div class="resident"><span class="normalPxFont">{firstName} {lastName}</span><span class="imgSpan"> <img src="{photo}" width="58px" height="58px"/></span></div>
                            </div>
                            {/residents}                                   
                        </div>
                                                                    

                    </div>
                    <div class="col-md-6" id="rightcol"><span id="addImageHere" class="normalPxFont col-md-12">{makeMessage}</span>
                        <label for="file" class="imgBtn" type="button"><input id="file"  name="userfile" type="file" size="20" onchange="readURL(this);" style="display: none; " />{addImage}</label><span id="imageSpan" class="col-md-12"><img id="blah" alt="my image" src="#" class="imgPlaceHolder" /></span><span id="maxCharSpan">{maxChar}</span>
                       
                        <textarea name="messageContent" id="textArea" class="col-md-12" maxlength="250" placeholder="{messagePlaceholder}" onkeyup="charCounter();"></textarea>
                        <button class= "imgBtn" type="submit"  >{sendMessage}</button>
                    </div>
                   
                </div>
            </div>
        </div>
         
         <div id="id01" class="w3-modal" >
    <div class="w3-modal-content" style="width: 450px; height: 200px; margin-top: 120px;">
      <div class="w3-container">
          <span>Would you want to send the message to others ?</span>
      
     
        <button class="filter_submitButton" onclick="document.getElementById('id01').style.display='none'">Yes</button>
        <form method="post" action="addMessage">
            <button type="submit" class="filter_submitButton" >No</button>
        </form>
      </div>
    </div>
  </div>
        
        
<script type="text/javascript" src="<?PHP echo base_url();?>assets/javascript/sendMessage.js"></script>
        <script type="text/javascript" src="<?PHP echo base_url(); ?>assets/javascript/caregiver_message.js"></script>
    </body>
    <script>
        $(function () {
            $("#searchInput").keydown(function (event) {
                if (event.keyCode === 13) //when pressing enter
                {
                    event.preventDefault();
                    $("#searchButton").click();
                }
            });

        });

    </script>


</html>