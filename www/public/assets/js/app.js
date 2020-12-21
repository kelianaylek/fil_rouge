// getMessages();
$(".sendMessage").click(function(e) {
    e.preventDefault();
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const product = urlParams.get('poll_id')

    const dt = new Date();
    const time = dt.getFullYear() + "/" + dt.getDate() + "/" + dt.getMonth() + "  -  " + dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

    $.ajax({

        url: "?page=chat",
        type: "GET",
        // dataType: 'json',
        data: { "message": $(".message").val(), "poll_id": product, "messageDate": time },

        success: function(data) {
            // alert(product);
            // alert($(".message").val())
            $("#messages").append(data);

        },
        error: function(response) {
            console.log(response)
        }
    }).done(function(response) {})
})