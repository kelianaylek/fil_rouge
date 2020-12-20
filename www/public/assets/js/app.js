// getMessages();
$(".message").click(function(e) {
    e.preventDefault();
    $.ajax({
        url: "?page=chat",
        method: "POST",
        dataType: 'json',
        data: { "message": $(".sendMessage").val() },
        success: function(data) {
            alert(data);
            alert($(".sendMessage").val())
        },
        error: function(response) {
            console.log(response)
        }
    }).done(function(response) {})
})