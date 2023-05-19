let button_send_comment = $('.button_send_comment')
let comment_list = $('.comment_list')
let next_comment = $('#next_comment')
let previous_comment = $('#previous_comment')
let count_page = getCountPage()
let count_comment = $('#count_comment')

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
            if (response.result) {
                resetCommentBlock()
            }
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
            } else {
                return false
            }
        }
    })
}

getCommentManga(1)

previous_comment.on('click', function () {
    let currentPage = parseInt($(this).attr('value'))

    if (currentPage > 0 && !previous_comment.hasClass('disable_pagination_button')) {
        getCommentManga(currentPage).then((res) => {
            if (res.result) {

                if (currentPage > 0) {
                    previous_comment.attr('value', currentPage - 1)
                    next_comment.attr('value', currentPage + 1)
                }

                if (currentPage - 1 <= 0) {
                    previous_comment.addClass('disable_pagination_button')
                } else {
                    previous_comment.removeClass('disable_pagination_button')
                }

                if (currentPage < count_page) {
                    next_comment.removeClass('disable_pagination_button')
                }
            }
        })
    }
})

next_comment.on('click', function () {
    let currentPage = parseInt($(this).attr('value'))

    if ( currentPage <= count_page && !next_comment.hasClass('disable_pagination_button')) {
        getCommentManga(currentPage).then((res) => {
            if (res.result) {

                if (currentPage < count_page) {
                    next_comment.attr('value', currentPage + 1)
                    previous_comment.attr('value', currentPage - 1)
                }

                if (currentPage === count_page) {
                    next_comment.attr('value', currentPage)
                    previous_comment.attr('value', currentPage - 1)
                }

                if (currentPage >= count_page) {
                    next_comment.addClass('disable_pagination_button')
                }

                if (currentPage > 1) {
                    previous_comment.removeClass('disable_pagination_button')
                }

                if (currentPage < count_page) {
                    next_comment.removeClass('disable_pagination_button')
                }
            }
        })
    }
})

function resetCommentBlock() {
    getCommentManga(1)
    getCountCurrentComment()
    if (count_page > 1) {
        previous_comment.attr('value', 0)
        next_comment.attr('value', 2)
        if (!previous_comment.hasClass('disable_pagination_button')) {
            previous_comment.addClass('disable_pagination_button')
        }

        if (next_comment.hasClass('disable_pagination_button')) {
            next_comment.removeClass('disable_pagination_button')
        }
    }
    $('.comment_box').val('')
}

function getCountCurrentComment() {

    let request = {
        'id': getMangaId()
    }

    $.ajax({
        type: "GET",
        url: getRouteCountCommentManga(),
        data: request,
        success: function (response) {
            if (response.result) {
                count_comment.html(response.data)
                count_page = Math.ceil(response.data / getCommentPerPage())
            }
        }
    })
}
