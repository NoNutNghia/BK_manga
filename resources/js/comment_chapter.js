let button_send_comment = $('.button_send_comment')

button_send_comment.on('click', function () {

    let content_comment = $('.comment_box').val()

    let send_comment = {
        'id': getChapterId(),
        'content_comment': content_comment
    }

    $.ajax({
        type: "POST",
        url: getRoutePostCommentChapter(),
        headers: {'X-CSRF-TOKEN': getCSRFToken()},
        data: send_comment,
        success: function (response) {
            console.log(response)
        }
    })
})
