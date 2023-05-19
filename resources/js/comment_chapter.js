let button_send_comment = $('.button_send_comment')
let comment_list = $('.comment_list')
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

function getCommentChapter() {

    let get_comment = {
        'chapter_id': getChapterId(),
        'page': 1
    }

    $.ajax({
        type: "POST",
        url: getRouteCommentChapter(),
        headers: {'X-CSRF-TOKEN': getCSRFToken()},
        data: get_comment,
        success: function (response) {
            if (response.result) {
                comment_list.html(response.data)
            }
        }
    })
}

getCommentChapter()
