let button_send_comment = $('.button_send_comment')
let comment_list = $('.comment_list')

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

function getCommentManga(page) {

    let get_comment = {
        'manga_id': getMangaId(),
        'page': page
    }

    return $.ajax({
        type: "POST",
        url: getRouteCommentManga(),
        headers: {'X-CSRF-TOKEN': getCSRFToken()},
        data: get_comment,
        success: function (response) {
            if (response.result) {
                comment_list.html(response.data)
                return true
            } else {
                return false
            }
        }
    })
}

getCommentManga(1)

function previous_comment(selector) {
    let previous_button = $(selector)
    let currentPage = parseInt(previous_button.attr('value'))
    if ( currentPage > 1 ) {
        let result = getCommentManga(currentPage)
        console.log(result)
    }
}

function next_comment(selector) {
    let next_button = $(selector)
    let currentPage = parseInt(next_button.attr('value'))
    if ( currentPage < getCountPage() ) {
        let result = getCommentManga(currentPage)
        console.log(result)
    }
}
