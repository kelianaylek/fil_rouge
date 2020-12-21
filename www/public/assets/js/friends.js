// get online friends 
function getOnlineFriends() {
    $.ajax({
        url: "?action=getOnlineFriends",
        type: "GET",
        data: { "poll_id": pollId },

        success: function(data) {
            $("#messages tr").remove();

            $("#messages").append(data);

        },
        error: function(response) {
            console.log(response)
        }
    }).done(function(response) {})
}


function loadMessages() {
    loadMessages = setInterval(getMessages, 2000);
}

getMessages();
loadMessages();