function getMessage(correction){
    console.log('getNewMessage');
    jQuery.ajax({
        type: 'POST',
        url: base_url + "index.php/AjaxController/getMessage",
        data: {'correction': correction},
        dataType: 'json',
        success: function(response){
            console.log(JSON.stringify(response));
            changeHtml(response);
        },
        error: function(response){
            console.log('getNewMessage Error');
        }
    });
}

function changeHtml(jsonData){
    document.getElementById("senderPhoto").src = jsonData.photo;
    document.getElementById("personsays").textContent = jsonData.firstName + " zegt:";
    document.getElementById("message").textContent = jsonData.messageText;
    document.getElementById("messagePhoto").src = jsonData.messagePhoto;
    document.getElementById("date").textContent = jsonData.messageDate;
    
    document.getElementById("prevMessage").disabled = jsonData.firstMessage;
    document.getElementById("nextMessage").disabled = jsonData.lastMessage;
    //window.top.location = window.top.location; //refreshes page (html only)
}