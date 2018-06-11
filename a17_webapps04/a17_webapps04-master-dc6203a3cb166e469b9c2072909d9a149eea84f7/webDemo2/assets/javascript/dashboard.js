function confirmAndDelete() {
    if(isChecked()) {
        if(confirm("Are you sure you want to delete the selected messages?")) {
        document.getElementById("deleteForm").submit();
        }
    }
}

function gotoIndividualResident(id) {
    jQuery.ajax({
        type: 'POST',
        url: base_url + "index.php/CaregiverController/residentIndividual",
        data: {'resident_id': id},
        dataType: 'json'
    });
    window.location=base_url + "index.php/CaregiverController/residentIndividual";
}

function showFilterList(id)
{
    var residentFilterList='residents_'+id;
    var e= document.getElementById(residentFilterList);
    if(e.style.display=='block')
    {
        e.style.display='none';
    }
    else
    {
        e.style.display='block';
    }
}

function filter(source)
{
    
    if(source.checked)
    {
      $(source).attr('checked','yes');
   
        
    }
    else
    {
         $(source).removeAttr('checked');
   
    }
    selectNotification();
}

function selectResidents(source,idSector) {
    

   
   
    var name_checkboxes='resident_check_'+idSector;
  checkboxes = document.getElementsByName(name_checkboxes);

  for(var i=0, n=checkboxes.length; i<n; i++) {
        
    checkboxes[i].checked = source.checked;
    
    if(checkboxes[i].checked)
    {
        $(checkboxes[i]).attr('checked','yes');
      
        
    }
    else
    {
         $(checkboxes[i]).removeAttr('checked');
    }
    
    
 
  }
  selectNotification();
}



function selectNotification()
{
    var i=0;
    var j=0;
    var typeList=[];
    var idList=[];
     
        $("input[id='filterCheckbox']").each(function() {
          if($(this).attr("checked")=='checked')
          {
             
              if($(this).attr('value')=="LowScore")
              {
                  
                  
                  typeList[i]=$(this).attr("value");
                  i++;
              }
              else
              {
                   if($(this).attr('value')=="activity")
              {
                  
                  typeList[i]=$(this).attr("value");
                  i++;
              }
              else
              {
                  idList[j]=$(this).attr("value");
                  j++;
              }
              }
              
              
             
          }
          else
          {
             
          }
        
           
              
});
i=0;
j=0;
var m=typeList.length;
var o=idList.length;
if(m==0)
{
     $("input[id='filterCheckbox']").each(function(){
         if($(this).attr('value')=="LowScore"||$(this).attr('value')=="activity")
         {
              typeList[i]=$(this).attr("value");
                  i++;
         }
         
                    
     });
}

if(o==0)
{
     $("input[id='filterCheckbox']").each(function(){
          if($(this).attr('value')!="LowScore"&&$(this).attr('value')!="activity")
         {
              idList[j]=$(this).attr("value");
                  j++;
         }
     });
}
i=0;
j=0;
if(o==0&&m==0)
{
    $("input[id='filterCheckbox']").each(function(){
         if($(this).attr('value')=="LowScore"||$(this).attr('value')=="activity")
         {
              typeList[i]=$(this).attr("value");
                  i++;
         }
         else
         {
              idList[j]=$(this).attr("value");
                  j++;
         }
         
                    
     });
}



  

   var notificationList = document.getElementById('allNotification');
    //Clear html before inserting new data
    while(notificationList.firstChild) {
        notificationList.removeChild(notificationList.firstChild);
    }


var language = document.getElementById('languageCaregiverDash').innerHTML;
 jQuery.ajax({
        type: 'POST',
        url: base_url + "index.php/AjaxController/getSectorInfo1",
        data: {'typeList':typeList,
                'idList':idList},
        dataType: 'json',
        success: function(data){             
            if(data){
                var message;
                for(i in data) {
                    console.log(language=="english");
                    if(language=="english") message = data[i].messageTextEng;
                    else message = data[i].messageText;
                    
                    var div = document.createElement('div');
                    div.classList.add("line");
                    console.log('hi');
                    div.innerHTML= '<label>\n\
                                    <input type="checkbox" name="delete_list[]" id="check_'+data[i].idNotification+'" value="'+data[i].idNotification+'">\n\
                                    <span class="checkmark">\n\
                                    </span>\n\
                                    </label>\n\
                                    <div class="message" onclick="'+ data[i].redirectPath+'">'+message+'</div>';
                    notificationList.appendChild(div);
                }
            }
            avgScoreIds(idList);
        },   
        error: function(){
          console.log('error');
          avgScoreIds(idList);
        }
    });
}
function avgScoreIds(idList) {
var avgScore = document.getElementById('scoreDash');
if(idList.length!==0) {
    jQuery.ajax({
        type: 'POST',
        url: base_url + "index.php/AjaxController/avgScoreSelectedResidents",
        data: {'idList': idList},
        dataType: 'json',
        success: function(data){
            console.log(data);
            avgScore.innerHTML = data[0]['avgLastScore'].substring(0,4) + " ";
        },   
        error: function(data){
          console.log(data);
          avgScore.innerHTML = "- ";
        }
    });
}
else avgScore.innerHTML = "- ";
}



function selectAll(source) {
  //Toggle master
  master = document.getElementById('checkboxAll');
  if(master!=source) {
    if(master.checked) master.checked = false;
    else master.checked = true;
  }
  //Set all checkboxes same as master
  checkboxes = document.getElementsByName('delete_list[]');
  for(var i=0, n=checkboxes.length; i<n; i++) {
    checkboxes[i].checked = master.checked;   
  }
}

function isChecked() {
  checkboxes = document.getElementsByName('delete_list[]');
  $checked = false;
  for(var i=0; i<checkboxes.length; i++) {
    if(checkboxes[i].checked === true) {
        $checked = true;
        break;
    }
  }
  return $checked;
}