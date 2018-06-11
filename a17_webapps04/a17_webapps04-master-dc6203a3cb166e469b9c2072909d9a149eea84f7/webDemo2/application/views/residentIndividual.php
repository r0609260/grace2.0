
<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/modal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/script.js"></script>

<div class="row" display="height:calc(100vh - 60px)">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  residentInfoCol">
        <div id="infoDiv">
            <span id="residentHeader"><span id="imgSpan"><img src="{photo}" id="image"></span><span class="infoTitleTxt">{firstName} {lastName}</span>
                <span class="infoTitleTxt" >{room} {roomNr}</span>

            </span>
            <span id="residentContent"><span id="sector" class="infoTxt">{sectorString}: {sector}</span><span id="language" class="infoTxt">{languageString}: {language}</span><span id="birthday" class="infoTxt">{birthDate}: {birthday}</span>
                <span id="gender" class="infoTxt">{genderString}: {gender}</span>
                <span id="isMarried" class="infoTxt">{marriedString}: {married}</span>
                <span id="children" class="infoTxt">{childrenString}: {children}</span>
            </span>

            <span id="residentContent">
                <span class="infoTitleTxt" >{changeInfo}</span>
                <span class="dropup">
                    <button class="btn infoTxt" type="button" data-toggle="dropdown">{changeSector}: {sector}<span class="caret"></span></button>
                    <ul class="dropdown-menu"> 
                        {sectors}
                        <li><a href="<?php echo base_url() ?>index.php/CaregiverController/residentIndividual?sector={idSector}">{name}</a></li>  
                        {/sectors}
                    </ul>
                </span>
                <span>
                    <div class="editGroup input-group number-spinner">
                                <span class="formLabel input-group-btn">{getQR}</span>
                                <span class="input-group-btn">
                                    <button class="formBtn btn btn-default" data-dir="dwn"><a href="getPDFResident" download><span style="color: #2c3d51" class="glyphicon glyphicon-download-alt"></a></span></button>
                                </span>
                            </div>
                </span>
                            <div class="editGroup input-group number-spinner">
                                <span class="formLabel input-group-btn">{roomNumber}</span>
                                <input type="number" min="0" class="form-control text-center" id="changeRoom" value="{roomNr}">
                                <span class="input-group-btn">
                                    <button class="formBtn btn btn-default" data-dir="dwn" onclick="location.href=
                                                '<?php echo base_url() ?>index.php/CaregiverController/residentIndividual?room=' 
                                                + document.getElementById('changeRoom').value;">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                </span>
                            </div>
            </span>

        </div>
    </div>

    <div class="col-lg-8 col-md-8 col-sm-6  residentInfoCol" id="rightInfoCol">
        <ul class="nav nav-tabs">
            <li class="{scores_active}"><a id=scoreLijstNavItem href="residentIndividual" class="navItem">{scores}</a></li>
            <li class="{problems_active}"><a id="problemenNavItem" href="residentProblems" class="navItem" >{issues}</a></li>
        </ul>

        <div class="row" id="personalStats" {scores_hidden}>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="statColLeft">
                <div class="statItem">
                    <span class="subjectTitle">{topic1}</span>
                    <span class="subjectInfo">{scoreTopic1} <img src="<?php echo base_url() ?>{arrowImage1}" class="arrow">
                        <span class = "subjectInfo2">
                            <div class="calendarDiv"><img src="<?php echo base_url() ?>assets/css/image/icon8-calendar.png" class="calendarIcon">
                                <small class="timeText" id = "LastTime1">{LastTime1}d </small>
                            </div>
                        </span>
                    </span>

                </div>

                <div class="statItem">
                    <span class="subjectTitle">{topic2}</span>
                    <span class="subjectInfo" >{scoreTopic2} <img src="<?php echo base_url() ?>{arrowImage2}" class="arrow">
                        <span class = "subjectInfo2">
                            <div class="calendarDiv"><img src="<?php echo base_url() ?>assets/css/image/icon8-calendar.png" class="calendarIcon">
                                <small class="timeText" id = "LastTime2">{LastTime2}d </small>
                            </div>
                        </span>
                    </span>
                </div>

                <div class="statItem">
                    <span class="subjectTitle">{topic3}</span>
                    <span class="subjectInfo" >{scoreTopic3} <img src="<?php echo base_url() ?>{arrowImage3}" class="arrow">
                        <span class = "subjectInfo2">
                            <div class="calendarDiv"><img src="<?php echo base_url() ?>assets/css/image/icon8-calendar.png" class="calendarIcon">
                                <small class="timeText" id = "LastTime3">{LastTime3}d </small>
                            </div>
                        </span>
                    </span>

                </div>

                <div class="statItem">
                    <span class="subjectTitle">{topic4}</span>
                    <span class="subjectInfo" >{scoreTopic4} <img src="<?php echo base_url() ?>{arrowImage4}" class="arrow">
                        <span class = "subjectInfo2">
                            <div class="calendarDiv"><img src="<?php echo base_url() ?>assets/css/image/icon8-calendar.png" class="calendarIcon">
                                <small class="timeText" id = "LastTime4">{LastTime4}d </small>
                            </div>
                        </span></span>

                </div>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="statColMiddle">
                <div class="statItem">
                    <span class="subjectTitle">{topic5}</span>
                    <span class="subjectInfo" >{scoreTopic5} <img src="<?php echo base_url() ?>{arrowImage5}" class="arrow">
                        <span class = "subjectInfo2">
                            <div class="calendarDiv"><img src="<?php echo base_url() ?>assets/css/image/icon8-calendar.png" class="calendarIcon">
                                <small class="timeText" id = "LastTime5">{LastTime5}d </small>
                            </div>
                        </span>
                    </span>

                </div>

                <div class="statItem">
                    <span class="subjectTitle">{topic6}</span>
                    <span class="subjectInfo" >{scoreTopic6} <img src="<?php echo base_url() ?>{arrowImage6}" class="arrow">
                        <span class = "subjectInfo2">
                            <div class="calendarDiv"><img src="<?php echo base_url() ?>assets/css/image/icon8-calendar.png" class="calendarIcon">
                                <small class="timeText" id = "LastTime6">{LastTime6}d </small>
                            </div>
                        </span>
                    </span>

                </div>

                <div class="statItem">
                    <span class="subjectTitle">{topic7}</span>
                    <span class="subjectInfo" >{scoreTopic7} <img src="<?php echo base_url() ?>{arrowImage7}" class="arrow">
                        <span class = "subjectInfo2">
                            <div class="calendarDiv"><img src="<?php echo base_url() ?>assets/css/image/icon8-calendar.png" class="calendarIcon">
                                <small class="timeText" id = "LastTime7">{LastTime7}d </small>
                            </div>
                        </span>
                    </span>

                </div>

                <div class="statItem">
                    <span class="subjectTitle">{topic8}</span>
                    <span class="subjectInfo" >{scoreTopic8} <img src="<?php echo base_url() ?>{arrowImage8}" class="arrow"><span class = "subjectInfo2">
                            <div class="calendarDiv"><img src="<?php echo base_url() ?>assets/css/image/icon8-calendar.png" class="calendarIcon">
                                <small class="timeText" id = "LastTime8">{LastTime8}d </small>
                            </div>
                        </span>
                    </span>

                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="statColRight">
                <div class="statItem">
                    <span class="subjectTitle">{topic9}</span>
                    <span class="subjectInfo" >{scoreTopic9} <img src="<?php echo base_url() ?>{arrowImage9}" class="arrow"><span class = "subjectInfo2">
                            <div class="calendarDiv"><img src="<?php echo base_url() ?>assets/css/image/icon8-calendar.png" class="calendarIcon">
                                <small class="timeText" id = "LastTime9">{LastTime9}d </small>
                            </div>
                        </span>
                    </span>

                </div>

                <div class="statItem">
                    <span class="subjectTitle">{topic10}</span>
                    <span class="subjectInfo" >{scoreTopic10} <img src="<?php echo base_url() ?>{arrowImage10}" class="arrow">
                        <span class = "subjectInfo2">
                            <div class="calendarDiv"><img src="<?php echo base_url() ?>assets/css/image/icon8-calendar.png" class="calendarIcon">
                                <small class="timeText" id = "LastTime10">{LastTime10}d </small>
                            </div>
                        </span>
                    </span>

                </div>

                <div class="statItem">
                    <span class="subjectTitle">{topic11}</span>
                    <span class="subjectInfo" >{scoreTopic11} <img src="<?php echo base_url() ?>{arrowImage11}" class="arrow">
                        <span class = "subjectInfo2">
                            <div class="calendarDiv"><img src="<?php echo base_url() ?>assets/css/image/icon8-calendar.png" class="calendarIcon">
                                <small class="timeText" id = "LastTime11">{LastTime11}d </small>
                            </div>
                        </span>
                    </span>

                </div>
            </div>            
        </div>


    </div>

    <div class="row" id="personalProblems" {problems_hidden}>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="problemLeftCol"><span class="problemTitle">{shortTerm}

                <button class="btn btn-default removeBtn " type="submit" id="removeBtnNonUrg" form="deleteNonUrgPro"><img src="<?php echo base_url() ?>assets/css/image/icons8-trash-100.png" id="iconTrash" /></button>
                <button class="btn btn-default addBtn" type="submit" id="addBtn1"><img src="<?php echo base_url() ?>assets/css/image/icons8-plus-100.png" id="iconAdd" /></button></span>
            <span
                class="space"> </span>

            <form  action="deleteProblems" method="post" id="deleteNonUrgPro">
                {nonUrgProbs}
                <div class="line">
                    <label>
                        <input type="checkbox" name="delete_problem[]" value='{idProblem}' /><span class="checkmark"></span></label>
                    <div class="message messageProbs"><textarea class="probTextArea"style="margin-top:{marginTop}px; width:100%; border-color: transparent;background-color: transparent;">{text}</textarea></div>
                </div>
                {/nonUrgProbs}
            </form>

            <form method="post" action="addNonUrgProbs">
                <div class="line">
                    <label>
                        <input type="checkbox" /><span class="checkmark" style="display:none"></span></label>
                    <div class="message" id="inputMessage1" style="display:none">
                        <textarea name="nonUrgProb" class = "text textProb" id="inputBlock1" style="display:none"></textarea>
                        <button type="submit" id="nonUrgProb_submit" class="submitMessageBtn">
                            <img class="submitMessageImg" src="<?php echo base_url() ?>assets/css/image/icons8-checkSubmit.png"/></button>

                    </div>
                </div>
            </form>


        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="problemRightCol"><span class="problemTitle">
                <button class="btn btn-default removeBtn" type="submit" id="removeBtnNonUrg"  form="deleteUrgPro"><img src="<?php echo base_url() ?>assets/css/image/icons8-trash-100.png" id="iconTrash" /></button>{longTerm}
                <button class="btn btn-default addBtn" type="submit" id="addBtn2"><img src="<?php echo base_url() ?>assets/css/image/icons8-plus-100.png" id="iconAdd" /></button></span>
            <span
                class="space"> </span>

            <form  action="deleteProblems" method="post" id="deleteUrgPro">
                {urgProbs}
                <div class="line">
                    <label>
                        <input type="checkbox" name="delete_problem[]" value='{idProblem}'/><span class="checkmark"></span></label>
                    <div class="message messageProbs">
                        <textarea class="probTextArea"style="margin-top:{marginTop}px; width:100%; border-color: transparent;background-color: transparent;">{text}</textarea>
                    </div>
                </div>
                {/urgProbs}
            </form>        



            <form method="post" action="addUrgProbs">
                <div class="line">
                    <label>
                        <input type="checkbox" /><span class="checkmark" style="display:none"></span></label>
                    <div class="message" id="inputMessage2" style="display:none">
                        <textarea name="urgProb" class = "text textProb" id="inputBlock2" style="display:none; "></textarea>
                        <button type="submit" id="urgProb_submit" class="submitMessageBtn">
                            <img class="submitMessageImg" src="<?php echo base_url() ?>assets/css/image/icons8-checkSubmit.png"/></button>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>
</div>

<script>
    $(function () {
        $("#addBtn1").click(function () {
            $("#inputBlock1").removeAttr("style");
            $("#inputMessage1").removeAttr("style");
        });

        $("#inputBlock1").on("keydown", function (event) {
            if (event.which === 13)
            {
                return false;
            }
        });

        $("#addBtn2").click(function () {
            console.log("aaa");
            $("#inputBlock2").removeAttr("style");
            $("#inputMessage2").removeAttr("style");
        });

        $("#inputBlock2").on("keydown", function (event) {
            if (event.which === 13)
            {
                return false;
            }
        });

        $("#addBtn3").click(function () {
            console.log("aaa");
            $("#inputBlock3").removeAttr("style");
            $("#inputMessage3").removeAttr("style");
        });

        $("#inputBlock3").on("keydown", function (event) {
            if (event.which === 13)
            {
                return false;
            }
        });

        $('#LastTime1').css('color', '<?php echo '{colorSubject1}' ?>');
        $('#LastTime2').css('color', '<?php echo '{colorSubject2}' ?>');
        $('#LastTime3').css('color', '<?php echo '{colorSubject3}' ?>');
        $('#LastTime4').css('color', '<?php echo '{colorSubject4}' ?>');
        $('#LastTime5').css('color', '<?php echo '{colorSubject5}' ?>');
        $('#LastTime6').css('color', '<?php echo '{colorSubject6}' ?>');
        $('#LastTime7').css('color', '<?php echo '{colorSubject7}' ?>');
        $('#LastTime8').css('color', '<?php echo '{colorSubject8}' ?>');
        $('#LastTime9').css('color', '<?php echo '{colorSubject9}' ?>');
        $('#LastTime10').css('color', '<?php echo '{colorSubject10}' ?>');
        $('#LastTime11').css('color', '<?php echo '{colorSubject11}' ?>');




        $("#scoreLijstNavItem").click(function () {
            $("#scoreLijstNavItem").css('background-color', '#f4f4f4');
            $("#problemenNavItem").css('background-color', '#fff');
        });

        $("#problemenNavItem").click(function () {
            $("#problemenNavItem").css('background-color', '#00000');
            $("#scoreLijstNavItem").css('background-color', '#fff');
        });


    });
</script>
