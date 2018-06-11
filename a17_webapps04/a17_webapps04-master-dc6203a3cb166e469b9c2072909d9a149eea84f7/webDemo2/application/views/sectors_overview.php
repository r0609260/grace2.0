<div class="sectorCol col-lg-4 col-md-4 col-sm-4 col-xs-12" id="sectors">
    <span class="sectorTitle">{chooseSector}:</span>
    {sectors}
    <div class="line">
        <button class="sectorButton btn btn-default" type="button" onclick="getSectorInfo({idSector},'{name}')"> 
            <!-- TODO: id distinction between buttons for selecting a sector and deleting it-->
            <input type="text" style="display: none"/>
            <div class="sectorName">{name}</div>
            <div class="residentCount">{residentCount}</div>
        </button>
        <button class="btn btn-default deleteSectorButton" type="button" onclick="confirmDeleteSector({idSector})">
            <svg class="deleteSVG" version="1.0" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 100 100">
            <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)" fill="#2c3d51" stroke="none">
            <path d="M366 978 c-9 -12 -16 -33 -16 -45 0 -22 -3 -23 -99 -23 -74 0 -102
                  -4 -111 -15 -14 -17 -5 -35 18 -35 16 0 21 -43 54 -412 35 -389 38 -414 58
                  -430 20 -16 46 -18 227 -18 198 0 205 1 226 23 21 21 24 46 55 412 19 215 36
                  398 39 408 2 9 11 17 19 17 20 0 30 30 13 41 -8 5 -58 9 -111 9 l-98 0 0 28
                  c0 52 -24 62 -148 62 -103 0 -112 -2 -126 -22z m397 -165 c-3 -27 -19 -208
                  -36 -403 l-32 -355 -197 -3 -197 -2 -5 32 c-7 42 -66 714 -66 751 l0 27 269 0
                  268 0 -4 -47z"/>
            <path d="M355 798 c-3 -7 -4 -166 -3 -353 3 -332 3 -340 23 -340 20 0 20 7 20
                  350 0 325 -1 350 -18 353 -9 2 -19 -3 -22 -10z"/>
            <path d="M475 798 c-3 -7 -4 -166 -3 -353 3 -332 3 -340 23 -340 20 0 20 7 20
                  350 0 325 -1 350 -18 353 -9 2 -19 -3 -22 -10z"/>
            <path d="M595 798 c-3 -7 -4 -166 -3 -353 3 -332 3 -340 23 -340 20 0 20 7 20
                  350 0 325 -1 350 -18 353 -9 2 -19 -3 -22 -10z"/>
            </g>
            </svg>
        </button>
    </div>
    {/sectors}
    
    <div class="topButtons" id="addSectorBtn">
        <button class="btn btn-default addSectorButton" type="button" onclick="makeSectorInput()">{addSector}</button>
    </div>
</div>



<div class="sectorCol col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <div class="residentList" id="residentList">
        <!-- insert residents through javascript, this is an example-->
        <div class="resident">
            {seeResidents}
        </div>
    </div>
    
</div>
<script type="text/javascript" src="<?PHP echo base_url();?>assets/javascript/sector_overview.js"></script>