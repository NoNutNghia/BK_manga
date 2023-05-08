let button_follow = $('.button_follow')
let button_unfollow = $('.button_unfollow')
let button_like = $('.button_like')
let button_unlike = $('.button_unlike')

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
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Follow manga successfully',
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
    $(this).css('display', 'none')
})

button_unfollow.on('click', function () {
    Swal.fire({
        position: 'top-end',
        imageUrl: "storage/xqc-uncanny.gif",
        title: 'Unfollow manga successfully',
        imageWidth: 400,
        imageHeight: 221.25,
        showConfirmButton: false,
        timer: 3500
    })

    $(this).css('display', 'none')
    button_follow.css('display', 'flex')
})

button_like.on('click', function () {
    $(this).css('display', 'none')
    button_unlike.css('display', 'flex')
})

button_unlike.on('click', function () {
    $(this).css('display', 'none')
    button_like.css('display', 'flex')
})


