let button_send_comment = $('.button_send_comment')

button_send_comment.on('click', function () {

    let content_comment = $('.comment_box').val()

    let send_comment = {
        'id': getMangaId(),
        'content_comment': content_comment
    }

    $.ajax({
        type: "POST",
        url: getRoutePostCommentManga(),
        headers: {'X-CSRF-TOKEN': getCSRFToken()},
        data: send_comment,
        success: function (response) {

        }
    })
})
