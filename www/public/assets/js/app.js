// send message a la validation du form 
$(".sendMessage").click(function(e) {
    e.preventDefault();
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const pollId = urlParams.get('poll_id')

    const dt = new Date();
    const time = dt.getFullYear() + "/" + dt.getDate() + "/" + dt.getMonth() + "  -  " + dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

    $.ajax({
        url: "?page=chat",
        type: "GET",
        data: { "message": $(".message").val(), "poll_id": pollId, "messageDate": time },

        success: function(data) {
            $("#messages tr").remove();
            $("#messages").append(data);
            $("input[name=message]").val("");
        },
        error: function(response) {
            console.log(response)
        }
    }).done(function(response) {})
})



// get messages tout les x temps 
function getMessages() {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const pollId = urlParams.get('poll_id')

    $.ajax({
        url: "?action=getMessagesFromPoll",
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