$(document).ready(function(){

    $('#addComment').click(function(e) {
        e.preventDefault();
        const loggedUser = $('#loggedUser').val();
        const advertisementId = parseInt($('#advertisementId').val());
        const comment = $('#comment').val();

        $.ajax({
            url: '/property/ajax/addComment',
            method: 'post',
            data: {
                loggedUser: loggedUser,
                advertisementId: advertisementId,
                comment: comment
            },
            success: function(data) {
                const jsonData = JSON.parse(data);

                $('#comments').append(
                    '<div class="card col-md-12 my-2">' +
                    '<div>' + jsonData['username'] + '</div>' +
                    '<div>' + jsonData['comment'] + '</div>' +
                    '<small>' + jsonData['time'] + '</small>' + '<br>' +
                    '</div>'
                );
                $('#comment').val('');
            }
        })
    })
});