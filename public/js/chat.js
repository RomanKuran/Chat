$(document).ready(function () {
    $('.container-messages').scrollTop($('.container-messages')[0].scrollHeight);
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    $('.js-send-message').click(function(){
        var text = $('.js-message-body').val();
        $.ajax({
            url: 'sendMessage',
            type: 'POST',
            data: {
                _token: $('.js-token').val(),
                message_body: text,
                id_interlocutor: id,
            },
            success: function (data) {
                if(data["date"]){
                    $(".container-messages").append( "<div class='my-message'><div class='container-message'><div class='message-body'>"+text+"</div><div class='date'>"+data["date"]+"</div></div></div>");
                    $('.js-message-body').val('');
                    $('.container-messages').scrollTop($('.container-messages')[0].scrollHeight);
                }
            }
        });
    });
});