let button_follow = $('.button_follow')
let button_unfollow = $('.button_unfollow')
let button_like = $('.button_like')
let button_unlike = $('.button_unlike')
let like_count = $('#like_count')
let follow_count = $('#follow_count')

function setWidthLabel() {
    let client_screen = $(document).width()
    let width = `calc((${client_screen}px - 24% - 60px) * 14 / 100)`
    $('.label_info').css('width', width)
}

setWidthLabel()

$(window).on('resize', function () {
    setWidthLabel()
})

button_follow.on('click', function () {

    let request_follow = {
        'user_id': getUserId(),
        'manga_id': getMangaId()
    }

    $.ajax({
        type: 'POST',
        url: getFollowRoute(),
        headers: {'X-CSRF-TOKEN': getCSRFToken()},
        data: request_follow,
        success: function (response) {
            if (response.result) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    backdrop: `
                        rgba(0,0,123,0.4)
                        url("/storage/nyan-cat.gif")
                        left top
                        no-repeat
                      `,
                    timer: 1500
                })
                button_unfollow.css('display', 'flex')
                button_unfollow.attr('id', response.data)
                button_follow.css('display', 'none')
                follow_count.html(parseInt(follow_count.html()) + 1)
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    })


})

button_unfollow.on('click', function () {

    let request_unfollow = {
        'follow_id': button_unfollow.attr('id')
    }

    $.ajax({
        type: 'POST',
        url: getUnfollowRoute(),
        headers: {'X-CSRF-TOKEN': getCSRFToken()},
        data: request_unfollow,
        success: function (response) {
            if (response.result) {
                Swal.fire({
                    position: 'top-end',
                    imageUrl: "storage/xqc-uncanny.gif",
                    title: `${response.message}`,
                    imageWidth: 400,
                    imageHeight: 221.25,
                    showConfirmButton: false,
                    timer: 3500
                })
                button_unfollow.css('display', 'none')
                button_unfollow.attr('id', '')
                button_follow.css('display', 'flex')
                follow_count.html(parseInt(follow_count.html()) - 1)
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    })
})

button_like.on('click', function () {

    let request_like = {
        'user_id': getUserId(),
        'manga_id': getMangaId()
    }

    $.ajax({
        type: 'POST',
        url: getLikeRoute(),
        headers: {'X-CSRF-TOKEN': getCSRFToken()},
        data: request_like,
        success: function (response) {
            if (response.result) {
                button_like.css('display', 'none')
                button_unlike.css('display', 'flex')
                button_unlike.attr('id', response.data)
                like_count.html(parseInt(like_count.html()) + 1)
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    })

})

button_unlike.on('click', function () {

    let request_unlike = {
        'like_id': button_unlike.attr('id')
    }

    $.ajax({
        type: 'POST',
        url: getUnlikeRoute(),
        headers: {'X-CSRF-TOKEN': getCSRFToken()},
        data: request_unlike,
        success: function (response) {
            if (response.result) {
                button_unlike.css('display', 'none')
                button_unlike.attr('id', '');
                button_like.css('display', 'flex')
                like_count.html(parseInt(like_count.html()) - 1)
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    })
})
