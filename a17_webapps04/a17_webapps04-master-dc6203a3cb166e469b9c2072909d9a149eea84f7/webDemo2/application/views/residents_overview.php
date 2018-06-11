<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div id="topRow" class="row residentOverviewRow">
    <form class="searchFormResOverview" action='searchResident' method="post">   
        <input class="col-md-11" id="searchBarResident" name='inputName' type="text" placeholder="{search}" />

        <button  class="col-md-1 btn btn-default searchIconBtnResident " type="submit">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)" fill="#2c3d51" stroke="none">
                    <path d="M300 924 c-79 -28 -144 -87 -188 -169 -24 -45 -27 -60 -27 -155 0
                          -94 3 -110 27 -155 33 -64 89
                          -120 153 -153 44 -24 61 -27 150 -27 78 0 110 4
                          143 19 l43 20 122 -122 123 -122 47 48 47 47 -119 119 
                          -120 119 27 51 c24 46
                          27 61 27 156 0 94 -3 110 -26 155 -34 63 -99 128 -158 156 -61 30 -205 37
                          -271 13z 
                          m214 -88 c49 -20 112 -81 135 -130 25 -50 28 -149 7 -200 -20 -49
                          -81 -112 -130 -135 -50 -25 -149 -28 
                          -200 -7 -49 20 -112 81 -135 130 -25 50
                          -28 149 -7 200 20 48 80 111 129 135 50 25 150 28 201 7z"/>
                </g>
            </svg>
        </button> 
    </form>
    <span id="overviewButtonSpan">
    
        <button class="btn btn-default iconBtnResident" onclick="document.getElementById('id01').style.display='block'" type="button">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 100 100">
                <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)" fill="#2c3d51" stroke="none">
                    <path d="M57 953 c-4 -3 -7 -21 -7 -39 0 -37 27 -71 213 -267 l107 -114 0
                          -180 0 -180 112 -67 c61 -37 117 -65 125 -62 10 4 13 54 13 248 l1 243 160
                          169 c158 167 160 169 157 210 l-3 41 -436 3 c-239 1 -439 -1 -442 -5z m831
                          -48 c-2 -8 -70 -86 -153 -175 l-150 -160 -90 1 -90 0 -150 161 c-82 88 -151
                          167 -153 174 -3 12 60 14 393 14 343 0 396 -2 393 -15z m-318 -585 c0 -110 -3
                          -200 -6 -200 -3 0 -37 19 -75 41 l-69 41 0 159 0 159 75 0 75 0 0 -200z"/>
                </g>
            </svg>
        </button>
    
     <span id="iconBtnResidentLabel" onclick="document.getElementById('id01').style.display='block'" onmouseover="" style="cursor: pointer;">Filter</span>

   
     <button class="btn btn-default iconBtnResident" onclick="gotoAdd()">
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
            <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)" fill="#2c3d51" stroke="none">
                <path d="M432 878 c-8 -8 -12 -57 -12 -155 l0 -143 -143 0 c-98 0 -147 -4
                      -155 -12 -16 -16 -16 -120 0 -136 8 -8 57 -12 155
                      -12 l143 0 0 -143 c0 -98 4
                      -147 12 -155 16 -16 120 -16 136 0 8 8 12 57 12 155 l0 143 143 0 c98 0 147 4
                      155 12 16 16 16 120
                      0 136 -8 8 -57 12 -155 12 l-143 0 0 143 c0 98 -4 147
                      -12 155 -7 7 -37 12 -68 12 -31 0 -61 -5 -68 -12z"/>
            </g>
        </svg>
    </button>
    <span id="iconBtnResidentLabel" onclick="gotoAdd()" onmouseover="" style="cursor: pointer;">{add}</span>
     
    </span>
    
     <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
      
      <ul id="filter_list" class="list-group" style="  width: 50%; " >
             {sectors}
          
        <div class="line">
        <label>
            <input type="checkbox"  id="checkbox_{idSector}" name="filter_list" onclick="selectResidents({idSector});"  >
            <span class="checkmark"></span>
        </label>
            <div>{name} :    {residentCount} People </div>
         
    </div>
             {/sectors}
             
          
            
              
   
</ul>  
        <button class="filter_submitButton" onclick="document.getElementById('id01').style.display='none'">Confirm</button>
      </div>
    </div>
  </div>


</div>

<div class="pre-scrollable row residentOverviewRow">
    {residents}
    <form method="post" action="residentIndividual">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 residentItem" name="resident_element" id="resident_element_{idResident}">
            <input type="hidden" name="resident_id" value="{idResident}">                                      
                <button id="button1" class="btn btn-default residentButton" type="submit"> 
                    <img class="imgResOverviewCent img-circle" src="{photo}"/> 
                    <img class="iconResOverviewRight" src="{faceImage}"/>
                    <small class= "txtResOverviewBottom">{firstName} {lastName}</small>
                    <small class= "txtResOverviewBottom" name="resident_name"> {sectorName}</small>
                    <small class= "txtResOverviewBottom" name="resident_name">{room} {roomNr}</small>
                </button>
        </div>
    </form>
    {/residents}
</div>
    
     <script type="text/javascript" src="<?PHP echo base_url();?>assets/javascript/residents_overview.js"></script>
