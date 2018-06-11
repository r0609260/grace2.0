

function getSectorInfo(idSector, nameSector) {
    var list = document.getElementById('residentList');
    //Clear html before inserting new data
    while (list.firstChild) {
        list.removeChild(list.firstChild);
    }

    jQuery.ajax({
        type: 'POST',
        url: base_url + "index.php/AjaxController/getSectorInfo",
        data: {'idSector': idSector},
        dataType: 'json',
        success: function (data) {
            if (data) {
                var title = document.createElement('span');
                title.classList.add("sectorTitle");
                title.innerHTML = 'Members of sector "' + nameSector + '":';
                list.appendChild(title);
                for (i in data) {
                    var div = document.createElement('div');
                    div.classList.add("sectorPerson");
                    div.innerHTML = data[i].firstName + " " + data[i].lastName;
                    list.appendChild(div);
                }
            }
            var input = document.createElement('div');
            input.classList.add("sectorAddPerson");
            input.innerHTML = '<div class="sectorAddPerson btn btn-default" onclick="makeInput(' + idSector + ', \'' + nameSector + '\')">Click to add resident to this sector</div>';
            list.appendChild(input);

        },
        error: function () {
            var div = document.createElement('div');
            div.innerHTML = "There are no residents in this group"
            list.appendChild(div);
            var input = document.createElement('div');
            input.classList.add("sectorAddPerson");
            input.innerHTML = '<div class="sectorAddPerson btn btn-default" onclick="makeInput(' + idSector + ', \'' + nameSector + '\')">Click to add resident to this sector</div>';
            list.appendChild(input);
        }
    });
}

function makeInput(idSector, nameSector) {
    var list = document.getElementById('residentList');
    //Clear lastchild and insert form
    list.removeChild(list.lastChild);
    var div = document.createElement('div');
    div.classList.add("sectorPerson");
    div.innerHTML = '<form class="form-horizontal" onsubmit="addResident(' + idSector + ', \'' + nameSector + '\')">\
                        <input type="submit" style="display: none" />\
                        <div class="control-group">\
                            <div class="controls form-inline">\
                                <input type="text" class="input-small" placeholder="First Name" id="firstName" autofocus>\
                                <input type="text" class="input-small" placeholder="Last Name" id="lastName">\
                                <button class="btn btn-default" type="submit" style="background: none; border: none; padding: 0px; margin-bottom: 5px;">\
            <svg class="deleteSVG" version="1.0" xmlns="http://www.w3.org/2000/svg" width="20pt" height="20pt" viewBox="0 0 50 50">\
            <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)" fill="#2c3d51" stroke="none">\\n\
            <path d="M317 265 c-54 -85 -102 -155 -106 -155 -4 0 -16 10 -27 21 -45 50\
            -115 102 -125 92 -13 -13 139 -155 160 -151 16 3 221 314 221 336 0 37 -35 -4 -123 -143z"></path>\
            </g>\
            </svg>\
            </button> \
                            </div>\
                        </div>\
                    </form>';
    list.appendChild(div);
}

function addResident(idSector, nameSector) {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;

    jQuery.ajax({
        type: 'POST',
        url: base_url + "index.php/AjaxController/addResident",
        data: {'idSector': idSector, 'firstName': firstName, 'lastName': lastName},
        dataType: 'json'
    });
    setTimeout(getSectorInfo(idSector, nameSector), 100);
}

function createSectorForm() {
    var list = document.getElementById('residentList');
    //Clear html before inserting new html
    while (list.firstChild) {
        list.removeChild(list.firstChild);
    }

    var div = document.createElement('div');
    div.innerHTML = '<form class="form-horizontal" method="post" action="addSector">\
                        <div class="form-group" style="height:55px;margin-top: 70px;"><label class="control-label col-sm-4" for="Sector name" style=" font-family:  Lato, sans-serif; font-size: 20px;">New sector\'s name:</label>\
                            <div class="col-sm-8">\
                                <input type="text" class="form-control" id="sectorName" placeholder="Name " style="width:75%;margin-top: 5px;margin-left:3px;"name="sectorName">\
                            </div>\
                        </div>\
                        <div class="form-group" style="height:55px;">\
                            <div class="col-8">\
                                <button class="btn-confirm" type="submit">Create</button>\
                            </div>\
                        </div>\
                    </form>';
    list.appendChild(div);
}

function removeSector(idSector) {
    jQuery.ajax({
        type: 'POST',
        url: base_url + "index.php/AjaxController/removeSector",
        data: {'idSector': idSector},
        success: function (data) {
            location.reload();
        },
        error: function () {
            location.reload();
        }
    });
}

function makeSectorInput() {
    var list = document.getElementById('sectors');
    //Clear lastchild and insert form
    list.removeChild(document.getElementById('addSectorBtn'));
    var div = document.createElement('div');
    div.classList.add("newSector");
    div.innerHTML = '<div class="line">\
                        <form class="form-horizontal" method="post" action="addSector" style="display:flex;">\
                        <input type="submit" style="display: none"/>\
                            <div class="control-group sectorButton">\
                                <div class="controls form-inline">\
                                    <input type="text" class="sectorInput" placeholder="Sector name" id="sectorName" name="sectorName" autofocus>\
                                </div>\
                            </div>\
                    <button class="btn btn-default deleteSectorButton" type="submit">\
                    </form>\
            <svg class="deleteSVG" version="1.0" xmlns="http://www.w3.org/2000/svg" width="30pt" height="40pt" viewBox="0 0 50 50">\
            <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)" fill="#2c3d51" stroke="none">\
            <path d="M317 265 c-54 -85 -102 -155 -106 -155 -4 0 -16 10 -27 21 -45 50\
            -115 102 -125 92 -13 -13 139 -155 160 -151 16 3 221 314 221 336 0 37 -35 -4 -123 -143z"></path>\
            </g>\
            </svg>\
            </button>\
                    </div>';
    list.appendChild(div);
}

function confirmDeleteSector(id) {
    if(confirm("Are you sure you want to delete this sector?\n (P.S. If the sector is not empty it will not be removed.)")) {
        removeSector(id);
    }
}